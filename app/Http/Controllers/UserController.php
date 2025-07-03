<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/profile'), $imageName);
            $user->picture = 'assets/images/profile/' . $imageName;
        }
    
        $user->save();
    
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // Try to authenticate with username first
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('show-all.books'));
        }

        // If username fails, try with email
        $credentials = [
            'email' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('show-all.books'));
        }

        return redirect()->back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('show-all.books')->with('success', 'You have been logged out successfully.');
        } catch (\Exception $e) {
            // If there's any error, still redirect to browse books
            return redirect()->route('show-all.books');
        }
    }

    public function index()
    {
        $users = User::all();
        return view('admin.customers.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.customers.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.customers.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.customers.index')->with('success', 'User deleted successfully.');
    }
}
