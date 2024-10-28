<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserApprovedMail;
use App\Mail\UserRejectedMail;
use Spatie\Permission\Models\Role;

class UserApprovalController extends Controller
{
    // Tampilkan daftar user yang menunggu persetujuan
    public function index()
    {
        $users = User::role('User')->where('is_approved', 0)->get(); // Menggunakan is_approved

        return view('backend.superadmin.user-approval.approval', compact('users'));
    }

    public function showApproved()
    {
        $approvedUsers = User::role('User')->where('is_approved', 1)->get(); // Menggunakan is_approved
        return view('backend.superadmin.user-approval.approved', compact('approvedUsers'));
    }

    public function showRejected()
    {
        $rejectedUsers = User::onlyTrashed()->whereNotNull('rejected_at')->get();
        return view('backend.superadmin.user-approval.rejected', compact('rejectedUsers'));
    }

    // Setujui user
    public function approve($id)
    {
        $user = User::find($id);

        if (!$user || !$user->hasRole('User')) {
            return redirect()->back()->with('error', 'User tidak ditemukan atau tidak valid.');
        }

        // Set is_approved menjadi 1 dan approved_at menjadi waktu saat ini
        $user->is_approved = 1;
        $user->approved_at = now();
        $user->save();

        Mail::to($user->email)->send(new UserApprovedMail($user));

        return redirect()->route('user-approval.index')->with('success', 'User telah disetujui.');
    }

    // Tolak user
    public function reject($id, Request $request)
    {
        $user = User::find($id);
    
        if (!$user || !$user->hasRole('User')) {
            return redirect()->back()->with('error', 'User tidak ditemukan atau tidak valid.');
        }
    
        // Simpan alasan penolakan dan tanggal penolakan
        $user->rejection_reason = $request->reason;
        $user->rejected_at = now();
        $user->save(); // Simpan alasan dan tanggal
    
        // Soft delete pengguna
        $user->delete();
    
        Mail::to($user->email)->send(new UserRejectedMail($user, $request->reason));
    
        return redirect()->route('user-approval.index')->with('success', 'User telah ditolak dan datanya dihapus.');
    }

    // Hapus pengguna secara permanen
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->forceDelete();

        return redirect()->route('user-approval.rejected')->with('success', 'Pengguna telah dihapus secara permanen.');
    }
}
