@extends('layouts.app')

@section('title', 'Real Estate Agents | GRHUM')

@push('styles')
  <style>
    .re-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px
    }

    .re-eyebrow {
      color: #A9895A;
      font-size: 12.5px;
      font-weight: 700;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 14px
    }

    .re-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 42px;
      line-height: 1.06;
      color: #1E3A30;
      letter-spacing: -.01em;
      margin-bottom: 18px
    }

    .re-p {
      font-size: 16px;
      line-height: 1.65;
      color: #5B5345
    }

    /* ---- hero ---- */
    .re-hero {
      position: relative;
      min-height: 440px;
      display: flex;
      align-items: center;
      background-size: cover;
      background-position: center
    }

    .re-hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: #F6F1E8;
      font-size: 56px;
      line-height: 1.06;
      letter-spacing: -.01em;
      max-width: 760px
    }

    .re-hero-desktop {
      display: block
    }

    .re-hero-mobile {
      display: none
    }

    /* ---- collaborate benefits (image + list) ---- */
    .re-partner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center
    }

    .re-partner-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5)
    }

    .re-partner-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block
    }

    .re-list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .re-list li {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      font-size: 15.5px;
      line-height: 1.55;
      color: #5B5345
    }

    .re-list svg {
      flex: none;
      margin-top: 3px;
      color: #A9895A
    }

    .re-list strong {
      color: #1E3A30;
      font-weight: 600
    }

    /* ---- what we seek ---- */
    .re-seek {
      background: #FBF8F2;
      border-top: 1px solid #EEE6D6;
      border-bottom: 1px solid #EEE6D6
    }

    .re-feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      background: #E5DCCB;
      border: 1px solid #E5DCCB;
      border-radius: 18px;
      overflow: hidden;
      margin-top: 44px
    }

    .re-feature {
      background: #fff;
      padding: 34px 30px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      transition: background .2s
    }

    .re-feature:hover {
      background: #FBF8F2
    }

    .re-feature-icon {
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

    .re-feature h4 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 21px;
      color: #1E3A30;
      margin: 0
    }

    .re-feature p {
      font-size: 14.5px;
      line-height: 1.6;
      color: #6B6353;
      margin: 0
    }

    /* ---- CTA band ---- */
    .re-cta {
      background: #1E3A30;
      border-radius: 22px;
      padding: 64px 48px;
      text-align: center
    }

    .re-cta h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: 40px;
      line-height: 1.08;
      color: #F6F1E8;
      margin-bottom: 14px
    }

    .re-cta p {
      font-size: 16px;
      line-height: 1.65;
      color: rgba(246, 241, 232, .74);
      max-width: 560px;
      margin: 0 auto 28px
    }

    .re-cta a {
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

    .re-cta a:hover {
      background: #E6D4B0
    }

    @media(max-width:1100px) {
      .re-feature-grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media(max-width:900px) {
      .re-partner {
        grid-template-columns: 1fr;
        gap: 32px
      }
    }

    @media(max-width:820px) {
      .re-h2 {
        font-size: 34px
      }

      .re-hero-h1 {
        font-size: 40px !important
      }

      .re-hero-desktop {
        display: none
      }

      .re-hero-mobile {
        display: block
      }
    }

    @media(max-width:560px) {
      .re-feature-grid {
        grid-template-columns: 1fr
      }
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $benefits = [
      ['label' => 'Increased demand', 'text' => 'We work with a diverse client base, including corporate and insurance sectors, to keep your listings consistently in demand.'],
      ['label' => 'Enhanced portfolio', 'text' => 'Expand your offerings by integrating serviced accommodations into your listings, catering to short- and long-term needs.'],
      ['label' => 'Streamlined processes', 'text' => 'Enjoy smooth communication, efficient bookings, and quick turnarounds, reducing the administrative burden on your team.'],
      ['label' => 'Trust & expertise', 'text' => 'Partner with a trusted leader in serviced accommodations, known for reliability and high standards.'],
      ['label' => 'Shared success', 'text' => 'Align with a company that values collaboration, ensuring mutual growth and client satisfaction.'],
  ];

  $seek = [
      [
          'title' => 'Market knowledge',
          'desc'  => 'Estate agents with in-depth understanding of local property markets.',
          'icon'  => 'compass',
      ],
      [
          'title' => 'Commitment to excellence',
          'desc'  => 'Partners dedicated to offering quality properties that align with GRHUM\'s high standards.',
          'icon'  => 'award',
      ],
      [
          'title' => 'Collaboration',
          'desc'  => 'A proactive and cooperative approach to building lasting relationships.',
          'icon'  => 'users',
      ],
      [
          'title' => 'Diverse property listings',
          'desc'  => 'Access to a variety of properties, from city apartments to countryside retreats.',
          'icon'  => 'buildings',
      ],
      [
          'title' => 'Growth-oriented',
          'desc'  => 'A shared vision for expanding opportunities in the serviced accommodation market.',
          'icon'  => 'growth',
      ],
  ];
@endphp

@section('content')

  {{-- ============ PAGE HERO ============ --}}
  <section class="re-hero"
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}Estate-agents-9.webp')">
    <div class="re-wrap" style="width:100%">
      <p
        style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        For estate agents</p>
      <h1 class="re-hero-h1">Real estate agents</h1>
      <p class="re-hero-desktop"
        style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:660px;margin-top:20px">
        Partnering with GRHUM enables estate agents to unlock new revenue opportunities in serviced accommodations —
        from short-lets to corporate housing — while ensuring a seamless client experience.</p>
      <p class="re-hero-mobile"
        style="color:rgba(246,241,232,.82);font-size:16px;line-height:1.6;max-width:660px;margin-top:20px">
        Expand your clientele &amp; revenue with opportunities in insurance, emergency relocations, and corporate
        housing.</p>
    </div>
  </section>

  {{-- ============ WHY COLLABORATE ============ --}}
  <section class="re-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="re-partner">
      <div class="re-partner-img">
        <img src="{{ $base }}real_estate_agents-top.webp" alt="GRHUM estate agent collaboration" loading="lazy">
      </div>
      <div>
        <p class="re-eyebrow">Collaboration</p>
        <h2 class="re-h2" style="font-size:34px">Why collaborate with GRHUM?</h2>
        <ul class="re-list">
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
  <section class="re-seek">
    <div class="re-wrap" style="padding-top:96px;padding-bottom:96px">
      <div style="max-width:720px">
        <p class="re-eyebrow">What we seek</p>
        <h2 class="re-h2">What we look for in a partner</h2>
        <p class="re-p">We collaborate with estate agents who know their market and share our standards. If the following
          describes your agency, let's grow together.</p>
      </div>

      <div class="re-feature-grid">
        @foreach($seek as $s)
          <div class="re-feature">
            <span class="re-feature-icon">
              @switch($s['icon'])
                @case('compass')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9" />
                    <path d="m16 8-2 6-6 2 2-6 6-2z" />
                  </svg>
                  @break
                @case('award')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="6" />
                    <path d="M8.2 13.3 7 22l5-3 5 3-1.2-8.7" />
                  </svg>
                  @break
                @case('users')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="8" r="3.2" />
                    <path d="M2.5 20a6.5 6.5 0 0 1 13 0" />
                    <path d="M16 5.3a3.2 3.2 0 0 1 0 5.4" />
                    <path d="M17.5 20a6.5 6.5 0 0 0-3-5.5" />
                  </svg>
                  @break
                @case('buildings')
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="8" width="8" height="13" rx="1" />
                    <rect x="13" y="3" width="8" height="18" rx="1" />
                    <path d="M6 12h2M6 16h2M16 7h2M16 11h2M16 15h2" />
                  </svg>
                  @break
                @case('growth')
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
  <section class="re-wrap" style="padding-top:96px;padding-bottom:104px">
    <div class="re-cta">
      <h2>Unlock new revenue with GRHUM</h2>
      <p>Add serviced accommodation to your offering and tap into consistent demand from corporate, insurance, and
        relocation clients — with a seamless experience for you and your clients.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection