@extends('layouts.app')

@section('title', 'Premium serviced accommodation - GRHUM')

@php
    $cities = [
        'London', 'Edinburgh', 'Manchester', 'Birmingham', 'Bristol', 'Liverpool',
        'Glasgow', 'Leeds', 'Cardiff', 'Oxford', 'Newcastle Upon Tyne', 'Belfast',
        'Sheffield', 'Milton Keynes', 'Cambridge', 'Southampton', 'Nottingham',
        'Reading', 'Aberdeen', 'Dundee', 'Dublin', 'Cork', 'Coventry', 'Bournemouth'
    ];

    $solutions = [
        ['title' => 'Corporate travel', 'copy' => 'Premium homes for business guests, leadership teams and consultants.', 'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&h=760&fit=crop&q=76&auto=format'],
        ['title' => 'Relocation living', 'copy' => 'Comfortable interim stays while guests settle into their next city.', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=760&fit=crop&q=76&auto=format'],
        ['title' => 'Insurance accommodation', 'copy' => 'Fast, calm accommodation support when home is temporarily unavailable.', 'image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=900&h=760&fit=crop&q=76&auto=format'],
    ];

    $features = [
        ['n' => '01', 'title' => 'Curated homes', 'copy' => 'Fully furnished accommodation selected around comfort, location and daily living.'],
        ['n' => '02', 'title' => 'Fast placement', 'copy' => 'Shortlists prepared quickly for urgent, corporate and project-based requirements.'],
        ['n' => '03', 'title' => 'All-inclusive ease', 'copy' => 'Utilities, Wi-Fi and practical essentials arranged for a smoother stay.'],
        ['n' => '04', 'title' => 'Human support', 'copy' => 'A dedicated team available from enquiry through arrival and extension.'],
    ];

    $stats = [
        ['value' => '60+', 'label' => 'locations'],
        ['value' => '48hr', 'label' => 'rapid placement'],
        ['value' => '24/7', 'label' => 'support'],
        ['value' => '4.8', 'label' => 'trust rating'],
    ];

    $destinationFallbacks = [
        'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=1800&h=980&fit=crop&q=82&auto=format',
        'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=1800&h=980&fit=crop&q=82&auto=format',
        'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=1800&h=980&fit=crop&q=82&auto=format',
        'https://images.unsplash.com/photo-1505761671935-60b3a7427bad?w=1800&h=980&fit=crop&q=82&auto=format',
        'https://images.unsplash.com/photo-1518005020951-eccb494ad742?w=1800&h=980&fit=crop&q=82&auto=format',
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,650;9..144,750&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --ink: #202520;
            --muted: #71756d;
            --ivory: #fffaf1;
            --porcelain: #f7f2ea;
            --white: #ffffff;
            --sage: #b8d2bf;
            --jade: #4f8f77;
            --pearl-blue: #dceef1;
            --lilac: #e5d8ef;
            --rose: #f0c8bf;
            --champagne: #d9b86c;
            --plum: #80617f;
            --line: rgba(32, 37, 32, .12);
            --shadow: 0 26px 80px rgba(56, 68, 60, .14);
            --shadow-strong: 0 34px 100px rgba(56, 68, 60, .2);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        body {
            background: var(--porcelain);
            color: var(--ink);
            font-family: "Manrope", system-ui, sans-serif;
        }

        .aurora-page {
            background:
                radial-gradient(circle at 16% 7%, rgba(240, 200, 191, .75), transparent 25rem),
                radial-gradient(circle at 84% 10%, rgba(220, 238, 241, .9), transparent 30rem),
                radial-gradient(circle at 55% 38%, rgba(229, 216, 239, .56), transparent 28rem),
                linear-gradient(180deg, #fffaf1 0%, #f6f2eb 50%, #eef6ef 100%);
            overflow: hidden;
        }

        .wrap {
            margin-inline: auto;
            width: min(1210px, calc(100% - 48px));
        }

        .display {
            font-family: "Fraunces", Georgia, serif;
            font-weight: 650;
            letter-spacing: -.045em;
        }

        .eyebrow {
            color: var(--plum);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .18em;
            margin: 0 0 14px;
            text-transform: uppercase;
        }

        .btn {
            align-items: center;
            border: 0;
            border-radius: 999px;
            cursor: pointer;
            display: inline-flex;
            font-size: 14px;
            font-weight: 900;
            justify-content: center;
            min-height: 50px;
            padding: 0 25px;
            text-decoration: none;
            transition: transform .24s var(--ease), box-shadow .24s var(--ease), background .24s var(--ease);
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f1d28a, #d3a75d);
            box-shadow: 0 18px 34px rgba(211, 167, 93, .3);
            color: #2c2110;
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
            color: var(--jade);
            font-family: "Fraunces", Georgia, serif;
            font-size: 30px;
            font-weight: 650;
            letter-spacing: -.045em;
        }

        .hero {
            padding: 88px 0 34px;
        }

        .hero-shell {
            display: grid;
            gap: 26px;
            grid-template-columns: minmax(0, .94fr) minmax(420px, 1.06fr);
            align-items: center;
        }

        .hero-copy {
            padding: 30px 0;
        }

        .hero h1 {
            font-size: clamp(54px, 7.2vw, 102px);
            line-height: .9;
            margin: 0;
            max-width: 760px;
        }

        .hero h1 span {
            color: var(--jade);
            font-style: italic;
        }

        .hero-text {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.72;
            margin: 24px 0 0;
            max-width: 590px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .stat-row {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: 34px;
            max-width: 620px;
        }

        .stat {
            background: rgba(255, 255, 255, .62);
            border: 1px solid rgba(255, 255, 255, .88);
            border-radius: 24px;
            padding: 16px;
            transition: transform .24s var(--ease), background .24s var(--ease);
        }

        .stat:hover {
            background: var(--white);
            transform: translateY(-5px);
        }

        .stat strong {
            color: var(--plum);
            display: block;
            font-family: "Fraunces", Georgia, serif;
            font-size: 30px;
            line-height: .95;
        }

        .stat span {
            color: var(--muted);
            display: block;
            font-size: 12px;
            font-weight: 800;
            margin-top: 6px;
            text-transform: uppercase;
        }

        .portrait-stage {
            min-height: 590px;
            position: relative;
        }

        .portrait-main {
            background: var(--white);
            border: 9px solid rgba(255, 255, 255, .76);
            border-radius: 999px 999px 90px 90px;
            box-shadow: var(--shadow-strong);
            height: 580px;
            margin-left: auto;
            max-width: 470px;
            overflow: hidden;
            position: relative;
        }

        .portrait-main img,
        .mini-photo img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .75s var(--ease);
            width: 100%;
        }

        .portrait-main:hover img,
        .mini-photo:hover img {
            transform: scale(1.07);
        }

        .mini-photo {
            background: var(--white);
            border: 7px solid rgba(255, 255, 255, .75);
            border-radius: 36px;
            box-shadow: var(--shadow);
            height: 188px;
            overflow: hidden;
            position: absolute;
            width: 230px;
        }

        .mini-photo.one {
            left: 0;
            top: 52px;
            border-radius: 90px 34px 34px 34px;
        }

        .mini-photo.two {
            bottom: 62px;
            left: 36px;
            border-radius: 34px 34px 90px 34px;
        }

        .quality-card {
            background: rgba(255, 250, 241, .88);
            border: 1px solid rgba(255, 255, 255, .86);
            border-radius: 30px;
            bottom: 28px;
            box-shadow: var(--shadow);
            max-width: 280px;
            padding: 20px;
            position: absolute;
            right: 18px;
        }

        .quality-card b {
            display: block;
            font-size: 16px;
            margin-bottom: 6px;
        }

        .quality-card small {
            color: var(--muted);
            display: block;
            font-size: 12px;
            line-height: 1.55;
        }

        .search-dock {
            margin-top: 24px;
        }

        .search-panel {
            background: rgba(255, 255, 255, .7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, .9);
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
            color: var(--plum);
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
            background: #f3eff8;
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--plum);
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
            padding: 84px 0;
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
            max-width: 760px;
        }

        .solution-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .solution-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 38px;
            box-shadow: 0 16px 44px rgba(56, 68, 60, .08);
            color: inherit;
            overflow: hidden;
            padding: 12px;
            text-decoration: none;
            transition: transform .28s var(--ease), box-shadow .28s var(--ease);
        }

        .solution-card:hover {
            box-shadow: var(--shadow-strong);
            transform: translateY(-8px);
        }

        .solution-image {
            aspect-ratio: 1.28;
            border-radius: 30px;
            overflow: hidden;
        }

        .solution-card img {
            display: block;
            height: 100%;
            object-fit: cover;
            transition: transform .55s var(--ease);
            width: 100%;
        }

        .solution-card:hover img { transform: scale(1.06); }

        .solution-card div:last-child { padding: 22px 12px 10px; }

        .solution-card h3 {
            font-size: 25px;
            margin: 0 0 8px;
        }

        .solution-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .feature-band {
            background:
                linear-gradient(135deg, rgba(220, 238, 241, .72), rgba(229, 216, 239, .58), rgba(240, 200, 191, .52));
            padding: 78px 0;
        }

        .feature-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .feature-card {
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .86);
            border-radius: 34px;
            min-height: 230px;
            padding: 26px;
            transition: transform .28s var(--ease), background .28s var(--ease), box-shadow .28s var(--ease);
        }

        .feature-card:hover {
            background: var(--white);
            box-shadow: var(--shadow);
            transform: translateY(-7px);
        }

        .feature-card b {
            color: var(--plum);
            display: block;
            font-family: "Fraunces", Georgia, serif;
            font-size: 38px;
            line-height: .95;
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
            background: transparent;
            overflow: hidden;
            padding: 132px 0 86px;
            position: relative;
        }

        .locations-container {
            margin-inline: auto;
            width: min(1210px, calc(100% - 48px));
        }

        .destination-head {
            align-items: flex-end;
            display: grid;
            gap: 22px;
            grid-template-columns: minmax(0, 1fr) auto;
            margin-bottom: 26px;
        }

        .destination-head h2 {
            font-size: clamp(38px, 4.6vw, 66px);
            line-height: .98;
            margin: 0;
            max-width: 780px;
        }

        .destination-actions {
            align-items: center;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .destination-stage {
            align-items: center;
            display: grid;
            min-height: clamp(350px, 35vw, 540px);
            overflow: hidden;
            position: relative;
            width: 100vw;
            left: 50%;
            margin-left: -50vw;
        }

        .destination-word {
            align-items: center;
            display: flex;
            gap: clamp(14px, 1.25vw, 26px);
            justify-content: center;
            margin: 0 auto;
            max-width: none;
            width: min(100vw, 1700px);
        }

        .destination-letter {
            appearance: none;
            background-color: transparent;
            border: 0;
            color: transparent;
            cursor: pointer;
            display: inline-block;
            flex: 0 1 auto;
            font-family: "Manrope", system-ui, sans-serif;
            font-size: clamp(150px, 21.8vw, 385px);
            font-weight: 900;
            letter-spacing: -.085em;
            line-height: .76;
            min-width: 0;
            overflow: hidden;
            padding: 0 .04em 0 0;
            position: relative;
            text-align: center;
            text-transform: uppercase;
            -webkit-text-fill-color: transparent;
            transition: filter .24s var(--ease), transform .24s var(--ease);
            user-select: none;
        }

        .destination-letter::before,
        .destination-letter::after {
            background-position: center;
            background-size: cover;
            color: transparent;
            content: attr(data-letter);
            inset: 0;
            pointer-events: none;
            position: absolute;
            text-align: center;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: transform .92s var(--ease);
        }

        .destination-letter::before {
            background-image: var(--letter-image);
            transform: translateX(0);
        }

        .destination-letter::after {
            background-image: var(--letter-next-image);
            transform: translateX(var(--letter-enter, 112%));
        }

        .destination-letter.is-sliding-next::before {
            transform: translateX(-112%);
        }

        .destination-letter.is-sliding-prev::before {
            transform: translateX(112%);
        }

        .destination-letter.is-sliding-next::after,
        .destination-letter.is-sliding-prev::after {
            transform: translateX(0);
        }

        .destination-letter.is-committing::before,
        .destination-letter.is-committing::after {
            transition: none;
        }

        .destination-letter:hover,
        .destination-letter:focus-visible {
            filter: saturate(1.12) contrast(1.04);
            transform: translateY(-8px);
        }

        .destination-nav {
            align-items: center;
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 50%;
            box-shadow: 0 16px 42px rgba(56, 68, 60, .12);
            color: var(--ink);
            cursor: pointer;
            display: grid;
            font-size: 34px;
            font-weight: 800;
            height: 56px;
            justify-content: center;
            line-height: 1;
            position: static;
            transition: transform .22s var(--ease), background .22s var(--ease), box-shadow .22s var(--ease);
            width: 56px;
            z-index: 2;
        }

        .destination-nav:hover {
            background: var(--white);
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .destination-meta {
            align-items: center;
            display: flex;
            gap: 14px;
            justify-content: center;
            margin-top: 8px;
            position: relative;
            z-index: 2;
        }

        .destination-current {
            color: var(--muted);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: .18em;
            min-width: 160px;
            text-align: center;
            text-transform: uppercase;
        }

        .destination-dots {
            display: flex;
            gap: 16px;
            justify-content: flex-start;
            margin-top: 18px;
            position: relative;
            z-index: 2;
        }

        .destination-dot {
            background: rgba(32, 37, 32, .24);
            border: 0;
            border-radius: 50%;
            cursor: pointer;
            height: 10px;
            padding: 0;
            transition: background .22s var(--ease), transform .22s var(--ease);
            width: 10px;
        }

        .destination-dot.is-active {
            background: var(--ink);
            transform: scale(1.08);
        }

        .destination-perks {
            border-top: 1px solid rgba(32, 37, 32, .09);
            display: grid;
            gap: 22px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: 62px;
            padding-top: 28px;
        }

        .destination-perk {
            align-items: center;
            display: flex;
            gap: 16px;
            justify-content: center;
        }

        .destination-perk-icon .sp-icon{
            align-items: center;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: 50%;
            color: var(--plum);
            display: flex;
            flex: 0 0 58px;
            font-size: 26px;
            height: 58px;
            justify-content: center;
            width: 58px;
        }

        .destination-perk b {
            color: var(--plum);
            display: block;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .16em;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .destination-perk span {
            color: var(--muted);
            display: block;
            font-size: 13px;
            line-height: 1.45;
        }

        .destination-slide {
            display: none;
        }

        .cta {
            padding: 10px 0 84px;
        }

        .cta-panel {
            align-items: center;
            background: rgba(255, 255, 255, .68);
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
                radial-gradient(circle at 82% 12%, rgba(217, 184, 108, .28), transparent 22rem),
                radial-gradient(circle at 8% 90%, rgba(79, 143, 119, .18), transparent 22rem);
            content: "";
            inset: 0;
            position: absolute;
        }

        .cta-panel > * {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-size: clamp(40px, 4.8vw, 72px);
            line-height: .96;
            margin: 0 0 12px;
            max-width: 830px;
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
            outline: 3px solid rgba(79, 143, 119, .7);
            outline-offset: 3px;
        }

        @media (max-width: 1080px) {
            .hero-shell,
            .cta-panel {
                grid-template-columns: 1fr;
            }

            .portrait-stage {
                min-height: 520px;
            }

            .portrait-main {
                height: 500px;
                margin-inline: auto;
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
                width: min(100% - 32px, 1210px);
            }

            .hero {
                padding-top: 76px;
            }

            .hero h1 {
                font-size: 46px;
            }

            .stat-row,
            .search-grid,
            .solution-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .portrait-stage {
                min-height: 360px;
            }

            .portrait-main {
                border-radius: 42px;
                height: 340px;
                max-width: none;
            }

            .mini-photo,
            .quality-card {
                display: none;
            }

            .section,
            .feature-band,
            .locations {
                padding: 62px 0;
            }

            .locations {
                padding-top: 92px;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .locations-container {
                width: min(100% - 32px, 1210px);
            }

            .destination-head {
                align-items: flex-start;
                grid-template-columns: 1fr;
            }

            .destination-actions {
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .destination-stage {
                min-height: 250px;
            }

            .destination-word {
                gap: 6px;
                width: 100vw;
            }

            .destination-letter {
                font-size: clamp(70px, 22vw, 138px);
                letter-spacing: -.085em;
            }

            .destination-nav {
                height: 44px;
                font-size: 28px;
                width: 44px;
            }

            .destination-current {
                font-size: 11px;
                min-width: 130px;
            }

            .destination-dots {
                gap: 10px;
                overflow-x: auto;
                padding: 2px 0 10px;
                scrollbar-width: none;
            }

            .destination-dots::-webkit-scrollbar { display: none; }

            .destination-perks {
                grid-template-columns: 1fr;
                margin-top: 34px;
            }

            .destination-perk {
                justify-content: flex-start;
            }

            .cta-panel {
                padding: 30px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="aurora-page">
        <div id="topbar" class="topbar" role="banner" aria-label="Quick enquiry">
            <span class="brand">GRHUM</span>
            <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Enquire now</a>
        </div>

        <section id="top" class="hero">
            <div class="wrap hero-shell">
                <div class="hero-copy reveal">
                    <p class="eyebrow">Premium serviced accommodation</p>
                    <h1 class="display">Stay beautifully, <span>without the hotel feeling</span>.</h1>
                    <p class="hero-text">
                        GRHUM places guests into fully furnished, all-inclusive homes for business,
                        relocation, insurance and project stays across the UK and Ireland.
                    </p>
                    <div class="hero-actions">
                        <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-primary">Find your stay</a>
                        <a href="https://wa.me/+447349161506" target="_blank" rel="noopener noreferrer" class="btn btn-soft">WhatsApp us</a>
                    </div>
                    <div class="stat-row">
                        @foreach($stats as $stat)
                            <div class="stat">
                                <strong>{{ $stat['value'] }}</strong>
                                <span>{{ $stat['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="portrait-stage reveal">
                    <div class="mini-photo one">
                        <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=700&h=520&fit=crop&q=76&auto=format" alt="Elegant serviced apartment lounge">
                    </div>
                    <div class="portrait-main">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=950&h=1200&fit=crop&q=78&auto=format" alt="Premium serviced apartment living room">
                    </div>
                    <div class="mini-photo two">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=700&h=520&fit=crop&q=76&auto=format" alt="Premium bedroom">
                    </div>
                    <div class="quality-card">
                        <b>Curated homes. Real support.</b>
                        <small>Private living, flexible terms and a dedicated team behind each booking.</small>
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

        <section class="section">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">Stay solutions</p>
                        <h2 class="display">Premium accommodation for the moments that matter.</h2>
                    </div>
                    <a href="https://www.grhum.co.uk/enquire_now" class="btn btn-soft">Discuss your brief</a>
                </div>

                <div class="solution-grid">
                    @foreach($solutions as $solution)
                        <a href="https://www.grhum.co.uk/enquire_now" class="solution-card reveal" style="transition-delay: {{ $loop->index * 65 }}ms;">
                            <div class="solution-image">
                                <img src="{{ $solution['image'] }}" alt="{{ $solution['title'] }}" loading="lazy">
                            </div>
                            <div>
                                <h3 class="display">{{ $solution['title'] }}</h3>
                                <p>{{ $solution['copy'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="feature-band">
            <div class="wrap">
                <div class="section-head reveal">
                    <div>
                        <p class="eyebrow">What makes it premium</p>
                        <h2 class="display">A stay that feels calm because the details are handled.</h2>
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
            <div class="locations-container">
                <div class="destination-head reveal">
                    <div>
                        <p class="eyebrow">Destinations</p>
                        <h2 class="display">A premium stay network across the UK and Ireland.</h2>
                    </div>
                    <div class="destination-actions">  
                        <a href="https://www.grhum.co.uk/locations" class="btn btn-soft">View locations</a>
                        <button type="button" class="destination-nav prev" data-destination-prev aria-label="Previous destinations">&#8249;</button>
                        <button type="button" class="destination-nav next" data-destination-next aria-label="Next destinations">&#8250;</button>
                      
                    </div>
                </div>
            </div>

            <div class="destination-stage reveal" id="destinationStage">
                <h3 class="destination-word" aria-label="GRHUM destination slider">
                    @foreach(str_split('GRHUM') as $letter)
                        <button type="button" class="destination-letter" data-destination-letter data-letter="{{ $letter }}">{{ $letter }}</button>
                    @endforeach
                </h3>
            </div>

            <div class="locations-container">
                <div class="destination-meta reveal">
                    <span class="destination-current" id="destinationCurrent">London</span>
                </div>

                <div class="destination-dots reveal" id="destinationDots" aria-label="Choose destination">
                    @foreach(collect($location)->take(7) as $loc)
                        @php
                            $fallbackImage = $destinationFallbacks[$loop->index % count($destinationFallbacks)];
                            $destinationImage = !empty($loc->image) ? 'https://www.grhum.co.uk/upload/' . $loc->image : $fallbackImage;
                        @endphp
                        <button
                            type="button"
                            class="destination-dot"
                            data-destination-dot
                            data-index="{{ $loop->index }}"
                            aria-label="Show {{ $loc->location_name }}"
                        ></button>
                        <span
                            class="destination-slide"
                            data-destination-slide
                            data-name="{{ $loc->location_name }}"
                            data-image="{{ $destinationImage }}"
                        ></span>
                    @endforeach
                </div>

                <div class="destination-perks reveal">
                    <div class="destination-perk">
                        <span class="destination-perk-icon" aria-hidden="true"><span class="sp-icon">&#9819;</span></span>
                        <div>
                            <b>Curated stays</b>
                            <span>Handpicked for quality and comfort.</span>
                        </div>
                    </div>
                    <div class="destination-perk">
                        <span class="destination-perk-icon" aria-hidden="true"><span class="sp-icon">&#9906;</span></span>
                        <div>
                            <b>Prime locations</b>
                            <span>In the heart of the UK and Ireland.</span>
                        </div>
                    </div>
                    <div class="destination-perk">
                        <span class="destination-perk-icon" aria-hidden="true"><span class="sp-icon">&#9734;</span></span>
                        <div>
                            <b>Member benefits</b>
                            <span>Exclusive perks for every stay.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="wrap">
                <div class="cta-panel reveal">
                    <div>
                        <p class="eyebrow">Ready to place a guest?</p>
                        <h2 class="display">Send the brief. We will shape the stay.</h2>
                        <p>Share location, dates, guest profile and priorities. GRHUM will respond with premium accommodation options that feel beautiful, practical and ready.</p>
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

            const destinationStage = document.getElementById('destinationStage');
            const destinationCurrent = document.getElementById('destinationCurrent');
            const destinationSlides = Array.prototype.slice.call(document.querySelectorAll('[data-destination-slide]'));
            const destinationDots = Array.prototype.slice.call(document.querySelectorAll('[data-destination-dot]'));
            const destinationLetters = Array.prototype.slice.call(document.querySelectorAll('[data-destination-letter]'));
            const destinationPrev = document.querySelector('[data-destination-prev]');
            const destinationNext = document.querySelector('[data-destination-next]');
            let destinationIndex = 0;
            let destinationTimer = null;
            let destinationReady = false;
            let destinationAnimating = false;

            function setDestination(index, direction) {
                if (!destinationStage || !destinationSlides.length || !destinationLetters.length || destinationAnimating) return;
                const slideDirection = direction || (index >= destinationIndex ? 1 : -1);
                destinationIndex = (index + destinationSlides.length) % destinationSlides.length;
                const nextImages = [];

                destinationLetters.forEach(function (letter, letterIndex) {
                    const slideIndex = (destinationIndex + letterIndex) % destinationSlides.length;
                    const slide = destinationSlides[slideIndex];
                    const imageValue = 'url("' + slide.dataset.image + '")';
                    nextImages.push(imageValue);
                    letter.dataset.name = slide.dataset.name || 'GRHUM';
                    letter.setAttribute('aria-label', 'Show ' + (slide.dataset.name || 'destination'));
                });

                if (!destinationReady || reducedMotion) {
                    destinationLetters.forEach(function (letter, letterIndex) {
                        letter.style.setProperty('--letter-image', nextImages[letterIndex]);
                    });
                    destinationReady = true;
                } else {
                    destinationAnimating = true;
                    destinationLetters.forEach(function (letter, letterIndex) {
                        letter.classList.remove('is-sliding-next', 'is-sliding-prev');
                        letter.style.setProperty('--letter-enter', slideDirection > 0 ? '112%' : '-112%');
                        letter.style.setProperty('--letter-next-image', nextImages[letterIndex]);
                        void letter.offsetWidth;
                        letter.classList.add(slideDirection > 0 ? 'is-sliding-next' : 'is-sliding-prev');
                    });

                    window.setTimeout(function () {
                        destinationLetters.forEach(function (letter, letterIndex) {
                            letter.classList.add('is-committing');
                            letter.style.setProperty('--letter-image', nextImages[letterIndex]);
                            letter.classList.remove('is-sliding-next', 'is-sliding-prev');
                            letter.style.removeProperty('--letter-next-image');
                        });
                        destinationStage.offsetWidth;
                        window.requestAnimationFrame(function () {
                            window.requestAnimationFrame(function () {
                                destinationLetters.forEach(function (letter) {
                                    letter.classList.remove('is-committing');
                                });
                            });
                        });
                        destinationAnimating = false;
                    }, 940);
                }

                if (destinationCurrent) destinationCurrent.textContent = destinationLetters[0].dataset.name || 'GRHUM';
                destinationDots.forEach(function (dot, dotIndex) {
                    const isActive = dotIndex === destinationIndex;
                    dot.classList.toggle('is-active', isActive);
                    dot.setAttribute('aria-current', isActive ? 'true' : 'false');
                });
            }

            function restartDestinationTimer() {
                if (destinationTimer) window.clearInterval(destinationTimer);
                if (!reducedMotion && destinationSlides.length > 1) {
                    destinationTimer = window.setInterval(function () {
                        setDestination(destinationIndex + 1, 1);
                    }, 4200);
                }
            }

            destinationDots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    const nextIndex = parseInt(dot.dataset.index, 10) || 0;
                    setDestination(nextIndex, nextIndex >= destinationIndex ? 1 : -1);
                    restartDestinationTimer();
                });
            });

            destinationLetters.forEach(function (letter) {
                letter.addEventListener('mouseenter', function () {
                    if (destinationCurrent) destinationCurrent.textContent = letter.dataset.name || 'GRHUM';
                });

                letter.addEventListener('focus', function () {
                    if (destinationCurrent) destinationCurrent.textContent = letter.dataset.name || 'GRHUM';
                });

                letter.addEventListener('mouseleave', function () {
                    if (destinationCurrent && destinationLetters[0]) destinationCurrent.textContent = destinationLetters[0].dataset.name || 'GRHUM';
                });

                letter.addEventListener('blur', function () {
                    if (destinationCurrent && destinationLetters[0]) destinationCurrent.textContent = destinationLetters[0].dataset.name || 'GRHUM';
                });
            });

            if (destinationPrev) {
                destinationPrev.addEventListener('click', function () {
                    setDestination(destinationIndex - 1, -1);
                    restartDestinationTimer();
                });
            }

            if (destinationNext) {
                destinationNext.addEventListener('click', function () {
                    setDestination(destinationIndex + 1, 1);
                    restartDestinationTimer();
                });
            }

            setDestination(0);
            restartDestinationTimer();
        })();
    </script>
@endpush
