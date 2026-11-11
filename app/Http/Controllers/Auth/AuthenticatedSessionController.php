<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $role = $request->input('role', 'admin');
        $email = $role . '@gmail.com';
        $name = 'Fargan (' . ucfirst($role) . ')';

        $user = \App\Models\User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt('12345'),
            ]
        );

        // Simpan role ke session agar web tetap lancar tanpa error
        session(['user_role' => $role]);

        // Simpan ke database jika kolom role sudah dibuat
        if (Schema::hasColumn('users', 'role')) {
            $user->role = $role;
            $user->name = $name;
            $user->save();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/topik');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}