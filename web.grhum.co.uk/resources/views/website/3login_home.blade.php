@extends('layouts.app')

@section('title', 'Boutique serviced accommodation across the UK and Ireland - GRHUM')

@php
    $cities = [
        'London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool',
        'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast',
        'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham',
        'Reading', 'Aberdeen', 'Dundee', 'Cork', 'Dublin', 'Coventry', 'Bournemouth'
    ];

    $stayTypes = [
        ['title' => 'Business travel', 'copy' => 'Calm, connected homes for teams, consultants and senior travellers.', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=700&fit=crop&q=76&auto=format'],
        ['title' => 'Relocation stays', 'copy' => 'Comfortable interim living while guests settle into a new city.', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=700&fit=crop&q=76&auto=format'],
        ['title' => 'Insurance housing', 'copy' => 'Fast, reassuring accommodation when home is temporarily unavailable.', 'image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=700&fit=crop&q=76&auto=format'],
        ['title' => 'Project crews', 'copy' => 'Practical stays close to sites, studios, hospitals and operational hubs.', 'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&h=700&fit=crop&q=76&auto=format'],
    ];

    $journey = [
        ['step' => '01', 'title' => 'Share the brief', 'copy' => 'Tell us the city, dates, guest profile, budget and must-haves.'],
        ['step' => '02', 'title' => 'We match the stay', 'copy' => 'GRHUM shortlists accommodation around location, comfort and timeline.'],
        ['step' => '03', 'title' => 'Guests arrive smoothly', 'copy' => 'Arrival details, support and stay essentials are handled clearly.'],
        ['step' => '04', 'title' => 'Support continues', 'copy' => 'Our team stays available for changes, extensions and guest needs.'],
    ];

    $proof = [
        ['value' => '60+', 'label' => 'locations'],
        ['value' => '48hr', 'label' => 'rapid options'],
        ['value' => '24/7', 'label' => 'support'],
        ['value' => '4.8', 'label' => 'guest confidence'],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --night: #101513;
            --moss: #1f3f35;
            --sage: #8fa99a;
            --shell: #f6f0e7;
            --milk: #fffaf4;
            --almond: #e5d6c4;
            --bronze: #b7774f;
            --amber: #dfb96f;
            --ink: #171916;
            --muted: #767267;
            --line: rgba(23, 25, 22, .13);
            --shadow: 0 28px 90px rgba(16, 21, 19, .16);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--shell);
            color: var(--ink);
            font-family: "Plus Jakarta Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page {
            background:
                radial-gradient(circle at 10% 8%, rgba(183, 119, 79, .15), transparent 28rem),
                radial-gradient(circle at 90% 20%, rgba(143, 169, 154, .2), transparent 30rem),
                var(--shell);
            overflow: hidden;
        }

        .container {
            margin-inline: auto;
            width: min(1220px, calc(100% - 48px));
        }

        .serif {
            font-family: "Instrument Serif", Georgia, serif;
            font-weight: 400;
            letter-spacing: -.045em;
        }

        .eyebrow {
            color: var(--bronze);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .18em;
            margin: 0 0 14px;
            text-transform: uppercase;
        }

        .btn {
            align-items: center;
            border-radius: 999px;
            display: inline-flex;
            font-size: 14px;
            font-weight: 800;
            gap: 10px;
            justify-content: center;
            min-height: 50px;
            overflow: hidden;
            padding: 0 24px;
            position: relative;
            text-decoration: none;
            transition: transform .24s var(--ease), box-shadow .24s var(--ease), background .24s var(--ease);
            white-space: nowrap;
        }

        .btn-dark {
            background: var(--night);
            color: var(--milk);
            box-shadow: 0 18px 40px rgba(16, 21, 19, .2);
        }

        .btn-dark:hover {
            background: var(--moss);
            transform: translateY(-2px);
        }

        .btn-light {
            background: var(--milk);
            color: var(--night);
        }

        .btn-light:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .sticky {
            align-items: center;
            background: rgba(246, 240, 231, .86);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(23, 25, 22, .1);
            display: flex;
            justify-content: space-between;
            left: 0;
            padding: 12px 28px;
            position: fixed;
            right: 0;
            top: 0;
            transform: translateY(-100%);
            transition: transform .32s var(--ease);
            z-index: 50;
        }

        .sticky.visible { transform: translateY(0); }

        .brand {
            color: var(--moss);
            font-family: "Instrument Serif", Georgia, serif;
            font-size: 30px;
            letter-spacing: -.05em;
        }

        .hero {
            background: var(--night);
            color: var(--milk);
            min-height: 660px;
            padding: 92px 0 84px;
            position: relative;
        }

        .hero::before {
            background:
                linear-gradient(90deg, rgba(16, 21, 19, .92), rgba(16, 21, 19, .45)),
                url("https://images.unsplash.com/photo-1600607688969-a5bfcd646154?w=2200&h=1300&fit=crop&q=78&auto=format") center / cover;
            content: "";
            inset: 0;
            position: absolute;
            transform: scale(1.04);
            animation: slowScene 18s ease-in-out infinite alternate;
        }

        .hero::after {
            background: var(--shell);
            border-radius: 34px 34px 0 0;
            bottom: -1px;
            content: "";
            height: 42px;
            left: 24px;
            position: absolute;
            right: 24px;
        }

        @keyframes slowScene {
            from { transform: scale(1.02) translateX(0); }
            to { transform: scale(1.07) translateX(-16px); }
        }

        @keyframes softFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-14px); }
        }

        @keyframes drawLine {
            from { transform: scaleY(0); }
            to { transform: scaleY(1); }
        }

        .hero-grid {
            align-items: center;
            display: grid;
            gap: 38px;
            grid-template-columns: minmax(0, 1fr) 360px;
            min-height: 500px;
            position: relative;
            z-index: 2;
        }

        .hero-copy {
            max-width: 820px;
        }

        .hero h1 {
            color: var(--milk);
            font-size: clamp(54px, 7.2vw, 96px);
            line-height: .88;
            margin: 0;
        }

        .hero h1 span {
            color: var(--amber);
            font-style: italic;
        }

        .hero p {
            color: rgba(255, 250, 244, .76);
            font-size: 17px;
            line-height: 1.65;
            margin: 22px 0 0;
            max-width: 600px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .concierge-card {
            background: rgba(255, 250, 244, .94);
            border: 1px solid rgba(255, 255, 255, .62);
            border-radius: 42px;
            box-shadow: 0 34px 90px rgba(0, 0, 0, .25);
            color: var(--ink);
            padding: 18px;
            animation: softFloat 7s ease-in-out infinite;
        }

        .concierge-card img {
            aspect-ratio: 1.18 / .86;
            border-radius: 26px;
            display: block;
            object-fit: cover;
            width: 100%;
        }

        .concierge-card h2 {
            color: var(--moss);
            font-size: 30px;
            line-height: 1;
            margin: 18px 0 8px;
        }

        .concierge-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .booking {
            margin-top: -34px;
            position: relative;
            z-index: 5;
        }

        .booking-panel {
            background: var(--milk);
            border: 1px solid rgba(255, 255, 255, .76);
            border-radius: 28px;
            box-shadow: var(--shadow);
            padding: 14px;
        }

        .booking-grid {
            display: grid;
            gap: 10px;
            grid-template-columns: 1.35fr 1fr 1fr 1.1fr auto;
        }

        .field {
            background: var(--shell);
            border: 1px solid transparent;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-height: 68px;
            padding: 13px 15px;
            text-align: left;
            transition: background .22s var(--ease), border-color .22s var(--ease), transform .22s var(--ease);
            width: 100%;
        }

        .field:hover,
        .field:focus-within {
            background: #fff;
            border-color: var(--line);
            transform: translateY(-2px);
        }

        .field-label {
            color: var(--bronze);
            font-size: 11px;
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
            font: 800 15px/1.2 "Plus Jakarta Sans", sans-serif;
            outline: 0;
            width: 100%;
        }

        .field-value {
            color: var(--ink);
            font-size: 15px;
            font-weight: 800;
        }

        .guest-wrap { position: relative; }

        .guest-panel {
            background: #fff;
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
            z-index: 20;
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
            background: var(--shell);
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--moss);
            cursor: pointer;
            font-size: 18px;
            font-weight: 900;
            height: 34px;
            line-height: 1;
            transition: background .18s var(--ease), color .18s var(--ease), transform .18s var(--ease);
            width: 34px;
        }

        .stepper button:hover {
            background: var(--moss);
            color: var(--milk);
            transform: scale(1.06);
        }

        .stepper span { font-weight: 900; min-width: 18px; text-align: center; }

        .booking-grid .btn { border: 0; min-height: 68px; }

        .proof-strip {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: 20px;
        }

        .proof-card {
            background: rgba(255, 250, 244, .72);
            border: 1px solid rgba(23, 25, 22, .1);
            border-radius: 22px;
            padding: 20px;
            transition: transform .26s var(--ease), background .26s var(--ease), box-shadow .26s var(--ease);
        }

        .proof-card:hover {
            background: #fff;
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .proof-card strong {
            color: var(--moss);
            display: block;
            font-family: "Instrument Serif", Georgia, serif;
            font-size: 40px;
            font-weight: 400;
            line-height: .9;
        }

        .proof-card span {
            color: var(--muted);
            display: block;
            font-size: 13px;
            font-weight: 800;
            margin-top: 12px;
            text-transform: uppercase;
        }

        .section {
            padding: 84px 0;
        }

        .section-head {
            align-items: end;
            display: flex;
            gap: 28px;
            justify-content: space-between;
            margin-bottom: 34px;
        }

        .section-head h2 {
            color: var(--ink);
            font-size: clamp(38px, 4.4vw, 62px);
            line-height: .95;
            margin: 0;
            max-width: 760px;
        }

        .stay-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .stay-card {
            background: var(--milk);
            border: 1px solid var(--line);
            border-radius: 26px;
            color: inherit;
            min-height: 360px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
            transition: transform .32s var(--ease), box-shadow .32s var(--ease), border-color .32s var(--ease);
        }

        .stay-card:nth-child(even) { margin-top: 28px; }

        .stay-card:hover {
            border-color: rgba(183, 119, 79, .38);
            box-shadow: var(--shadow);
            transform: translateY(-10px);
        }

        .stay-card img {
            display: block;
            height: 190px;
            object-fit: cover;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .stay-card:hover img { transform: scale(1.08); }

        .stay-card div { padding: 20px; }

        .stay-card h3 {
            color: var(--moss);
            font-size: 28px;
            line-height: 1;
            margin: 0 0 10px;
        }

        .stay-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .journey {
            background: var(--night);
            color: var(--milk);
            padding: 88px 0;
            position: relative;
        }

        .journey .section-head h2 { color: var(--milk); }
        .journey .eyebrow { color: var(--amber); }

        .journey-track {
            display: grid;
            gap: 0;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            position: relative;
        }

        .journey-track::before {
            background: linear-gradient(180deg, var(--amber), rgba(223, 185, 111, .12));
            content: "";
            left: 0;
            position: absolute;
            top: 0;
            transform: scaleY(0);
            transform-origin: top;
            width: 2px;
            bottom: 0;
        }

        .journey-track.in-view::before {
            animation: drawLine 1.2s var(--ease) forwards;
        }

        .journey-step {
            border-left: 1px solid rgba(255, 250, 244, .16);
            min-height: 260px;
            padding: 28px;
            transition: background .28s var(--ease), transform .28s var(--ease);
        }

        .journey-step:hover {
            background: rgba(255, 250, 244, .07);
            transform: translateY(-6px);
        }

        .journey-step b {
            color: var(--amber);
            display: block;
            font-family: "Instrument Serif", Georgia, serif;
            font-size: 44px;
            font-weight: 400;
            line-height: .9;
            margin-bottom: 28px;
        }

        .journey-step h3 {
            color: var(--milk);
            font-size: 22px;
            margin: 0 0 10px;
        }

        .journey-step p {
            color: rgba(255, 250, 244, .66);
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }

        .locations {
            background: var(--shell);
            padding: 84px 0;
        }

        .location-wall {
            display: grid;
            gap: 18px;
            grid-template-columns: 1.15fr .85fr 1fr;
        }

        .location-card {
            align-items: flex-end;
            background: var(--moss);
            border-radius: 28px;
            color: var(--milk);
            display: flex;
            min-height: 230px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
            transition: transform .3s var(--ease), box-shadow .3s var(--ease);
        }

        .location-card:nth-child(1) { grid-row: span 2; min-height: 478px; }
        .location-card:nth-child(4) { grid-column: span 2; }

        .location-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-8px);
        }

        .location-card img {
            height: 100%;
            inset: 0;
            object-fit: cover;
            position: absolute;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .location-card:hover img { transform: scale(1.08); }

        .location-card::after {
            background: linear-gradient(180deg, transparent 28%, rgba(16, 21, 19, .82));
            content: "";
            inset: 0;
            position: absolute;
        }

        .location-card span {
            font-size: 24px;
            font-weight: 800;
            padding: 24px;
            position: relative;
            z-index: 2;
        }

        .cta {
            background: var(--moss);
            color: var(--milk);
            padding: 86px 0;
        }

        .cta-panel {
            align-items: center;
            border: 1px solid rgba(255, 250, 244, .18);
            border-radius: 34px;
            display: grid;
            gap: 34px;
            grid-template-columns: minmax(0, 1fr) auto;
            padding: 48px;
            position: relative;
            overflow: hidden;
        }

        .cta-panel::before {
            background: url("https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?w=1600&h=900&fit=crop&q=76&auto=format") center / cover;
            content: "";
            inset: 0;
            opacity: .22;
            position: absolute;
            transition: transform .8s var(--ease), opacity .3s var(--ease);
        }

        .cta-panel:hover::before {
            opacity: .3;
            transform: scale(1.05);
        }

        .cta-panel > * {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            color: var(--milk);
            font-size: clamp(40px, 5vw, 72px);
            line-height: .92;
            margin: 0 0 16px;
            max-width: 760px;
        }

        .cta p {
            color: rgba(255, 250, 244, .74);
            font-size: 17px;
            line-height: 1.7;
            margin: 0;
            max-width: 620px;
        }

        .cta-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px) scale(.985);
            transition: opacity .7s var(--ease), transform .7s var(--ease);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        #toast {
            background: var(--night);
            border-radius: 999px;
            bottom: 28px;
            box-shadow: var(--shadow);
            color: var(--milk);
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
            outline: 3px solid rgba(223, 185, 111, .7);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .hero-grid,
            .booking-grid,
            .proof-strip,
            .stay-grid,
            .journey-track,
            .cta-panel {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .hero-grid,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .concierge-card {
                max-width: 420px;
            }

            .booking-grid .btn {
                grid-column: 1 / -1;
            }

            .location-wall {
                grid-template-columns: 1fr 1fr;
            }

            .location-card:nth-child(1),
            .location-card:nth-child(4) {
                grid-column: auto;
                grid-row: auto;
                min-height: 300px;
            }
        }

        @media (max-width: 720px) {
            .container {
                width: min(100% - 32px, 1220px);
            }

            .hero {
                min-height: auto;
                padding: 82px 0 74px;
            }

            .hero h1 {
                font-size: 48px;
            }

            .concierge-card {
                display: none;
            }

            .booking-grid,
            .proof-strip,
            .stay-grid,
            .journey-track,
            .location-wall {
                grid-template-columns: 1fr;
            }

            .stay-card:nth-child(even) {
                margin-top: 0;
            }

            .section,
            .journey,
            .locations,
            .cta {
                padding: 64px 0;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .journey-step {
                min-height: auto;
                padding: 24px;
            }

            .location-card,
            .location-card:nth-child(1),
            .location-card:nth-child(4) {
                min-height: 270px;
            }

            .cta-panel {
                padding: 28px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
@endpush

@section('content')
    <main class="page">
        <div id="stickyBar" class="sticky" role="banner" aria-label="Quick enquiry">
            <span class="brand">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-dark">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow reveal">Serviced accommodation, made personal</p>
                    <h1 class="serif reveal">A calmer way to <span>arrive</span>.</h1>
                    <p class="reveal">
                        GRHUM creates fully managed stays for business, relocation, insurance and project clients,
                        combining premium homes with a responsive human support team.
                    </p>
                    <div class="hero-actions reveal">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Plan a stay</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-dark">WhatsApp GRHUM</a>
                    </div>
                </div>

                <aside class="concierge-card reveal">
                    <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=900&h=820&fit=crop&q=76&auto=format" alt="Elegant serviced apartment living room">
                    <h2 class="serif">Concierge-style accommodation support.</h2>
                    <p>From first brief to guest arrival, every detail is shaped around comfort, timing and practical daily life.</p>
                </aside>
            </div>
        </section>

        <section class="booking" aria-label="Search serviced accommodation">
            <div class="container">
                <div class="booking-panel reveal">
                    <div class="booking-grid">
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

                                <button type="button" id="guestDone" class="btn btn-dark" style="width:100%;border:0;">Done</button>
                            </div>
                        </div>

                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-dark">Find your stay</a>
                    </div>
                </div>

                <div class="proof-strip">
                    @foreach($proof as $item)
                        <div class="proof-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <strong>{{ $item['value'] }}</strong>
                            <span>{{ $item['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="stays">
            <div class="container">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Stay categories</p>
                        <h2 class="serif">Different guests. One refined standard.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-dark">Discuss your brief</a>
                </div>

                <div class="stay-grid">
                    @foreach($stayTypes as $type)
                        <a href="https://www.grhum.co.uk/enquire_now" class="stay-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <img src="{{ $type['image'] }}" alt="{{ $type['title'] }}" loading="lazy">
                            <div>
                                <h3 class="serif">{{ $type['title'] }}</h3>
                                <p>{{ $type['copy'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="journey">
            <div class="container">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">How it works</p>
                        <h2 class="serif">A simple journey from brief to arrival.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Start now</a>
                </div>

                <div class="journey-track reveal">
                    @foreach($journey as $item)
                        <article class="journey-step">
                            <b>{{ $item['step'] }}</b>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['copy'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="locations" id="locations">
            <div class="container">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Destinations</p>
                        <h2 class="serif">Local comfort, city by city.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/locations" class="btn btn-dark">Explore locations</a>
                </div>

                <div class="location-wall">
                    @foreach(collect($location)->take(5) as $loc)
                        <a href="https://www.grhum.co.uk/property_enquiry" class="location-card reveal" aria-label="{{ $loc->location_name }}" style="transition-delay: {{ $loop->index * 60 }}ms;">
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
            <div class="container">
                <div class="cta-panel reveal">
                    <div>
                        <p class="eyebrow" style="color:var(--amber);">Ready for your next stay</p>
                        <h2 class="serif">Send the brief. We will shape the solution.</h2>
                        <p>Tell us where, when, who is staying and what matters most. GRHUM will come back with premium serviced accommodation options that fit the moment.</p>
                    </div>
                    <div class="cta-actions">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Enquire now</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-dark">Chat on WhatsApp</a>
                    </div>
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
                setTimeout(function () {
                    panel.classList.remove('is-open');
                }, reducedMotion ? 0 : 180);
            }

            if (toggle && panel) {
                toggle.addEventListener('click', function (event) {
                    event.stopPropagation();
                    if (panel.classList.contains('is-open')) {
                        closePanel();
                    } else {
                        panel.classList.add('is-open');
                        toggle.setAttribute('aria-expanded', 'true');
                        requestAnimationFrame(function () {
                            panel.classList.add('is-visible');
                        });
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

            const stickyBar = document.getElementById('stickyBar');
            const top = document.getElementById('top');

            if (stickyBar && top && 'IntersectionObserver' in window) {
                const stickyObserver = new IntersectionObserver(function (entries) {
                    stickyBar.classList.toggle('visible', !entries[0].isIntersecting);
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
                setTimeout(function () {
                    toast.classList.remove('show');
                }, duration || 3000);
            };
        })();
    </script>
@endpush
