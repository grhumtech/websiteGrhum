@extends('layouts.app')

@section('title', 'Enquire Now | GRHUM')

@push('styles')
  <style>
    .en-otp-send,
    .en-otp-verify,
    .en-otp-resend {
      border: none;
      cursor: pointer;
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
    }

    .en-otp-send {
      background: #A9895A;
      color: #fff;
      margin-left: 8px;
      white-space: nowrap;
    }

    .en-otp-verify {
      background: #2e7d32;
      color: #fff;
    }

    .en-otp-resend {
      background: transparent;
      color: #A9895A;
      text-decoration: underline;
    }

    .en-otp-status {
      font-size: 13px;
      margin-top: 6px;
    }

    .en-otp-box {
      display: flex;
      gap: 8px;
      margin-top: 10px;
      align-items: center;
    }

    .en-otp-box input {
      flex: 1;
      padding: 8px 12px;
      border: 1px solid #ddd;
      border-radius: 6px;
      letter-spacing: 3px;
      font-size: 15px;
    }

    .en-wrap {
      max-width: 1180px;
      margin: 0 auto;
      padding: 0 32px
    }


    /* ---- hero ---- */
    .en-hero {
      position: relative;
      min-height: 340px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .en-hero .en-eyebrow {
      color: #D9C39A;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .22em;
      text-transform: uppercase;
      margin-bottom: 16px
    }

    .en-hero h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 54px;
      line-height: 1.05;
      letter-spacing: -.01em
    }

    .en-hero p {
      color: rgba(246, 241, 232, .82);
      font-size: 16px;
      line-height: 1.6;
      max-width: 540px;
      margin-top: 16px
    }

    /* ---- alerts ---- */
    .en-alert {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      border-radius: 12px;
      padding: 14px 18px;
      margin-bottom: 22px;
      font-size: 14.5px;
      line-height: 1.5
    }

    .en-alert.ok {
      background: #EAF3EC;
      border: 1px solid #C6E0CC;
      color: #1E3A30
    }

    .en-alert.err {
      background: #FBEDED;
      border: 1px solid #F0CACA;
      color: #8A2B2B
    }

    .en-alert button {
      margin-left: auto;
      background: none;
      border: 0;
      cursor: pointer;
      color: inherit;
      opacity: .6;
      font-size: 15px;
      line-height: 1
    }

    .en-alert button:hover {
      opacity: 1
    }

    /* ---- split shell (pulled over hero) ---- */
    .en-shell {
      margin-top: -68px;
      position: relative;
      z-index: 5;
      display: grid;
      grid-template-columns: 5fr 7fr;
      background: #FFFDF9;
      border: 1px solid #E5DCCB;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 40px 90px -50px rgba(30, 58, 48, .55)
    }

    /* ---- left aside ---- */
    .en-aside {
      background:
        radial-gradient(120% 90% at 0% 0%, #244A3C 0%, #1E3A30 55%);
      color: #F6F1E8;
      padding: 48px 44px;
      display: flex;
      flex-direction: column
    }

    .en-aside .en-eyebrow {
      color: #D9C39A;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 16px
    }

    .en-aside h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 34px;
      line-height: 1.1;
      margin-bottom: 16px
    }

    .en-aside>p {
      font-size: 14.5px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .78);
      margin-bottom: 30px
    }

    .en-trust {
      list-style: none;
      margin: 0 0 auto;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .en-trust li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 14px;
      line-height: 1.5;
      color: #EDE6D8
    }

    .en-trust svg {
      flex: none;
      margin-top: 2px;
      color: #D9C39A
    }

    .en-contact {
      margin-top: 34px;
      padding-top: 24px;
      border-top: 1px solid rgba(217, 195, 154, .25);
      display: flex;
      flex-direction: column;
      gap: 12px
    }

    .en-contact a {
      display: flex;
      align-items: center;
      gap: 11px;
      color: #F6F1E8;
      text-decoration: none;
      font-size: 14px;
      transition: color .16s
    }

    .en-contact a:hover {
      color: #D9C39A
    }

    .en-contact svg {
      color: #D9C39A;
      flex: none
    }

    /* ---- right form ---- */
    .en-form {
      padding: 46px 46px 40px
    }

    .en-section+.en-section {
      margin-top: 30px;
      padding-top: 30px;
      border-top: 1px solid #EFE8D9
    }

    .en-section-head {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px
    }

    .en-section-num {
      width: 24px;
      height: 24px;
      border-radius: 7px;
      background: #1E3A30;
      color: #D9C39A;
      font-size: 12.5px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      flex: none
    }

    .en-section-head h3 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 20px;
      color: #1E3A30;
      margin: 0
    }

    .en-section-head .en-nights {
      margin-left: auto;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .04em;
      color: #A9895A;
      background: #F6EFDF;
      border: 1px solid #EADFC4;
      padding: 4px 11px;
      border-radius: 999px
    }

    .en-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 18px
    }

    .en-field {
      display: flex;
      flex-direction: column;
      gap: 7px
    }

    .en-field.full {
      grid-column: 1 / -1
    }

    .en-field label {
      font-size: 12.5px;
      font-weight: 600;
      color: #1E3A30;
      letter-spacing: .01em
    }

    .en-field label span {
      color: #A9895A
    }

    /* input with leading icon */
    .en-inp {
      position: relative
    }

    .en-inp>svg {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #AF9E7E;
      pointer-events: none
    }

    .en-inp.area>svg {
      top: 16px;
      transform: none
    }

    .en-inp input,
    .en-inp textarea {
      width: 100%;
      font-size: 15px;
      color: #2A2620;
      background: #fff;
      border: 1px solid #E1D8C6;
      border-radius: 11px;
      padding: 12px 14px 12px 42px;
      transition: border-color .16s, box-shadow .16s;
      font-family: inherit
    }

    .en-inp input::placeholder,
    .en-inp textarea::placeholder {
      color: #A79E8C
    }

    .en-inp input:focus,
    .en-inp textarea:focus {
      outline: none;
      border-color: #1E3A30;
      box-shadow: 0 0 0 3px rgba(30, 58, 48, .09)
    }

    .en-inp textarea {
      resize: vertical;
      min-height: 110px
    }

    /* ---- guest picker ---- */
    .en-guest {
      position: relative
    }

    .en-guest-btn {
      width: 100%;
      text-align: left;
      font-size: 15px;
      color: #2A2620;
      background: #fff;
      border: 1px solid #E1D8C6;
      border-radius: 11px;
      padding: 12px 14px 12px 42px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      position: relative
    }

    .en-guest-btn .en-lead {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #AF9E7E
    }

    .en-guest-btn:focus {
      outline: none;
      border-color: #1E3A30;
      box-shadow: 0 0 0 3px rgba(30, 58, 48, .09)
    }

    .en-guest-btn .en-caret {
      color: #A9895A;
      flex: none;
      transition: transform .2s
    }

    .en-guest-btn.open .en-caret {
      transform: rotate(180deg)
    }

    .en-guest-panel {
      position: absolute;
      z-index: 20;
      top: calc(100% + 8px);
      left: 0;
      right: 0;
      background: #FFFDF9;
      border: 1px solid #E5DCCB;
      border-radius: 14px;
      box-shadow: 0 24px 50px -24px rgba(30, 58, 48, .4);
      padding: 8px;
      display: none
    }

    .en-guest-panel.open {
      display: block
    }

    .en-guest-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 9px 12px
    }

    .en-guest-row .en-glabel {
      font-size: 14.5px;
      color: #2A2620;
      font-weight: 500
    }

    .en-guest-row .en-gsub {
      display: block;
      font-size: 12px;
      color: #9A917F;
      font-weight: 400
    }

    .en-step {
      display: flex;
      align-items: center;
      gap: 12px
    }

    .en-step button {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      border: 1px solid #D9C39A;
      background: #fff;
      color: #1E3A30;
      font-size: 17px;
      line-height: 1;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .15s
    }

    .en-step button:hover {
      background: #F3ECDD
    }

    .en-step input {
      width: 30px;
      text-align: center;
      border: 0;
      font-size: 15px;
      color: #1E3A30;
      background: none;
      -moz-appearance: textfield
    }

    .en-step input::-webkit-outer-spin-button,
    .en-step input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0
    }

    .en-guest-done {
      display: block;
      margin: 6px 6px 4px auto;
      background: #1E3A30;
      color: #F6F1E8;
      border: 0;
      border-radius: 9px;
      padding: 8px 18px;
      font-size: 13.5px;
      font-weight: 600;
      cursor: pointer
    }

    /* captcha row */
    .en-captcha {
      display: flex;
      align-items: flex-end;
      gap: 14px;
      background: #FBF6EA;
      border: 1px solid #EADFC4;
      border-radius: 12px;
      padding: 14px 16px
    }

    .en-captcha .en-q {
      font-size: 14px;
      color: #1E3A30;
      font-weight: 500;
      line-height: 1.4
    }

    .en-captcha .en-q strong {
      font-size: 16px
    }

    .en-captcha input {
      width: 90px;
      font-size: 15px;
      text-align: center;
      color: #2A2620;
      background: #fff;
      border: 1px solid #E1D8C6;
      border-radius: 10px;
      padding: 10px;
      margin-left: auto
    }

    .en-captcha input:focus {
      outline: none;
      border-color: #1E3A30;
      box-shadow: 0 0 0 3px rgba(30, 58, 48, .09)
    }

    /* submit */
    .en-foot {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-top: 30px;
      flex-wrap: wrap
    }

    .en-foot .en-fine {
      font-size: 12.5px;
      color: #8C8474;
      line-height: 1.5;
      max-width: 320px
    }

    .en-submit {
      background: #1E3A30;
      color: #F6F1E8;
      border: 0;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: .04em;
      text-transform: uppercase;
      padding: 15px 40px;
      border-radius: 11px;
      cursor: pointer;
      transition: background .18s;
      white-space: nowrap
    }

    .en-submit:hover {
      background: #24463A
    }

    @media(max-width:940px) {
      .en-shell {
        grid-template-columns: 1fr
      }

      .en-aside {
        padding: 38px 34px
      }

      .en-trust {
        margin-bottom: 6px
      }
    }

    @media(max-width:620px) {
      .en-grid {
        grid-template-columns: 1fr
      }

      .en-form {
        padding: 32px 24px 30px
      }

      .en-hero h1 {
        font-size: 40px
      }

      .en-foot {
        flex-direction: column;
        align-items: stretch
      }

      .en-submit {
        width: 100%
      }
    }
  </style>
