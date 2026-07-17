@extends('layouts.app')

@section('title', 'Landlords | GRHUM')

@push('styles')
  <style>
    .la-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .la-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .la-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .la-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .la-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .la-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    .la-hero-desktop {
      display: block
    }

    .la-hero-mobile {
      display: none
    }

    /* ---- partner benefits (image + list) ---- */
    .la-partner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .la-partner-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .la-partner-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .la-list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .la-list li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 15.5px;
      line-height: 1.55;
      color: #5B5345
    }

    .la-list svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    .la-list strong {
      color: #1E3A30;
      font-weight: 600
    }

    /* ---- what we seek ---- */
    .la-seek {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .la-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .la-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .la-feature:hover {
      background: #FBF8F2
    }

    .la-feature-icon {
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

    .la-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .la-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .la-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .la-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .la-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .la-cta a {
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

    .la-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .la-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .la-partner {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .la-h2 {
        font-size: 34px
      }

      .la-hero-h1 {
        font-size: 40px !important
      }

      .la-hero-desktop {
        display: none
      }

      .la-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .la-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $benefits = [
      ['label' => 'Consistent occupancy', 'text' => 'Secure reliable bookings through our diverse client base, including business travellers, families, and emergency accommodation needs.'],
      ['label' => 'Steady revenue stream', 'text' => 'Enjoy timely payments with transparent and predictable revenue, eliminating the uncertainties of traditional letting.'],
      ['label' => 'End-to-end property management', 'text' => 'From tenant placement to maintenance coordination, we handle all aspects of property management, ensuring a hassle-free experience for landlords.'],
      ['label' => 'High standards of care', 'text' => 'Your property is managed and maintained with attention to detail, preserving its value and appeal over time.'],
      ['label' => 'Trusted partnership', 'text' => 'Join a network of landlords who trust GRHUM to deliver reliable, quality-focused solutions that maximize their property\'s potential.'],
      ['label' => 'Access to premium tenants', 'text' => 'Benefit from our strong relationships with corporate clients and insurers, ensuring your property is occupied by vetted, high-value tenants.'],
  ];

  $seek = [
      [
          'title' => 'Well-maintained properties',
          'desc'  => 'Properties that meet modern standards and offer a welcoming environment for tenants.',
          'icon'  => 'home',
      ],
      [
          'title' => 'Commitment to quality',
          'desc'  => 'Landlords who share our dedication to delivering top-tier accommodations.',
          'icon'  => 'award',
      ],
      [
          'title' => 'Flexibility and collaboration',
          'desc'  => 'A willingness to work together to meet the diverse needs of our tenants, from short-term stays to long-term assignments.',
          'icon'  => 'flex',
      ],
      [
          'title' => 'Proactive communication',
          'desc'  => 'Open and transparent communication to ensure a smooth and productive partnership.',
          'icon'  => 'chat',
      ],
      [
          'title' => 'Scalability',
          'desc'  => 'Landlords interested in growing their portfolio alongside GRHUM as we expand our reach across the UK.',
          'icon'  => 'scale',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="la-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}landlords-9.webp')">
    <div class="la-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For property owners</p>
      <h1 class="la-hero-h1">Landlords</h1>
      <p class="la-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:640px;margin-top:20px">
        Maximize your property's potential with GRHUM by securing high-quality short &amp; long term tenants and
        enjoying hassle-free management, consistent income, and exceptional care.</p>
      <p class="la-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:640px;margin-top:20px">
        Maximize your property's potential with GRHUM.</p>
    </div>
  </section>

  {{-- ============ WHY PARTNER ============ --}}
  <section class="la-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="la-partner">
      <div class="la-partner-img">
        <img src="{{ $base }}focused-design-professional.webp" alt="GRHUM property management" loading="lazy">
      </div>
      <div>
        <p class="la-eyebrow">Partnership</p>
        <h2 class="la-h2" style="font-size:34px">Why partner with GRHUM?</h2>
        <ul class="la-list">
          @foreach($benefits as $b)
            <li>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6 9 17l-5-5" />
              </svg>
              <span><strong>{{ $b['label'] }}:</strong> {{ $b['text'] }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  {{-- ============ WHAT WE SEEK ============ --}}
  <section class="la-seek">
    <div class="la-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:720px">
        <p class="la-eyebrow">What we seek</p>
        <h2 class="la-h2">What we look for in a partner</h2>
        <p class="la-p">We partner with landlords who share our standards. If your property and priorities align with
          the following, we'd love to work together to maximize its potential.</p>
      </div>

      <div class="la-feature-grid">
        @foreach($seek as $s)
          <div class="la-feature">
            <span class="la-feature-icon">
              @switch($s['icon'])
                @case('home')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 10.5 12 3l9 7.5" />
                    <path d="M5 9.5V21h14V9.5" />
                    <path d="M9.5 21v-6h5v6" />
                  </svg>
                  @break
                @case('award')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="6" />
                    <path d="M8.2 13.3 7 22l5-3 5 3-1.2-8.7" />
                  </svg>
                  @break
                @case('flex')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 2l4 4-4 4" />
                    <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                    <path d="M7 22l-4-4 4-4" />
                    <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                  </svg>
                  @break
                @case('chat')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                  </svg>
                  @break
                @case('scale')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 7 13.5 15.5l-4-4L2 19" />
                    <path d="M16 7h6v6" />
                  </svg>
                  @break
              @endswitch
            </span>
            <h4>{{ $s['title'] }}</h4>
            <p>{{ $s['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ============ CTA ============ --}}
  <section class="la-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="la-cta">
      <h2>List your property with GRHUM</h2>
      <p>Turn your property into a consistent, hassle-free income stream. We handle tenants, maintenance, and billing —
        you enjoy reliable returns.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection