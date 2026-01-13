<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register', ['pageTitle' => 'Sign in']);
    }

    public function showLoginForm()
    {
        return view('login', ['pageTitle' => 'Login']);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'checkConditions' => 'accepted'
        ]);

        User::insertUserIntoDB(
            1,
            $validatedData['name'],
            $validatedData['surname'],
            $validatedData['email'],
            $validatedData['password']
        );

        $user = User::getUserByEmailAndPassword(
            $validatedData['email'],
            $validatedData['password']
        );

        if ($user) {
            //autenticazione automatica dell'utente
            Auth::login($user);
        }

        return redirect()->intended('/')->with('success', 'Registrazione avvenuta con successo! Sei stato loggato automaticamente.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::getUserByEmailAndPassword(
            $credentials['email'],
            $credentials['password']
        );

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/')->with('success', 'Login effettuato con successo!');
        } 

        return back()->withErrors(['email' => 'Le credenziali fornite non sono corrette.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout effettuato con successo!');
    }

    public function showAllUsers()
    {
        $users = User::getAllUsers();
        return view('users_view', ['users' => $users, 'pageTitle' => 'All Users']);
    }
}
