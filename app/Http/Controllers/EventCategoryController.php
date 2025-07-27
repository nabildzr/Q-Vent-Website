<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::all();
        return view('admin.event_category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.event_category.form', [
            'category' => new EventCategory(), // kalo create, kita buat instance baru
            'isEdit' => false // menandakan ini adalah form untuk membuat kategori baru
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:event_categories',
        ]);

        EventCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.event_category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = EventCategory::findOrFail($id);
        return view('admin.event_category.form', [
            'category' => $category, // kalo edit, kita ambil data kategori yang ada
            'isEdit' => true // menandakan ini adalah form untuk mengedit kategori yang sudah ada
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = EventCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:event_categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.event_category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = EventCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.event_category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
