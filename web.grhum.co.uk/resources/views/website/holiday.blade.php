@extends('layouts.app')

@section('title', 'Holiday Accommodation | GRHUM')

@push('styles')
  <style>
    .ho-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .ho-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .ho-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .ho-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .ho-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center 65%
    }

    .ho-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    .ho-hero-desktop {
      display: block
    }

    .ho-hero-mobile {
      display: none
    }

    /* ---- facilities (image + checklist) ---- */
    .ho-facilities {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .ho-fac-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .ho-fac-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .ho-checklist {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 18px
    }

    .ho-checklist li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 16px;
      line-height: 1.55;
      color: #2A2620
    }

    .ho-checklist svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    /* ---- why choose us ---- */
    .ho-why {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .ho-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .ho-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .ho-feature:hover {
      background: #FBF8F2
    }

    .ho-feature-icon {
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

    .ho-feature-icon img {
      width: 26px;
      height: 26px;
      object-fit: contain;
      filter: brightness(0) invert(1);
      opacity: .9
    }

    .ho-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .ho-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .ho-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .ho-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .ho-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .ho-cta a {
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

    .ho-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .ho-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .ho-facilities {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .ho-h2 {
        font-size: 34px
      }

      .ho-hero-h1 {
        font-size: 40px !important
      }

      .ho-hero-desktop {
        display: none
      }

      .ho-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .ho-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'A wide range of properties in top UK holiday destinations — city centres, countryside retreats, and coastal getaways.',
      'Fully furnished spaces with separate living, dining, and sleeping areas.',
      'Equipped kitchens for home-cooked meals, ensuring flexibility and convenience.',
      'Pet-friendly and family-friendly options available.',
      'Personalized support and seamless booking for a stress-free holiday experience.',
  ];

  $features = [
      [
          'title' => 'Prime destinations',
          'desc'  => 'Accommodations in top UK holiday locations, including city centres, coastal towns, and countryside retreats.',
          'icon'  => 'pin',
      ],
      [
          'title' => 'Family & pet-friendly options',
          'desc'  => 'Properties designed for families and travellers with pets.',
          'icon'  => 'paw',
      ],
      [
          'title' => 'Flexibility',
          'desc'  => 'Short- and long-term holiday stays to suit any itinerary.',
          'icon'  => 'flex',
      ],
      [
          'title' => 'Fully equipped spaces',
          'desc'  => 'Enjoy the comforts of home, including kitchens, living areas, and modern amenities.',
          'icon'  => 'sofa',
      ],
      [
          'title' => 'Personalized support',
          'desc'  => '24/7 assistance to ensure a stress-free and enjoyable holiday experience.',
          'icon'  => 'support',
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
  <section class="ho-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}Holiday-9.webp')">
    <div class="ho-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For families, couples &amp; solo travellers</p>
      <h1 class="ho-hero-h1">Holiday accommodation</h1>
      <p class="ho-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:620px;margin-top:20px">
        Relax in fully serviced holiday accommodations across the UK, designed for families, couples, and solo
        travellers. Pet-friendly options welcome your furry friends too!</p>
      <p class="ho-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:620px;margin-top:20px">
        Relax in fully serviced holiday accommodations across the UK.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="ho-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="ho-facilities">
      <div class="ho-fac-img">
        <img src="{{ $base }}Holiday-new-2.webp" alt="Holiday accommodation interior" loading="lazy">
      </div>
      <div>
        <p class="ho-eyebrow">What you get</p>
        <h2 class="ho-h2" style="font-size:34px">Your home away from home</h2>
        <ul class="ho-checklist">
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
  <section class="ho-why">
    <div class="ho-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:680px">
        <p class="ho-eyebrow">Why choose us</p>
        <h2 class="ho-h2">A seamless stay, so you can just relax</h2>
        <p class="ho-p">GRHUM offers tailored, high-quality accommodations for a stress-free holiday. From cozy retreats
          to spacious family homes, our flexible options and personalized service ensure a seamless stay, letting you
          relax and enjoy your getaway.</p>
      </div>

      <div class="ho-feature-grid">
        @foreach($features as $f)
          <div class="ho-feature">
            <span class="ho-feature-icon">
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
                  @case('paw')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                      <circle cx="5.5" cy="12.5" r="1.7" />
                      <circle cx="9.3" cy="8" r="1.7" />
                      <circle cx="14.7" cy="8" r="1.7" />
                      <circle cx="18.5" cy="12.5" r="1.7" />
                      <path d="M12 12.6c-2.7 0-4.8 2.1-4.8 4.3 0 1.6 1.3 2.6 2.9 2.6.9 0 1.3-.3 1.9-.3s1 .3 1.9.3c1.6 0 2.9-1 2.9-2.6 0-2.2-2.1-4.3-4.8-4.3z" />
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
                  @case('sofa')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12V8a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4" />
                      <path d="M3 12h18v5a1 1 0 0 1-1 1h-1v2h-2v-2H7v2H5v-2H4a1 1 0 0 1-1-1v-5z" />
                      <path d="M6 12v-2M18 12v-2" />
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
  <section class="ho-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="ho-cta">
      <h2>Ready to plan your getaway?</h2>
      <p>Tell us your dates and destination — we'll arrange a fully serviced, family- and pet-friendly stay so you can
        just show up and relax.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection