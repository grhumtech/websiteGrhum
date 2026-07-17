{{-- resources/views/website/service_apartments.blade.php --}}
@extends('layouts.app')

@section('title', 'Serviced Apartments | GRHUM')
@section('meta_description', 'Discover the key benefits of serviced apartments — flexible, cost-effective accommodations perfect for business travellers, expatriates, and long-term visitors.')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Hanken+Grotesk:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    :root {
        --sa-cream: #F7F3EA;
        --sa-cream-soft: #FBF8F1;
        --sa-green: #22372B;
        --sa-green-soft: #2E4A3A;
        --sa-gold: #B08D4F;
        --sa-gold-light: #C7A968;
        --sa-ink: #3A3A34;
        --sa-serif: 'Cormorant Garamond', Georgia, serif;
        --sa-sans: 'Hanken Grotesk', 'Segoe UI', sans-serif;
    }

    .sa-page {
        background: var(--sa-cream);
        color: var(--sa-ink);
        font-family: var(--sa-sans);
        font-weight: 300;
        overflow-x: hidden;
    }

    /* ---------- HERO ---------- */
    .sa-hero {
        position: relative;
        min-height: 62vh;
        display: flex;
        align-items: flex-end;
        background-image: url('https://www.grhum.co.uk/upload/architecture-TRCJ-9.png');
        background-size: cover;
        background-position: center;
        color: #fff;
    }
    .sa-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(20,30,24,.15) 0%, rgba(20,30,24,.78) 100%);
    }
    .sa-hero__inner {
        position: relative;
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 28px 72px;
    }
    .sa-hero__eyebrow {
        font-family: var(--sa-sans);
        font-weight: 500;
        letter-spacing: .32em;
        text-transform: uppercase;
        font-size: .72rem;
        color: var(--sa-gold-light);
        margin-bottom: 14px;
    }
    .sa-hero h1 {
        font-family: var(--sa-serif);
        font-weight: 600;
        font-size: clamp(2.4rem, 5.4vw, 4.2rem);
        line-height: 1.05;
        margin: 0 0 18px;
        max-width: 16ch;
        text-shadow: 0 3px 18px rgba(0,0,0,.45);
    }
    .sa-hero p {
        font-size: clamp(1rem, 1.6vw, 1.18rem);
        line-height: 1.6;
        max-width: 60ch;
        color: rgba(255,255,255,.9);
        text-shadow: 0 2px 10px rgba(0,0,0,.4);
    }

    /* ---------- FEATURE ROWS ---------- */
    .sa-features {
        max-width: 1180px;
        margin: 0 auto;
        padding: 96px 28px 40px;
    }
    .sa-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: clamp(32px, 5vw, 80px);
        align-items: center;
        margin-bottom: clamp(72px, 8vw, 118px);
    }
    .sa-row__media img {
        width: 100%;
        height: 100%;
        max-height: 460px;
        object-fit: cover;
        border-radius: 6px;
        box-shadow: 0 26px 60px -28px rgba(34,55,43,.55);
    }
    .sa-row--reverse .sa-row__media { order: 2; }
    .sa-row--reverse .sa-row__body  { order: 1; }

    .sa-row__body h2 {
        font-family: var(--sa-serif);
        font-weight: 600;
        color: var(--sa-green);
        font-size: clamp(1.9rem, 3.4vw, 2.6rem);
        line-height: 1.1;
        margin: 0 0 16px;
    }
    .sa-row__body h2::after {
        content: '';
        display: block;
        width: 56px;
        height: 3px;
        background: var(--sa-gold);
        margin-top: 16px;
    }
    .sa-row__body > p {
        font-size: 1.03rem;
        line-height: 1.72;
        color: var(--sa-ink);
        margin: 0 0 22px;
    }
    .sa-list { list-style: none; margin: 0; padding: 0; }
    .sa-list li {
        position: relative;
        padding: 0 0 14px 30px;
        line-height: 1.55;
        font-size: .98rem;
        color: #4a4a42;
    }
    .sa-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: .55em;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--sa-gold);
        box-shadow: 0 0 0 4px rgba(176,141,79,.16);
    }
    .sa-list strong {
        color: var(--sa-green-soft);
        font-weight: 600;
    }

    /* ---------- CTA ---------- */
    .sa-cta {
        background: var(--sa-green);
        color: var(--sa-cream);
        margin-top: 40px;
    }
    .sa-cta__inner {
        max-width: 1180px;
        margin: 0 auto;
        padding: clamp(60px, 8vw, 96px) 28px;
        display: grid;
        grid-template-columns: 1.15fr .85fr;
        gap: 48px;
        align-items: center;
    }
    .sa-cta h2 {
        font-family: var(--sa-serif);
        font-weight: 600;
        font-size: clamp(1.9rem, 3.6vw, 2.8rem);
        line-height: 1.12;
        margin: 0 0 18px;
        color: #fff;
    }
    .sa-cta p {
        font-size: 1.05rem;
        line-height: 1.72;
        color: rgba(247,243,234,.82);
        margin: 0;
        max-width: 54ch;
    }
    .sa-cta__actions { text-align: left; }
    .sa-btn {
        display: inline-block;
        background: var(--sa-gold);
        color: #fff;
        font-family: var(--sa-sans);
        font-weight: 600;
        letter-spacing: .04em;
        text-decoration: none;
        padding: 15px 40px;
        border-radius: 4px;
        transition: background .25s ease, transform .25s ease;
    }
    .sa-btn:hover { background: var(--sa-gold-light); transform: translateY(-2px); color:#fff; }
    .sa-cta__phone {
        margin-top: 26px;
        font-size: .92rem;
        color: rgba(247,243,234,.7);
    }
    .sa-cta__phone a {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 6px;
        color: var(--sa-gold-light);
        font-weight: 600;
        text-decoration: none;
        font-size: 1.1rem;
    }
    .sa-cta__phone svg { width: 18px; height: 18px; fill: currentColor; }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 860px) {
        .sa-row,
        .sa-cta__inner { grid-template-columns: 1fr; }
        .sa-row { gap: 26px; }
        .sa-row--reverse .sa-row__media,
        .sa-row--reverse .sa-row__body { order: 0; }
        .sa-row__media { order: 0; }
        .sa-features { padding-top: 64px; }
        .sa-cta__actions { text-align: left; }
    }
</style>
@endpush

@section('content')
@php
    $features = [
        [
            'title' => 'Home-like comfort',
            'image' => 'paige-cody.png',
            'text'  => 'Serviced apartments offer the comfort and privacy of home with the added benefit of hotel-like services. Each unit typically includes a fully equipped kitchen, separate living area, and bedroom(s), providing a more spacious and relaxed environment compared to traditional hotel rooms.',
            'points' => [
                ['Fully furnished', 'All essential furniture and appliances.'],
                ['Personal space', 'Separate rooms for sleeping, living, and dining.'],
                ['Freedom to cook', 'Full kitchen facilities for homemade meals.'],
            ],
        ],
        [
            'title' => 'Cost-effective stays',
            'image' => 'coins.png',
            'text'  => 'For extended stays, serviced apartments are more cost-efficient than hotels. They offer competitive rates for longer durations, reducing overall accommodation expenses.',
            'points' => [
                ['Lower nightly rates', 'Discounted prices for longer stays.'],
                ['No hidden costs', 'Utilities and services often included in the price.'],
                ['Self-catering', 'Savings on dining out with in-unit kitchens.'],
            ],
        ],
        [
            'title' => 'Flexibility and convenience',
            'image' => 'portrait-beautiful.png',
            'text'  => 'Serviced apartments provide flexibility that suits various lengths of stays, from a few nights to several months. They also offer the convenience of hotel-like amenities, such as housekeeping, 24/7 security, and sometimes even concierge services.',
            'points' => [
                ['Customizable stays', 'Options for short-term and long-term rentals.'],
                ['Hotel-like services', 'Regular cleaning, laundry services, and more.'],
                ['Easy booking', 'Simple reservation process with flexible check-in/out times.'],
            ],
        ],
        [
            'title' => 'Prime locations',
            'image' => 'pexels-streetlevelphotos.png',
            'text'  => 'These accommodations are often situated in central locations, close to business districts, transport links, and local amenities. This makes it easier for travellers to commute and enjoy their stay.',
            'points' => [
                ['Central access', 'Near major business hubs and transport.'],
                ['Local experience', 'Opportunity to explore and engage with the local culture.'],
                ['Convenience', 'Easy access to restaurants, shops, and entertainment.'],
            ],
        ],
        [
            'title' => 'Privacy and security',
            'image' => 'dayne-topkin.png',
            'text'  => 'Privacy and security are top priorities in serviced apartments. They offer a level of discretion and safety that\'s often preferred by corporate clients.',
            'points' => [
                ['Private entrances', 'Individual access to each unit.'],
                ['Secure environments', 'Gated communities or buildings with security personnel.'],
                ['Confidentiality', 'Discreet services that respect guest privacy.'],
            ],
        ],
        [
            'title' => 'Space for work and leisure',
            'image' => 'pexels-cottonbro.png',
            'text'  => 'Serviced apartments are designed with both work and leisure in mind. They often include dedicated workspaces and high-speed internet, making them ideal for remote work and business travellers.',
            'points' => [
                ['Work-friendly', 'Desks, office chairs, and fast internet.'],
                ['Relaxation areas', 'Spacious living rooms and entertainment systems.'],
                ['Balance', 'Suitable environment for both professional and personal activities.'],
            ],
        ],
        [
            'title' => 'Customizable services',
            'image' => 'woman-casual.png',
            'text'  => 'Many serviced apartments offer customizable services to cater to individual preferences. From grocery delivery to personalized housekeeping schedules, guests can tailor their stay to their needs.',
            'points' => [
                ['Flexible housekeeping', 'Choose how often your apartment is cleaned.'],
                ['Personalized services', 'Options like grocery shopping, meal delivery, and more.'],
                ['Additional amenities', 'Access to gyms, pools, and other facilities.'],
            ],
        ],
        [
            'title' => 'Family-friendly',
            'image' => 'Family-friendly.png',
            'text'  => 'For families travelling together, serviced apartments provide the space and amenities needed to accommodate everyone comfortably. Multiple bedrooms and child-friendly features make them a practical choice.',
            'points' => [
                ['Multiple bedrooms', 'Ideal for families with children.'],
                ['Child-friendly', 'Amenities like cribs, high chairs, and more available.'],
                ['Home-like feel', 'A welcoming environment for all ages.'],
            ],
        ],
    ];
@endphp

<div class="sa-page">

    {{-- HERO --}}
    <section class="sa-hero">
        <div class="sa-hero__inner">
            <div class="sa-hero__eyebrow">Serviced Accommodations</div>
            <h1>Benefits of serviced accommodations</h1>
            <p>Discover the key benefits of serviced apartments — flexible, cost-effective accommodations perfect for business travellers, expatriates, and long-term visitors.</p>
        </div>
    </section>

    {{-- FEATURE ROWS --}}
    <section class="sa-features">
        @foreach ($features as $i => $f)
            <div class="sa-row {{ $i % 2 === 1 ? 'sa-row--reverse' : '' }}">
                <div class="sa-row__media">
                    <img src="https://www.grhum.co.uk/upload/{{ $f['image'] }}" alt="{{ $f['title'] }}" loading="lazy">
                </div>
                <div class="sa-row__body">
                    <h2>{{ $f['title'] }}</h2>
                    <p>{{ $f['text'] }}</p>
                    <ul class="sa-list">
                        @foreach ($f['points'] as $point)
                            <li><strong>{{ $point[0] }}:</strong> {{ $point[1] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </section>

    {{-- CTA --}}
    <section class="sa-cta">
        <div class="sa-cta__inner">
            <div>
                <h2>Why choose GRHUM for serviced accommodations?</h2>
                <p>GRHUM offers tailored serviced accommodations for corporate travellers, insurance claims, construction crews, holidaymakers, and more. With a focus on comfort, security, and flexibility, we deliver the perfect solutions for every need.</p>
            </div>
            <div class="sa-cta__actions">
                <a href="{{ url('enquire-now') }}" class="sa-btn">Enquire now</a>
                <div class="sa-cta__phone">
                    Ready to book your next stay?
                    <a href="tel:+442080507656">
                        <svg aria-hidden="true" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                        </svg>
                        (+44) 020 8050 7656
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection