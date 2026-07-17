@extends('layouts.app')

@section('title', 'TV & Film Production | GRHUM')

@push('styles')
  <style>
    .em-wrap { max-width: 1240px; margin: 0 auto; padding: 0 32px }
    .em-eyebrow { color: #A9895A; font-size: 12.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; margin-bottom: 14px }
    .em-h2 { font-family: 'Cormorant Garamond', serif; font-weight: 500; font-size: 42px; line-height: 1.06; color: #1E3A30; letter-spacing: -.01em; margin-bottom: 18px }
    .em-p { font-size: 16px; line-height: 1.65; color: #5B5345 }

    .em-hero { position: relative; min-height: 440px; display: flex; align-items: center; background-size: cover; background-position: center }
    .em-hero-h1 { font-family: 'Cormorant Garamond', serif; font-weight: 500; color: #F6F1E8; font-size: 56px; line-height: 1.06; letter-spacing: -.01em; max-width: 760px }

    .em-facilities { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center }
    .em-fac-img { border-radius: 20px; overflow: hidden; box-shadow: 0 24px 60px -34px rgba(30, 58, 48, .5) }
    .em-fac-img img { width: 100%; height: 100%; object-fit: cover; display: block }

    .em-checklist { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 18px }
    .em-checklist li { display: flex; align-items: flex-start; gap: 14px; font-size: 16px; line-height: 1.55; color: #2A2620 }
    .em-checklist svg { flex: none; margin-top: 3px; color: #A9895A }

    .em-why { background: #FBF8F2; border-top: 1px solid #EEE6D6; border-bottom: 1px solid #EEE6D6 }
    .em-feature-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2px; background: #E5DCCB; border: 1px solid #E5DCCB; border-radius: 18px; overflow: hidden; margin-top: 44px }
    .em-feature { background: #fff; padding: 34px 30px; display: flex; flex-direction: column; gap: 16px; transition: background .2s }
    .em-feature:hover { background: #FBF8F2 }
    .em-feature-icon { width: 52px; height: 52px; border-radius: 14px; background: #1E3A30; display: flex; align-items: center; justify-content: center; color: #D9C39A; flex: none }
    .em-feature-icon img { width: 26px; height: 26px; object-fit: contain; filter: brightness(0) invert(1); opacity: .9 }
    .em-feature h4 { font-family: 'Cormorant Garamond', serif; font-weight: 600; font-size: 21px; color: #1E3A30; margin: 0 }
    .em-feature p { font-size: 14.5px; line-height: 1.6; color: #6B6353; margin: 0 }

    .em-cta { background: #1E3A30; border-radius: 22px; padding: 64px 48px; text-align: center }
    .em-cta h2 { font-family: 'Cormorant Garamond', serif; font-weight: 500; font-size: 40px; line-height: 1.08; color: #F6F1E8; margin-bottom: 14px }
    .em-cta p { font-size: 16px; line-height: 1.65; color: rgba(246, 241, 232, .74); max-width: 560px; margin: 0 auto 28px }
    .em-cta a { display: inline-block; padding: 14px 34px; font-size: 14px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; color: #1E3A30; background: #D9C39A; border-radius: 11px; text-decoration: none; transition: background .2s }
    .em-cta a:hover { background: #E6D4B0 }

    @media(max-width:1100px) { .em-feature-grid { grid-template-columns: repeat(2, 1fr) } }
    @media(max-width:900px) { .em-facilities { grid-template-columns: 1fr; gap: 32px } }
    @media(max-width:820px) { .em-h2 { font-size: 34px } .em-hero-h1 { font-size: 40px !important } }
    @media(max-width:560px) { .em-feature-grid { grid-template-columns: 1fr } }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  $checklist = [
      'Properties near popular filming locations across the UK.',
      'Dedicated account management for seamless coordination.',
      'Flexible housing options for short shoots or long-term productions.',
      'Spacious accommodations for cast, crew, and equipment storage.',
      'Tailored support to match production schedules and site-specific needs.',
      'On-demand housekeeping services for added convenience.',
      'Seamless booking and on-demand adjustments for last-minute changes.',
  ];

  $features = [
      [
          'title' => 'On-location housing',
          'desc'  => 'Properties near filming sites to minimize travel time for cast and crew.',
          'image' => 'house.png',
      ],
      [
          'title' => 'Flexible arrangements',
          'desc'  => 'Accommodations tailored to production schedules, from short shoots to extended projects.',
          'icon'  => 'refresh',
      ],
      [
          'title' => 'Spacious & practical',
          'desc'  => 'Ample living spaces with additional storage for equipment or wardrobe needs.',
          'icon'  => 'expand',
      ],
      [
          'title' => 'Industry expertise',
          'desc'  => 'Experience in working with production teams, ensuring seamless operations.',
          'icon'  => 'badge',
      ],
      [
          'title' => 'Personalized assistance',
          'desc'  => 'Dedicated account managers to handle last-minute changes or unique requirements.',
          'icon'  => 'headset',
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
    style="background-image:linear-gradient(180deg,rgba(20,33,27,.5),rgba(20,33,27,.72)),url('{{ $base }}people-working-9.webp')">
    <div class="em-wrap" style="width:100%">
      <p style="color:#D9C39A;font-size:13px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;margin-bottom:18px">
        Production housing</p>
      <h1 class="em-hero-h1">TV &amp; film production</h1>
      <p style="color:rgba(246,241,232,.82);font-size:17px;line-height:1.6;max-width:600px;margin-top:20px">
        On-location housing designed for production crews, offering flexible stays and accommodations close to
        filming sites.</p>
    </div>
  </section>

  {{-- ============ FACILITIES ============ --}}
  <section class="em-wrap" style="padding-top:96px;padding-bottom:96px">
    <div class="em-facilities">
      <div class="em-fac-img">
        <img src="{{ $base }}Film-production-new-1.webp" alt="Film production accommodation interior" loading="lazy">
      </div>
      <div>
        <p class="em-eyebrow">What you get</p>
        <h2 class="em-h2" style="font-size:34px">Housing built around your shoot schedule</h2>
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
        <h2 class="em-h2">Reliable housing that keeps production on schedule</h2>
        <p class="em-p">GRHUM offers flexible, high-quality housing tailored to TV and film production teams. From
          short-term stays to extended arrangements, we ensure comfort, reliability, and personalized service,
          allowing you to focus on bringing your vision to life.</p>
      </div>

      <div class="em-feature-grid">
        @foreach($features as $f)
          <div class="em-feature">
            <span class="em-feature-icon">
              @if(isset($f['image']))
                <img src="{{ $base }}{{ $f['image'] }}" alt="{{ $f['title'] }}">
              @else
                @switch($f['icon'])
                  @case('refresh')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3.5 12a8.5 8.5 0 0 1 14.5-6M20.5 12a8.5 8.5 0 0 1-14.5 6" />
                      <path d="M18 3v3.5h-3.5M6 21v-3.5h3.5" />
                    </svg>
                    @break
                  @case('expand')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 4H4v5M15 4h5v5M9 20H4v-5M15 20h5v-5" />
                    </svg>
                    @break
                  @case('badge')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 3.5 6 6v6c0 4 2.6 6.7 6 8.5 3.4-1.8 6-4.5 6-8.5V6l-6-2.5Z" />
                      <path d="m9.3 12.2 1.8 1.8 3.6-3.6" />
                    </svg>
                    @break
                  @case('headset')
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M4 13v-1a8 8 0 0 1 16 0v1" />
                      <rect x="3" y="13" width="4" height="6" rx="1.2" />
                      <rect x="17" y="13" width="4" height="6" rx="1.2" />
                      <path d="M19 19v.5a3 3 0 0 1-3 3h-3" />
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
    <div class="em-cta">
      <h2>Housing your next production</h2>
      <p>Tell us your shoot dates and locations, and our team will arrange housing that fits your schedule and
        crew size.</p>
      <a href="{{ url('contact') }}">Get in touch</a>
    </div>
  </section>

@endsection