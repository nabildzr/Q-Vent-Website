<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.form', [
            'user' => new User(), // kalo create, kita buat instance baru
            'isEdit' => false // menandakan ini adalah form untuk membuat user baru
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'role' => 'required|in:super_admin,admin',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.form', [
            'user' => $user, // kalo edit, kita ambil data user yang ada
            'isEdit' => true // menandakan ini adalah form untuk mengedit user yang sudah ada
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required',
            'role' => 'required|in:super_admin,admin',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'phone_number', 'role']); // Ambil data yang diisi dari form
        if ($request->filled('password')) { // Cek jika password diisi
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data); // Update data user dengan data yang sudah divalidasi

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
