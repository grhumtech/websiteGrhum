@extends('layouts.app')

@section('title', 'Premium serviced accommodation - GRHUM')

@php
    $cities = ['London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool', 'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast', 'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham', 'Reading', 'Aberdeen', 'Dundee', 'Dublin', 'Cork', 'Coventry', 'Bournemouth'];

    $pathways = [
        ['k' => 'Business', 't' => 'Corporate travel', 'd' => 'Premium serviced homes for business guests, leadership teams and project groups.', 'img' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=720&fit=crop&q=76&auto=format'],
        ['k' => 'Relocation', 't' => 'Settling-in stays', 'd' => 'Comfortable interim homes while guests move city, role or country.', 'img' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=720&fit=crop&q=76&auto=format'],
        ['k' => 'Urgent', 't' => 'Insurance housing', 'd' => 'Fast, calm accommodation support when guests need a safe alternative quickly.', 'img' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=720&fit=crop&q=76&auto=format'],
    ];

    $reasons = [
        ['n' => '01', 't' => 'Brief-led matching', 'd' => 'Every stay is shaped around location, dates, guest profile and practical needs.'],
        ['n' => '02', 't' => 'All-inclusive ease', 'd' => 'Fully furnished living with utilities, Wi-Fi and essential comforts arranged.'],
        ['n' => '03', 't' => 'Fast response', 'd' => 'Short-notice and urgent accommodation options can be sourced quickly.'],
        ['n' => '04', 't' => 'Guest support', 'd' => 'A human team stays available before arrival, during the stay and through changes.'],
    ];

    $stats = [
        ['v' => '60+', 'l' => 'locations'],
        ['v' => '48hr', 'l' => 'rapid options'],
        ['v' => '24/7', 'l' => 'support'],
        ['v' => '4.8', 'l' => 'rating'],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --ink: #202521;
            --leaf: #6e987e;
            --leaf-soft: #dbe9df;
            --sky: #d9edf2;
            --peach: #f2d1c7;
            --butter: #f4dda0;
            --ivory: #fffaf1;
            --paper: #fffdf8;
            --stone: #f1ece3;
            --muted: #73776f;
            --line: rgba(32, 37, 33, .12);
            --shadow: 0 24px 70px rgba(64, 76, 67, .14);
            --strong-shadow: 0 34px 95px rgba(64, 76, 67, .2);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--stone);
            color: var(--ink);
            font-family: "Inter", system-ui, sans-serif;
        }

        .atlas-page {
            background:
                radial-gradient(circle at 18% 8%, rgba(242, 209, 199, .72), transparent 26rem),
                radial-gradient(circle at 84% 14%, rgba(217, 237, 242, .86), transparent 28rem),
                radial-gradient(circle at 50% 35%, rgba(244, 221, 160, .38), transparent 24rem),
                linear-gradient(180deg, #fffaf1, #f7f2e9 48%, #eef7f0);
            overflow: hidden;
        }

        .wrap {
            margin-inline: auto;
            width: min(1200px, calc(100% - 48px));
        }

        .display {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-weight: 700;
            letter-spacing: -.035em;
        }

        .eyebrow {
            color: #a76c5f;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .18em;
            margin: 0 0 12px;
            text-transform: uppercase;
        }

        .btn {
            align-items: center;
            border: 0;
            border-radius: 999px;
            cursor: pointer;
            display: inline-flex;
            font-size: 14px;
            font-weight: 800;
            justify-content: center;
            min-height: 48px;
            padding: 0 24px;
            text-decoration: none;
            transition: transform .22s var(--ease), box-shadow .22s var(--ease), background .22s var(--ease);
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f3d986, #d8ab58);
            box-shadow: 0 16px 34px rgba(216, 171, 88, .28);
            color: #241b0e;
        }

        .btn-soft {
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .9);
            color: var(--ink);
        }

        .btn:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .topbar {
            align-items: center;
            background: rgba(255, 250, 241, .84);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            left: 0;
            padding: 12px 28px;
            position: fixed;
            right: 0;
            top: 0;
            transform: translateY(-100%);
            transition: transform .32s var(--ease);
            z-index: 70;
        }

        .topbar.visible { transform: translateY(0); }

        .brand {
            color: var(--leaf);
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: 32px;
            font-weight: 700;
        }

        .hero {
            padding: 86px 0 30px;
            text-align: center;
        }

        .hero h1 {
            font-size: clamp(56px, 8vw, 112px);
            line-height: .86;
            margin: 0 auto;
            max-width: 980px;
        }

        .hero h1 span {
            color: var(--leaf);
            font-style: italic;
        }

        .hero-copy {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.7;
            margin: 24px auto 0;
            max-width: 680px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-top: 28px;
        }

        .hero-medallions {
            align-items: center;
            display: grid;
            gap: 18px;
            grid-template-columns: .72fr 1fr .72fr;
            margin-top: 38px;
        }

        .medallion {
            background: var(--paper);
            border: 8px solid rgba(255, 255, 255, .76);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .medallion img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .7s var(--ease);
            width: 100%;
        }

        .medallion:hover img { transform: scale(1.07); }

        .medallion.side {
            aspect-ratio: 1;
            border-radius: 999px;
            transform: translateY(30px);
        }

        .medallion.main {
            aspect-ratio: 1.78;
            border-radius: 46px;
        }

        .hero-note {
            background: rgba(255, 250, 241, .9);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 26px;
            bottom: 20px;
            box-shadow: var(--shadow);
            left: 50%;
            max-width: 360px;
            padding: 18px 20px;
            position: absolute;
            text-align: left;
            transform: translateX(-50%);
        }

        .hero-note b {
            display: block;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .hero-note small {
            color: var(--muted);
            display: block;
            font-size: 12px;
            line-height: 1.55;
        }

        .search-dock {
            margin-top: 26px;
        }

        .search-panel {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: 34px;
            box-shadow: var(--shadow);
            padding: 12px;
        }

        .search-grid {
            display: grid;
            gap: 8px;
            grid-template-columns: 1.35fr 1fr 1fr 1.12fr auto;
        }

        .field {
            background: rgba(255, 250, 241, .78);
            border: 1px solid transparent;
            border-radius: 24px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-height: 68px;
            padding: 13px 15px;
            text-align: left;
            transition: background .2s var(--ease), border-color .2s var(--ease), transform .2s var(--ease);
            width: 100%;
        }

        .field:hover,
        .field:focus-within {
            background: var(--paper);
            border-color: var(--line);
            transform: translateY(-1px);
        }

        .field-label {
            color: #a76c5f;
            font-size: 10.5px;
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .field select,
        .field input {
            appearance: none;
            background: transparent;
            border: 0;
            color: var(--ink);
            font: 800 14px/1.2 "Inter", sans-serif;
            outline: 0;
            width: 100%;
        }

        .field-value {
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
        }

        .guest-wrap { position: relative; }

        .guest-panel {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: var(--shadow);
            display: none;
            opacity: 0;
            padding: 10px;
            position: absolute;
            right: 0;
            top: calc(100% + 12px);
            transform: translateY(-8px);
            transition: opacity .18s var(--ease), transform .18s var(--ease);
            width: 320px;
            z-index: 30;
        }

        .guest-panel.is-open { display: block; }
        .guest-panel.is-visible { opacity: 1; transform: translateY(0); }

        .guest-row {
            align-items: center;
            display: flex;
            justify-content: space-between;
            padding: 12px;
        }

        .guest-row strong { display: block; font-size: 15px; }
        .guest-row small { color: var(--muted); display: block; font-size: 12px; margin-top: 3px; }

        .stepper {
            align-items: center;
            display: flex;
            gap: 12px;
        }

        .stepper button {
            background: #f5f0e7;
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--leaf);
            cursor: pointer;
            font-size: 18px;
            font-weight: 900;
            height: 34px;
            line-height: 1;
            width: 34px;
        }

        .stepper span { font-weight: 900; min-width: 18px; text-align: center; }
        .search-grid .btn { min-height: 68px; }

        .stats-band {
            padding: 56px 0 22px;
        }

        .stats-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .stat-card {
            background: rgba(255, 255, 255, .62);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 32px;
            box-shadow: 0 14px 42px rgba(64, 76, 67, .08);
            padding: 24px;
            text-align: center;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .stat-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .stat-card strong {
            color: var(--leaf);
            display: block;
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: 48px;
            line-height: .9;
        }

        .stat-card span {
            color: var(--muted);
            display: block;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .1em;
            margin-top: 10px;
            text-transform: uppercase;
        }

        .section {
            padding: 74px 0;
        }

        .section-head {
            align-items: end;
            display: flex;
            gap: 24px;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .section-head h2 {
            font-size: clamp(38px, 4.6vw, 66px);
            line-height: .98;
            margin: 0;
            max-width: 780px;
        }

        .pathway-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .pathway-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 38px;
            box-shadow: 0 14px 42px rgba(64, 76, 67, .08);
            color: inherit;
            overflow: hidden;
            padding: 12px;
            text-decoration: none;
            transition: transform .3s var(--ease), box-shadow .3s var(--ease);
        }

        .pathway-card:nth-child(2) {
            transform: translateY(30px);
        }

        .pathway-card:hover {
            box-shadow: var(--strong-shadow);
            transform: translateY(-8px);
        }

        .pathway-card:nth-child(2):hover {
            transform: translateY(18px);
        }

        .pathway-image {
            aspect-ratio: 1.22;
            border-radius: 30px;
            overflow: hidden;
        }

        .pathway-card img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .6s var(--ease);
            width: 100%;
        }

        .pathway-card:hover img { transform: scale(1.06); }

        .pathway-body {
            padding: 22px 12px 10px;
        }

        .pill {
            background: var(--peach);
            border-radius: 999px;
            color: #8e5d52;
            display: inline-flex;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .1em;
            margin-bottom: 12px;
            padding: 7px 10px;
            text-transform: uppercase;
        }

        .pathway-card h3 {
            font-size: 27px;
            margin: 0 0 8px;
        }

        .pathway-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .reason-band {
            background: linear-gradient(135deg, rgba(219, 233, 223, .76), rgba(217, 237, 242, .72), rgba(242, 209, 199, .62));
            padding: 78px 0;
        }

        .reason-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .reason-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .88);
            border-radius: 34px;
            min-height: 226px;
            padding: 26px;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease), background .28s var(--ease);
        }

        .reason-card:hover {
            background: var(--paper);
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .reason-card b {
            color: var(--leaf);
            display: block;
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: 42px;
            line-height: .9;
            margin-bottom: 22px;
        }

        .reason-card h3 {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .reason-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.62;
            margin: 0;
        }

        .locations {
            padding: 74px 0;
        }

        .location-scroll {
            display: flex;
            gap: 14px;
            overflow-x: auto;
            padding-bottom: 16px;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
        }

        .location-scroll::-webkit-scrollbar { display: none; }

        .location-card {
            align-items: flex-end;
            background: var(--leaf-soft);
            border: 7px solid rgba(255, 255, 255, .74);
            border-radius: 40px;
            color: var(--paper);
            display: flex;
            flex: 0 0 300px;
            height: 286px;
            overflow: hidden;
            position: relative;
            scroll-snap-align: start;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .location-card:nth-child(3n+1) {
            flex-basis: 380px;
        }

        .location-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-6px);
        }

        .location-card img {
            height: 100%;
            inset: 0;
            object-fit: cover;
            position: absolute;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .location-card:hover img { transform: scale(1.07); }

        .location-card::after {
            background: linear-gradient(180deg, transparent 32%, rgba(32, 37, 33, .72));
            content: "";
            inset: 0;
            position: absolute;
        }

        .location-card span {
            font-size: 22px;
            font-weight: 900;
            padding: 22px;
            position: relative;
            z-index: 1;
        }

        .cta {
            padding: 10px 0 84px;
        }

        .cta-panel {
            align-items: center;
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 46px;
            box-shadow: var(--shadow);
            display: grid;
            gap: 24px;
            grid-template-columns: minmax(0, 1fr) auto;
            overflow: hidden;
            padding: 48px;
            position: relative;
        }

        .cta-panel::before {
            background:
                radial-gradient(circle at 88% 12%, rgba(244, 221, 160, .42), transparent 22rem),
                radial-gradient(circle at 8% 90%, rgba(110, 152, 126, .18), transparent 22rem);
            content: "";
            inset: 0;
            position: absolute;
        }

        .cta-panel > * {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-size: clamp(40px, 5vw, 74px);
            line-height: .96;
            margin: 0 0 12px;
            max-width: 840px;
        }

        .cta p {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.65;
            margin: 0;
            max-width: 620px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .64s var(--ease), transform .64s var(--ease);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        #toast {
            background: var(--ink);
            border-radius: 999px;
            bottom: 28px;
            box-shadow: var(--shadow);
            color: var(--paper);
            font-size: 14px;
            font-weight: 800;
            left: 50%;
            opacity: 0;
            padding: 12px 22px;
            pointer-events: none;
            position: fixed;
            transform: translateX(-50%) translateY(20px);
            transition: opacity .25s var(--ease), transform .25s var(--ease);
            z-index: 99;
        }

        #toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        a:focus-visible,
        button:focus-visible,
        select:focus-visible,
        input:focus-visible {
            outline: 3px solid rgba(110, 152, 126, .72);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .search-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .search-grid .btn {
                grid-column: 1 / -1;
            }

            .stats-grid,
            .reason-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .pathway-grid,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .pathway-card:nth-child(2) {
                transform: none;
            }

            .pathway-card:nth-child(2):hover {
                transform: translateY(-8px);
            }
        }

        @media (max-width: 760px) {
            .wrap {
                width: min(100% - 32px, 1200px);
            }

            .hero {
                padding-top: 76px;
            }

            .hero h1 {
                font-size: 46px;
            }

            .hero-medallions,
            .search-grid,
            .stats-grid,
            .reason-grid {
                grid-template-columns: 1fr;
            }

            .medallion.side {
                display: none;
            }

            .medallion.main {
                aspect-ratio: 1.15;
                border-radius: 34px;
            }

            .section,
            .reason-band,
            .locations {
                padding: 62px 0;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .location-card,
            .location-card:nth-child(3n+1) {
                flex-basis: 82vw;
                height: 276px;
            }

            .cta-panel {
                padding: 30px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="atlas-page">
        <div id="topbar" class="topbar" role="banner" aria-label="Quick enquiry">
            <span class="brand">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="wrap">
                <p class="eyebrow reveal">Premium serviced accommodation</p>
                <h1 class="display reveal">A more beautiful way to <span>place every guest</span>.</h1>
                <p class="hero-copy reveal">
                    GRHUM arranges fully furnished serviced homes for corporate, relocation, insurance and project stays across the UK and Ireland.
                </p>
                <div class="hero-actions reveal">
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Find your stay</a>
                    <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-soft">WhatsApp us</a>
                </div>

                <div class="hero-medallions reveal">
                    <div class="medallion side">
                        <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=700&h=700&fit=crop&q=76&auto=format" alt="Premium serviced apartment lounge">
                    </div>
                    <div class="medallion main">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=1200&h=760&fit=crop&q=78&auto=format" alt="Premium serviced accommodation living space">
                        <div class="hero-note">
                            <b>Private homes with concierge-style support.</b>
                            <small>All-inclusive options, flexible terms and support from enquiry to arrival.</small>
                        </div>
                    </div>
                    <div class="medallion side">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&h=700&fit=crop&q=76&auto=format" alt="Premium bedroom">
                    </div>
                </div>
            </div>

            <div class="wrap search-dock">
                <div class="search-panel reveal">
                    <div class="search-grid">
                        <label class="field">
                            <span class="field-label">Location</span>
                            <select id="searchLocation" aria-label="Choose location">
                                <option value="">Where to?</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="field">
                            <span class="field-label">Check in</span>
                            <input type="date" id="searchCheckIn" aria-label="Check in date">
                        </label>

                        <label class="field">
                            <span class="field-label">Check out</span>
                            <input type="date" id="searchCheckOut" aria-label="Check out date">
                        </label>

                        <div class="guest-wrap">
                            <button type="button" id="guestToggle" class="field" aria-expanded="false" aria-controls="guestPanel" aria-haspopup="dialog">
                                <span class="field-label">Guests</span>
                                <span id="guestSummary" class="field-value">2 adults</span>
                            </button>

                            <div id="guestPanel" class="guest-panel" role="dialog" aria-label="Select guests">
                                @php
                                    $guestRows = [
                                        ['key' => 'adults', 'label' => 'Adults', 'hint' => 'Ages 13+', 'value' => 2],
                                        ['key' => 'children', 'label' => 'Children', 'hint' => 'Ages 2 to 12', 'value' => 0],
                                        ['key' => 'infants', 'label' => 'Infants', 'hint' => 'Under 2', 'value' => 0],
                                        ['key' => 'pets', 'label' => 'Pets', 'hint' => 'Where permitted', 'value' => 0],
                                    ];
                                @endphp

                                @foreach($guestRows as $row)
                                    <div class="guest-row">
                                        <div>
                                            <strong>{{ $row['label'] }}</strong>
                                            <small>{{ $row['hint'] }}</small>
                                        </div>
                                        <div class="stepper">
                                            <button type="button" data-guest-btn data-key="{{ $row['key'] }}" data-delta="-1" aria-label="Remove {{ strtolower($row['label']) }}">-</button>
                                            <span data-count="{{ $row['key'] }}">{{ $row['value'] }}</span>
                                            <button type="button" data-guest-btn data-key="{{ $row['key'] }}" data-delta="1" aria-label="Add {{ strtolower($row['label']) }}">+</button>
                                        </div>
                                    </div>
                                @endforeach

                                <button type="button" id="guestDone" class="btn btn-primary" style="width:100%;">Done</button>
                            </div>
                        </div>

                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Search stays</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="stats-band">
            <div class="wrap stats-grid">
                @foreach($stats as $stat)
                    <article class="stat-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                        <strong>{{ $stat['v'] }}</strong>
                        <span>{{ $stat['l'] }}</span>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="section">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Stay pathways</p>
                        <h2 class="display">Premium homes matched to the reason for travel.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-soft">Discuss your brief</a>
                </div>

                <div class="pathway-grid">
                    @foreach($pathways as $pathway)
                        <a href="https://www.grhum.co.uk/enquire_now" class="pathway-card reveal" style="transition-delay: {{ $loop->index * 70 }}ms;">
                            <div class="pathway-image">
                                <img src="{{ $pathway['img'] }}" alt="{{ $pathway['t'] }}" loading="lazy">
                            </div>
                            <div class="pathway-body">
                                <span class="pill">{{ $pathway['k'] }}</span>
                                <h3 class="display">{{ $pathway['t'] }}</h3>
                                <p>{{ $pathway['d'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="reason-band">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Why GRHUM</p>
                        <h2 class="display">A polished stay experience without the heavy hotel feel.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Start enquiry</a>
                </div>

                <div class="reason-grid">
                    @foreach($reasons as $reason)
                        <article class="reason-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <b>{{ $reason['n'] }}</b>
                            <h3>{{ $reason['t'] }}</h3>
                            <p>{{ $reason['d'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="locations">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Locations</p>
                        <h2 class="display">A connected accommodation network across the UK and Ireland.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/locations" class="btn btn-soft">View all locations</a>
                </div>

                <div class="location-scroll">
                    @foreach($location as $loc)
                        <a href="https://www.grhum.co.uk/property_enquiry" class="location-card reveal" aria-label="{{ $loc->location_name }}">
                            @if(!empty($loc->image))
                                <img src="https://www.grhum.co.uk/upload/{{ $loc->image }}" alt="{{ $loc->location_name }}" loading="lazy" onerror="this.style.display='none'">
                            @endif
                            <span>{{ $loc->location_name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="wrap">
                <div class="cta-panel reveal">
                    <div>
                        <p class="eyebrow">Ready to place a guest?</p>
                        <h2 class="display">Send the brief. We will shape the stay.</h2>
                        <p>Share location, dates, guest profile and priorities. GRHUM will respond with premium accommodation options that feel comfortable, beautiful and ready.</p>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
                </div>
            </div>
        </section>

        <div id="toast" role="status" aria-live="polite"></div>
    </main>
@endsection

@push('scripts')
    <script>
        (function () {
            'use strict';

            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const checkIn = document.getElementById('searchCheckIn');
            const checkOut = document.getElementById('searchCheckOut');
            const today = new Date().toISOString().split('T')[0];

            if (checkIn && checkOut) {
                checkIn.min = today;
                checkOut.min = today;
                checkIn.addEventListener('change', function () {
                    checkOut.min = this.value || today;
                    if (checkOut.value && checkOut.value < this.value) checkOut.value = this.value;
                });
            }

            const state = { adults: 2, children: 0, infants: 0, pets: 0 };
            const mins = { adults: 1, children: 0, infants: 0, pets: 0 };
            const panel = document.getElementById('guestPanel');
            const toggle = document.getElementById('guestToggle');
            const summary = document.getElementById('guestSummary');
            const done = document.getElementById('guestDone');

            function renderSummary() {
                if (!summary) return;
                const parts = [state.adults + (state.adults === 1 ? ' adult' : ' adults')];
                if (state.children) parts.push(state.children + (state.children === 1 ? ' child' : ' children'));
                if (state.infants) parts.push(state.infants + (state.infants === 1 ? ' infant' : ' infants'));
                if (state.pets) parts.push(state.pets + (state.pets === 1 ? ' pet' : ' pets'));
                summary.textContent = parts.join(', ');
            }

            function closePanel() {
                if (!panel || !toggle) return;
                panel.classList.remove('is-visible');
                toggle.setAttribute('aria-expanded', 'false');
                setTimeout(function () { panel.classList.remove('is-open'); }, reducedMotion ? 0 : 180);
            }

            if (toggle && panel) {
                toggle.addEventListener('click', function (event) {
                    event.stopPropagation();
                    if (panel.classList.contains('is-open')) {
                        closePanel();
                    } else {
                        panel.classList.add('is-open');
                        toggle.setAttribute('aria-expanded', 'true');
                        requestAnimationFrame(function () { panel.classList.add('is-visible'); });
                    }
                });

                document.addEventListener('click', function (event) {
                    if (!panel.contains(event.target) && !toggle.contains(event.target)) closePanel();
                });

                document.addEventListener('keydown', function (event) {
                    if (event.key === 'Escape' && panel.classList.contains('is-open')) closePanel();
                });
            }

            if (done) done.addEventListener('click', closePanel);

            document.querySelectorAll('[data-guest-btn]').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.stopPropagation();
                    const key = button.dataset.key;
                    const delta = parseInt(button.dataset.delta, 10);
                    state[key] = Math.max(mins[key], state[key] + delta);
                    const count = document.querySelector('[data-count="' + key + '"]');
                    if (count) count.textContent = state[key];
                    renderSummary();
                });
            });

            renderSummary();

            const topbar = document.getElementById('topbar');
            const top = document.getElementById('top');

            if (topbar && top && 'IntersectionObserver' in window) {
                const stickyObserver = new IntersectionObserver(function (entries) {
                    topbar.classList.toggle('visible', !entries[0].isIntersecting);
                });
                stickyObserver.observe(top);
            }

            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('in-view');
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: .12 });

                document.querySelectorAll('.reveal').forEach(function (element) {
                    revealObserver.observe(element);
                });
            } else {
                document.querySelectorAll('.reveal').forEach(function (element) {
                    element.classList.add('in-view');
                });
            }

            window.showToast = function (message, duration) {
                const toast = document.getElementById('toast');
                if (!toast) return;
                toast.textContent = message;
                toast.classList.add('show');
                setTimeout(function () { toast.classList.remove('show'); }, duration || 3000);
            };
        })();
    </script>
@endpush
