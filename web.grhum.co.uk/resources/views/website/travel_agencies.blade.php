@extends('layouts.app')

@section('title', 'Travel Management Companies | GRHUM')

@push('styles')
  <style>
    .tm-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .tm-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .tm-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .tm-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .tm-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .tm-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    /* ---- facilities (image + checklist) ---- */
    .tm-facilities {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .tm-fac-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .tm-fac-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .tm-checklist {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 18px
    }

    .tm-checklist li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 16px;
      line-height: 1.55;
      color: #2A2620
    }

    .tm-checklist svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    /* ---- why choose us ---- */
    .tm-why {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .tm-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .tm-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .tm-feature:hover {
      background: #FBF8F2
    }

    .tm-feature-icon {
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

    .tm-feature-icon img {
      width: 26px;
      height: 26px;
      object-fit: contain;
      filter: brightness(0) invert(1);
      opacity: .9
    }

    .tm-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .tm-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .tm-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .tm-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .tm-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .tm-cta a {
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

    .tm-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .tm-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .tm-facilities {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .tm-h2 {
        font-size: 34px
      }

      .tm-hero-h1 {
        font-size: 40px !important
      }
    }

    @media(max-width:560px) {
      .tm-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'Customizable housing options for corporate and leisure clients.',
      'Transparent pricing with flexible booking terms.',
      'Access to an extensive property portfolio across the UK.',
      'Dedicated account management for seamless coordination.',
      'On-demand housekeeping services for added convenience.',
      'High-spec, fully furnished properties designed to deliver a premium experience for your clients.',
  ];

  $features = [
      [
          'title' => 'High-quality properties',
          'desc'  => 'Premium, fully furnished accommodations tailored for corporate and leisure travellers.',
          'icon'  => 'building',
      ],
      [
          'title' => 'Flexible bookings',
          'desc'  => 'Adaptable terms to suit short- and long-term client needs.',
          'icon'  => 'calendar',
      ],
      [
          'title' => 'Seamless integration',
          'desc'  => 'Dedicated account management for smooth coordination and client satisfaction.',
          'icon'  => 'sync',
      ],
      [
          'title' => 'Nationwide reach',
          'desc'  => 'Access to properties in major cities and key travel destinations across the UK.',
          'image' => 'uk.png',
      ],
      [
          'title' => 'Reliable partnerships',
          'desc'  => 'Trusted network ensuring consistent quality and availability.',
          'icon'  => 'shield',
      ],
      [
          'title' => 'Cost efficiency',
          'desc'  => 'Competitive pricing structures and exclusive deals to optimize budgets without compromising on quality.',
          'icon'  => 'coin',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="tm-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}Travel-Management-9.webp')">
    <div class="tm-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For travel partners</p>
      <h1 class="tm-hero-h1">Travel management companies</h1>
      <p style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:600px;margin-top:20px">
        Partnering with travel management firms to deliver high-quality, flexible accommodations tailored to your
        clients' needs.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="tm-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="tm-facilities">
      <div class="tm-fac-img">
        <img src="{{ $base }}benjamin-davies--12.webp" alt="GRHUM serviced accommodation" loading="lazy">
      </div>
      <div>
        <p class="tm-eyebrow">What you get</p>
        <h2 class="tm-h2" style="font-size:34px">Built for how travel programs actually work</h2>
        <ul class="tm-checklist">
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
  <section class="tm-why">
    <div class="tm-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:680px">
        <p class="tm-eyebrow">Why choose us</p>
        <h2 class="tm-h2">Reliable accommodation, simplified for your team</h2>
        <p class="tm-p">GRHUM provides travel management companies with reliable, tailored accommodation solutions.
          From short-term stays to extended arrangements, we ensure seamless service, personalized support, and
          exceptional client experiences, simplifying the accommodation process.</p>
      </div>

      <div class="tm-feature-grid">
        @foreach($features as $f)
          <div class="tm-feature">
            <span class="tm-feature-icon">
              @if(isset($f['image']))
                <img src="{{ $base }}{{ $f['image'] }}" alt="{{ $f['title'] }}">
              @else
                @switch($f['icon'])
                  @case('building')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="4" y="3" width="16" height="18" rx="1" />
                      <path d="M9 8h1M14 8h1M9 12h1M14 12h1M9 16h1M14 16h1" />
                    </svg>
                    @break
                  @case('calendar')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3.5" y="4.5" width="17" height="16" rx="2" />
                      <path d="M3.5 9.5h17M8 3v3M16 3v3" />
                    </svg>
                    @break
                  @case('sync')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M4 12a8 8 0 0 1 13.66-5.66L20 8" />
                      <path d="M20 12a8 8 0 0 1-13.66 5.66L4 16" />
                      <path d="M20 4v4h-4M4 20v-4h4" />
                    </svg>
                    @break
                  @case('shield')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 3l7 3v6c0 4.5-3 8-7 9-4-1-7-4.5-7-9V6l7-3z" />
                      <path d="M9 12l2 2 4-4" />
                    </svg>
                    @break
                  @case('coin')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="9" />
                      <path d="M9.5 15.5c0 1 1 1.5 2.5 1.5s2.5-.6 2.5-1.7c0-2.3-5-1-5-3.3 0-1.1 1-1.7 2.5-1.7s2.5.5 2.5 1.5M12 7.5v1.3M12 15.2v1.3" />
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
  <section class="tm-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="tm-cta">
      <h2>Ready to simplify accommodation for your clients?</h2>
      <p>Talk to our team about setting up a dedicated program for your travel management company, with flexible
        terms and nationwide coverage.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection