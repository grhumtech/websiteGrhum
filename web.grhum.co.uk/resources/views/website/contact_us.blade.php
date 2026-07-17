@extends('layouts.app')
@section('title', 'Contact Us | Grhum')

@section('content')

<style>
  :root{
    --grhum-dark:#1E3A30;
    --grhum-dark2:#28483C;
    --grhum-gold:#C2A06B;
    --grhum-gold-light:#D9C39A;
    --grhum-cream:#F6F1E8;
  }

  /* ── Hero ── */
  .contact-hero{
    position:relative;background:var(--grhum-dark);
    padding:90px 0 70px;text-align:center;overflow:hidden;
  }
  .contact-hero img.hero-tile{
    position:absolute;inset:0;width:100%;height:100%;object-fit:cover;
    object-position:bottom;opacity:.25;
  }
  .contact-hero .hero-inner{position:relative;z-index:2;max-width:760px;margin:0 auto;padding:0 24px}
  .contact-hero .eyebrow{
    color:var(--grhum-gold-light);font-size:12.5px;font-weight:700;
    letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px;
  }
  .contact-hero h1{
    font-family:'Cormorant Garamond',serif;font-weight:500;font-size:50px;
    line-height:1.05;color:var(--grhum-cream);letter-spacing:-.01em;margin:0 0 14px;
  }
  .contact-hero p{color:var(--grhum-gold-light);font-size:16px;margin:0}
  @media(max-width:760px){ .contact-hero h1{font-size:32px} }

  /* ── Alerts ── */
  .grhum-alert{
    max-width:1240px;margin:20px auto 0;padding:14px 20px;border-radius:10px;
    font-size:14px;font-weight:600;display:flex;align-items:center;justify-content:space-between;gap:12px;
  }
  .grhum-alert.success{background:#e4f5ea;color:#1a8d4c;border:1px solid #b9e6cb}
  .grhum-alert.error{background:#fceaea;color:#b3261e;border:1px solid #f3c6c4}
  .grhum-alert .btn-close{background:none;border:0;font-size:16px;cursor:pointer;color:inherit}

  /* ── Contact section ── */
  .contact-section{background:var(--grhum-cream);padding:80px 0}
  .contact-wrap{max-width:1240px;margin:0 auto;padding:0 32px;display:grid;grid-template-columns:1fr 1.2fr;gap:64px}
  @media(max-width:900px){ .contact-wrap{grid-template-columns:1fr;gap:48px} }

  .contact-info h2{
    font-family:'Cormorant Garamond',serif;font-weight:500;font-size:36px;
    color:var(--grhum-dark);margin:0 0 26px;
  }
  .contact-ul{list-style:none;margin:0 0 30px;padding:0}
  .contact-ul li{display:flex;align-items:flex-start;gap:14px;margin-bottom:18px}
  .contact-ul li svg,.contact-ul li i{
    width:20px;height:20px;fill:var(--grhum-gold);color:var(--grhum-gold);flex-shrink:0;margin-top:3px;
  }
  .contact-ul li p{margin:0;font-size:15px;color:#3d4a45;line-height:1.5}

  .social-ul{list-style:none;display:flex;gap:14px;margin:0;padding:0}
  .social-ul li a{
    display:flex;align-items:center;justify-content:center;width:40px;height:40px;
    border-radius:50%;background:var(--grhum-dark);transition:background .2s;
  }
  .social-ul li a:hover{background:var(--grhum-gold)}
  .social-ul li a svg{width:16px;height:16px;fill:var(--grhum-cream)}

  /* ── Form ── */
  .contact-form{background:#fff;border-radius:16px;padding:40px;box-shadow:0 10px 30px rgba(30,58,48,.06)}
  .contact-form label{font-size:13.5px;font-weight:700;color:var(--grhum-dark);margin-bottom:6px;display:block}
  .contact-form label span{color:#b3261e}
  .contact-form .form-control{
    width:100%;border:1px solid #e0ded6;border-radius:8px;padding:11px 14px;
    font-size:14px;color:var(--grhum-dark);margin-bottom:0;background:#fff;
  }
  .contact-form .form-control:focus{outline:none;border-color:var(--grhum-gold);box-shadow:0 0 0 3px rgba(194,160,107,.15)}
  .contact-form textarea.form-control{resize:vertical}

  .otp-btn{
    height:46px !important;min-width:90px;padding:0 18px !important;font-size:13.5px !important;
    font-weight:700;line-height:1 !important;border:1px solid var(--grhum-dark) !important;
    border-radius:8px !important;background:var(--grhum-dark) !important;color:#fff !important;
    cursor:pointer;white-space:nowrap;box-shadow:none !important;transition:background .2s;
    display:inline-flex;align-items:center;justify-content:center;
  }
  .otp-btn:hover{background:var(--grhum-dark2) !important}
  .otp-btn:disabled{opacity:.6;cursor:default}

  #emailVerifiedBadge{color:#1a8d4c;font-size:13px;font-weight:600}

  .contact-submit{
    width:100%;background:var(--grhum-gold);border:none;border-radius:10px;
    padding:14px;color:var(--grhum-dark);font-weight:700;font-size:15px;
    cursor:pointer;transition:background .2s;
  }
  .contact-submit:hover{background:#a9895c}
  .contact-submit:disabled{opacity:.5;cursor:not-allowed}

  .iti.iti--allow-dropdown.iti--separate-dial-code{width:100%}
</style>

<section class="contact-hero">
  <img src="{{ asset('upload/tile-merchant.png') }}" class="hero-tile" alt="">
  <div class="hero-inner">
    <p class="eyebrow">Talk to us</p>
    <h1>We&rsquo;re here to help</h1>
    <p>Whether you&rsquo;re looking for accommodation or have a question, we&rsquo;d love to hear from you.</p>
  </div>
</section>

@if(session('success'))
  <div class="grhum-alert success" role="alert">
    <span><i class="fas fa-check"></i> {{ session('success') }}</span>
    <button type="button" class="btn-close" aria-label="Close">&#x2715;</button>
  </div>
@elseif(session('error'))
  <div class="grhum-alert error" role="alert">
    <span><i class="fas fa-times"></i> {{ session('error') }}</span>
    <button type="button" class="btn-close" aria-label="Close">&#x2715;</button>
  </div>
@endif

<section class="contact-section">
  <div class="contact-wrap">

    {{-- Left: contact info --}}
    <div class="contact-info">
      <h2>Get in touch!</h2>
      <ul class="contact-ul">
        <li>
          <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/></svg>
          <p>+44 020 8050 7656</p>
        </li>
        <li>
          <i class="far fa-envelope"></i>
          <p>info@grhum.co.uk</p>
        </li>
        <li>
          <i class="fas fa-map-marker-alt"></i>
          <p>3 Sussex House, Stratton Close,<br>Edgware, England, HA8 6PY</p>
        </li>
      </ul>

      <ul class="social-ul">
        <li>
          <a href="https://www.facebook.com/grhumltd" target="_blank" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/grhum_ltd/" target="_blank" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
          </a>
        </li>
        <li>
          <a href="https://x.com/GrhumLtd" target="_blank" aria-label="X">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
          </a>
        </li>
        <li>
          <a href="https://www.linkedin.com/company/grhum-ltd/" target="_blank" aria-label="LinkedIn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
          </a>
        </li>
      </ul>
    </div>

    {{-- Right: form --}}
    <div class="contact-form">
      <form action="{{ url('submit_contact') }}" method="post" id="grhumContactForm">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="first_name">First name <span>*</span></label>
            <input type="text" name="first_name" placeholder="Enter your first name" class="form-control" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="last_name">Last name <span>*</span></label>
            <input type="text" name="last_name" placeholder="Enter your last name" class="form-control" required>
          </div>

          {{-- Email + OTP --}}
          <div class="col-md-12 mb-3">
            <label for="contact_email">Email <span>*</span></label>
            <div style="display:flex;gap:8px;align-items:center">
              <input type="email" name="email" id="contact_email" placeholder="Enter your email" class="form-control" required style="flex:1;margin:0">
              <button type="button" id="sendOtpBtn" class="otp-btn">Verify</button>
            </div>
            <span id="emailVerifiedBadge" style="display:none;margin-top:4px">&#10004; Email verified</span>

            <div id="otpWrap" style="display:none;margin-top:8px">
              <div style="display:flex;gap:8px;align-items:center">
                <input type="text" id="otpInput" placeholder="Enter 6-digit OTP" maxlength="6" class="form-control" style="flex:1;margin:0">
                <button type="button" id="verifyOtpBtn" class="otp-btn">Confirm</button>
              </div>
              <small id="otpMsg" style="display:block;margin-top:4px;font-size:12px"></small>
              <small style="display:block;margin-top:2px;font-size:12px">
                Didn't get it? <a href="#" id="resendOtp" style="color:var(--grhum-dark);font-weight:700">Resend</a>
              </small>
            </div>
            <input type="hidden" name="email_verified" id="emailVerifiedFlag" value="0">
          </div>

          <div class="col-md-12 mb-3">
            <label for="phoneInput">Contact number <span>*</span></label>
            <input type="tel" name="contact_number" id="phoneInput" placeholder="Enter phone number" class="form-control" required>
          </div>

          <div class="col-md-12 mb-3">
            <label for="enquiry_type">Enquiry type <span>*</span></label>
            <select name="enquiry_type" class="form-control" required>
              <option value="">Select your enquiry type</option>
              <option value="Booking enquiry">Booking enquiry</option>
              <option value="Partnerships">Partnerships</option>
              <option value="General question">General question</option>
              <option value="Complaint">Complaint</option>
            </select>
          </div>

          <div class="col-md-12 mb-3">
            <label for="message">Message <span>*</span></label>
            <textarea name="message" rows="5" class="form-control" placeholder="Write a message" required></textarea>
          </div>
            <div class="en-field full">
                <div class="en-captcha">
                <span class="en-q">What is <strong>{{ $captcha_num1 }} + {{ $captcha_num2 }}?</strong> <span style="color:#A9895A">*</span></span>
                  <input type="text" name="captcha_answer" id="captcha_answer" inputmode="numeric" required>
                </div>
              </div>
          
          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
          <div class="col-md-12">
            <button type="submit" class="contact-submit" id="contactSubmitBtn" disabled>Submit</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css">
<style>
  .iti__country-list{
    font-size:14px;border-radius:8px;box-shadow:0 10px 30px rgba(30,58,48,.15);
    border:1px solid #e0ded6;max-height:220px;
  }
  .iti__country{padding:8px 10px}
  .iti__country.iti__highlight{background:var(--grhum-cream)}
  .iti__selected-flag{border-radius:8px 0 0 8px}
  .iti{width:100%}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

<script>
  grecaptcha.ready(function () {
    grecaptcha.execute("{{ config('services.recaptcha.site_key') }}", { action: 'homepage' }).then(function (token) {
      document.getElementById('recaptchaResponse').value = token;
    });
  });
</script>

<script>
  const phoneInput = document.querySelector("#phoneInput");
  const iti = window.intlTelInput(phoneInput, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js",
    separateDialCode: true,
    initialCountry: "gb",
    geoIpLookup: function (callback) {
      fetch("https://ipinfo.io?token=YOUR_API_TOKEN")
        .then(response => response.json())
        .then(data => callback(data.country || "gb"))
        .catch(() => callback("gb"));
    }
  });
  iti.promise.then(() => {
    iti.setCountry(iti.getSelectedCountryData().iso2);
  });
</script>

<script>
  // Auto-hide alerts after 10s
  setTimeout(function () {
    document.querySelectorAll('.grhum-alert').forEach(function (a) { a.style.display = 'none'; });
  }, 10000);
  document.querySelectorAll('.grhum-alert .btn-close').forEach(function (btn) {
    btn.addEventListener('click', function () { btn.closest('.grhum-alert').style.display = 'none'; });
  });
</script>

<script>
(function () {
  var URL_SEND   = "{{ route('sendOtp') }}";
  var URL_VERIFY = "{{ route('verifyOtp') }}";
  var csrfToken  = "{{ csrf_token() }}";

  var emailInput   = document.getElementById('contact_email');
  var sendBtn      = document.getElementById('sendOtpBtn');
  var otpWrap      = document.getElementById('otpWrap');
  var otpInput     = document.getElementById('otpInput');
  var verifyBtn    = document.getElementById('verifyOtpBtn');
  var resendLink   = document.getElementById('resendOtp');
  var badge        = document.getElementById('emailVerifiedBadge');
  var verifiedFlag = document.getElementById('emailVerifiedFlag');
  var submitBtn    = document.getElementById('contactSubmitBtn');
  var otpMsg       = document.getElementById('otpMsg');

  function post(url, data, cb) {
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken
      },
      body: new URLSearchParams(data).toString()
    })
    .then(function (r) { return r.json(); })
    .then(cb)
    .catch(function () { cb({status:'error', message:'Network error. Try again.'}); });
  }

  function setMsg(t, ok) { otpMsg.textContent = t; otpMsg.style.color = ok ? '#1a8d4c' : '#d33'; }

  function lockVerified() {
    badge.style.display = 'inline-block';
    otpWrap.style.display = 'none';
    verifiedFlag.value = '1';
    submitBtn.disabled = false;
    sendBtn.textContent = 'Verified';
    sendBtn.disabled = true;
    emailInput.readOnly = true;
  }
  function resetVerified() {
    badge.style.display = 'none';
    verifiedFlag.value = '0';
    submitBtn.disabled = true;
    sendBtn.textContent = 'Verify';
    sendBtn.disabled = false;
    emailInput.readOnly = false;
  }

  function sendOtp() {
    var email = emailInput.value.trim();
    if (!email) { alert('Please enter your email first.'); return; }
    sendBtn.disabled = true; sendBtn.textContent = 'Sending...';
    post(URL_SEND, {email_id: email}, function (res) {
      sendBtn.textContent = 'Verify'; sendBtn.disabled = false;
      if (res.status === 'success') {
        otpWrap.style.display = 'block';
        setMsg('OTP sent to ' + email, true);
        otpInput.focus();
      } else {
        alert(res.message || 'Could not send OTP.');
      }
    });
  }

  sendBtn.addEventListener('click', sendOtp);
  resendLink.addEventListener('click', function (e) { e.preventDefault(); sendOtp(); });

  verifyBtn.addEventListener('click', function () {
    var otp = otpInput.value.trim();
    if (otp.length < 4) { setMsg('Enter the OTP.', false); return; }
    verifyBtn.disabled = true; verifyBtn.textContent = 'Checking...';
    post(URL_VERIFY, {email_id: emailInput.value.trim(), otp: otp}, function (res) {
      verifyBtn.disabled = false; verifyBtn.textContent = 'Confirm';
      if (res.status === 'success') { setMsg('', true); lockVerified(); }
      else { setMsg(res.message || 'Invalid OTP.', false); }
    });
  });

  emailInput.addEventListener('input', function () {
    if (verifiedFlag.value === '1') { resetVerified(); }
  });

  document.getElementById('grhumContactForm').addEventListener('submit', function (e) {
    if (verifiedFlag.value !== '1') {
      e.preventDefault();
      alert('Please verify your email before submitting.');
    }
  });
})();
</script>
@endpush