<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
  public function index()
  {
    return view('forgot-password.index' , [
      'title' => 'Forgot Password'
    ]);
  }

  public function send_link_forgot_password(Request $request)
  {
    $user = DB::table('users')->select('*')->where('email', $request->email)->get();

    if (!count($user)) {
      return back()->with('emailNotFound', 'Email Not Found');
    }

    $token = Str::uuid();
    $user[0]->token = $token;

    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    DB::table('password_reset_tokens')->insert([
      'email' => $request->email,
      'token' => $token,
      'created_at' => Carbon::now(),
    ]);

    Mail::to($request->email)->send(new ResetPassword($user));

    return back()->with('success', 'Password reset link has been sent to your email. Please check your email');
  }
}
