<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
  public function index($token)
  {
    $dataToken = DB::table('password_reset_tokens')->select('token')->where('token', $token)->get();
    if (!count($dataToken)) {
      return view('notFound');
    }

    return view('reset-password.index', [
      'title' => 'Reset Password',
      'token' => $dataToken[0]->token
    ]);
  }

  public function update_password(Request $request)
  {
    $dataValidate = $request->validate([
      'password' => 'required|min:6|max:255|confirmed',
      'token' => 'required'
    ]);

    $dataToken = DB::table('password_reset_tokens')->select('*')->where('token', $dataValidate['token'])->get();

    DB::table('users')->where('email', $dataToken[0]->email)->update([
      'password' => Hash::make($dataValidate['password'])
    ]);

    DB::table('password_reset_tokens')->where('email', $dataToken[0]->email)->delete();

    return redirect()->route('login')->with('success', 'Reset password succes. Please login with new password');
  }
}
