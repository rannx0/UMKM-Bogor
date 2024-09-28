<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmCategory;

class UmkmCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = UmkmCategory::all();
        return view('backend.pages.umkm_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.umkm_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category = new UmkmCategory();
        $category->nama = $request->input('nama');
        $category->save();

        return redirect()->route('umkm-categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = UmkmCategory::find($id);
        return view('umkm-categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = UmkmCategory::find($id);
        return view('umkm-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category = UmkmCategory::find($id);
        $category->nama = $request->input('nama');
        $category->save();

        return redirect()->route('umkm-categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = UmkmCategory::find($id);
        $category->delete();

        return redirect()->route('umkm-categories.index')->with('success', 'Category deleted successfully!');
    }
}