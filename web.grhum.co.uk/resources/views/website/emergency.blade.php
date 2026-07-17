@extends('layouts.app')

@section('title', 'Emergency & Decant Accommodation | GRHUM')

@push('styles')
  <style>
    .em-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .em-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .em-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .em-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .em-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .em-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    /* ---- facilities (image + checklist) ---- */
    .em-facilities {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .em-fac-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .em-fac-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .em-checklist {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 18px
    }

    .em-checklist li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 16px;
      line-height: 1.55;
      color: #2A2620
    }

    .em-checklist svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    /* ---- why choose us ---- */
    .em-why {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .em-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .em-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .em-feature:hover {
      background: #FBF8F2
    }

    .em-feature-icon {
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

    .em-feature-icon img {
      width: 26px;
      height: 26px;
      object-fit: contain;
      filter: brightness(0) invert(1);
      opacity: .9
    }

    .em-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .em-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- urgent banner ---- */
    .em-urgent {
      display: flex;
      align-items: center;
      gap: 16px;
      background: #FBF3E4;
      border: 1px solid #EDDCB8;
      border-radius: 14px;
      padding: 18px 22px;
      margin-bottom: 32px
    }

    .em-urgent svg {
      flex: none;
      color: #A9895A
    }

    .em-urgent p {
      font-size: 14.5px;
      line-height: 1.55;
      color: #5B5345;
      margin: 0
    }

    .em-urgent strong {
      color: #1E3A30
    }

    /* ---- CTA band ---- */
    .em-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .em-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .em-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .em-cta a {
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

    .em-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .em-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .em-facilities {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .em-h2 {
        font-size: 34px
      }

      .em-hero-h1 {
        font-size: 40px !important
      }
    }

    @media(max-width:560px) {
      .em-feature-grid {
        grid-template-columns: 1fr
      }

      .em-urgent {
        flex-direction: column;
        align-items: flex-start
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'Fast response and placement within hours.',
      'Fully furnished, move-in-ready accommodations with essential amenities.',
      'Locations close to original residences to minimize disruption.',
      '24x7 support for families, individuals, and social service placements.',
      'Compassionate service during stressful transitions.',
  ];

  $features = [
      [
          'title' => 'Rapid placement',
          'desc'  => 'Rapid placement in move-in-ready properties to meet urgent housing needs.',
          'icon'  => 'clock',
      ],
      [
          'title' => 'Comprehensive support',
          'desc'  => 'Assistance through every step, from booking to move-in, ensuring a smooth transition.',
          'icon'  => 'support',
      ],
      [
          'title' => 'Fully furnished - hi spec options',
          'desc'  => 'Fully equipped accommodations designed for comfort during temporary stays.',
          'icon'  => 'sofa',
      ],
      [
          'title' => 'Flexible terms',
          'desc'  => 'Short-term and long-term arrangements tailored to specific circumstances.',
          'icon'  => 'calendar',
      ],
      [
          'title' => 'Close to home',
          'desc'  => 'Options near original residences to minimize disruption for families.',
          'image' => 'house.png',
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
  <section class="em-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}Emergency-91.webp')">
    <div class="em-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        Available 24/7</p>
      <h1 class="em-hero-h1">Emergency &amp; decant accommodation</h1>
      <p style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:600px;margin-top:20px">
        Providing immediate, high-quality housing solutions for those needing urgent relocations due to emergencies
        or property repairs.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="em-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="em-facilities">
      <div class="em-fac-img">
        <img src="{{ $base }}Emergency-new-2.webp" alt="Emergency accommodation interior" loading="lazy">
      </div>
      <div>
        <p class="em-eyebrow">What you get</p>
        <h2 class="em-h2" style="font-size:34px">A place to stay, arranged within hours</h2>
        <ul class="em-checklist">
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
  <section class="em-why">
    <div class="em-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:680px">
        <p class="em-eyebrow">Why choose us</p>
        <h2 class="em-h2">Swift, reliable housing when you need it most</h2>
        <p class="em-p">GRHUM provides swift, reliable housing solutions for urgent relocations and planned decant
          projects. With tailored options, a focus on comfort, and personalized service, we ensure a smooth and
          hassle-free transition when you need it most.</p>
      </div>

      <div class="em-feature-grid">
        @foreach($features as $f)
          <div class="em-feature">
            <span class="em-feature-icon">
              @if(isset($f['image']))
                <img src="{{ $base }}{{ $f['image'] }}" alt="{{ $f['title'] }}">
              @else
                @switch($f['icon'])
                  @case('clock')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="9" />
                      <path d="M12 7v5l3 3" />
                    </svg>
                    @break
                  @case('support')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="3.2" />
                      <path
                        d="M12 3v2.6M12 18.4V21M21 12h-2.6M5.6 12H3M18.1 5.9l-1.8 1.8M7.7 16.3l-1.8 1.8M18.1 18.1l-1.8-1.8M7.7 7.7 5.9 5.9" />
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
                  @case('calendar')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3.5" y="4.5" width="17" height="16" rx="2" />
                      <path d="M3.5 9.5h17M8 3v3M16 3v3" />
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
  <section class="em-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="em-urgent">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 9v4M12 17h.01" />
        <path d="M10.3 3.9 1.9 18.3a1.8 1.8 0 0 0 1.55 2.7h17.1a1.8 1.8 0 0 0 1.55-2.7L13.7 3.9a1.8 1.8 0 0 0-3.4 0z" />
      </svg>
      <p>Need somewhere <strong>today</strong>? Our team can arrange placement within hours — call us directly for the
        fastest response.</p>
    </div>
    <div class="em-cta">
      <h2>Need emergency accommodation right now?</h2>
      <p>Our team is on call around the clock to arrange fast, compassionate housing for families, individuals, and
        social service placements.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection