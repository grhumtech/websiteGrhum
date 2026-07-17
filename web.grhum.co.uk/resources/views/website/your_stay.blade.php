@extends('layouts.app')

@section('title', 'The GRHUM experience — How it works | GRHUM')

@push('styles')
<style>
  .hiw-wrap{max-width:1240px;margin:0 auto;padding:0 32px}
  .hiw-eyebrow{color:#A9895A;font-size:12.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px}
  .hiw-h2{font-family:'Cormorant Garamond',serif;font-weight:500;font-size:46px;line-height:1.06;color:#1E3A30;letter-spacing:-.01em}
  .hiw-p{font-size:16px;line-height:1.65;color:#5B5345}

  /* ---- timeline ---- */
  .tl{position:relative;max-width:980px;margin:60px auto 0}
  .tl::before{content:'';position:absolute;left:50%;top:0;bottom:0;width:2px;background:#E0D4BF;transform:translateX(-50%)}
  .tl-item{position:relative;width:50%;padding:0 46px 54px;box-sizing:border-box}
  .tl-item:nth-child(odd){left:0;text-align:right}
  .tl-item:nth-child(even){left:50%;text-align:left}
  .tl-badge{position:absolute;top:0;width:56px;height:56px;border-radius:50%;background:#1E3A30;color:#C2A06B;display:flex;align-items:center;justify-content:center;z-index:2;box-shadow:0 0 0 6px #F6F1E8}
  .tl-item:nth-child(odd) .tl-badge{right:-28px}
  .tl-item:nth-child(even) .tl-badge{left:-28px}
  .tl-step{font-family:'Cormorant Garamond',serif;font-size:15px;letter-spacing:.18em;color:#A9895A;font-weight:600;margin-bottom:6px}
  .tl-card h3{font-size:20px;font-weight:700;color:#1E3A30;margin-bottom:8px;line-height:1.25}
  .tl-card p{font-size:14.5px;line-height:1.6;color:#6B6353;margin:0}

  /* ---- amenities ---- */
  .amen-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
  .amen-cell{background:#fff;border:1px solid #EBE2D2;border-radius:16px;padding:32px 20px;text-align:center}
  .amen-cell:hover{border-color:#C2A06B}
  .amen-cell .ic{display:inline-flex;align-items:center;justify-content:center;width:58px;height:58px;border-radius:50%;background:#FAF6EE;color:#1E3A30;margin-bottom:16px}
  .amen-cell h6{font-size:14.5px;font-weight:700;color:#2A2620;margin:0}

  @media(max-width:820px){
    .hiw-row{grid-template-columns:1fr !important;gap:30px !important}
    .hiw-h2{font-size:34px}
    .amen-grid{grid-template-columns:repeat(2,1fr)}
    .tl::before{left:27px}
    .tl-item,
    .tl-item:nth-child(odd),
    .tl-item:nth-child(even){width:100%;left:0;text-align:left;padding:0 0 44px 72px}
    .tl-item:nth-child(odd) .tl-badge,
    .tl-item:nth-child(even) .tl-badge{left:0;right:auto}
  }
</style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  // SVG paths drawn on a 24x24 viewBox, stroke=currentColor
  $steps = [
    ['t'=>'Booking','d'=>'Choose your ideal accommodation and secure your stay with our simple, hassle-free booking process tailored to your needs.','ic'=>'<rect x="4" y="5" width="16" height="15" rx="2"/><path d="M4 9h16M8 3v4M16 3v4"/>'],
    ['t'=>'Confirmation email','d'=>'Receive a detailed confirmation email with all the essential information, including check-in instructions and property details.','ic'=>'<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>'],
    ['t'=>'Welcome call','d'=>'Before your arrival, we’ll confirm your arrival time, share check-in details and accommodate any special requests you may have.','ic'=>'<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>'],
    ['t'=>'Self-check-in or in-person greeting','d'=>'We’ll arrange key collection via a key box or have a team member on-site to personally welcome you and show you around.','ic'=>'<circle cx="8" cy="13" r="4"/><path d="M11 11l9-9 2 2-2 2 2 2-3 3-3-3"/>'],
    ['t'=>'Guest follow-up','d'=>'Ensuring your comfort doesn’t stop at check-in — our team touches base post-arrival to address any needs and enhance your stay.','ic'=>'<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>'],
    ['t'=>'Housekeeping','d'=>'Housekeeping can be included with your booking, with frequency and charges tailored to your needs and detailed at the time of booking.','ic'=>'<path d="M3 21h18M6 21V9l6-5 6 5v12M10 21v-5h4v5"/>'],
    ['t'=>'24×7 guest support','d'=>'Our team is always here to assist with advice or maintenance requests, anytime you need us.','ic'=>'<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>'],
    ['t'=>'Checking out','d'=>'A few days before departure, we’ll email all the details, including checkout date and key-return instructions — or reach out for support.','ic'=>'<path d="M14 4h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-5"/><path d="M10 8l-4 4 4 4M6 12h11"/>'],
  ];

  $amenities = [
    ['t'=>'Utilities & bills included','ic'=>'<path d="M9 21h6M10 21v-3M14 21v-3M6 4h12v9a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4z"/><path d="M18 6h2a2 2 0 0 1 0 4h-2"/>'],
    ['t'=>'Wi-Fi','ic'=>'<path d="M5 12.5a10 10 0 0 1 14 0M8 16a5 5 0 0 1 8 0"/><circle cx="12" cy="19" r="1"/>'],
    ['t'=>'Iron & ironing board','ic'=>'<path d="M3 8h11a5 5 0 0 1 5 5H3z"/><path d="M3 13v3M14 8V6h4"/>'],
    ['t'=>'Housekeeping','ic'=>'<path d="M3 21h18M6 21V9l6-5 6 5v12M10 21v-5h4v5"/>'],
    ['t'=>'Television','ic'=>'<rect x="3" y="5" width="18" height="12" rx="2"/><path d="M8 21h8M12 17v4"/>'],
    ['t'=>'Equipped kitchen','ic'=>'<path d="M6 3v7M9 3v7a3 3 0 0 1-6 0V3M6 10v11"/><path d="M17 3c-2 0-3 2-3 5s1 4 3 4 3-1 3-4-1-5-3-5zM17 12v9"/>'],
    ['t'=>'Laundry options','ic'=>'<rect x="5" y="3" width="14" height="18" rx="2"/><circle cx="12" cy="13" r="4"/><path d="M8 6h.01M11 6h.01"/>'],
    ['t'=>'Fresh towels & bedding','ic'=>'<path d="M3 18v-6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v6M3 18h18M7 8V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/>'],
  ];
@endphp

@section('content')

  {{-- ============ HERO ============ --}}
  <section style="position:relative;min-height:480px;display:flex;align-items:flex-end;background-image:linear-gradient(180deg,rgba(20,33,27,.35),rgba(20,33,27,.72)),url('{{ $base }}Who-12.webp');background-size:cover;background-position:center">
    <div class="hiw-wrap" style="width:100%;padding-bottom:54px">
      <p style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:16px">How it works</p>
      <h1 style="font-family:'Cormorant Garamond',serif;font-weight:500;color:#F6F1E8;font-size:62px;line-height:1.02;letter-spacing:-.01em">The GRHUM experience</h1>
    </div>
  </section>

  {{-- ============ GUEST JOURNEY ============ --}}
  <section class="hiw-wrap" style="padding:110px 32px 30px">
    <div class="hiw-row" style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center">
      <img src="{{ $base }}Guest-Experience.webp" alt="The guest journey" loading="lazy" style="width:100%;border-radius:18px;display:block;object-fit:cover;aspect-ratio:4/3;box-shadow:0 24px 60px -34px rgba(30,58,48,.5)">
      <div>
        <p class="hiw-eyebrow">The guest journey</p>
        <h2 class="hiw-h2" style="margin-bottom:18px">Seamless from booking to check-out</h2>
        <p class="hiw-p">At GRHUM, we make every stay seamless and comforting. From booking to check-out, our personalised service and thoughtfully designed accommodations ensure you feel right at home, no matter where your journey takes you.</p>
      </div>
    </div>
  </section>

  {{-- ============ TIMELINE ============ --}}
  <section class="hiw-wrap" style="padding:80px 32px 40px">
    <div style="text-align:center;max-width:620px;margin:0 auto">
      <p class="hiw-eyebrow">Step by step</p>
      <h2 class="hiw-h2">How it works</h2>
    </div>

    <div class="tl">
      @foreach($steps as $i => $s)
        <div class="tl-item">
          <span class="tl-badge">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">{!! $s['ic'] !!}</svg>
          </span>
          <div class="tl-card">
            <div class="tl-step">Step {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
            <h3>{{ $s['t'] }}</h3>
            <p>{{ $s['d'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- ============ THE GRHUM STANDARD ============ --}}
  <section style="background:#1E3A30;margin-top:70px">
    <div class="hiw-wrap" style="padding:96px 32px">
      <div style="text-align:center;max-width:620px;margin:0 auto 52px">
        <p style="color:#D9C39A;font-size:12.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px">Every property, every time</p>
        <h2 style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:46px;line-height:1.06;color:#F6F1E8;margin-bottom:14px">The GRHUM Standard</h2>
        <p style="font-size:16px;line-height:1.6;color:rgba(246,241,232,.74)">Essential amenities in every property to ensure a comfortable and seamless stay.</p>
      </div>

      <div class="amen-grid">
        @foreach($amenities as $a)
          <div class="amen-cell">
            <span class="ic">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">{!! $a['ic'] !!}</svg>
            </span>
            <h6>{{ $a['t'] }}</h6>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection