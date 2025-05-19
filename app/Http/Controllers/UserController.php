<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'role_id' => 'required|exists:roles,id'
        ]);
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        if (Auth::user()->role_id !== 1 && Auth::id() !== $user->id) {
            abort(403, 'Unauthorized actionnn.');
        }
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Mengecek jika user yang mengedit adalah admin atau user itu sendiri
        if (Auth::user()->role_id !== 1 && Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'nullable|exists:roles,id', // Role ID hanya valid jika diberikan oleh admin
        ]);

        // Cek jika user adalah admin dan ada perubahan role
        if (Auth::user()->role_id === 1 && $request->has('role_id')) {
            // Jika admin yang mengedit, maka role_id diperbolehkan untuk diubah
            $user->role_id = $request->role_id;
        }

        // Update user data (nama, email)
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string',
            ]);

            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if (Auth::user()->role_id !== 1) {
            return redirect()->route('users.edit', $user->id)
                ->with('success', 'Your profile has been updated successfully.');
        }

        // Redirect setelah update sukses
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function resetPassword(User $user)
    {
        // Pastikan hanya admin yang bisa melakukan reset password
        if (Auth::user()->role_id != 1) {
            abort(403, 'Unauthorized action.');
        }

        // Update password menjadi '12345678'
        $user->password = Hash::make('universitasaki');
        $user->save();

        // Kembalikan dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'Password user berhasil direset menjadi 12345678.');
    }
}
