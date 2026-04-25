<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = User::orderBy('role')->orderBy('name')->get();

        return view('members.index', compact('members'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,member'],
        ]);

        User::create($data);

        return back()->with('success', 'Member added successfully.');
    }

    public function destroy(User $member): RedirectResponse
    {
        if ($member->is(auth()->user())) {
            return back()->withErrors(['member' => 'You cannot delete your own account.']);
        }

        $member->delete();

        return back()->with('success', 'Member removed successfully.');
    }
}
