@extends('layouts.app')

@section('title', 'Suppliers | GRHUM')

@push('styles')
  <style>
    .su-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .su-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .su-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .su-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .su-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .su-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    .su-hero-desktop {
      display: block
    }

    .su-hero-mobile {
      display: none
    }

    /* ---- partner benefits (image + list) ---- */
    .su-partner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .su-partner-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .su-partner-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .su-list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .su-list li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 15.5px;
      line-height: 1.55;
      color: #5B5345
    }

    .su-list svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    .su-list strong {
      color: #1E3A30;
      font-weight: 600
    }

    /* ---- what we seek ---- */
    .su-seek {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .su-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .su-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .su-feature:hover {
      background: #FBF8F2
    }

    .su-feature-icon {
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

    .su-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .su-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .su-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .su-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .su-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .su-cta a {
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

    .su-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .su-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .su-partner {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .su-h2 {
        font-size: 34px
      }

      .su-hero-h1 {
        font-size: 40px !important
      }

      .su-hero-desktop {
        display: none
      }

      .su-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .su-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $benefits = [
      ['label' => 'Work with industry leaders', 'text' => 'Collaborate with major corporations and industry giants relocating employees for assignments, business trips, and extended projects.'],
      ['label' => 'Consistent demand', 'text' => 'Benefit from a steady stream of inquiries across corporate, leisure, and emergency accommodation markets.'],
      ['label' => 'Reliable revenue stream', 'text' => 'Enjoy seamless transactions through a single billing point, ensuring timely payments and financial stability.'],
      ['label' => 'Long-term collaboration', 'text' => 'Build enduring partnerships with GRHUM, a brand trusted for its professionalism and quality.'],
      ['label' => 'Nationwide reach', 'text' => 'Leverage our extensive UK network to expand your opportunities and grow your business.'],
      ['label' => 'Streamlined operations', 'text' => 'Experience hassle-free processes with clear requirements, efficient communication, and dedicated support.'],
      ['label' => 'Commitment to excellence', 'text' => 'Be part of a mission to deliver top-tier accommodations that redefine client satisfaction.'],
  ];

  $seek = [
      [
          'title' => 'Commitment to quality',
          'desc'  => 'Suppliers who consistently deliver high-standard products and services, ensuring every accommodation meets or exceeds client expectations.',
          'icon'  => 'award',
      ],
      [
          'title' => 'Reliability and timeliness',
          'desc'  => 'Partners who are dependable and can adhere to strict timelines, supporting our promise of prompt and seamless service to our clients.',
          'icon'  => 'clock',
      ],
      [
          'title' => 'Flexibility and adaptability',
          'desc'  => 'Suppliers willing to accommodate unique requests or tailor offerings to align with the diverse needs of our clientele.',
          'icon'  => 'flex',
      ],
      [
          'title' => 'Sustainability focus',
          'desc'  => 'Vendors who prioritize environmentally friendly practices, aligning with GRHUM\'s commitment to eco-conscious operations.',
          'icon'  => 'leaf',
      ],
      [
          'title' => 'Transparent communication',
          'desc'  => 'Open and honest collaboration to foster strong, effective partnerships that stand the test of time.',
          'icon'  => 'chat',
      ],
      [
          'title' => 'Capacity to scale',
          'desc'  => 'Suppliers capable of meeting growing demand and adapting to new opportunities as GRHUM expands its reach across the UK.',
          'icon'  => 'scale',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="su-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}beautiful-london-9.webp')">
    <div class="su-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        Partner with GRHUM</p>
      <h1 class="su-hero-h1">Suppliers</h1>
      <p class="su-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:640px;margin-top:20px">
        Partner with GRHUM to provide exceptional serviced accommodations, ensuring clients experience unmatched
        quality, comfort, and a true home-like stay.</p>
      <p class="su-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:640px;margin-top:20px">
        Partner with GRHUM to provide exceptional serviced accommodations across the UK.</p>
    </div>
  </section>

  {{-- ============ WHY BECOME A PARTNER ============ --}}
  <section class="su-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="su-partner">
      <div class="su-partner-img">
        <img src="{{ $base }}1587111577332.webp" alt="GRHUM partnership" loading="lazy">
      </div>
      <div>
        <p class="su-eyebrow">Partnership</p>
        <h2 class="su-h2" style="font-size:34px">Why become a GRHUM partner?</h2>
        <ul class="su-list">
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
  <section class="su-seek">
    <div class="su-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:720px">
        <p class="su-eyebrow">What we seek</p>
        <h2 class="su-h2">What we look for in a partner</h2>
        <p class="su-p">At GRHUM, we value partnerships that help us deliver exceptional serviced accommodation
          experiences to our clients. We're looking for reliable, quality-driven suppliers who share our commitment to
          excellence and professionalism.</p>
      </div>

      <div class="su-feature-grid">
        @foreach($seek as $s)
          <div class="su-feature">
            <span class="su-feature-icon">
              @switch($s['icon'])
                @case('award')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="6" />
                    <path d="M8.2 13.3 7 22l5-3 5 3-1.2-8.7" />
                  </svg>
                  @break
                @case('clock')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" />
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
                @case('leaf')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z" />
                    <path d="M2 21c0-3 1.85-5.36 5.08-6" />
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
  <section class="su-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="su-cta">
      <h2>Ready to partner with GRHUM?</h2>
      <p>Join our nationwide network of trusted suppliers and tap into consistent demand across corporate, leisure, and
        emergency accommodation markets.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection