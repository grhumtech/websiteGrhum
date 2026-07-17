@extends('layouts.app')

@section('title', 'Corporate travel & relocation | GRHUM')

@push('styles')
  <style>
    .ct-wrap { max-width: 1240px; margin: 0 auto; padding: 0 32px }
    .ct-row { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center }
    .ct-eyebrow { color: #A9895A; font-size: 12.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; margin-bottom: 14px }
    .ct-h2 { font-family: 'Cormorant Garamond', serif; font-weight: 500; font-size: 42px; line-height: 1.06; color: #1E3A30; letter-spacing: -.01em; margin-bottom: 18px }
    .ct-p { font-size: 16px; line-height: 1.65; color: #5B5345 }
    .ct-img { width: 100%; border-radius: 18px; display: block; object-fit: cover; box-shadow: 0 24px 60px -34px rgba(30,58,48,.5) }

    .ct-facility-list { list-style: none; margin: 0; padding: 0 }
    .ct-facility-list li {
      display: flex; align-items: flex-start; gap: 12px;
      padding: 14px 0; font-size: 15.5px; line-height: 1.5; color: #2A2620;
      border-bottom: 1px solid #EBE2D2
    }
    .ct-facility-list li::before {
      content: ''; width: 7px; height: 7px; margin-top: 8px; border-radius: 50%;
      background: #C2A06B; flex: none
    }

    .ct-why-grid {
      display: grid; grid-template-columns: repeat(3,1fr); gap: 2px;
      background: #E5DCCB; border: 1px solid #E5DCCB; border-radius: 18px; overflow: hidden
    }
    .ct-why-card { background: #fff; padding: 36px 30px 40px; transition: background .2s }
    .ct-why-card:hover { background: #FAF6EE }
    .ct-why-icon {
      display: inline-flex; align-items: center; justify-content: center;
      width: 54px; height: 54px; border-radius: 50%; border: 1.5px solid #DCC9A6;
      color: #A9895A; margin-bottom: 20px
    }

    @media(max-width:860px){
      .ct-row { grid-template-columns: 1fr; gap: 30px }
      .ct-h2 { font-size: 34px }
      .ct-hero-h1 { font-size: 42px !important }
      .ct-why-grid { grid-template-columns: 1fr !important }
      .order-flip { order: -1 }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $facilities = [
    'Fully furnished accommodations with work-friendly spaces and high-speed Wi-Fi.',
    'Strategic locations near business hubs and transportation links.',
    'Flexible stay durations for short and extended assignments.',
    'Hassle-free booking and 24/7 support for a smooth transition.',
    'Dedicated account management for seamless coordination.',
    'On-demand housekeeping services for added convenience.',
    'Cost-effective solutions for corporate budgets.',
  ];

  $whys = [
    [
      't' => 'Bespoke solutions',
      'd' => 'Customizable accommodations designed to meet the needs of business travellers and relocating professionals.',
      'icon' => '<path d="M12 3l2.5 5 5.5.8-4 3.9.95 5.5L12 15.8 6.95 18.2 7.9 12.7l-4-3.9 5.5-.8z"/>'
    ],
    [
      't' => 'Comfort and productivity',
      'd' => 'Fully furnished apartments with work-friendly spaces and high-speed Wi-Fi.',
      'icon' => '<rect x="3" y="5" width="18" height="12" rx="1.5"/><path d="M8 21h8M12 17v4"/>'
    ],
    [
      't' => 'Hassle-free process',
      'd' => 'Seamless booking, flexible durations, and dedicated support for stress-free relocations.',
      'icon' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5v5l3.5 2"/>'
    ],
    [
      't' => 'Strategic locations',
      'd' => 'Properties near business hubs, transportation links, and major corporate centres across the UK.',
      'icon' => '<path d="M12 21s7-6.5 7-11a7 7 0 1 0-14 0c0 4.5 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/>'
    ],
    [
      't' => 'Cost efficiency',
      'd' => 'Competitive pricing tailored for corporate budgets.',
      'icon' => '<path d="M15.5 8.17c-.5-1.11-1.5-1.67-2.5-1.67-1.66 0-3 1.49-3 3.33v2.67M10 12.5v1.78c0 2.22-2 2.22-2 2.22h8M10 12.5H8m2 0h4"/><circle cx="12" cy="12" r="9"/>'
    ],
    [
      't' => 'Flexibility',
      'd' => 'Wide range of options to choose from for short or long stays, with the ease of extending your stay.',
      'icon' => '<path d="M3 12l9-9h7v7l-9 9z"/><circle cx="15.5" cy="8.5" r="1.4"/>'
    ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section
    style="position:relative;min-height:440px;display:flex;align-items:center;background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.7)),url('{{ $base }}businesspeople-discussing-laptop-2.webp');background-size:cover;background-position:center">
    <div class="ct-wrap" style="width:100%">
      <p style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        Corporate solutions</p>
      <h1 class="ct-hero-h1"
        style="font-family:'Cormorant Garamond',serif;font-weight:500;color:#F6F1E8;font-size:60px;line-height:1.04;letter-spacing:-.01em;max-width:720px">
        Corporate travel & relocation</h1>
      <p style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:560px;margin-top:18px">
        Seamlessly tailored accommodation solutions for professionals on the move, offering comfort and convenience for
        business travellers and relocating teams.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="ct-wrap" style="padding-top:110px;padding-bottom:30px">
    <div class="ct-row">
      <img src="{{ $base }}cayley-nossiter-24.webp" alt="Corporate accommodation" class="ct-img"
        style="aspect-ratio:4/3" loading="lazy">
      <div>
        <p class="ct-eyebrow">What's included</p>
        <h2 class="ct-h2">Built for business, ready for life</h2>
        <ul class="ct-facility-list">
          @foreach($facilities as $i => $f)
            <li data-aos="fade-left" data-aos-delay="{{ $i * 80 }}">{{ $f }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  {{-- ============ WHY CHOOSE US ============ --}}
  <section class="ct-wrap" style="padding:104px 32px 100px">
    <div style="max-width:640px;margin-bottom:48px">
      <p class="ct-eyebrow">Why choose us</p>
      <h2 class="ct-h2" style="font-size:48px">Reasons businesses choose GRHUM</h2>
      <p class="ct-p">GRHUM simplifies corporate travel and relocation with flexible, high-quality accommodations
        tailored to your needs. From short-term stays to customized solutions, we ensure a seamless experience through
        reliability, empathy, and personalized service — so you can focus on what matters most.</p>
    </div>

    <div class="ct-why-grid">
      @foreach($whys as $i => $w)
        <div class="ct-why-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
          <span class="ct-why-icon">
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