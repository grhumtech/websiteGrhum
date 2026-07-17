{{-- resources/views/website/partials/header.blade.php --}}


  <style>
    .gh-header {
      position: sticky;
      top: 0;
      z-index: 50;
      background: rgba(246, 241, 232, .88);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid #E5DCCB
    }

    .gh-bar {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px;
      height: 74px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px
    }

    .gh-brand {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 600;
      font-size: 30px;
      letter-spacing: .22em;
      color: #1E3A30;
      padding-left: 4px;
      text-decoration: none
    }

    .gh-nav {
      display: flex;
      align-items: center;
      gap: 30px;
      font-size: 14.5px;
      font-weight: 500;
      color: #4A4338
    }

    .gh-link {
      position: relative;
      color: #4A4338;
      text-decoration: none;
      white-space: nowrap;
      transition: color .18s
    }

    .gh-link:hover {
      color: #1E3A30
    }

    .gh-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 0;
      height: 1.5px;
      background: #A9895A;
      transition: width .2s
    }

    .gh-link:hover::after {
      width: 100%
    }

    /* ---- dropdown ---- */
    .gh-dd {
      position: relative
    }

    .gh-dd-trigger {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      background: none;
      border: 0;
      font: inherit;
      color: #4A4338;
      padding: 0;
      transition: color .18s
    }

    .gh-dd-trigger:hover,
    .gh-dd:hover .gh-dd-trigger {
      color: #1E3A30
    }

    .gh-dd-trigger svg {
      transition: transform .2s
    }

    .gh-dd:hover .gh-dd-trigger svg {
      transform: rotate(180deg)
    }

    .gh-menu {
      position: absolute;
      top: calc(100% + 14px);
      left: 50%;
      transform: translateX(-50%) translateY(6px);
      min-width: 268px;
      background: #FFFDF9;
      border: 1px solid #E5DCCB;
      border-radius: 14px;
      box-shadow: 0 24px 50px -24px rgba(30, 58, 48, .4);
      padding: 8px;
      opacity: 0;
      visibility: hidden;
      transition: opacity .18s, transform .18s;
      display: flex;
      flex-direction: column;
      gap: 2px
    }

    /* hover bridge so the menu doesn't close in the gap */
    .gh-dd::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      height: 18px
    }

    .gh-dd:hover .gh-menu,
    .gh-dd:focus-within .gh-menu {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0)
    }

    .gh-menu a {
      display: block;
      padding: 10px 14px;
      font-size: 14px;
      font-weight: 500;
      color: #4A4338;
      text-decoration: none;
      border-radius: 9px;
      transition: background .16s, color .16s
    }

    .gh-menu a:hover {
      background: #F3ECDD;
      color: #1E3A30
    }

    .gh-actions {
      display: flex;
      align-items: center;
      gap: 18px
    }

    .gh-signin {
      font-size: 14.5px;
      font-weight: 500;
      color: #4A4338;
      text-decoration: none;
      transition: color .18s
    }

    .gh-signin:hover {
      color: #1E3A30
    }

    .gh-cta {
      background: #1E3A30;
      color: #F6F1E8;
      font-size: 14px;
      font-weight: 600;
      padding: 11px 22px;
      border-radius: 999px;
      text-decoration: none;
      white-space: nowrap;
      transition: background .18s
    }

    .gh-cta:hover {
      background: #24463A
    }

    /* ---- mobile ---- */
    .gh-burger {
      display: none;
      background: none;
      border: 0;
      cursor: pointer;
      color: #1E3A30;
      padding: 6px
    }

    .gh-mobile {
      display: none;
      border-top: 1px solid #E5DCCB;
      background: rgba(246, 241, 232, .98);
      backdrop-filter: blur(12px)
    }

    .gh-mobile.open {
      display: block
    }

    .gh-mobile-inner {
      max-width: 1240px;
      margin: 0 auto;
      padding: 14px 24px 26px;
      display: flex;
      flex-direction: column;
      gap: 2px
    }

    .gh-mobile a {
      display: block;
      padding: 12px 8px;
      font-size: 15px;
      font-weight: 500;
      color: #4A4338;
      text-decoration: none;
      border-bottom: 1px solid #EEE6D6
    }

    .gh-mobile a:hover {
      color: #1E3A30
    }

    .gh-mobile .gh-mobile-label {
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: #A9895A;
      padding: 16px 8px 4px;
      border: 0
    }

    .gh-mobile .gh-mobile-sub {
      padding-left: 22px;
      font-size: 14px
    }

    .gh-mobile-actions {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-top: 18px
    }

    @media(max-width:980px) {

      .gh-nav,
      .gh-actions {
        display: none
      }

      .gh-burger {
        display: inline-flex
      }
    }
  </style>

