@extends('layouts.app')

@section('title', 'Healthcare Accommodation | GRHUM')

@push('styles')
  <style>
    .hc-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .hc-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .hc-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .hc-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .hc-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .hc-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    .hc-hero-desktop {
      display: block
    }

    .hc-hero-mobile {
      display: none
    }

    /* ---- facilities (image + checklist) ---- */
    .hc-facilities {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .hc-fac-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .hc-fac-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .hc-checklist {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 18px
    }

    .hc-checklist li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 16px;
      line-height: 1.55;
      color: #2A2620
    }

    .hc-checklist svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    /* ---- why choose us ---- */
    .hc-why {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .hc-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .hc-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .hc-feature:hover {
      background: #FBF8F2
    }

    .hc-feature-icon {
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

    .hc-feature-icon img {
      width: 26px;
      height: 26px;
      object-fit: contain;
      filter: brightness(0) invert(1);
      opacity: .9
    }

    .hc-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .hc-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- NHS banner ---- */
    .hc-nhs {
      display: flex;
      align-items: center;
      gap: 16px;
      background: #FBF3E4;
      border: 1px solid #EDDCB8;
      border-radius: 14px;
      padding: 18px 22px;
      margin-bottom: 32px
    }

    .hc-nhs svg {
      flex: none;
      color: #A9895A
    }

    .hc-nhs p {
      font-size: 14.5px;
      line-height: 1.55;
      color: #5B5345;
      margin: 0
    }

    .hc-nhs strong {
      color: #1E3A30
    }

    /* ---- CTA band ---- */
    .hc-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .hc-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .hc-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .hc-cta a {
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

    .hc-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .hc-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .hc-facilities {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .hc-h2 {
        font-size: 34px
      }

      .hc-hero-h1 {
        font-size: 40px !important
      }

      .hc-hero-desktop {
        display: none
      }

      .hc-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .hc-feature-grid {
        grid-template-columns: 1fr
      }

      .hc-nhs {
        flex-direction: column;
        align-items: flex-start
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'Accommodations close to hospitals and healthcare centres.',
      'Quiet, restful environments for patients and visiting medical staff.',
      'Flexible stay options for long-term treatments or short-term assignments.',
      'Fully equipped kitchens and amenities for convenience.',
      'On-demand housekeeping services for added convenience.',
      'Comprehensive support for individual and group bookings.',
      'Exclusive discounts for NHS staff.',
  ];

  $features = [
      [
          'title' => 'Proximity to facilities',
          'desc'  => 'Accommodations located near hospitals and medical centres for easy access.',
          'icon'  => 'pin',
      ],
      [
          'title' => 'Flexible durations',
          'desc'  => 'Short- and long-term stays for treatments, assignments, or visiting family members.',
          'icon'  => 'calendar',
      ],
      [
          'title' => 'Quiet, restful spaces',
          'desc'  => 'Properties designed to support recuperation and relaxation for patients and medical staff.',
          'icon'  => 'moon',
      ],
      [
          'title' => 'Compassionate care',
          'desc'  => 'A dedicated team to ensure the housing process is as smooth as possible.',
          'icon'  => 'heart',
      ],
      [
          'title' => 'Furnished & equipped',
          'desc'  => 'Fully serviced apartments with all essentials for a comfortable experience.',
          'icon'  => 'sofa',
      ],
      [
          'title' => 'All-inclusive living',
          'desc'  => 'High-quality, fully furnished serviced accommodations with all utilities, council tax, and maintenance charges included.',
          'image' => 'bill-11.png',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="hc-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}health-care-9.webp')">
    <div class="hc-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For staff, patients &amp; visiting professionals</p>
      <h1 class="hc-hero-h1">Healthcare accommodation</h1>
      <p class="hc-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:620px;margin-top:20px">
        Specialized accommodations for healthcare staff, patients, and visiting medical professionals — designed for
        comfort, convenience, and a restful experience.</p>
      <p class="hc-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:620px;margin-top:20px">
        Specialized accommodations for healthcare staff, patients, and visiting medical professionals.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="hc-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="hc-facilities">
      <div class="hc-fac-img">
        <img src="{{ $base }}red-dot.webp" alt="Healthcare accommodation interior" loading="lazy">
      </div>
      <div>
        <p class="hc-eyebrow">What you get</p>
        <h2 class="hc-h2" style="font-size:34px">Comfortable stays, close to care</h2>
        <ul class="hc-checklist">
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
  <section class="hc-why">
    <div class="hc-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:680px">
        <p class="hc-eyebrow">Why choose us</p>
        <h2 class="hc-h2">Reliable housing for professionals and patients</h2>
        <p class="hc-p">GRHUM provides tailored, reliable housing for healthcare professionals and patients. From
          temporary staff placements to recovery stays and long-term arrangements, we offer flexible, comfortable
          solutions with a focus on empathy, efficiency, and personalized support during critical times.</p>
      </div>

      <div class="hc-feature-grid">
        @foreach($features as $f)
          <div class="hc-feature">
            <span class="hc-feature-icon">
              @if(isset($f['image']))
                <img src="{{ $base }}{{ $f['image'] }}" alt="{{ $f['title'] }}">
              @else
                @switch($f['icon'])
                  @case('pin')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 21s-7-6.5-7-11a7 7 0 0 1 14 0c0 4.5-7 11-7 11z" />
                      <circle cx="12" cy="10" r="2.6" />
                    </svg>
                    @break
                  @case('calendar')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3.5" y="4.5" width="17" height="16" rx="2" />
                      <path d="M3.5 9.5h17M8 3v3M16 3v3" />
                    </svg>
                    @break
                  @case('moon')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 14.5A8.5 8.5 0 0 1 9.5 4a7 7 0 1 0 10.5 10.5z" />
                    </svg>
                    @break
                  @case('heart')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 20s-6.6-4.5-9.1-8.4C1.1 8.7 2.6 5.4 5.8 5c2-.2 3.5.9 4.2 2.3C10.7 5.9 12.2 4.8 14.2 5c3.2.4 4.7 3.7 2.9 6.6C14.6 15.5 12 20 12 20z" />
                    </svg>
                    @break
                  @case('sofa')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12V8a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4" />
                      <path d="M3 12h18v5a1 1 0 0 1-1 1h-1v2h-2v-2H7v2H5v-2H4a1 1 0 0 1-1-1v-5z" />
                      <path d="M6 12v-2M18 12v-2" />
                    </svg>
                    @break
                @endswitch
              @endif
            </span>
            <h4>{{ $f['title'] }}</h4>
            <p>{{ $f['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ============ CTA ============ --}}
  <section class="hc-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="hc-nhs">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
        stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="3" width="18" height="18" rx="4" />
        <path d="M12 8v8M8 12h8" />
      </svg>
      <p><strong>NHS staff</strong> get exclusive discounts on our serviced accommodation — mention your Trust when you
        enquire and we'll apply it.</p>
    </div>
    <div class="hc-cta">
      <h2>Need accommodation for staff or patients?</h2>
      <p>Our team arranges comfortable, well-located stays for healthcare professionals, recovering patients, and
        visiting family — individual or group bookings.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection