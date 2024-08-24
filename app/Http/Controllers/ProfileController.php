<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
public function show()
{
    $user = Auth::user();
    $tasks = $user->tasks;
    return view('profile.show', compact('user', 'tasks'));
}

public function update(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    Auth::user()->update($request->only('username', 'email'));
    return redirect()->route('profile.show');
}
}
