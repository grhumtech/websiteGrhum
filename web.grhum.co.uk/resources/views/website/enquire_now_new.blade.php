{{-- resources/views/website/enquire_now_new.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Enquire Now | Grhum</title>
</head>
<body>
  <h1>Send an Enquiry</h1>

  @if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
  @if(session('error'))<p style="color:#b00">{{ session('error') }}</p>@endif

  <form method="post" action="{{ url('website/enquiry_submit') }}">
    @csrf
    <input type="text" name="company_name" placeholder="Company"><br>
    <input type="text" name="full_name" placeholder="Full Name" required><br>

    {{-- Email + OTP --}}
    <input type="email" id="email_id" name="email_id" placeholder="Email" required>
    <button type="button" id="sendOtpBtn">Send OTP</button>
    <span id="otpMsg"></span><br>

    <div id="otpBox" style="display:none">
      <input type="text" id="otp" placeholder="Enter OTP">
      <button type="button" id="verifyOtpBtn">Verify</button>
      <span id="verifyMsg"></span>
    </div>

    <input type="text" name="mobile" placeholder="Mobile"><br>
    <input type="date" name="check_in"><br>
    <input type="date" name="check_out"><br>
    <input type="text" name="budget" placeholder="Budget"><br>
    <textarea name="guest_details" placeholder="Guest details"></textarea><br>
    <textarea name="enquiry_text" placeholder="Your enquiry" required></textarea><br>

    {{-- Math captcha --}}
    <label>What is {{ $captcha_num1 }} + {{ $captcha_num2 }} ?</label>
    <input type="number" name="captcha_answer" required><br>

    <button type="submit">Submit Enquiry</button>
  </form>

  <script>
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    async function postJson(url, body) {
      const res = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify(body)
      });
      return res.json();
    }

    document.getElementById('sendOtpBtn').addEventListener('click', async () => {
      const email = document.getElementById('email_id').value.trim();
      const r = await postJson("{{ url('website/send_email_otp') }}", { email_id: email });
      document.getElementById('otpMsg').textContent = r.message;
      if (r.status === 'success') document.getElementById('otpBox').style.display = 'block';
    });

    document.getElementById('verifyOtpBtn').addEventListener('click', async () => {
      const email = document.getElementById('email_id').value.trim();
      const otp = document.getElementById('otp').value.trim();
      const r = await postJson("{{ url('website/verify_email_otp') }}", { email_id: email, otp: otp });
      document.getElementById('verifyMsg').textContent = r.message;
    });
  </script>
</body>
</html>
