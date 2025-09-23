<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('isSuperOrAdmin');

        $currentUser = auth()->user();

        if ($currentUser->role === 'super_admin') {
            if ($currentUser->id === 1) {
                // Super Admin pertama: lihat semua user
                $users = User::orderBy('created_at', 'desc')->get();
            } else {
                // Super Admin biasa: lihat admin + dirinya sendiri
                $users = User::where(function ($query) use ($currentUser) {
                    $query->where('role', 'admin') // semua admin
                        ->orWhere('id', $currentUser->id); // dirinya sendiri
                })->orderBy('created_at', 'desc')->get();
            }
        } else {
            // Admin biasa atau user lain (tidak punya akses)
            abort(403, 'Unauthorized');
        }

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
        $currentUser = auth()->user();
        $user = User::findOrFail($id);

        // Cek permission super admin
        if ($currentUser->role === 'super_admin' && $currentUser->id !== 1) {
            if ($user->role === 'super_admin' && $user->id !== $currentUser->id) {
                abort(403, 'Unauthorized');
            }
        }

        return view('admin.user.form', [
            'user' => $user,
            'isEdit' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        $currentUser = auth()->user();
        $user = User::findOrFail($id);

        // Cek permission super admin
        if ($currentUser->role === 'super_admin' && $currentUser->id !== 1) {
            if ($user->role === 'super_admin' && $user->id !== $currentUser->id) {
                abort(403, 'Unauthorized');
            }
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required',
            'role' => 'required|in:super_admin,admin',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'phone_number', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $currentUser = auth()->user();
        $user = User::findOrFail($id);

        // Cek permission super admin
        if ($currentUser->role === 'super_admin' && $currentUser->id !== 1) {
            if ($user->role === 'super_admin' && $user->id !== $currentUser->id) {
                abort(403, 'Unauthorized');
            }
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
