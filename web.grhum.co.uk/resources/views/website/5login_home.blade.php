@extends('layouts.app')

@section('title', 'Premium serviced stays with GRHUM')

@php
    $cities = [
        'London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool',
        'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast',
        'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham',
        'Reading', 'Aberdeen', 'Dundee', 'Dublin', 'Cork', 'Coventry', 'Bournemouth'
    ];

    $audiences = [
        ['label' => 'Corporate', 'title' => 'Business travel', 'copy' => 'Elegant serviced homes for teams, consultants and senior travellers.', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=700&fit=crop&q=76&auto=format'],
        ['label' => 'Relocation', 'title' => 'Interim living', 'copy' => 'Comfortable homes while guests settle into their next city.', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=700&fit=crop&q=76&auto=format'],
        ['label' => 'Insurance', 'title' => 'Urgent stays', 'copy' => 'Fast, reassuring accommodation when home is unavailable.', 'image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=700&fit=crop&q=76&auto=format'],
        ['label' => 'Projects', 'title' => 'Crew housing', 'copy' => 'Practical homes close to worksites, hospitals and studios.', 'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&h=700&fit=crop&q=76&auto=format'],
    ];

    $details = [
        ['n' => '01', 'title' => 'Fast matching', 'copy' => 'Tell us your dates, city and priorities. We shortlist options quickly.'],
        ['n' => '02', 'title' => 'Curated comfort', 'copy' => 'Furnished living, Wi-Fi, utilities and home essentials arranged clearly.'],
        ['n' => '03', 'title' => 'Location fit', 'copy' => 'Homes selected around offices, sites, hospitals, schools and transport.'],
        ['n' => '04', 'title' => 'Stay support', 'copy' => 'A responsive team stays available when plans change or guests need help.'],
    ];

    $stats = [
        ['value' => '60+', 'label' => 'locations'],
        ['value' => '48hr', 'label' => 'rapid options'],
        ['value' => '24/7', 'label' => 'support'],
        ['value' => '4.8', 'label' => 'rating'],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --ink: #27302d;
            --muted: #74776f;
            --ivory: #fffaf1;
            --cream: #f7efe3;
            --shell: #f9e8df;
            --sage: #cfe0d1;
            --sage-strong: #7fa48d;
            --aqua: #d7edf0;
            --champagne: #d7b56d;
            --clay: #c17a62;
            --white: #ffffff;
            --line: rgba(39, 48, 45, .12);
            --shadow: 0 24px 70px rgba(80, 91, 86, .14);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--cream);
            color: var(--ink);
            font-family: "Plus Jakarta Sans", system-ui, sans-serif;
        }

        .resort-page {
            background:
                radial-gradient(circle at 0% 8%, rgba(249, 232, 223, .9), transparent 30rem),
                radial-gradient(circle at 100% 12%, rgba(215, 237, 240, .82), transparent 34rem),
                linear-gradient(180deg, var(--ivory), #f4f5ea 54%, var(--cream));
            overflow: hidden;
        }

        .wrap {
            margin-inline: auto;
            width: min(1200px, calc(100% - 48px));
        }

        .display {
            font-family: "DM Serif Display", Georgia, serif;
            font-weight: 400;
            letter-spacing: -.035em;
        }

        .eyebrow {
            color: #aa6b57;
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
            background: linear-gradient(135deg, #e6c67a, #c89352);
            color: #2d2413;
            box-shadow: 0 16px 34px rgba(200, 147, 82, .28);
        }

        .btn-soft {
            background: rgba(255, 255, 255, .76);
            border: 1px solid rgba(255, 255, 255, .9);
            color: var(--ink);
        }

        .btn:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .topbar {
            align-items: center;
            background: rgba(255, 250, 241, .82);
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
            color: #668d77;
            font-family: "DM Serif Display", Georgia, serif;
            font-size: 30px;
            letter-spacing: -.04em;
        }

        .hero {
            padding: 86px 0 30px;
            position: relative;
        }

        .hero::after {
            background: linear-gradient(90deg, transparent, rgba(215, 181, 109, .46), transparent);
            content: "";
            height: 1px;
            left: 8%;
            position: absolute;
            right: 8%;
            bottom: 0;
        }

        .hero-grid {
            align-items: center;
            display: grid;
            gap: 24px;
            grid-template-columns: minmax(0, .92fr) minmax(390px, 1.08fr);
        }

        .hero-copy {
            padding: 34px 0;
        }

        .hero h1 {
            color: var(--ink);
            font-size: clamp(54px, 7vw, 98px);
            line-height: .88;
            margin: 0;
            max-width: 760px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #7fa48d, #c17a62);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-style: italic;
        }

        .hero-text {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.7;
            margin: 24px 0 0;
            max-width: 580px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 34px;
        }

        .hero-stat {
            background: rgba(255, 255, 255, .6);
            border: 1px solid rgba(255, 255, 255, .86);
            border-radius: 999px;
            color: var(--muted);
            font-size: 12.5px;
            font-weight: 800;
            padding: 10px 14px;
            transition: transform .24s var(--ease), background .24s var(--ease);
        }

        .hero-stat:hover {
            background: var(--white);
            transform: translateY(-3px);
        }

        .hero-stat strong {
            color: #6f967f;
            margin-right: 6px;
        }

        .visual {
            display: grid;
            gap: 16px;
            grid-template-columns: .7fr 1fr;
            min-height: 540px;
        }

        .visual-left {
            display: grid;
            gap: 16px;
        }

        .image-card {
            background: var(--white);
            border: 8px solid rgba(255, 255, 255, .74);
            border-radius: 42px;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .image-card.main {
            border-radius: 48px 48px 120px 48px;
        }

        .image-card.small:first-child {
            border-radius: 110px 42px 42px 42px;
        }

        .image-card.small:last-child {
            border-radius: 42px 42px 42px 110px;
        }

        .image-card img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .7s var(--ease);
            width: 100%;
        }

        .image-card:hover img {
            transform: scale(1.07);
        }

        .visual-left .image-card { min-height: 262px; }
        .image-card.main { min-height: 540px; }

        .floating-note {
            background: rgba(255, 250, 241, .9);
            border: 1px solid rgba(255, 255, 255, .86);
            border-radius: 28px;
            bottom: 22px;
            box-shadow: var(--shadow);
            left: 22px;
            max-width: 300px;
            padding: 20px;
            position: absolute;
        }

        .floating-note b {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .floating-note small {
            color: var(--muted);
            display: block;
            font-size: 12px;
            line-height: 1.55;
        }

        .search-section {
            margin-top: 22px;
        }

        .search-panel {
            background: rgba(255, 255, 255, .64);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .86);
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
            background: var(--white);
            border-color: var(--line);
            transform: translateY(-1px);
        }

        .field-label {
            color: #aa6b57;
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
            font: 800 14px/1.2 "Plus Jakarta Sans", sans-serif;
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
            background: #eef5ef;
            border: 1px solid var(--line);
            border-radius: 50%;
            color: #6f967f;
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
            padding: 82px 0;
        }

        .section-head {
            align-items: end;
            display: flex;
            gap: 24px;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .section-head h2 {
            font-size: clamp(38px, 4.5vw, 66px);
            line-height: .98;
            margin: 0;
            max-width: 760px;
        }

        .audience-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .audience-card {
            background: rgba(255, 255, 255, .68);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 34px;
            box-shadow: 0 16px 44px rgba(80, 91, 86, .08);
            color: inherit;
            overflow: hidden;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .audience-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-8px);
        }

        .audience-image {
            aspect-ratio: 1.1;
            overflow: hidden;
        }

        .audience-card img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .audience-card:hover img { transform: scale(1.06); }

        .audience-body { padding: 22px; }

        .pill {
            background: var(--shell);
            border-radius: 999px;
            color: #aa6b57;
            display: inline-flex;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .1em;
            margin-bottom: 12px;
            padding: 7px 10px;
            text-transform: uppercase;
        }

        .audience-card h3 {
            font-size: 25px;
            margin: 0 0 8px;
        }

        .audience-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.62;
            margin: 0;
        }

        .premium-band {
            background: linear-gradient(135deg, rgba(207, 224, 209, .78), rgba(215, 237, 240, .72), rgba(249, 232, 223, .76));
            padding: 76px 0;
        }

        .detail-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .detail-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .88);
            border-radius: 32px;
            min-height: 230px;
            padding: 26px;
            transition: transform .28s var(--ease), background .28s var(--ease), box-shadow .28s var(--ease);
        }

        .detail-card:hover {
            background: var(--white);
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .detail-card b {
            color: #739880;
            display: block;
            font-family: "DM Serif Display", Georgia, serif;
            font-size: 38px;
            font-weight: 400;
            margin-bottom: 22px;
        }

        .detail-card h3 {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .detail-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.62;
            margin: 0;
        }

        .locations {
            padding: 82px 0;
        }

        .location-board {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .location-card {
            align-items: flex-end;
            background: var(--sage);
            border: 7px solid rgba(255, 255, 255, .72);
            border-radius: 34px;
            color: var(--white);
            display: flex;
            min-height: 250px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .location-card:nth-child(1),
        .location-card:nth-child(6) {
            grid-column: span 2;
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
            background: linear-gradient(180deg, transparent 32%, rgba(39, 48, 45, .72));
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
            padding: 12px 0 82px;
        }

        .cta-panel {
            align-items: center;
            background: rgba(255, 255, 255, .68);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 44px;
            box-shadow: var(--shadow);
            display: grid;
            gap: 24px;
            grid-template-columns: minmax(0, 1fr) auto;
            overflow: hidden;
            padding: 46px;
            position: relative;
        }

        .cta-panel::before {
            background:
                radial-gradient(circle at 90% 20%, rgba(215, 181, 109, .28), transparent 22rem),
                radial-gradient(circle at 10% 90%, rgba(127, 164, 141, .24), transparent 22rem);
            content: "";
            inset: 0;
            position: absolute;
        }

        .cta-panel > * {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-size: clamp(38px, 4.8vw, 70px);
            line-height: .98;
            margin: 0 0 12px;
            max-width: 820px;
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
            outline: 3px solid rgba(127, 164, 141, .72);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .hero-grid,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .visual {
                min-height: 460px;
            }

            .image-card.main {
                min-height: 460px;
            }

            .search-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .search-grid .btn {
                grid-column: 1 / -1;
            }

            .audience-grid,
            .detail-grid,
            .location-board {
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

            .hero h1 {
                font-size: 46px;
            }

            .visual,
            .search-grid,
            .audience-grid,
            .detail-grid,
            .location-board {
                grid-template-columns: 1fr;
            }

            .visual-left {
                display: none;
            }

            .image-card.main {
                border-radius: 36px;
                min-height: 330px;
            }

            .section,
            .premium-band,
            .locations {
                padding: 60px 0;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .location-card,
            .location-card:nth-child(1),
            .location-card:nth-child(6) {
                grid-column: auto;
                min-height: 260px;
            }

            .cta-panel {
                padding: 28px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="resort-page">
        <div id="topbar" class="topbar" role="banner" aria-label="Quick enquiry">
            <span class="brand">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="wrap hero-grid">
                <div class="hero-copy reveal">
                    <p class="eyebrow">Premium serviced accommodation</p>
                    <h1 class="display">Beautiful stays, <span>quietly handled</span>.</h1>
                    <p class="hero-text">
                        Fully furnished homes for corporate travel, relocation, insurance and project stays,
                        matched quickly and managed with thoughtful support.
                    </p>
                    <div class="hero-actions">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Find your stay</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-soft">WhatsApp us</a>
                    </div>
                    <div class="hero-stats">
                        @foreach($stats as $stat)
                            <span class="hero-stat"><strong>{{ $stat['value'] }}</strong>{{ $stat['label'] }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="visual reveal">
                    <div class="visual-left">
                        <div class="image-card small">
                            <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=700&h=700&fit=crop&q=76&auto=format" alt="Light premium living area">
                        </div>
                        <div class="image-card small">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&h=700&fit=crop&q=76&auto=format" alt="Premium bedroom">
                        </div>
                    </div>
                    <div class="image-card main">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=1000&h=1150&fit=crop&q=78&auto=format" alt="Premium serviced apartment">
                        <div class="floating-note">
                            <b>Comfort with clarity</b>
                            <small>Private homes, flexible terms, all-inclusive options and guest-first support.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap search-section">
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
                        <p class="eyebrow">Who we support</p>
                        <h2 class="display">One standard, shaped around every brief.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-soft">Discuss your brief</a>
                </div>

                <div class="audience-grid">
                    @foreach($audiences as $audience)
                        <a href="https://www.grhum.co.uk/enquire_now" class="audience-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <div class="audience-image">
                                <img src="{{ $audience['image'] }}" alt="{{ $audience['title'] }}" loading="lazy">
                            </div>
                            <div class="audience-body">
                                <span class="pill">{{ $audience['label'] }}</span>
                                <h3 class="display">{{ $audience['title'] }}</h3>
                                <p>{{ $audience['copy'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="premium-band">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Premium details</p>
                        <h2 class="display">Soft design, strong service.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Start enquiry</a>
                </div>

                <div class="detail-grid">
                    @foreach($details as $detail)
                        <article class="detail-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <b>{{ $detail['n'] }}</b>
                            <h3>{{ $detail['title'] }}</h3>
                            <p>{{ $detail['copy'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="locations">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Destinations</p>
                        <h2 class="display">A lighter way to land in every city.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/locations" class="btn btn-soft">View all locations</a>
                </div>

                <div class="location-board">
                    @foreach(collect($location)->take(8) as $loc)
                        <a href="https://www.grhum.co.uk/property_enquiry" class="location-card reveal" aria-label="{{ $loc->location_name }}" style="transition-delay: {{ $loop->index * 45 }}ms;">
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
                        <p>Share location, dates, guest profile and priorities. GRHUM will respond with premium accommodation options that feel considered, calm and ready.</p>
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