@php
  $solutions = [
      ['label' => 'Corporate travel & relocation', 'url' => url('corporate_travel')],
      ['label' => 'Insurance claims & alternative accommodation', 'url' => url('insurance_claims')],
      ['label' => 'Travel management companies', 'url' => url('travel_management')],
      ['label' => 'Emergency & decant accommodation', 'url' => url('emergency')],
      ['label' => 'Construction & industrial housing', 'url' => url('construction')],
      ['label' => 'Healthcare', 'url' => url('healthcare')],
      ['label' => 'TV & film production', 'url' => url('film_production')],
      ['label' => 'Holiday', 'url' => url('holiday')],
  ];

  $partners = [
      ['label' => 'Suppliers', 'url' => url('suppliers')],
      ['label' => 'Landlords', 'url' => url('landlords')],
      ['label' => 'Property management companies', 'url' => url('property_management_companies')],
      ['label' => 'Real estate agents', 'url' => url('real_estate_agents')],
  ];
@endphp

<header class="gh-header">
  <div class="gh-bar">
    <a href="{{ url('/') }}" class="gh-brand">GRHUM</a>

    <nav class="gh-nav">
      <a href="{{ route('who_we_are') }}" class="gh-link">Who we are</a>
      <a href="{{ route('how_it_works') }}" class="gh-link">How it works</a>

      <div class="gh-dd">
        <button class="gh-dd-trigger" type="button">
          Solutions
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>
        <div class="gh-menu">
          @foreach($solutions as $s)
            <a href="{{ $s['url'] }}">{{ $s['label'] }}</a>
          @endforeach
        </div>
      </div>

      <a href="{{ route('locations') }}" class="gh-link">Locations</a>

      <div class="gh-dd">
        <button class="gh-dd-trigger" type="button">
          Partners
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>
        <div class="gh-menu">
          @foreach($partners as $p)
            <a href="{{ $p['url'] }}">{{ $p['label'] }}</a>
          @endforeach
        </div>
      </div>
    </nav>

    <div class="gh-actions">
      <a href="{{ url('login') }}" class="gh-signin">Sign in</a>
      <a href="{{ url('enquire_now') }}" class="gh-cta">Enquire now</a>
    </div>

    <button class="gh-burger" type="button" aria-label="Menu" onclick="grhumToggleMenu()">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 6h18M3 12h18M3 18h18" />
      </svg>
    </button>
  </div>

  {{-- ---- mobile panel ---- --}}
  <div class="gh-mobile" id="ghMobile">
    <div class="gh-mobile-inner">
      <a href="{{ route('who_we_are') }}">Who we are</a>
      <a href="{{ route('how_it_works') }}">How it works</a>
      <a href="{{ route('locations') }}">Locations</a>

      <span class="gh-mobile-label">Solutions</span>
      @foreach($solutions as $s)
        <a href="{{ $s['url'] }}" class="gh-mobile-sub">{{ $s['label'] }}</a>
      @endforeach

      <span class="gh-mobile-label">Partners</span>
      @foreach($partners as $p)
        <a href="{{ $p['url'] }}" class="gh-mobile-sub">{{ $p['label'] }}</a>
      @endforeach

      <div class="gh-mobile-actions">
        <a href="{{ url('login') }}" class="gh-signin">Sign in</a>
        <a href="{{ url('enquire_now') }}" class="gh-cta">Enquire now</a>
      </div>
    </div>
  </div>
</header>

<script>
  function grhumToggleMenu() {
    document.getElementById('ghMobile').classList.toggle('open');
  }
</script>