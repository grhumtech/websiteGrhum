@extends('layouts.app')

@section('title', 'Light premium serviced accommodation - GRHUM')

@php
    $cities = [
        'London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool',
        'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast',
        'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham',
        'Reading', 'Aberdeen', 'Dundee', 'Dublin', 'Cork', 'Coventry', 'Bournemouth'
    ];

    $cards = [
        ['title' => 'Corporate travel', 'copy' => 'Premium furnished stays for business guests and project teams.', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=650&fit=crop&q=76&auto=format'],
        ['title' => 'Relocation homes', 'copy' => 'Comfortable interim living while guests settle into a new city.', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=650&fit=crop&q=76&auto=format'],
        ['title' => 'Insurance stays', 'copy' => 'Fast, calm accommodation support when home is unavailable.', 'image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=650&fit=crop&q=76&auto=format'],
    ];

    $features = [
        ['n' => '01', 'title' => 'Rapid response', 'copy' => 'Accommodation options sourced quickly for urgent and short-notice briefs.'],
        ['n' => '02', 'title' => 'All-inclusive living', 'copy' => 'Furnished homes with Wi-Fi, utilities and practical essentials included.'],
        ['n' => '03', 'title' => 'Guest-first support', 'copy' => 'A dedicated team available from enquiry through the whole stay.'],
        ['n' => '04', 'title' => 'Flexible stays', 'copy' => 'Short, extended and project-based terms shaped around your timeline.'],
    ];

    $stats = [
        ['value' => '60+', 'label' => 'UK & Ireland locations'],
        ['value' => '48hr', 'label' => 'rapid placement options'],
        ['value' => '24/7', 'label' => 'dedicated support'],
        ['value' => '4.8', 'label' => 'guest confidence'],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Marcellus&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --ink: #26312d;
            --sage: #8fae9d;
            --sage-soft: #dce9df;
            --sage-pale: #eff6f1;
            --blush: #e8c9bd;
            --blush-soft: #f8ece7;
            --champagne: #d7b978;
            --stone: #f4efe6;
            --ivory: #fffaf2;
            --white: #ffffff;
            --muted: #73776f;
            --line: rgba(38, 49, 45, .12);
            --shadow: 0 24px 70px rgba(75, 91, 82, .14);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--stone);
            color: var(--ink);
            font-family: "Manrope", system-ui, sans-serif;
        }

        .light-home {
            background:
                radial-gradient(circle at 12% 10%, rgba(232, 201, 189, .45), transparent 25rem),
                radial-gradient(circle at 88% 18%, rgba(143, 174, 157, .35), transparent 28rem),
                linear-gradient(180deg, var(--ivory), var(--sage-pale) 48%, var(--stone));
            overflow: hidden;
        }

        .wrap {
            margin-inline: auto;
            width: min(1200px, calc(100% - 48px));
        }

        .display {
            font-family: "Marcellus", Georgia, serif;
            font-weight: 400;
            letter-spacing: -.035em;
        }

        .eyebrow {
            color: #b97866;
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
            background: linear-gradient(135deg, #a9c6b5, #7fa18e);
            box-shadow: 0 16px 34px rgba(127, 161, 142, .28);
            color: #10221a;
        }

        .btn-secondary {
            background: var(--white);
            border: 1px solid var(--line);
            color: var(--ink);
        }

        .btn:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .topbar {
            align-items: center;
            background: rgba(255, 250, 242, .84);
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
            z-index: 60;
        }

        .topbar.visible { transform: translateY(0); }

        .brand {
            color: #5d806e;
            font-family: "Marcellus", Georgia, serif;
            font-size: 28px;
        }

        .hero {
            padding: 90px 0 28px;
        }

        .hero-grid {
            align-items: stretch;
            display: grid;
            gap: 18px;
            grid-template-columns: minmax(0, .95fr) minmax(360px, 1.05fr);
        }

        .hero-copy {
            background: rgba(255, 250, 242, .78);
            border: 1px solid rgba(255, 255, 255, .82);
            border-radius: 36px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 560px;
            overflow: hidden;
            padding: 46px;
            position: relative;
        }

        .hero-copy::before {
            background:
                linear-gradient(135deg, rgba(220, 233, 223, .9), transparent 55%),
                radial-gradient(circle at 90% 12%, rgba(215, 185, 120, .26), transparent 20rem);
            content: "";
            inset: 0;
            position: absolute;
        }

        .hero-copy > * {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            color: var(--ink);
            font-size: clamp(48px, 6vw, 84px);
            line-height: .98;
            margin: 0;
            max-width: 690px;
        }

        .hero h1 span {
            color: #6f947f;
        }

        .hero-text {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.68;
            margin: 22px 0 0;
            max-width: 560px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .hero-stats {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            margin-top: 40px;
        }

        .hero-stats span {
            background: rgba(255, 255, 255, .58);
            border: 1px solid rgba(255, 255, 255, .78);
            border-radius: 22px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            padding: 16px;
            transition: transform .24s var(--ease), background .24s var(--ease);
        }

        .hero-stats span:hover {
            background: var(--white);
            transform: translateY(-4px);
        }

        .hero-stats strong {
            color: #6f947f;
            display: block;
            font-family: "Marcellus", Georgia, serif;
            font-size: 30px;
            font-weight: 400;
            line-height: 1;
            margin-bottom: 4px;
        }

        .hero-gallery {
            display: grid;
            gap: 18px;
            grid-template-columns: .72fr 1fr;
        }

        .gallery-stack {
            display: grid;
            gap: 18px;
        }

        .gallery-card {
            background: var(--sage-soft);
            border: 8px solid rgba(255, 255, 255, .72);
            border-radius: 36px;
            box-shadow: var(--shadow);
            min-height: 260px;
            overflow: hidden;
            position: relative;
        }

        .gallery-card.large {
            min-height: 560px;
        }

        .gallery-card img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .75s var(--ease);
            width: 100%;
        }

        .gallery-card:hover img {
            transform: scale(1.07);
        }

        .gallery-note {
            background: rgba(255, 250, 242, .88);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 24px;
            bottom: 20px;
            box-shadow: var(--shadow);
            left: 20px;
            max-width: 290px;
            padding: 18px;
            position: absolute;
        }

        .gallery-note b {
            color: var(--ink);
            display: block;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .gallery-note small {
            color: var(--muted);
            display: block;
            font-size: 12px;
            line-height: 1.55;
        }

        .search-area {
            margin-top: 18px;
        }

        .search-panel {
            background: rgba(255, 255, 255, .68);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .86);
            border-radius: 30px;
            box-shadow: var(--shadow);
            padding: 12px;
        }

        .search-grid {
            display: grid;
            gap: 8px;
            grid-template-columns: 1.35fr 1fr 1fr 1.12fr auto;
        }

        .field {
            background: rgba(255, 250, 242, .78);
            border: 1px solid transparent;
            border-radius: 22px;
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
            background: var(--white);
            border-color: var(--line);
            transform: translateY(-1px);
        }

        .field-label {
            color: #b97866;
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .field select,
        .field input {
            appearance: none;
            background: transparent;
            border: 0;
            color: var(--ink);
            font: 800 14px/1.2 "Manrope", sans-serif;
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
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 22px;
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
            background: var(--sage-pale);
            border: 1px solid var(--line);
            border-radius: 50%;
            color: #6f947f;
            cursor: pointer;
            font-size: 18px;
            font-weight: 900;
            height: 34px;
            line-height: 1;
            width: 34px;
        }

        .stepper span { font-weight: 900; min-width: 18px; text-align: center; }
        .search-grid .btn { min-height: 68px; }

        .section {
            padding: 78px 0;
        }

        .section-head {
            align-items: end;
            display: flex;
            gap: 24px;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .section-head h2 {
            font-size: clamp(36px, 4vw, 58px);
            line-height: 1.02;
            margin: 0;
            max-width: 740px;
        }

        .card-row {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .service-card {
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 32px;
            box-shadow: 0 16px 44px rgba(75, 91, 82, .09);
            color: inherit;
            overflow: hidden;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .service-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-8px);
        }

        .service-card img {
            aspect-ratio: 1.58;
            display: block;
            object-fit: cover;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .service-card:hover img { transform: scale(1.06); }

        .service-card div { padding: 24px; }

        .service-card h3 {
            color: var(--ink);
            font-size: 24px;
            margin: 0 0 8px;
        }

        .service-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .feature-section {
            background: linear-gradient(135deg, rgba(220, 233, 223, .78), rgba(248, 236, 231, .86));
            padding: 76px 0;
        }

        .feature-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .feature-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 30px;
            min-height: 220px;
            padding: 26px;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease), background .28s var(--ease);
        }

        .feature-card:hover {
            background: var(--white);
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .feature-card b {
            color: #b97866;
            display: block;
            font-family: "Marcellus", Georgia, serif;
            font-size: 36px;
            font-weight: 400;
            margin-bottom: 22px;
        }

        .feature-card h3 {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.62;
            margin: 0;
        }

        .locations {
            padding: 78px 0;
        }

        .location-strip {
            display: flex;
            gap: 14px;
            overflow-x: auto;
            padding-bottom: 14px;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
        }

        .location-strip::-webkit-scrollbar { display: none; }

        .location-card {
            align-items: flex-end;
            background: var(--sage-soft);
            border: 7px solid rgba(255, 255, 255, .74);
            border-radius: 32px;
            color: var(--white);
            display: flex;
            flex: 0 0 292px;
            height: 292px;
            overflow: hidden;
            position: relative;
            scroll-snap-align: start;
            text-decoration: none;
        }

        .location-card:nth-child(4n+1) { flex-basis: 380px; }

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
            background: linear-gradient(180deg, transparent 35%, rgba(38, 49, 45, .72));
            content: "";
            inset: 0;
            position: absolute;
        }

        .location-card span {
            font-size: 22px;
            font-weight: 800;
            padding: 22px;
            position: relative;
            z-index: 1;
        }

        .cta {
            padding: 20px 0 82px;
        }

        .cta-panel {
            align-items: center;
            background:
                linear-gradient(135deg, rgba(255, 250, 242, .78), rgba(220, 233, 223, .84)),
                url("https://images.unsplash.com/photo-1600607688969-a5bfcd646154?w=1800&h=900&fit=crop&q=76&auto=format") center / cover;
            border: 1px solid rgba(255, 255, 255, .88);
            border-radius: 38px;
            box-shadow: var(--shadow);
            display: grid;
            gap: 24px;
            grid-template-columns: minmax(0, 1fr) auto;
            min-height: 330px;
            padding: 44px;
        }

        .cta h2 {
            font-size: clamp(38px, 4.6vw, 66px);
            line-height: 1;
            margin: 0 0 12px;
            max-width: 780px;
        }

        .cta p {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.65;
            margin: 0;
            max-width: 600px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .62s var(--ease), transform .62s var(--ease);
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
            color: var(--white);
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
            outline: 3px solid rgba(143, 174, 157, .72);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .hero-grid,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .hero-copy,
            .gallery-card.large {
                min-height: 460px;
            }

            .search-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .search-grid .btn {
                grid-column: 1 / -1;
            }

            .feature-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .wrap {
                width: min(100% - 32px, 1200px);
            }

            .hero {
                padding-top: 76px;
            }

            .hero-copy {
                min-height: auto;
                padding: 28px;
            }

            .hero h1 {
                font-size: 44px;
            }

            .hero-gallery,
            .search-grid,
            .card-row,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .gallery-stack {
                display: none;
            }

            .gallery-card.large {
                min-height: 330px;
            }

            .section,
            .feature-section,
            .locations {
                padding: 60px 0;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .location-card,
            .location-card:nth-child(4n+1) {
                flex-basis: 82vw;
                height: 270px;
            }

            .cta-panel {
                padding: 28px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="light-home">
        <div id="topbar" class="topbar" role="banner" aria-label="Quick enquiry">
            <span class="brand">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="wrap hero-grid">
                <div class="hero-copy reveal">
                    <div>
                        <p class="eyebrow">Fresh premium serviced homes</p>
                        <h1 class="display">Light, calm stays with a <span>premium</span> touch.</h1>
                        <p class="hero-text">
                            Fully furnished accommodation for corporate, relocation, insurance and project guests
                            across the UK and Ireland, handled with speed, care and support.
                        </p>
                        <div class="hero-actions">
                            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Find your stay</a>
                            <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">WhatsApp us</a>
                        </div>
                    </div>

                    <div class="hero-stats">
                        @foreach($stats as $stat)
                            <span><strong>{{ $stat['value'] }}</strong>{{ $stat['label'] }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="hero-gallery reveal">
                    <div class="gallery-stack">
                        <div class="gallery-card">
                            <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=700&h=700&fit=crop&q=76&auto=format" alt="Premium furnished living space">
                        </div>
                        <div class="gallery-card">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&h=700&fit=crop&q=76&auto=format" alt="Bright bedroom interior">
                        </div>
                    </div>
                    <div class="gallery-card large">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=1000&h=1100&fit=crop&q=78&auto=format" alt="Light premium serviced apartment">
                        <div class="gallery-note">
                            <b>Designed around real living</b>
                            <small>Private homes, flexible terms and guest support from enquiry to arrival.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap search-area">
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

        <section class="section">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Stay solutions</p>
                        <h2 class="display">A softer, smarter way to place every guest.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-secondary">Discuss your brief</a>
                </div>

                <div class="card-row">
                    @foreach($cards as $card)
                        <a href="https://www.grhum.co.uk/enquire_now" class="service-card reveal" style="transition-delay: {{ $loop->index * 60 }}ms;">
                            <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" loading="lazy">
                            <div>
                                <h3>{{ $card['title'] }}</h3>
                                <p>{{ $card['copy'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="feature-section">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Why GRHUM</p>
                        <h2 class="display">Premium does not have to feel heavy.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Start enquiry</a>
                </div>

                <div class="feature-grid">
                    @foreach($features as $feature)
                        <article class="feature-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <b>{{ $feature['n'] }}</b>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['copy'] }}</p>
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
                        <h2 class="display">Bright stays across the UK and Ireland.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/locations" class="btn btn-secondary">View locations</a>
                </div>

                <div class="location-strip">
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
                        <h2 class="display">Tell us the brief. We will shape the stay.</h2>
                        <p>Share location, dates, guest profile and priorities. Our team will respond with premium accommodation options that feel calm, practical and ready.</p>
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
