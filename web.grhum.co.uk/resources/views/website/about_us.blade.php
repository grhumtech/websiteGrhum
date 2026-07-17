@extends('layouts.app')

@section('title', 'Who we are — Alternative stays, exceptional experiences | GRHUM')

@push('styles')
  <style>
    .wwa-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .wwa-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .wwa-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .wwa-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .wwa-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    .wwa-img {
      width: 100%;
      border-radius: 18px;
      display: block;
      object-fit: cover;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .wwa-sectors {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px 28px;
      margin-top: 8px
    }

    .sector-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 11px 0;
      font-size: 15px;
      font-weight: 600;
      color: #2A2620;
      border-bottom: 1px solid #EBE2D2
    }

    .sector-link::before {
      content: '';
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #C2A06B;
      flex: none
    }

    .sector-link:hover {
      color: #A9895A
    }

    .why-cell:hover {
      background: #224337
    }

    @media(max-width:860px) {
      .wwa-row {
        grid-template-columns: 1fr;
        gap: 30px
      }

      .wwa-sectors {
        grid-template-columns: 1fr
      }

      .wwa-h2 {
        font-size: 34px
      }

      .wwa-hero-h1 {
        font-size: 42px !important
      }

      .wwa-why-grid {
        grid-template-columns: 1fr !important
      }

      .order-flip {
        order: -1
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';
  $sectors = [
    ['t' => 'Corporate travel & relocation', 'u' => 'corporate_travel'],
    ['t' => 'Insurance claims & alternative accommodation', 'u' => 'insurance_claims'],
    ['t' => 'Travel management companies', 'u' => 'travel_management'],
    ['t' => 'Emergency & decant accommodation', 'u' => 'emergency'],
    ['t' => 'Construction & industrial housing', 'u' => 'construction'],
    ['t' => 'Healthcare', 'u' => 'healthcare'],
    ['t' => 'TV & film production', 'u' => 'film_production'],
    ['t' => 'Holiday', 'u' => 'holiday'],
  ];

  $whys = [
    [
      't' => 'Nationwide reach, local expertise',
      'd' => '50+ UK locations, supported by a highly trained team with in-depth local knowledge.',
      'icon' => '<path d="M12 21s7-6.5 7-11a7 7 0 1 0-14 0c0 4.5 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/>'
    ],
    [
      't' => 'Flexible, custom solutions',
      'd' => 'From short-term stays to bespoke relocations — tailored precisely to your needs.',
      'icon' => '<line x1="4" y1="8" x2="20" y2="8"/><circle cx="9" cy="8" r="2.4"/><line x1="4" y1="16" x2="20" y2="16"/><circle cx="15" cy="16" r="2.4"/>'
    ],
    [
      't' => 'Uncompromising quality & safety',
      'd' => 'Each property meets the highest standards for comfort, cleanliness and security.',
      'icon' => '<path d="M12 3l7 3v5c0 4.6-3 7.6-7 9-4-1.4-7-4.4-7-9V6l7-3z"/><path d="M9 12l2 2 4-4"/>'
    ],
    [
      't' => 'Empathy-driven, rapid support',
      'd' => 'Compassionate assistance when it matters most, ensuring you feel at home.',
      'icon' => '<path d="M12 20s-7-4.7-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.3-7 10-7 10z"/>'
    ],
    [
      't' => '24/7 one-stop service',
      'd' => 'From booking to support, we manage it all — so you don’t have to.',
      'icon' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5v5l3.5 2"/>'
    ],
    [
      't' => 'Competitive pricing',
      'd' => 'Exceptional value, with premium accommodations at affordable rates.',
      'icon' => '<path d="M3 12l9-9h7v7l-9 9z"/><circle cx="15.5" cy="8.5" r="1.4"/>'
    ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section
    style="position:relative;min-height:440px;display:flex;align-items:center;background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.7)),url('{{ $base }}Who-we-11.webp');background-size:cover;background-position:center">
    <div class="wwa-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        Who we are</p>
      <h1 class="wwa-hero-h1"
        style="font-family:'Cormorant Garamond',serif;font-weight:500;color:#F6F1E8;font-size:60px;line-height:1.04;letter-spacing:-.01em;max-width:720px">
        Alternative stays, exceptional experiences</h1>
    </div>
  </section>

  {{-- ============ WELCOME + SOLUTIONS ============ --}}
  <section class="wwa-wrap" style="padding-top:110px;padding-bottom:30px">
    <div class="wwa-row">
      <img src="{{ $base }}Who-we-are-new-3.webp" alt="Welcome to GRHUM" class="wwa-img" style="aspect-ratio:4/3"
        loading="lazy">
      <div>
        <p class="wwa-eyebrow">Welcome to GRHUM</p>
        <h2 class="wwa-h2">The essence of “home”, in every stay</h2>
        <p class="wwa-p">Derived from the Sanskrit word for “home”, GRHUM offers comprehensive, high-quality accommodation
          solutions tailored to diverse needs. Whether you seek emergency housing, corporate relocation, or a holiday
          retreat, we are dedicated to finding your perfect abode.</p>
      </div>
    </div>
  </section>

  <section class="wwa-wrap" style="padding-top:70px;padding-bottom:30px">
    <div class="wwa-row">
      <div>
        <p class="wwa-eyebrow">What we cover</p>
        <h2 class="wwa-h2">Comprehensive accommodation solutions</h2>
        <p class="wwa-p" style="margin-bottom:26px">Our extensive portfolio includes a variety of properties across the
          UK, designed to suit a broad spectrum of requirements:</p>
        <div class="wwa-sectors">
          @foreach($sectors as $i => $s)
            <a href="{{ url($s['u']) }}" class="sector-link" data-aos="fade-up"
              data-aos-delay="{{ $i * 50 }}">{{ $s['t'] }}</a>
          @endforeach
        </div>
      </div>
      <img src="{{ $base }}high-angle-family-2.webp" alt="A family at home" class="wwa-img order-flip"
        style="aspect-ratio:4/3" loading="lazy">
    </div>
  </section>

  {{-- ============ FULL-WIDTH BAND ============ --}}
  <section style="margin:70px 0">
    <img src="{{ $base }}pexels-clement.webp" alt="" style="width:100%;height:auto;display:block" loading="lazy">
  </section>

  {{-- ============ ONE-STOP + COMMITMENT ============ --}}
  <section class="wwa-wrap" style="padding-bottom:30px">
    <div class="wwa-row">
      <img src="{{ $base }}breathtaking-shot.webp" alt="" class="wwa-img" style="aspect-ratio:4/3" loading="lazy">
      <div>
        <p class="wwa-eyebrow">All-in-one</p>
        <h2 class="wwa-h2">A one-stop shop for every need</h2>
        <p class="wwa-p">GRHUM is your all-in-one solution for serviced accommodations. We understand the challenges of
          emergency or decant relocations, and our priority is to deliver timely, personalised solutions that ease your
          transition and provide peace of mind.</p>
      </div>
    </div>
  </section>

  <section class="wwa-wrap" style="padding-top:70px;padding-bottom:30px">
    <div class="wwa-row">
      <div>
        <p class="wwa-eyebrow">Comfort & care</p>
        <h2 class="wwa-h2">A commitment to feeling at home</h2>
        <p class="wwa-p">Every day, we strive to enhance comfort and convenience for our clients. With GRHUM, you’ll find
          more than just a place to stay — you’ll find a seamless, supportive experience to help you feel truly at home.
        </p>
      </div>
      <img src="{{ $base }}Commitment-1.webp" alt="" class="wwa-img order-flip" style="aspect-ratio:4/3" loading="lazy">
    </div>
  </section>

  {{-- ============ MISSION & VISION (green panel) ============ --}}
  <section style="background:#1E3A30;margin-top:70px">
    <div class="wwa-wrap" style="padding:96px 32px">
      <div class="wwa-row">
        <img src="{{ $base }}Comprehensive-solution.webp" alt=""
          style="width:100%;border-radius:18px;display:block;object-fit:cover;aspect-ratio:4/3" loading="lazy">
        <div>
          <p
            style="color:#D9C39A;font-size:12.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px">
            Our mission</p>
          <h2
            style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:40px;line-height:1.08;color:#F6F1E8;margin-bottom:16px">
            Tailored housing, delivered with care</h2>
          <p style="font-size:16px;line-height:1.65;color:rgba(246,241,232,.74)">GRHUM is committed to delivering safe,
            tailored accommodation solutions that meet the unique needs of our clients. We focus on quality, client care
            and comfort to redefine temporary housing as a seamless, welcoming experience for every stay and purpose.</p>
        </div>
      </div>

      <div class="wwa-row" style="margin-top:64px">
        <div>
          <p
            style="color:#D9C39A;font-size:12.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px">
            Our vision</p>
          <h2
            style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:40px;line-height:1.08;color:#F6F1E8;margin-bottom:16px">
            A leader in flexible, compassionate stays</h2>
          <p style="font-size:16px;line-height:1.65;color:rgba(246,241,232,.74)">To be a leading provider of flexible,
            reliable and compassionate accommodation in the UK — delivering exceptional experiences in temporary housing
            and relocation for individuals, families and businesses.</p>
        </div>
        <img src="{{ $base }}view-london.webp" alt="" class="order-flip"
          style="width:100%;border-radius:18px;display:block;object-fit:cover;aspect-ratio:4/3" loading="lazy">
      </div>
    </div>
  </section>

  {{-- ============ WHY CHOOSE US ============ --}}
  <section class="wwa-wrap" style="padding:104px 32px 40px">
    <div style="max-width:640px;margin-bottom:48px">
      <p class="wwa-eyebrow">Why choose us</p>
      <h2 class="wwa-h2" style="font-size:48px">Reasons clients stay with GRHUM</h2>
      <p class="wwa-p">GRHUM delivers tailored, high-quality accommodations for corporate travel, relocation and unique
        housing needs — with flexibility, empathy and attention to detail that makes every stay feel like home.</p>
    </div>

    <div class="wwa-why-grid"
      style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:#E5DCCB;border:1px solid #E5DCCB;border-radius:18px;overflow:hidden">
      @foreach($whys as $i => $w)
        <div class="why-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}"
          style="background:#fff;padding:36px 30px 40px">
          <span
            style="display:inline-flex;align-items:center;justify-content:center;width:54px;height:54px;border-radius:50%;border:1.5px solid #DCC9A6;color:#A9895A;margin-bottom:20px">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round">{!! $w['icon'] !!}</svg>
          </span>
          <h3 style="font-size:18px;font-weight:700;color:#1E3A30;margin-bottom:9px;line-height:1.25">{{ $w['t'] }}</h3>
          <p style="font-size:14.5px;line-height:1.6;color:#6B6353">{{ $w['d'] }}</p>
        </div>
      @endforeach
    </div>
  </section>

@endsection