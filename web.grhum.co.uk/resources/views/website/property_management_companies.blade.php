@extends('layouts.app')

@section('title', 'Property Management Companies | GRHUM')

@push('styles')
  <style>
    .pm-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .pm-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .pm-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .pm-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .pm-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center bottom
    }

    .pm-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 820px
    }

    .pm-hero-desktop {
      display: block
    }

    .pm-hero-mobile {
      display: none
    }

    /* ---- partner benefits (image + list) ---- */
    .pm-partner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .pm-partner-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .pm-partner-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .pm-list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .pm-list li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 15.5px;
      line-height: 1.55;
      color: #5B5345
    }

    .pm-list svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    .pm-list strong {
      color: #1E3A30;
      font-weight: 600
    }

    /* ---- what we seek ---- */
    .pm-seek {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .pm-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .pm-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .pm-feature:hover {
      background: #FBF8F2
    }

    .pm-feature-icon {
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

    .pm-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .pm-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .pm-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .pm-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .pm-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .pm-cta a {
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

    .pm-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .pm-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .pm-partner {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .pm-h2 {
        font-size: 34px
      }

      .pm-hero-h1 {
        font-size: 38px !important
      }

      .pm-hero-desktop {
        display: none
      }

      .pm-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .pm-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $benefits = [
      ['label' => 'Maximized occupancy', 'text' => 'We connect your properties with a steady flow of corporate clients, short-let renters, and high-value tenants.'],
      ['label' => 'Stress-free operations', 'text' => 'Let us handle tenant placements, bookings, and day-to-day management, ensuring a hassle-free experience for you.'],
      ['label' => 'Guaranteed revenue stream', 'text' => 'Benefit from timely payments and a reliable income source backed by long-term partnerships.'],
      ['label' => 'Quality assurance', 'text' => 'We maintain your property\'s standards through regular inspections, professional cleaning, and responsive maintenance.'],
      ['label' => 'Nationwide network', 'text' => 'Access opportunities to expand your portfolio with properties across the UK.'],
  ];

  $seek = [
      [
          'title' => 'Commitment to quality',
          'desc'  => 'Partners who uphold high standards in property maintenance and client satisfaction.',
          'icon'  => 'award',
      ],
      [
          'title' => 'Reliable processes',
          'desc'  => 'Efficient and transparent systems for managing bookings and operations.',
          'icon'  => 'cog',
      ],
      [
          'title' => 'Flexibility',
          'desc'  => 'A willingness to accommodate the diverse needs of our clients.',
          'icon'  => 'flex',
      ],
      [
          'title' => 'Sustainability practices',
          'desc'  => 'Companies that align with our eco-conscious goals for sustainable operations.',
          'icon'  => 'leaf',
      ],
      [
          'title' => 'Scalability',
          'desc'  => 'The capacity to grow alongside GRHUM\'s expanding portfolio.',
          'icon'  => 'scale',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="pm-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}Property-management-9.webp')">
    <div class="pm-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For property management companies</p>
      <h1 class="pm-hero-h1">Property management companies</h1>
      <p class="pm-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:660px;margin-top:20px">
        At GRHUM, we partner with property management companies to optimize serviced accommodations — boosting
        occupancy, streamlining operations, and ensuring consistent revenue with top-tier property care.</p>
      <p class="pm-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:660px;margin-top:20px">
        Partner with us to boost occupancy, streamline operations and ensure consistent revenue.</p>
    </div>
  </section>

  {{-- ============ WHY PARTNER ============ --}}
  <section class="pm-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="pm-partner">
      <div class="pm-partner-img">
        <img src="{{ $base }}property_management_companies-11.webp" alt="GRHUM property management partnership"
          loading="lazy">
      </div>
      <div>
        <p class="pm-eyebrow">Partnership</p>
        <h2 class="pm-h2" style="font-size:34px">Why partner with GRHUM?</h2>
        <ul class="pm-list">
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
  <section class="pm-seek">
    <div class="pm-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:720px">
        <p class="pm-eyebrow">What we seek</p>
        <h2 class="pm-h2">What we look for in a partner</h2>
        <p class="pm-p">We work best with management companies that share our standards. If the following describes how
          you operate, let's build a partnership that grows both portfolios.</p>
      </div>

      <div class="pm-feature-grid">
        @foreach($seek as $s)
          <div class="pm-feature">
            <span class="pm-feature-icon">
              @switch($s['icon'])
                @case('award')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="6" />
                    <path d="M8.2 13.3 7 22l5-3 5 3-1.2-8.7" />
                  </svg>
                  @break
                @case('cog')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
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
  <section class="pm-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="pm-cta">
      <h2>Let's optimize your portfolio together</h2>
      <p>Partner with GRHUM to boost occupancy, streamline day-to-day operations, and unlock a reliable revenue stream
        across your managed properties.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection