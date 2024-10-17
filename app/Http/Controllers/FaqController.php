<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        // Ambil semua data FAQ
        $faqs = Faq::all();

        return view('backend.pages.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.pages.faq.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        // Simpan data FAQ baru
        Faq::create($request->all());

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Temukan FAQ berdasarkan ID
        $faq = Faq::findOrFail($id);

        return view('backend.pages.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        // Temukan dan update FAQ
        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus FAQ
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
