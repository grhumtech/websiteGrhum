{{-- resources/views/website/login_registration.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>Login / Register | Grhum</title></head>
<body>
  @if(session('message'))<p style="color:#b00">{{ session('message') }}</p>@endif

  <h2>Login</h2>
  <form method="post" action="{{ url('website/login') }}">
    @csrf
    <input type="email" name="email_id" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login" value="1">Login</button>
  </form>

  <hr>

  <h2>Register</h2>
  <form method="post" action="{{ url('website/login') }}">
    @csrf
    <input type="text" name="full_name" placeholder="Full Name" required><br>
    <input type="text" name="mobile" placeholder="Mobile" required><br>
    <input type="email" name="email_id" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register" value="1">Register</button>
  </form>
</body></html>
