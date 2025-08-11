<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.user_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:50',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|max:100',
            'role' => 'required|in:admin,petugas',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|max:50|unique:users,username,' . $id,
            'nama_lengkap' => 'required|max:100',
            'role' => 'required|in:admin,petugas',
            'status' => 'required|in:aktif,nonaktif',
            'password' => 'nullable|min:6',
        ]);

        $userData = [
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $users = User::where('username', 'like', '%' . $query . '%')
                        ->orWhere('nama_lengkap', 'like', '%' . $query . '%')
                        ->get();

        return response()->json($users);
    }
}