@endpush

@section('content')

  {{-- ============ HERO ============ --}}
  <section class="en-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.55),rgba(20,33,27,.8)),url('https://www.grhum.co.uk/upload/apartment-91.png')">
    <div class="en-wrap" style="width:100%">
      <p class="en-eyebrow">Get in touch</p>
      <h1>Enquire now</h1>
      <p>Tell us about your stay and our team will get back to you with tailored serviced accommodation options.</p>
    </div>
  </section>

  {{-- ============ SPLIT FORM ============ --}}
  <section class="en-wrap" style="padding-bottom:96px">

    @if(session('success'))
      <div class="en-alert ok" role="alert" style="margin-top:26px">
        <span>{{ session('success') }}</span>
        <button type="button" onclick="this.parentElement.remove()" aria-label="Close">&#x2715;</button>
      </div>
    @elseif(session('error'))
      <div class="en-alert err" role="alert" style="margin-top:26px">
        <span>{{ session('error') }}</span>
        <button type="button" onclick="this.parentElement.remove()" aria-label="Close">&#x2715;</button>
      </div>
    @endif

    <div class="en-shell">

      {{-- ---- aside ---- --}}
      <aside class="en-aside">
        <p class="en-eyebrow">Why enquire with GRHUM</p>
        <h2>One enquiry, the whole of the UK.</h2>
        <p>Share a few details and we'll match you with fully serviced, ready-to-move-in properties for your dates and
          budget.</p>

        <ul class="en-trust">
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="9" />
              <path d="M12 7v5l3 3" />
            </svg>
            <span>Fast response from a dedicated team, typically within a few working hours.</span>
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 21s-7-6.5-7-11a7 7 0 0 1 14 0c0 4.5-7 11-7 11z" />
              <circle cx="12" cy="10" r="2.6" />
            </svg>
            <span>Nationwide network across city centres, coastal towns and countryside.</span>
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 6 9 17l-5-5" />
            </svg>
            <span>One point of contact and a single, transparent invoice — utilities and council tax included.</span>
          </li>
        </ul>

        <div class="en-contact">
          <a href="mailto:info@grhum.co.uk">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
              stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="5" width="18" height="14" rx="2" />
              <path d="m3 7 9 6 9-6" />
            </svg>
            info@grhum.co.uk
          </a>
        </div>
      </aside>

      {{-- ---- form ---- --}}
      <div class="en-form">
        <form action="{{ url('enquiry_submit') }}" method="post">
          @csrf

          {{-- Section 1: your details --}}
          <div class="en-section">
            <div class="en-section-head">
              <span class="en-section-num">1</span>
              <h3>Your details</h3>
            </div>
            <div class="en-grid">
              <div class="en-field">
                <label for="company_name">Company name</label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="3" width="16" height="18" rx="2" />
                    <path d="M9 8h.01M15 8h.01M9 12h.01M15 12h.01M9 21v-4h6v4" />
                  </svg>
                  <input type="text" id="company_name" name="company_name" placeholder="Your company (optional)">
                </div>
              </div>
              <div class="en-field">
                <label for="full_name">Full name <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="3.5" />
                    <path d="M5 20a7 7 0 0 1 14 0" />
                  </svg>
                  <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                </div>
              </div>
              <div class="en-field">
                <label for="email_id">Email address <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <path d="m3 7 9 6 9-6" />
                  </svg>
                  <input type="email" id="email_id" name="email_id" placeholder="you@example.com" required>
                  <button type="button" id="sendOtpBtn" class="en-otp-send" onclick="enSendOtp()">Verify</button>
                </div>
                <span id="emailStatus" class="en-otp-status" style="display:none"></span>

                {{-- OTP input row, hidden until OTP is sent --}}
                <div class="en-otp-box" id="otpBox" style="display:none">
                  <input type="text" id="otp_code" inputmode="numeric" maxlength="6" placeholder="Enter 6-digit code">
                  <button type="button" id="verifyOtpBtn" class="en-otp-verify" onclick="enVerifyOtp()">Confirm</button>
                  <button type="button" class="en-otp-resend" onclick="enSendOtp()">Resend</button>
                </div>
              </div>
              <div class="en-field">
                <label for="mobile">Phone number <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 5c0 8.5 6.5 15 15 15l1.5-3.5-4-2-1.7 1.7a12 12 0 0 1-4.5-4.5L12 10 10 6 6.5 4.5 4 5z" />
                  </svg>
                  <input type="tel" id="mobile" name="mobile" placeholder="Enter your phone number" required>
                </div>
              </div>
            </div>
          </div>

          {{-- Section 2: your stay --}}
          <div class="en-section">
            <div class="en-section-head">
              <span class="en-section-num">2</span>
              <h3>Your stay</h3>
              <span class="en-nights" id="nightsBadge" style="display:none"></span>
            </div>
            <div class="en-grid">
              <div class="en-field">
                <label for="check_in">Check in <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3.5" y="4.5" width="17" height="16" rx="2" />
                    <path d="M3.5 9.5h17M8 3v3M16 3v3" />
                  </svg>
                  <input type="date" id="check_in" name="check_in" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
              <div class="en-field">
                <label for="check_out">Check out <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3.5" y="4.5" width="17" height="16" rx="2" />
                    <path d="M3.5 9.5h17M8 3v3M16 3v3" />
                  </svg>
                  <input type="date" id="check_out" name="check_out" value="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    required>
                </div>
              </div>
              <input type="hidden" name="email_verified" id="emailVerified" value="0">
              <div class="en-field">
                <label>Guest details <span>*</span></label>
                <div class="en-guest">
                  <button type="button" class="en-guest-btn" id="guestBtn" onclick="enToggleGuest()">
                    <span class="en-lead">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="8" r="3.2" />
                        <path d="M2.5 20a6.5 6.5 0 0 1 13 0" />
                        <path d="M16 5.3a3.2 3.2 0 0 1 0 5.4M17.5 20a6.5 6.5 0 0 0-3-5.5" />
                      </svg>
                    </span>
                    <span id="guestLabel">Add guests</span>
                    <svg class="en-caret" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m6 9 6 6 6-6" />
                    </svg>
                  </button>
                  <div class="en-guest-panel" id="guestPanel">
                    @foreach([['adults', 'Adults', 'Age 13+'], ['children', 'Children', 'Ages 2–12'], ['infants', 'Infants', 'Under 2'], ['pets', 'Pets', 'Assistance & pets']] as $g)
                      <div class="en-guest-row">
                        <span class="en-glabel">{{ $g[1] }}<span class="en-gsub">{{ $g[2] }}</span></span>
                        <div class="en-step">
                          <button type="button" onclick="enStep('{{ $g[0] }}',-1)">&minus;</button>
                          <input type="number" id="g_{{ $g[0] }}" name="{{ $g[0] }}" value="0" min="0" readonly>
                          <button type="button" onclick="enStep('{{ $g[0] }}',1)">+</button>
                        </div>
                      </div>
                    @endforeach
                    <button type="button" class="en-guest-done" onclick="enToggleGuest()">Done</button>
                  </div>
                </div>
              </div>
              <div class="en-field">
                <label for="budget">Budget <span>*</span></label>
                <div class="en-inp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="M12 3v18M17 6.5C17 4.6 14.8 3.5 12 3.5S7 4.6 7 6.5 9 9.5 12 10s5 1.5 5 3.5-2.2 3.5-5 3.5-5-1.1-5-3" />
                  </svg>
                  <input type="text" id="budget" name="budget" placeholder="e.g. £120 / night or total" required>
                </div>
              </div>
            </div>
          </div>

          {{-- Section 3: your enquiry --}}
          <div class="en-section">
            <div class="en-section-head">
              <span class="en-section-num">3</span>
              <h3>Your enquiry</h3>
            </div>
            <div class="en-grid">
              <div class="en-field full">
                <label for="enquiry_text">Tell us what you need <span>*</span></label>
                <div class="en-inp area">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H8l-4 4V5a2 2 0 0 1 2-2h13a2 2 0 0 1 2 2z" />
                  </svg>
                  <textarea id="enquiry_text" name="enquiry_text"
                    placeholder="Location, number of properties, accessibility needs, parking, length of stay, etc."></textarea>
                </div>
              </div>
              <div class="en-field full">
                <div class="en-captcha">
                <span class="en-q">What is <strong>{{ $captcha_num1 }} + {{ $captcha_num2 }}?</strong> <span style="color:#A9895A">*</span></span>
                  <input type="text" name="captcha_answer" id="captcha_answer" inputmode="numeric" required>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

          <div class="en-foot">
            <p class="en-fine">By submitting, you agree to be contacted about your enquiry. Protected by reCAPTCHA.</p>
            <button type="submit" name="submit" class="en-submit" id="enqSubmitBtn" disabled>Submit enquiry</button>
          </div>

        </form>
      </div>
    </div>
  </section>

  {{-- ============ SCRIPTS ============ --}}
  <script src="https://www.google.com/recaptcha/api.js?render=6LemZuIqAAAAANyVA7xb8uC2JoUkQOisxeN9EI6u"></script>
  <script>
    if (window.grecaptcha) {
      grecaptcha.ready(function () {
        grecaptcha.execute('6LemZuIqAAAAANyVA7xb8uC2JoUkQOisxeN9EI6u', { action: 'homepage' })
          .then(function (token) { document.getElementById('recaptchaResponse').value = token; });
      });
    }

    // Guest picker
    function enToggleGuest() {
      document.getElementById('guestPanel').classList.toggle('open');
      document.getElementById('guestBtn').classList.toggle('open');
    }
    function enStep(key, delta) {
      var input = document.getElementById('g_' + key);
      input.value = Math.max(0, (parseInt(input.value, 10) || 0) + delta);
      var keys = ['adults', 'children', 'infants', 'pets'];
      var total = keys.reduce(function (s, k) { return s + (parseInt(document.getElementById('g_' + k).value, 10) || 0); }, 0);
      document.getElementById('guestLabel').textContent = total > 0 ? (total + ' guest' + (total > 1 ? 's' : '')) : 'Add guests';
    }
    document.addEventListener('click', function (e) {
      var wrap = document.querySelector('.en-guest');
      if (wrap && !wrap.contains(e.target)) {
        document.getElementById('guestPanel').classList.remove('open');
        document.getElementById('guestBtn').classList.remove('open');
      }
    });

    // Nights auto-calc
    function enCalcNights() {
      var ci = document.getElementById('check_in').value;
      var co = document.getElementById('check_out').value;
      var badge = document.getElementById('nightsBadge');
      if (ci && co) {
        var diff = Math.round((new Date(co) - new Date(ci)) / 86400000);
        if (diff > 0) { badge.textContent = diff + ' night' + (diff > 1 ? 's' : ''); badge.style.display = ''; return; }
      }
      badge.style.display = 'none';
    }
    document.getElementById('check_in').addEventListener('change', enCalcNights);
    document.getElementById('check_out').addEventListener('change', enCalcNights);
    enCalcNights();

    // Auto-hide alerts
    setTimeout(function () { document.querySelectorAll('.en-alert').forEach(function (a) { a.remove(); }); }, 10000);
  </script>

  <script>
    function enSetStatus(msg, ok) {
      const el = document.getElementById('emailStatus');
      el.style.display = 'block';
      el.textContent = msg;
      el.style.color = ok ? '#2e7d32' : '#c0392b';
    }

    function enSendOtp() {
      const email = document.getElementById('email_id').value.trim();
      if (!email || !email.includes('@')) {
        enSetStatus('Please enter a valid email first.', false);
        return;
      }
      const btn = document.getElementById('sendOtpBtn');
      btn.disabled = true; btn.textContent = 'Sending...';

      fetch("{{ route('sendOtp') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ email_id: email }),
      })
        .then(r => r.json())
        .then(d => {
          if (d.status === 'success') {
            document.getElementById('otpBox').style.display = 'flex';
            enSetStatus('OTP sent to your email. Check your inbox.', true);
          } else {
            enSetStatus(d.message || 'Failed to send OTP.', false);
          }
        })
        .catch(() => enSetStatus('Something went wrong. Try again.', false))
        .finally(() => { btn.disabled = false; btn.textContent = 'Verify'; });
    }

    function enVerifyOtp() {
      const email = document.getElementById('email_id').value.trim();
      const otp = document.getElementById('otp_code').value.trim();
      if (otp.length !== 6) {
        enSetStatus('Enter the 6-digit code.', false);
        return;
      }
      const btn = document.getElementById('verifyOtpBtn');
      btn.disabled = true; btn.textContent = 'Checking...';

      fetch("{{ route('verifyOtp') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ email_id: email, otp: otp }),
      })
        .then(r => r.json())
        .then(d => {
          if (d.status === 'success') {
            enSetStatus('✓ Email verified.', true);
            document.getElementById('otpBox').style.display = 'none';
            document.getElementById('emailVerified').value = '1';
            document.getElementById('enqSubmitBtn').disabled = false;
            // lock the email so it can't change after verifying
            document.getElementById('email_id').setAttribute('readonly', true);
            document.getElementById('sendOtpBtn').style.display = 'none';
          } else {
            enSetStatus(d.message || 'Verification failed.', false);
          }
        })
        .catch(() => enSetStatus('Something went wrong. Try again.', false))
        .finally(() => { btn.disabled = false; btn.textContent = 'Confirm'; });
    }

    // if user edits email after verifying, reset verification
    document.getElementById('email_id').addEventListener('input', function () {
      document.getElementById('emailVerified').value = '0';
      document.getElementById('enqSubmitBtn').disabled = true;
    });
  </script>
@endsection