<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index() {
    return view('register.index', [
      'title' => 'Register'
    ]);
  }

  public function store(Request $request) {
    $validateDataRegister = $request->validate([
      'name' => 'required|max:255',
      'username' => ['required', 'min:3', 'max:255', 'unique:users'],
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:6|max:255'
    ]);

    // $validateDataRegister['password'] = bcrypt($validateDataRegister['password']);
    $validateDataRegister['password'] = Hash::make($validateDataRegister['password']);
    $validateDataRegister['isAdmin'] = false;

    User::create($validateDataRegister);

    session()->flash('success', 'Registration successfull. Please login!');

    return redirect('/login');
  }
}
