@extends('layouts.app')

@section('title', 'Luxury serviced accommodation made personal - GRHUM')

@php
    $cities = [
        'London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool',
        'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast',
        'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham',
        'Reading', 'Aberdeen', 'Dundee', 'Dublin', 'Cork', 'Coventry', 'Bournemouth'
    ];

    $solutions = [
        ['name' => 'Corporate travel', 'tag' => 'Teams', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=1050&fit=crop&q=75&auto=format', 'desc' => 'Polished homes for business travel, assignments and executive relocation.'],
        ['name' => 'Insurance stays', 'tag' => 'Urgent', 'image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?w=900&h=1050&fit=crop&q=75&auto=format', 'desc' => 'Fast alternative accommodation for guests who need stability quickly.'],
        ['name' => 'Relocation', 'tag' => 'Flexible', 'image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=1050&fit=crop&q=75&auto=format', 'desc' => 'Comfortable interim homes while guests settle into a new city.'],
        ['name' => 'Project crews', 'tag' => 'Practical', 'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&h=1050&fit=crop&q=75&auto=format', 'desc' => 'Well-located accommodation for construction, industrial and production teams.'],
    ];

    $features = [
        ['n' => '01', 't' => 'Rapid placement', 'd' => 'Options sourced quickly for urgent, short-notice and operational briefs.'],
        ['n' => '02', 't' => 'Fully managed', 'd' => 'Support across enquiry, guest matching, arrival and stay management.'],
        ['n' => '03', 't' => 'All-inclusive comfort', 'd' => 'Furnished living, Wi-Fi, utilities and practical guest essentials.'],
        ['n' => '04', 't' => 'Location intelligence', 'd' => 'Homes chosen around workplace, transport, schools, hospitals and daily life.'],
        ['n' => '05', 't' => 'Flexible terms', 'd' => 'Short, extended and project-based stays shaped around your timeline.'],
        ['n' => '06', 't' => 'Human support', 'd' => 'A dedicated team available when plans change or guests need help.'],
    ];

    $facts = [
        ['value' => '60+', 'label' => 'UK & Ireland locations', 'desc' => 'City, regional and project-led accommodation coverage.'],
        ['value' => '24/7', 'label' => 'Dedicated support', 'desc' => 'A real team available before, during and after arrival.'],
        ['value' => '48hr', 'label' => 'Rapid placement', 'desc' => 'Short-notice options for urgent and emergency briefs.'],
        ['value' => '4.8', 'label' => 'Guest confidence', 'desc' => 'A premium stay experience focused on comfort and care.'],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,650;9..144,750&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        :root {
            --ink: #111412;
            --pine: #14352f;
            --pine-2: #0c2420;
            --clay: #9b5f45;
            --copper: #c98155;
            --mist: #e9efe9;
            --porcelain: #f8f4ec;
            --paper: #fffaf2;
            --smoke: #6e746c;
            --line: rgba(17, 20, 18, .12);
            --gold: #d8b46a;
            --blue: #243d51;
            --shadow: 0 24px 80px rgba(17, 20, 18, .14);
            --shadow-strong: 0 34px 90px rgba(17, 20, 18, .22);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--porcelain);
            color: var(--ink);
            font-family: "Manrope", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .home-redesign {
            background:
                linear-gradient(90deg, rgba(17, 20, 18, .045) 1px, transparent 1px),
                linear-gradient(180deg, rgba(17, 20, 18, .045) 1px, transparent 1px),
                var(--porcelain);
            background-size: 44px 44px;
            overflow: hidden;
        }

        @keyframes heroZoom {
            0% { transform: scale(1); background-position: center; }
            100% { transform: scale(1.045); background-position: center 44%; }
        }

        @keyframes floatSoft {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @keyframes shineSweep {
            0% { transform: translateX(-130%) skewX(-14deg); }
            100% { transform: translateX(150%) skewX(-14deg); }
        }

        .wrap {
            margin-inline: auto;
            width: min(1220px, calc(100% - 48px));
        }

        .font-display {
            font-family: "Fraunces", Georgia, serif;
            letter-spacing: -.04em;
        }

        .eyebrow {
            color: var(--clay);
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
            min-height: 48px;
            padding: 0 23px;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            transition: transform .22s var(--ease), box-shadow .22s var(--ease), background .22s var(--ease);
            white-space: nowrap;
        }

        .btn::after {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .34), transparent);
            content: "";
            inset: 0;
            position: absolute;
            transform: translateX(-130%) skewX(-14deg);
            width: 52%;
        }

        .btn:hover::after {
            animation: shineSweep .72s var(--ease);
        }

        .btn-primary {
            background: var(--ink);
            box-shadow: 0 18px 34px rgba(17, 20, 18, .18);
            color: var(--paper);
        }

        .btn-primary:hover {
            background: var(--pine);
            transform: translateY(-2px);
        }

        .btn-light {
            background: var(--paper);
            color: var(--ink);
        }

        .btn-light:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .link {
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
        }

        .link:hover {
            color: var(--clay);
        }

        .sticky-top {
            align-items: center;
            background: rgba(248, 244, 236, .88);
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
            transition: transform .3s var(--ease);
            z-index: 100;
        }

        .sticky-top.visible {
            transform: translateY(0);
        }

        .brand-mark {
            color: var(--pine);
            font-family: "Fraunces", Georgia, serif;
            font-size: 25px;
            font-weight: 750;
            letter-spacing: -.04em;
        }

        .hero {
            background: var(--ink);
            color: var(--paper);
            min-height: 820px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            background:
                linear-gradient(90deg, rgba(17, 20, 18, .94) 0%, rgba(17, 20, 18, .74) 44%, rgba(17, 20, 18, .12) 100%),
                linear-gradient(180deg, rgba(17, 20, 18, .12) 0%, rgba(17, 20, 18, .72) 100%),
                url("https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=2200&h=1300&fit=crop&q=78&auto=format") center / cover;
            content: "";
            inset: -18px;
            position: absolute;
            transform-origin: center;
            animation: heroZoom 18s ease-in-out alternate infinite;
        }

        .hero::after {
            background: linear-gradient(135deg, rgba(201, 129, 85, .92), rgba(216, 180, 106, .92));
            bottom: -58px;
            clip-path: polygon(0 0, 100% 26%, 100% 100%, 0% 100%);
            content: "";
            height: 128px;
            left: 0;
            position: absolute;
            right: 0;
            z-index: 1;
        }

        .hero-inner {
            align-items: center;
            display: grid;
            gap: 42px;
            grid-template-columns: minmax(0, 1.08fr) minmax(310px, .76fr);
            min-height: 820px;
            padding: 118px 0 182px;
            position: relative;
            z-index: 2;
        }

        .hero-kicker {
            align-items: center;
            display: flex;
            gap: 14px;
            margin-bottom: 22px;
        }

        .hero-kicker span {
            background: rgba(255, 250, 242, .1);
            border: 1px solid rgba(255, 250, 242, .2);
            border-radius: 999px;
            color: rgba(255, 250, 242, .84);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .12em;
            padding: 9px 13px;
            text-transform: uppercase;
        }

        .hero h1 {
            color: var(--paper);
            font-size: clamp(58px, 7.6vw, 108px);
            font-weight: 750;
            line-height: .88;
            margin: 0;
            max-width: 900px;
        }

        .hero h1 em {
            color: #f2c978;
            font-style: italic;
        }

        .hero-text {
            color: rgba(255, 250, 242, .78);
            font-size: 18px;
            line-height: 1.7;
            margin: 28px 0 0;
            max-width: 620px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .hero-metrics {
            border-left: 1px solid rgba(255, 250, 242, .22);
            display: flex;
            flex-wrap: wrap;
            gap: 24px 34px;
            margin-top: 44px;
            padding-left: 24px;
        }

        .metric strong {
            color: var(--paper);
            display: block;
            font-family: "Fraunces", Georgia, serif;
            font-size: 38px;
            letter-spacing: -.04em;
            line-height: 1;
        }

        .metric {
            min-width: 128px;
        }

        .metric span {
            color: rgba(255, 250, 242, .64);
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-top: 6px;
        }

        .editorial-stack {
            align-self: end;
            display: grid;
            gap: 16px;
            grid-template-columns: .8fr 1fr;
            transform: translateY(10px);
        }

        .editorial-card {
            background: var(--paper);
            border-radius: 28px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22);
            color: var(--ink);
            overflow: hidden;
            transition: transform .35s var(--ease), box-shadow .35s var(--ease);
            animation: floatSoft 7s ease-in-out infinite;
        }

        .editorial-card:hover {
            box-shadow: 0 36px 90px rgba(0, 0, 0, .28);
            transform: translateY(-8px) rotate(-1deg);
        }

        .editorial-card img {
            display: block;
            height: 270px;
            object-fit: cover;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .editorial-card:hover img {
            transform: scale(1.07);
        }

        .editorial-card-content {
            padding: 22px;
        }

        .editorial-card-content b {
            color: var(--pine);
            display: block;
            font-size: 18px;
            line-height: 1.22;
            margin-bottom: 8px;
        }

        .editorial-card-content p {
            color: var(--smoke);
            font-size: 13px;
            line-height: 1.55;
            margin: 0;
        }

        .vertical-label {
            align-items: center;
            background: var(--copper);
            border-radius: 999px;
            color: var(--paper);
            display: flex;
            font-size: 12px;
            font-weight: 900;
            justify-content: center;
            letter-spacing: .16em;
            min-height: 260px;
            text-orientation: mixed;
            text-transform: uppercase;
            transform: translateY(38px);
            box-shadow: 0 22px 60px rgba(201, 129, 85, .28);
            writing-mode: vertical-rl;
        }

        .search-shell {
            margin-top: -78px;
            position: relative;
            z-index: 4;
        }

        .search-box {
            background: var(--paper);
            border: 1px solid rgba(255, 255, 255, .7);
            border-radius: 30px;
            box-shadow: var(--shadow);
            padding: 14px;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .search-box:hover {
            box-shadow: var(--shadow-strong);
            transform: translateY(-3px);
        }

        .search-grid {
            display: grid;
            gap: 10px;
            grid-template-columns: 1.4fr 1fr 1fr 1.15fr auto;
        }

        .field {
            background: var(--porcelain);
            border: 1px solid transparent;
            border-radius: 22px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-height: 78px;
            padding: 15px 17px;
            transition: background .2s var(--ease), border-color .2s var(--ease), transform .2s var(--ease);
            width: 100%;
        }

        .field:hover,
        .field:focus-within {
            background: #fff;
            border-color: var(--line);
            transform: translateY(-1px);
        }

        .field-label {
            color: var(--clay);
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
            font: 800 15px/1.2 "Manrope", sans-serif;
            outline: 0;
            width: 100%;
        }

        .field-value {
            color: var(--ink);
            font-size: 15px;
            font-weight: 800;
        }

        .search-grid .btn {
            border: 0;
            min-height: 78px;
        }

        .guest-wrap {
            position: relative;
        }

        .guest-panel {
            background: #fff;
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

        .guest-panel.is-open {
            display: block;
        }

        .guest-panel.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .guest-row {
            align-items: center;
            display: flex;
            justify-content: space-between;
            padding: 12px;
        }

        .guest-row strong {
            display: block;
            font-size: 15px;
        }

        .guest-row small {
            color: var(--smoke);
            display: block;
            font-size: 12px;
            margin-top: 3px;
        }

        .stepper {
            align-items: center;
            display: flex;
            gap: 12px;
        }

        .stepper button {
            background: var(--porcelain);
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--pine);
            cursor: pointer;
            font-size: 18px;
            font-weight: 900;
            height: 34px;
            line-height: 1;
            width: 34px;
            transition: background .18s var(--ease), color .18s var(--ease), transform .18s var(--ease);
        }

        .stepper button:hover {
            background: var(--pine);
            color: var(--paper);
            transform: scale(1.06);
        }

        .stepper span {
            font-weight: 900;
            min-width: 18px;
            text-align: center;
        }

        .trust-ribbon {
            display: grid;
            gap: 1px;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            margin-top: 26px;
            overflow: hidden;
            border-radius: 24px;
            box-shadow: 0 18px 45px rgba(17, 20, 18, .06);
        }

        .trust-ribbon span {
            background: rgba(255, 250, 242, .78);
            color: var(--smoke);
            font-size: 13px;
            font-weight: 800;
            /* min-height: 64px; */
            padding: 18px;
            transition: background .24s var(--ease), color .24s var(--ease), transform .24s var(--ease);
        }

        .trust-ribbon span:hover {
            background: var(--ink);
            color: var(--paper);
            transform: translateY(-2px);
        }

        .trust-ribbon strong {
            color: var(--ink);
        }

        .trust-ribbon span:hover strong {
            color: var(--gold);
        }

        .facts {
            padding: 76px 0 42px;
        }

        .fact-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .fact-card {
            background: rgba(255, 250, 242, .86);
            border: 1px solid var(--line);
            border-radius: 30px;
            min-height: 220px;
            overflow: hidden;
            padding: 28px;
            position: relative;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease), background .28s var(--ease);
        }

        .fact-card::before {
            background: linear-gradient(135deg, rgba(201, 129, 85, .22), rgba(216, 180, 106, .18));
            border-radius: 999px;
            content: "";
            height: 120px;
            position: absolute;
            right: -42px;
            top: -42px;
            transition: transform .32s var(--ease), opacity .32s var(--ease);
            width: 120px;
        }

        .fact-card:hover {
            background: #fffdf8;
            box-shadow: var(--shadow);
            transform: translateY(-8px);
        }

        .fact-card:hover::before {
            opacity: .9;
            transform: scale(1.28);
        }

        .fact-card strong {
            color: var(--pine);
            display: block;
            font-family: "Fraunces", Georgia, serif;
            font-size: 48px;
            line-height: .94;
            margin-bottom: 24px;
            position: relative;
        }

        .fact-card h3 {
            color: var(--ink);
            font-size: 18px;
            margin: 0 0 9px;
            position: relative;
        }

        .fact-card p {
            color: var(--smoke);
            font-size: 14px;
            line-height: 1.62;
            margin: 0;
            position: relative;
        }

        .section {
            padding: 104px 0;
        }

        .section-head {
            align-items: end;
            display: grid;
            gap: 28px;
            grid-template-columns: minmax(0, 1fr) auto;
            margin-bottom: 44px;
        }

        .section-head h2 {
            color: var(--ink);
            font-size: clamp(38px, 4.6vw, 66px);
            font-weight: 750;
            line-height: .96;
            margin: 0;
            max-width: 780px;
        }

        .solution-layout {
            display: grid;
            gap: 20px;
            grid-template-columns: 1.1fr .9fr;
        }

        .solution-large {
            background: var(--pine);
            border-radius: 34px;
            color: var(--paper);
            display: grid;
            min-height: 620px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
            transition: transform .32s var(--ease), box-shadow .32s var(--ease);
        }

        .solution-large:hover {
            box-shadow: var(--shadow-strong);
            transform: translateY(-8px);
        }

        .solution-large img {
            height: 100%;
            inset: 0;
            object-fit: cover;
            opacity: .5;
            position: absolute;
            transition: opacity .32s var(--ease), transform .55s var(--ease);
            width: 100%;
        }

        .solution-large:hover img {
            opacity: .62;
            transform: scale(1.06);
        }

        .solution-large::after {
            background: linear-gradient(180deg, transparent 15%, rgba(12, 36, 32, .92) 100%);
            content: "";
            inset: 0;
            position: absolute;
        }

        .solution-large-content {
            align-self: end;
            padding: 42px;
            position: relative;
            z-index: 2;
        }

        .solution-large-content h3 {
            font-size: clamp(36px, 4.2vw, 62px);
            font-weight: 750;
            line-height: .98;
            margin: 0 0 16px;
        }

        .solution-large-content p {
            color: rgba(255, 250, 242, .74);
            font-size: 16px;
            line-height: 1.7;
            margin: 0;
            max-width: 520px;
        }

        .solution-list {
            display: grid;
            gap: 16px;
        }

        .solution-mini {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 28px;
            color: inherit;
            display: grid;
            gap: 18px;
            grid-template-columns: 160px minmax(0, 1fr);
            min-height: 144px;
            overflow: hidden;
            text-decoration: none;
            transition: transform .25s var(--ease), box-shadow .25s var(--ease), border-color .25s var(--ease);
        }

        .solution-mini:hover {
            border-color: rgba(201, 129, 85, .34);
            box-shadow: var(--shadow);
            transform: translateY(-6px) translateX(4px);
        }

        .solution-mini img {
            height: 100%;
            object-fit: cover;
            transition: transform .45s var(--ease);
            width: 100%;
        }

        .solution-mini:hover img {
            transform: scale(1.08);
        }

        .solution-mini-content {
            align-self: center;
            padding: 20px 20px 20px 0;
        }

        .pill {
            background: var(--mist);
            border-radius: 999px;
            color: var(--pine);
            display: inline-flex;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .1em;
            margin-bottom: 10px;
            padding: 7px 10px;
            text-transform: uppercase;
        }

        .solution-mini h3 {
            color: var(--ink);
            font-size: 19px;
            margin: 0 0 7px;
        }

        .solution-mini p {
            color: var(--smoke);
            font-size: 13px;
            line-height: 1.55;
            margin: 0;
        }

        .why-band {
            background:
                linear-gradient(135deg, rgba(12, 36, 32, .94), rgba(20, 53, 47, .88)),
                url("https://images.unsplash.com/photo-1600210492493-0946911123ea?w=2000&h=1200&fit=crop&q=75&auto=format") center / cover;
            color: var(--paper);
            padding: 118px 0;
            position: relative;
        }

        .why-band::before {
            background: linear-gradient(90deg, transparent, rgba(216, 180, 106, .42), transparent);
            content: "";
            height: 1px;
            left: 8%;
            position: absolute;
            right: 8%;
            top: 0;
        }

        .why-grid {
            display: grid;
            gap: 1px;
            grid-template-columns: repeat(3, 1fr);
            overflow: hidden;
            border-radius: 34px;
        }

        .feature {
            background: rgba(255, 250, 242, .075);
            min-height: 240px;
            padding: 32px;
            position: relative;
            transition: background .25s var(--ease), transform .25s var(--ease);
        }

        .feature::after {
            background: var(--gold);
            bottom: 0;
            content: "";
            height: 3px;
            left: 0;
            position: absolute;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .28s var(--ease);
            width: 100%;
        }

        .feature:hover {
            background: rgba(255, 250, 242, .12);
            transform: translateY(-4px);
        }

        .feature:hover::after {
            transform: scaleX(1);
        }

        .feature b {
            color: var(--gold);
            display: block;
            font-family: "Fraunces", Georgia, serif;
            font-size: 34px;
            margin-bottom: 24px;
        }

        .feature h3 {
            color: var(--paper);
            font-size: 20px;
            margin: 0 0 10px;
        }

        .feature p {
            color: rgba(255, 250, 242, .68);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .locations {
            background: var(--mist);
            padding: 118px 0 108px;
        }

        .location-controls {
            align-items: center;
            display: flex;
            gap: 10px;
        }

        .arrow {
            align-items: center;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--ink);
            cursor: pointer;
            display: inline-flex;
            font-size: 18px;
            font-weight: 900;
            height: 46px;
            justify-content: center;
            width: 46px;
            transition: background .2s var(--ease), color .2s var(--ease), transform .2s var(--ease);
        }

        .arrow:hover {
            background: var(--ink);
            color: var(--paper);
            transform: translateY(-2px);
        }

        .location-rail {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            padding: 4px 0 20px;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
        }

        .location-rail::-webkit-scrollbar {
            display: none;
        }

        .location-card {
            align-items: flex-end;
            background: var(--pine);
            border-radius: 34px;
            color: var(--paper);
            display: flex;
            flex: 0 0 330px;
            height: 430px;
            overflow: hidden;
            position: relative;
            scroll-snap-align: start;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .location-card:hover {
            box-shadow: var(--shadow-strong);
            transform: translateY(-10px);
        }

        .location-card:nth-child(even) {
            height: 350px;
            margin-top: 80px;
        }

        .location-card img {
            height: 100%;
            inset: 0;
            object-fit: cover;
            position: absolute;
            transition: transform .5s var(--ease);
            width: 100%;
        }

        .location-card:hover img {
            transform: scale(1.08);
        }

        .location-card::after {
            background: linear-gradient(180deg, transparent 35%, rgba(17, 20, 18, .82));
            content: "";
            inset: 0;
            position: absolute;
        }

        .location-card span {
            font-size: 24px;
            font-weight: 900;
            padding: 26px;
            position: relative;
            transition: transform .28s var(--ease);
            z-index: 2;
        }

        .location-card:hover span {
            transform: translateY(-6px);
        }

        .cta {
            background: var(--paper);
            padding: 116px 0;
        }

        .cta-panel {
            align-items: center;
            background:
                linear-gradient(90deg, rgba(17, 20, 18, .88), rgba(17, 20, 18, .42)),
                url("https://images.unsplash.com/photo-1600607688969-a5bfcd646154?w=1900&h=900&fit=crop&q=78&auto=format") center / cover;
            border-radius: 40px;
            color: var(--paper);
            display: grid;
            gap: 28px;
            grid-template-columns: minmax(0, 1fr) auto;
            min-height: 430px;
            overflow: hidden;
            padding: 56px;
            position: relative;
            transition: transform .32s var(--ease), box-shadow .32s var(--ease);
        }

        .cta-panel::after {
            border: 1px solid rgba(255, 250, 242, .2);
            border-radius: 30px;
            content: "";
            inset: 18px;
            pointer-events: none;
            position: absolute;
        }

        .cta-panel:hover {
            box-shadow: var(--shadow-strong);
            transform: translateY(-6px);
        }

        .cta h2 {
            color: var(--paper);
            font-size: clamp(40px, 5vw, 76px);
            font-weight: 750;
            line-height: .94;
            margin: 0 0 18px;
            max-width: 780px;
            position: relative;
            z-index: 1;
        }

        .cta p {
            color: rgba(255, 250, 242, .75);
            font-size: 17px;
            line-height: 1.7;
            margin: 0;
            max-width: 560px;
            position: relative;
            z-index: 1;
        }

        .cta .eyebrow {
            position: relative;
            z-index: 1;
        }

        .cta-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px) scale(.985);
            transition: opacity .68s var(--ease), transform .68s var(--ease);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0) scale(1);
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
            z-index: 999;
        }

        #toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        a:focus-visible,
        button:focus-visible,
        select:focus-visible,
        input:focus-visible {
            outline: 3px solid rgba(201, 129, 85, .62);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .hero-inner,
            .solution-layout,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .editorial-stack {
                max-width: 560px;
            }

            .search-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-grid .btn {
                grid-column: 1 / -1;
            }

            .fact-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .trust-ribbon {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .wrap {
                width: min(100% - 32px, 1220px);
            }

            .hero,
            .hero-inner {
                min-height: auto;
            }

            .hero-inner {
                padding: 92px 0 132px;
            }

            .hero h1 {
                font-size: 48px;
            }

            .editorial-stack {
                display: none;
            }

            .search-grid,
            .trust-ribbon,
            .section-head,
            .fact-grid,
            .why-grid {
                grid-template-columns: 1fr;
            }

            .facts {
                padding: 58px 0 18px;
            }

            .solution-mini {
                grid-template-columns: 120px minmax(0, 1fr);
            }

            .solution-large {
                min-height: 500px;
            }

            .section,
            .why-band,
            .locations,
            .cta {
                padding-block: 82px;
            }

            .solution-large-content,
            .feature,
            .cta-panel {
                padding: 28px;
            }

            .location-card,
            .location-card:nth-child(even) {
                flex-basis: 82vw;
                height: 360px;
                margin-top: 0;
            }

            .cta-actions {
                align-items: flex-start;
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
    <main class="home-redesign">
        <div id="stickyBar" class="sticky-top" role="banner" aria-label="Quick enquiry bar">
            <span class="brand-mark">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="wrap hero-inner">
                <div>
                    <div class="hero-kicker reveal">
                        <span>Serviced homes</span>
                        <span>UK &amp; Ireland</span>
                    </div>
                    <h1 class="font-display reveal">Stay somewhere that feels <em>considered</em>.</h1>
                    <p class="hero-text reveal">
                        GRHUM arranges refined serviced accommodation for business travel, relocation,
                        insurance stays and urgent housing, with comfort handled from the first enquiry.
                    </p>
                    <div class="hero-actions reveal">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Start an enquiry</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-primary">WhatsApp us</a>
                    </div>
                    <div class="hero-metrics reveal">
                        <div class="metric">
                            <strong data-count-to="60" data-decimals="0">0</strong>
                            <span>locations across the UK and Ireland</span>
                        </div>
                        <div class="metric">
                            <strong data-count-to="48" data-decimals="0">0</strong>
                            <span>hour rapid placement options</span>
                        </div>
                        <div class="metric">
                            <strong data-count-to="4.8" data-decimals="1">0.0</strong>
                            <span>guest confidence rating</span>
                        </div>
                    </div>
                </div>

                <div class="editorial-stack reveal" aria-label="Featured accommodation standard">
                    <div class="vertical-label">Fully managed stays</div>
                    <article class="editorial-card">
                        <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=760&h=900&fit=crop&q=76&auto=format" alt="Premium serviced accommodation interior">
                        <div class="editorial-card-content">
                            <b>More privacy than a hotel. More support than a rental.</b>
                            <p>Homes selected around daily living, business needs and guest comfort.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="search-shell" aria-label="Accommodation search">
            <div class="wrap">
                <div class="search-box reveal">
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

                                <button type="button" id="guestDone" class="btn btn-primary" style="width:100%;border:0;">Done</button>
                            </div>
                        </div>

                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Find a stay</a>
                    </div>
                </div>

                <div class="trust-ribbon reveal">
                    <span><strong>&#9733;&#9733;&#9733;&#9733;&#9733;</strong> 4.8 / 5 Trustpilot</span>
                    <span><strong>24/7</strong> guest support</span>
                    <span><strong>All-in</strong> pricing options</span>
                    <span><strong>60+</strong> locations</span>
                    <span><strong>48hr</strong> rapid placement</span>
                </div>
            </div>
        </section>

        <section class="facts" aria-label="GRHUM service facts">
            <div class="wrap">
                <div class="fact-grid">
                    @foreach($facts as $fact)
                        <article class="fact-card reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <strong>{{ $fact['value'] }}</strong>
                            <h3>{{ $fact['label'] }}</h3>
                            <p>{{ $fact['desc'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="solutions" class="section">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">A different way to stay</p>
                        <h2 class="font-display">One brief, many carefully matched homes.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="link">Discuss your needs &rarr;</a>
                </div>

                <div class="solution-layout">
                    <a href="https://www.grhum.co.uk/enquire_now" class="solution-large reveal">
                        <img src="{{ $solutions[0]['image'] }}" alt="{{ $solutions[0]['name'] }}">
                        <div class="solution-large-content">
                            <span class="pill">{{ $solutions[0]['tag'] }}</span>
                            <h3 class="font-display">{{ $solutions[0]['name'] }}</h3>
                            <p>{{ $solutions[0]['desc'] }}</p>
                        </div>
                    </a>

                    <div class="solution-list">
                        @foreach(array_slice($solutions, 1) as $solution)
                            <a href="https://www.grhum.co.uk/enquire_now" class="solution-mini reveal" style="transition-delay: {{ $loop->index * 70 }}ms;">
                                <img src="{{ $solution['image'] }}" alt="{{ $solution['name'] }}" loading="lazy">
                                <div class="solution-mini-content">
                                    <span class="pill">{{ $solution['tag'] }}</span>
                                    <h3>{{ $solution['name'] }}</h3>
                                    <p>{{ $solution['desc'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="why" class="why-band">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow" style="color:#f2c978;">Why clients choose us</p>
                        <h2 class="font-display" style="color:var(--paper);">Designed for real life, managed for real deadlines.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Get help today</a>
                </div>

                <div class="why-grid">
                    @foreach($features as $feature)
                        <article class="feature reveal" style="transition-delay: {{ $loop->index * 55 }}ms;">
                            <b>{{ $feature['n'] }}</b>
                            <h3>{{ $feature['t'] }}</h3>
                            <p>{{ $feature['d'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="locations" class="locations">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Destinations</p>
                        <h2 class="font-display">A city-to-city network with local comfort.</h2>
                    </div>
                    <div class="location-controls">
                        <button type="button" class="arrow" data-dir="-1" aria-label="Previous locations">&larr;</button>
                        <button type="button" class="arrow" data-dir="1" aria-label="Next locations">&rarr;</button>
                        <a href="https://www.grhum.co.uk/locations" class="link">All locations &rarr;</a>
                    </div>
                </div>

                <div class="location-rail" id="locSlider">
                    @foreach($location as $loc)
                        <a href="https://www.grhum.co.uk/property_enquiry" class="location-card" aria-label="{{ $loc->location_name }}">
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
                        <p class="eyebrow" style="color:#f2c978;">Ready when plans change</p>
                        <h2 class="font-display">Send the brief. We will build the stay.</h2>
                        <p>Tell us the location, dates, guest profile and priorities. GRHUM will respond with accommodation options that feel practical, premium and properly managed.</p>
                    </div>
                    <div class="cta-actions">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-light">Enquire now</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-primary">WhatsApp GRHUM</a>
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
                    if (checkOut.value && checkOut.value < this.value) {
                        checkOut.value = this.value;
                    }
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

            function openPanel() {
                if (!panel || !toggle) return;
                panel.classList.add('is-open');
                toggle.setAttribute('aria-expanded', 'true');
                requestAnimationFrame(function () {
                    panel.classList.add('is-visible');
                });
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
                    panel.classList.contains('is-open') ? closePanel() : openPanel();
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

            function animateCount(element) {
                const target = parseFloat(element.dataset.countTo);
                const decimals = parseInt(element.dataset.decimals, 10) || 0;
                if (reducedMotion) {
                    element.textContent = target.toFixed(decimals);
                    return;
                }

                const start = performance.now();
                const duration = 1100;

                function tick(now) {
                    const progress = Math.min(1, (now - start) / duration);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    element.textContent = (target * eased).toFixed(decimals);
                    if (progress < 1) requestAnimationFrame(tick);
                }

                requestAnimationFrame(tick);
            }

            if ('IntersectionObserver' in window) {
                const countObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            animateCount(entry.target);
                            countObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: .65 });

                document.querySelectorAll('[data-count-to]').forEach(function (element) {
                    countObserver.observe(element);
                });
            }

            const slider = document.getElementById('locSlider');
            if (slider) {
                document.querySelectorAll('.arrow').forEach(function (button) {
                    button.addEventListener('click', function () {
                        const direction = parseInt(button.dataset.dir, 10);
                        const card = slider.querySelector('.location-card');
                        const step = card ? card.offsetWidth + 18 : 348;
                        slider.scrollBy({ left: direction * step * 2, behavior: 'smooth' });
                    });
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
