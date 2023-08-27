<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      .btn {
        color: white;
        text-decoration: none;
        border: 1px solid black;
        border-radius: 4px;
        background-color: black;
        width: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 4px 8px;
        height: fit-content;
      }
      .mb-2 {
        margin-bottom: 2px;
      }
    </style>
  </head>
  <body>
    <div>
      <h1 class="mb-2">Request Reset Email</h1>
      <div class="mb-2">
        <p>Hi {{ $user->username }}, </p>
        <p>There was a request to change your password!</p>
        <p>If you did not make this request then please ignore this email.</p>
        <p>Otherwise, please click this button below to change your password:
      </div>
      <a class="btn" href="http://127.0.0.1:8000/reset-password/{{ $user->token }}" target="_blank" style="color: white">Reset Password</a>
    </div>
  </body>
</html>
