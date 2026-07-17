@extends('layouts.app')

@section('title', 'Insurance Claims & Alternative Accommodation | GRHUM')

@push('styles')
  <style>
    .ic-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .ic-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .ic-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .ic-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .ic-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .ic-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    /* ---- facilities (image + checklist) ---- */
    .ic-facilities {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .ic-fac-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .ic-fac-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .ic-checklist {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 18px
    }

    .ic-checklist li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 16px;
      line-height: 1.55;
      color: #2A2620
    }

    .ic-checklist svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    /* ---- why choose us ---- */
    .ic-why {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .ic-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .ic-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .ic-feature:hover {
      background: #FBF8F2
    }

    .ic-feature-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: #1E3A30;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #D9C39A;
      flex: none
    }

    .ic-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .ic-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .ic-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .ic-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .ic-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .ic-cta a {
      display: inline-block;
      padding: 14px 34px;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: .04em;
      text-transform: uppercase;
      color: #1E3A30;
      background: #D9C39A;
      border-radius: 11px;
      text-decoration: none;
      transition: background .2s
    }

    .ic-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .ic-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .ic-facilities {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .ic-h2 {
        font-size: 34px
      }

      .ic-hero-h1 {
        font-size: 40px !important
      }
    }

    @media(max-width:560px) {
      .ic-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'Rapid placement within 24-48 hours in fully equipped, ready-to-move-in properties.',
      'Wide range of family-friendly and pet-friendly options.',
      'Proximity to schools, workplaces, and community facilities.',
      'Flexible check-in and check-out times (subject to availability).',
      'Dedicated account management for seamless coordination.',
      'On-demand housekeeping services for added convenience.',
      'Round-the-clock support, whenever you need it.',
  ];

  $features = [
      [
          'title' => 'Rapid placement',
          'desc'  => 'Secure housing within 24-48 hours for families and individuals displaced by emergencies.',
          'icon'  => 'clock',
      ],
      [
          'title' => 'Wide property network',
          'desc'  => 'A diverse range of accommodations, including pet-friendly and family-oriented options.',
          'icon'  => 'home',
      ],
      [
          'title' => 'Proximity to essentials',
          'desc'  => 'Properties located near schools, workplaces, and local amenities to minimize disruption.',
          'icon'  => 'pin',
      ],
      [
          'title' => 'Smooth coordination',
          'desc'  => 'Direct communication with insurance providers and claims management companies to simplify the process.',
          'icon'  => 'handshake',
      ],
      [
          'title' => 'Compassionate support',
          'desc'  => 'Our trained team offers empathetic service to help clients through challenging times.',
          'icon'  => 'heart',
      ],
      [
          'title' => 'All-inclusive living',
          'desc'  => 'High-quality, fully furnished accommodation with utilities, council tax, and maintenance included.',
          'icon'  => 'key',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="ic-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}don-lodge-2.webp')">
    <div class="ic-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For insurers & policyholders</p>
      <h1 class="ic-hero-h1">Insurance claims &amp; alternative accommodation</h1>
      <p style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:600px;margin-top:20px">
        Prompt and reliable housing for families and individuals displaced by unforeseen events, ensuring a safe and
        comfortable temporary home.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="ic-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="ic-facilities">
      <div class="ic-fac-img">
        <img src="{{ $base }}insurance_catastrophe-11.webp" alt="Alternative accommodation interior" loading="lazy">
      </div>
      <div>
        <p class="ic-eyebrow">What you get</p>
        <h2 class="ic-h2" style="font-size:34px">Everything arranged, so you don't have to</h2>
        <ul class="ic-checklist">
          @foreach($checklist as $item)
            <li>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6 9 17l-5-5" />
              </svg>
              <span>{{ $item }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  {{-- ============ WHY CHOOSE US ============ --}}
  <section class="ic-why">
    <div class="ic-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:680px">
        <p class="ic-eyebrow">Why choose us</p>
        <h2 class="ic-h2">Reliable, stress-free housing during difficult times</h2>
        <p class="ic-p">GRHUM offers reliable, stress-free housing solutions during difficult times. Partnering with
          insurers, we provide tailored options from emergency stays to longer-term accommodations, ensuring comfort,
          efficiency, and personalized support every step of the way.</p>
      </div>

      <div class="ic-feature-grid">
        @foreach($features as $f)
          <div class="ic-feature">
            <span class="ic-feature-icon">
              @switch($f['icon'])
                @case('clock')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" />
                  </svg>
                  @break
                @case('home')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 11.5 12 4l9 7.5" />
                    <path d="M5 10v10h14V10" />
                  </svg>
                  @break
                @case('pin')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21s7-6.5 7-11a7 7 0 1 0-14 0c0 4.5 7 11 7 11z" />
                    <circle cx="12" cy="10" r="2.6" />
                  </svg>
                  @break
                @case('handshake')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 12 4 8l3-3 4 4" />
                    <path d="M16 12l4-4-3-3-4 4" />
                    <path d="M8 12l3 3a2 2 0 0 0 3 0l4-4" />
                    <path d="M7 9l-3 3 4 4 1-1" />
                  </svg>
                  @break
                @case('heart')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z" />
                  </svg>
                  @break
                @case('key')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="8" cy="15" r="4" />
                    <path d="M10.5 12.5 20 3M17 6l2.5 2.5M14 9l2 2" />
                  </svg>
                  @break
              @endswitch
            </span>
            <h4>{{ $f['title'] }}</h4>
            <p>{{ $f['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ============ CTA ============ --}}
  <section class="ic-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="ic-cta">
      <h2>Need to place a policyholder today?</h2>
      <p>Our team is on hand around the clock to arrange emergency accommodation and manage the details with your
        claims handlers.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection