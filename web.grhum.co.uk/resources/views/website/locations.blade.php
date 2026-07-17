@extends('layouts.app')

@section('title', 'Our locations - 50+ UK homes, wherever you need us | GRHUM')

@push('styles')
  <style>
    :root {
      --loc-ink: #171511;
      --loc-forest: #18362D;
      --loc-forest-2: #25493F;
      --loc-gold: #B9955C;
      --loc-gold-2: #D8BE84;
      --loc-ivory: #F8F4EA;
      --loc-paper: #FFFDF8;
      --loc-line: rgba(185, 149, 92, .26);
      --loc-muted: #756D60;
      --loc-shadow: 0 26px 70px -48px rgba(23, 21, 17, .72);
    }

    .loc-page {
      color: var(--loc-ink);
      background:
        radial-gradient(circle at 12% 0%, rgba(216, 190, 132, .16), transparent 30%),
        linear-gradient(180deg, #FFFDF8 0%, #F7F0E4 52%, #FFFDF8 100%);
    }

    .loc-wrap {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 32px;
    }

    .loc-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      color: var(--loc-gold);
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .23em;
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    .loc-eyebrow::before {
      content: "";
      width: 38px;
      height: 1px;
      background: currentColor;
    }

    .loc-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: clamp(34px, 4vw, 54px);
      line-height: .98;
      color: var(--loc-forest);
      letter-spacing: 0;
      margin: 0 0 20px;
    }

    .loc-p {
      max-width: 680px;
      font-size: 16.5px;
      line-height: 1.75;
      color: var(--loc-muted);
      margin: 0;
    }

    .loc-hero {
      position: relative;
      min-height: 620px;
      display: flex;
      align-items: flex-end;
      isolation: isolate;
      overflow: hidden;
      background-image:
        linear-gradient(90deg, rgba(12, 22, 18, .88) 0%, rgba(12, 22, 18, .54) 48%, rgba(12, 22, 18, .18) 100%),
        linear-gradient(180deg, rgba(12, 22, 18, .08), rgba(12, 22, 18, .66)),
        url('https://www.grhum.co.uk/upload/view-london.webp');
      background-size: cover;
      background-position: center;
    }

    .loc-hero::after {
      content: "";
      position: absolute;
      inset: auto 0 0;
      height: 170px;
      background: linear-gradient(180deg, transparent, rgba(248, 244, 234, .95));
      z-index: -1;
    }

    .loc-hero-inner {
      width: 100%;
      padding-top: 130px;
      padding-bottom: 92px;
    }

    .loc-hero-kicker {
      color: var(--loc-gold-2);
      font-size: 12.5px;
      font-weight: 800;
      letter-spacing: .24em;
      text-transform: uppercase;
      margin: 0 0 20px;
    }

    .loc-hero-h1 {
      max-width: 800px;
      margin: 0;
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      color: var(--loc-ivory);
      font-size: clamp(48px, 6.4vw, 84px);
      line-height: .94;
      letter-spacing: 0;
    }

    .loc-hero-copy {
      max-width: 620px;
      margin: 24px 0 0;
      color: rgba(248, 244, 234, .84);
      font-size: 18px;
      line-height: 1.68;
    }

    .loc-hero-stats {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      max-width: 690px;
      margin-top: 42px;
      border: 1px solid rgba(216, 190, 132, .34);
      background: rgba(255, 253, 248, .08);
      backdrop-filter: blur(16px);
    }

    .loc-hero-stat {
      padding: 22px 24px;
      border-right: 1px solid rgba(216, 190, 132, .24);
    }

    .loc-hero-stat:last-child {
      border-right: 0;
    }

    .loc-hero-stat b {
      display: block;
      color: var(--loc-ivory);
      font-family: 'Cormorant Garamond', serif;
      font-size: 34px;
      font-weight: 500;
      line-height: 1;
    }

    .loc-hero-stat span {
      display: block;
      margin-top: 8px;
      color: rgba(248, 244, 234, .68);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .16em;
      text-transform: uppercase;
    }

    .loc-intro {
      padding-top: 104px;
      padding-bottom: 44px;
    }

    .loc-intro-head {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(260px, 410px);
      gap: 48px;
      align-items: end;
      margin-bottom: 46px;
    }

    .loc-tools {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
      padding: 18px;
      margin-bottom: 24px;
      border: 1px solid var(--loc-line);
      background: rgba(255, 253, 248, .74);
      box-shadow: var(--loc-shadow);
    }

    .loc-search {
      position: relative;
      flex: 1;
      min-width: 270px;
      max-width: 470px;
    }

    .loc-search svg {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--loc-gold);
      pointer-events: none;
    }

    .loc-search input {
      width: 100%;
      padding: 16px 18px 16px 50px;
      font-size: 15px;
      color: var(--loc-ink);
      background: #FFFDF8;
      border: 1px solid rgba(37, 73, 63, .18);
      border-radius: 0;
      outline: none;
      transition: border-color .2s, box-shadow .2s, background .2s;
    }

    .loc-search input::placeholder {
      color: #A79D8E;
    }

    .loc-search input:focus {
      background: #fff;
      border-color: var(--loc-gold);
      box-shadow: 0 0 0 4px rgba(185, 149, 92, .15);
    }

    .loc-count {
      margin: 0;
      font-size: 13px;
      font-weight: 800;
      color: var(--loc-muted);
      letter-spacing: .08em;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .loc-count b {
      color: var(--loc-forest);
      font-size: 16px;
    }

    .loc-az {
      display: flex;
      flex-wrap: wrap;
      gap: 7px;
      margin-bottom: 34px;
    }

    .loc-az button {
      min-width: 36px;
      height: 36px;
      padding: 0 9px;
      font-size: 12.5px;
      font-weight: 800;
      letter-spacing: .03em;
      color: var(--loc-muted);
      background: rgba(255, 253, 248, .7);
      border: 1px solid rgba(185, 149, 92, .22);
      border-radius: 0;
      cursor: pointer;
      transition: color .18s, border-color .18s, background .18s, transform .18s;
    }

    .loc-az button:hover {
      color: var(--loc-forest);
      border-color: rgba(185, 149, 92, .55);
      transform: translateY(-1px);
    }

    .loc-az button.is-active {
      color: var(--loc-ivory);
      background: var(--loc-forest);
      border-color: var(--loc-forest);
    }

    .loc-az button:disabled {
      opacity: .32;
      cursor: default;
      transform: none;
    }

    .loc-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .loc-card {
      position: relative;
      display: block;
      min-height: 325px;
      padding: 0;
      color: inherit;
      background: rgba(255, 253, 248, .88);
      border: 1px solid rgba(185, 149, 92, .22);
      border-radius: 0;
      text-align: left;
      overflow: hidden;
      cursor: pointer;
      font: inherit;
      transition: border-color .22s, box-shadow .22s, transform .22s, background .22s;
    }

    .loc-card::before {
      content: "";
      position: absolute;
      inset: 0;
      pointer-events: none;
      background:
        linear-gradient(180deg, transparent 44%, rgba(16, 36, 30, .08)),
        linear-gradient(135deg, rgba(216, 190, 132, .2), transparent 48%);
      opacity: 0;
      transition: opacity .22s;
    }

    .loc-card:hover {
      background: #fff;
      border-color: rgba(185, 149, 92, .52);
      box-shadow: 0 22px 56px -42px rgba(23, 21, 17, .8);
      transform: translateY(-2px);
      z-index: 10;
    }

    .loc-card:focus-visible {
      outline: 3px solid rgba(185, 149, 92, .34);
      outline-offset: 4px;
      z-index: 10;
    }

    .loc-card:hover::before,
    .loc-card:focus-visible::before {
      opacity: 1;
    }

    .loc-card-main {
      position: relative;
      z-index: 1;
      display: grid;
      height: 100%;
      min-height: 325px;
      grid-template-rows: 210px 1fr;
    }

    .loc-img {
      width: 100%;
      height: 210px;
      overflow: hidden;
      background: #F0E4D0;
      border: 0;
      border-bottom: 1px solid rgba(185, 149, 92, .26);
      position: relative;
    }

    .loc-img::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 38%, rgba(16, 36, 30, .42));
      opacity: .62;
      pointer-events: none;
    }

    .loc-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: saturate(.92) contrast(1.04);
      transition: transform .35s, filter .35s;
    }

    .loc-card:hover .loc-img img,
    .loc-card:focus-visible .loc-img img {
      transform: scale(1.15);
      filter: saturate(1.02) contrast(1.06);
    }

    .loc-img .loc-pin-fallback {
      position: absolute;
      inset: 0;
      display: none;
      align-items: center;
      justify-content: center;
      color: var(--loc-gold);
    }

    .loc-img img.is-broken {
      display: none;
    }

    .loc-img img.is-broken + .loc-pin-fallback {
      display: flex;
    }

    .loc-card-body {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 150px;
      padding: 24px;
    }

    .loc-name {
      display: block;
      font-family: 'Cormorant Garamond', serif;
      font-size: 32px;
      font-weight: 600;
      color: var(--loc-forest);
      line-height: 1.02;
    }

    .loc-meta {
      display: block;
      font-size: 11.5px;
      font-weight: 800;
      color: var(--loc-gold);
      letter-spacing: .13em;
      margin-top: 6px;
      text-transform: uppercase;
    }

    .loc-place {
      display: block;
      margin-top: 10px;
      color: var(--loc-muted);
      font-size: 13.5px;
      line-height: 1.45;
    }

    .loc-card-action {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      width: max-content;
      /* margin-top: 22px; */
      color: var(--loc-forest);
      font-size: 11px;
      font-weight: 900;
      letter-spacing: .14em;
      text-transform: uppercase;
    }

    .loc-card-action::after {
      content: "";
      width: 34px;
      height: 1px;
      background: var(--loc-gold);
      transition: width .22s;
    }

    .loc-card:hover .loc-card-action::after {
      width: 48px;
    }

    .loc-modal {
      position: fixed;
      inset: 0;
      z-index: 999;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 28px;
    }

    .loc-modal.is-open {
      display: flex;
    }

    .loc-modal-backdrop {
      position: absolute;
      inset: 0;
      background: rgba(13, 22, 18, .72);
      backdrop-filter: blur(10px);
    }

    .loc-modal-panel {
      position: relative;
      width: min(920px, 100%);
      max-height: calc(100vh - 56px);
      overflow: auto;
      display: grid;
      grid-template-columns: minmax(260px, .85fr) minmax(320px, 1fr);
      color: var(--loc-ivory);
      background:
        linear-gradient(135deg, rgba(216, 190, 132, .14), transparent 38%),
        linear-gradient(180deg, #25493F, #10241E);
      border: 1px solid rgba(216, 190, 132, .48);
      box-shadow: 0 46px 120px -54px rgba(0, 0, 0, .88);
    }

    .loc-modal-image {
      min-height: 520px;
      background: #132B24;
      position: relative;
      overflow: hidden;
    }

    .loc-modal-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: saturate(.96) contrast(1.05);
    }

    .loc-modal-image::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 30%, rgba(16, 36, 30, .72));
    }

    .loc-modal-content {
      padding: 48px;
    }

    .loc-modal-close {
      position: absolute;
      top: 18px;
      right: 18px;
      z-index: 2;
      width: 42px;
      height: 42px;
      color: var(--loc-ivory);
      background: rgba(255, 253, 248, .1);
      border: 1px solid rgba(216, 190, 132, .34);
      cursor: pointer;
      font-size: 24px;
      line-height: 1;
    }

    .loc-modal-kicker {
      display: block;
      color: var(--loc-gold-2);
      font-size: 10.5px;
      font-weight: 900;
      letter-spacing: .18em;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .loc-modal-title {
      display: block;
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(42px, 5vw, 64px);
      font-weight: 600;
      line-height: .92;
      margin-bottom: 14px;
    }

    .loc-modal-location {
      display: block;
      color: rgba(248, 244, 234, .72);
      font-size: 15px;
      line-height: 1.55;
      margin-bottom: 28px;
    }

    .loc-modal-list {
      display: grid;
      gap: 10px;
      margin: 0 0 30px;
      padding: 0;
      list-style: none;
    }

    .loc-modal-list li {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding-top: 12px;
      border-top: 1px solid rgba(216, 190, 132, .2);
      color: rgba(248, 244, 234, .88);
      font-size: 15px;
      line-height: 1.35;
    }

    .loc-modal-list small {
      flex: none;
      color: var(--loc-gold-2);
      font-size: 10px;
      font-weight: 800;
      letter-spacing: .12em;
      text-transform: uppercase;
    }

    .loc-modal-empty {
      display: block;
      margin-bottom: 30px;
      color: rgba(248, 244, 234, .72);
      font-size: 15px;
      line-height: 1.55;
    }

    .loc-modal-more {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 48px;
      padding: 0 28px;
      color: #10241E;
      background: linear-gradient(180deg, #E5CF9A, #B9955C);
      text-decoration: none;
      font-size: 11.5px;
      font-weight: 900;
      letter-spacing: .14em;
      text-transform: uppercase;
    }

    .loc-empty {
      grid-column: 1 / -1;
      background: rgba(255, 253, 248, .88);
      border: 1px solid rgba(185, 149, 92, .22);
      padding: 62px 24px;
      text-align: center;
      color: var(--loc-muted);
      font-size: 15px;
    }

    .loc-map-section {
      padding-top: 48px;
      padding-bottom: 104px;
    }

    .loc-map-head {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 40px;
      margin-bottom: 32px;
    }

    #locMap {
      width: 100%;
      height: 500px;
      overflow: hidden;
      border: 1px solid rgba(185, 149, 92, .34);
      box-shadow: 0 34px 90px -58px rgba(23, 21, 17, .86);
    }

    .loc-cta-shell {
      padding-bottom: 110px;
    }

    .loc-cta {
      position: relative;
      overflow: hidden;
      padding: 72px 54px;
      text-align: center;
      background:
        linear-gradient(135deg, rgba(216, 190, 132, .14), transparent 38%),
        linear-gradient(180deg, var(--loc-forest-2), #10241E);
      border: 1px solid rgba(216, 190, 132, .4);
      box-shadow: 0 36px 90px -58px rgba(23, 21, 17, .92);
    }

    .loc-cta::before,
    .loc-cta::after {
      content: "";
      position: absolute;
      left: 36px;
      right: 36px;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(216, 190, 132, .7), transparent);
    }

    .loc-cta::before {
      top: 30px;
    }

    .loc-cta::after {
      bottom: 30px;
    }

    .loc-cta h2 {
      position: relative;
      margin: 0 0 16px;
      font-family: 'Cormorant Garamond', serif;
      font-weight: 500;
      font-size: clamp(34px, 4vw, 54px);
      line-height: 1;
      color: var(--loc-ivory);
    }

    .loc-cta p {
      position: relative;
      font-size: 16.5px;
      line-height: 1.72;
      color: rgba(248, 244, 234, .74);
      max-width: 610px;
      margin: 0 auto 30px;
    }

    .loc-cta a {
      position: relative;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 48px;
      padding: 0 34px;
      font-size: 12.5px;
      font-weight: 900;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: #10241E;
      background: linear-gradient(180deg, #E5CF9A, #B9955C);
      border: 1px solid rgba(255, 253, 248, .2);
      text-decoration: none;
      transition: transform .2s, filter .2s;
    }

    .loc-cta a:hover {
      transform: translateY(-1px);
      filter: brightness(1.05);
    }

    @media (max-width: 1100px) {
      .loc-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 860px) {
      .loc-wrap {
        padding: 0 22px;
      }

      .loc-hero {
        min-height: 560px;
      }

      .loc-hero-stats {
        grid-template-columns: 1fr;
      }

      .loc-hero-stat {
        border-right: 0;
        border-bottom: 1px solid rgba(216, 190, 132, .24);
      }

      .loc-hero-stat:last-child {
        border-bottom: 0;
      }

      .loc-intro-head,
      .loc-map-head {
        display: block;
      }

      .loc-intro-head .loc-p,
      .loc-map-head .loc-p {
        margin-top: 18px;
      }

      #locMap {
        height: 420px;
      }
    }

    @media (max-width: 560px) {
      .loc-wrap {
        padding: 0 18px;
      }

      .loc-hero-inner {
        padding-top: 110px;
        padding-bottom: 72px;
      }

      .loc-hero-copy {
        font-size: 16px;
      }

      .loc-intro {
        padding-top: 76px;
      }

      .loc-tools {
        padding: 14px;
      }

      .loc-search {
        min-width: 100%;
      }

      .loc-grid {
        grid-template-columns: 1fr;
      }

      .loc-card {
        min-height: 330px;
      }

      .loc-card-main {
        min-height: 330px;
        grid-template-rows: 190px 1fr;
      }

      .loc-img {
        height: 190px;
      }

      .loc-name {
        font-size: 28px;
      }

      .loc-card-body {
        padding: 20px;
      }

      .loc-modal {
        padding: 16px;
      }

      .loc-modal-panel {
        grid-template-columns: 1fr;
      }

      .loc-modal-image {
        min-height: 260px;
        max-height: 320px;
      }

      .loc-modal-content {
        padding: 34px 24px 28px;
      }

      .loc-cta {
        padding: 62px 24px;
      }
    }
    .lcn-dtl-crd{
      padding:5px 10px;
    }
  </style>
@endpush

@php
  $base = 'https://www.grhum.co.uk/upload/';

  // Defensive normalisation: handles $location as models or arrays,
  // with varied column names. Empty names dropped, sorted A-Z.
  $items = collect($location ?? [])->values()->map(function ($l, $i) use ($base) {
      $get = fn($k) => is_array($l) ? ($l[$k] ?? null) : ($l->{$k} ?? null);
      $name = $get('name') ?? $get('location_name') ?? $get('city') ?? '';

      // Image / photo column: accepts a few common field names.
      $image = $get('image') ?? $get('photo') ?? $get('thumbnail') ?? $get('img') ?? $get('cover');

      if ($image) {
          $imgUrl = \Illuminate\Support\Str::startsWith($image, ['http://', 'https://'])
              ? $image
              : $base . ltrim($image, '/');
      } else {
          $imgUrl = $base . ($i + 1) . '.webp';
      }

      $rawProperties = $get('top_properties') ?? $get('properties') ?? $get('featured_properties') ?? $get('homes') ?? [];
      if (is_string($rawProperties)) {
          $decodedProperties = json_decode($rawProperties, true);
          $rawProperties = is_array($decodedProperties) ? $decodedProperties : [];
      }

      $topProperties = collect($rawProperties)->take(5)->map(function ($p) {
          $read = fn($k) => is_array($p) ? ($p[$k] ?? null) : (is_object($p) ? ($p->{$k} ?? null) : null);
          $title = $read('title') ?? $read('name') ?? $read('property_name') ?? $read('heading') ?? '';

          return [
              'title' => trim($title),
              'type'  => $read('type') ?? $read('property_type') ?? $read('category') ?? null,
          ];
      })->filter(fn($p) => $p['title'] !== '')->values();

      return [
          'name'   => trim($name),
          'slug'   => $get('slug') ?? \Illuminate\Support\Str::slug($name),
          'count'  => $get('properties_count') ?? $get('property_count') ?? null,
          'region' => $get('region') ?? $get('county') ?? null,
          'lat'    => $get('latitude') ?? $get('lat') ?? null,
          'lng'    => $get('longitude') ?? $get('lng') ?? null,
          'image'  => $imgUrl,
          'top_properties' => $topProperties,
      ];
  })->filter(fn($x) => $x['name'] !== '')->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values();

  $letters   = $items->pluck('name')->map(fn($n) => strtoupper(substr($n, 0, 1)))->unique();
  $hasCoords = $items->contains(fn($x) => $x['lat'] && $x['lng']);
  $mapPoints = $items->filter(fn($x) => $x['lat'] && $x['lng'])->values();

  $az = range('A', 'Z');
@endphp

@section('content')
  <main class="loc-page">
    <section class="loc-hero">
      <div class="loc-wrap loc-hero-inner">
        <p class="loc-hero-kicker">Where we are</p>
        <h1 class="loc-hero-h1">50+ UK homes, wherever you need us</h1>
        <p class="loc-hero-copy">
          Nationwide reach with local expertise. Discover refined serviced accommodation across the UK, selected for
          comfort, care and a consistently premium stay.
        </p>
        <div class="loc-hero-stats" aria-label="GRHUM location highlights">
          <div class="loc-hero-stat">
            <b>{{ $items->count() }}+</b>
            <span>UK locations</span>
          </div>
          <div class="loc-hero-stat">
            <b>24/7</b>
            <span>Guest support</span>
          </div>
          <div class="loc-hero-stat">
            <b>A-Z</b>
            <span>City search</span>
          </div>
        </div>
      </div>
    </section>

    <section class="loc-wrap loc-intro">
      <div class="loc-intro-head">
        <div>
          <p class="loc-eyebrow">Our locations</p>
          <h2 class="loc-h2">Find a GRHUM stay near you</h2>
        </div>
        <p class="loc-p">
          Our portfolio spans towns and cities across the UK, with each home held to the same standard of comfort,
          cleanliness and considered detail. Search below or browse alphabetically.
        </p>
      </div>

      <div class="loc-tools">
        <div class="loc-search">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.5" y2="16.5" />
          </svg>
          <input type="text" id="locSearch" placeholder="Search a town or city..." autocomplete="off"
            aria-label="Search locations">
        </div>
        <p class="loc-count"><b id="locShown">{{ $items->count() }}</b> of {{ $items->count() }} locations</p>
      </div>

      <div class="loc-az" id="locAz" aria-label="Filter locations by first letter">
        <button type="button" class="is-active" data-letter="ALL">All</button>
        @foreach($az as $L)
          <button type="button" data-letter="{{ $L }}" {{ $letters->contains($L) ? '' : 'disabled' }}>{{ $L }}</button>
        @endforeach
      </div>

      <div class="loc-grid" id="locGrid">
        @forelse($items as $loc)
          <button type="button" class="loc-card"
            data-name="{{ \Illuminate\Support\Str::lower($loc['name']) }}"
            data-letter="{{ strtoupper(substr($loc['name'], 0, 1)) }}"
            data-title="{{ $loc['name'] }}"
            data-location="{{ $loc['region'] ? $loc['region'] . ', UK' : $loc['name'] . ', UK' }}"
            data-count="{{ !is_null($loc['count']) ? $loc['count'] . ' ' . \Illuminate\Support\Str::plural('home', $loc['count']) : '' }}"
            data-image="{{ $loc['image'] }}"
            data-url="{{ url('locations/' . $loc['slug']) }}"
            data-properties="{{ e($loc['top_properties']->toJson()) }}">
            <span class="loc-card-main">
              <span class="loc-img">
                <img src="{{ $loc['image'] }}" alt="{{ $loc['name'] }}" loading="lazy"
                  onerror="this.classList.add('is-broken')">
                <span class="loc-pin-fallback">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 21s7-6.5 7-11a7 7 0 1 0-14 0c0 4.5 7 11 7 11z" />
                    <circle cx="12" cy="10" r="2.6" />
                  </svg>
                </span>
              </span>
              <span class="lcn-dtl-crd">
                <span class="loc-name">{{ $loc['name'] }}</span>
                @if(!is_null($loc['count']))
                  <span class="loc-meta">{{ $loc['count'] }} {{ \Illuminate\Support\Str::plural('home', $loc['count']) }}</span>
                @elseif($loc['region'])
                  <span class="loc-meta">{{ $loc['region'] }}</span>
                @endif
                <span class="loc-place">
                  {{ $loc['region'] ? $loc['region'] . ', UK' : $loc['name'] . ', UK' }}
                </span>
                <span class="loc-card-action">View location</span>
              </span>
            </span>
          </button>
        @empty
          <div class="loc-empty">No locations available right now - please check back soon.</div>
        @endforelse
        <div class="loc-empty" id="locNoResults" style="display:none">No locations match your search.</div>
      </div>

      <div class="loc-modal" id="locModal" aria-hidden="true">
        <div class="loc-modal-backdrop" data-close-modal></div>
        <div class="loc-modal-panel" role="dialog" aria-modal="true" aria-labelledby="locModalTitle">
          <button type="button" class="loc-modal-close" data-close-modal aria-label="Close location details">&times;</button>
          <div class="loc-modal-image">
            <img src="" alt="" id="locModalImage">
          </div>
          <div class="loc-modal-content">
            <span class="loc-modal-kicker">Featured location</span>
            <span class="loc-modal-title" id="locModalTitle"></span>
            <span class="loc-modal-location" id="locModalLocation"></span>
            <span class="loc-modal-kicker">Top 5 properties</span>
            <ul class="loc-modal-list" id="locModalList"></ul>
            <span class="loc-modal-empty" id="locModalEmpty" style="display:none">
              View premium serviced homes, availability and local stay details for this location.
            </span>
            <a class="loc-modal-more" id="locModalMore" href="#">View more</a>
          </div>
        </div>
      </div>
    </section>

    @if($hasCoords)
      <section class="loc-wrap loc-map-section">
        <div class="loc-map-head">
          <div>
            <p class="loc-eyebrow">On the map</p>
            <h2 class="loc-h2">Every GRHUM home, at a glance</h2>
          </div>
          <p class="loc-p">
            Explore coverage across the UK and move from browsing to booking with a clearer sense of place.
          </p>
        </div>
        <div id="locMap"></div>
      </section>
    @endif

    <section class="loc-wrap loc-cta-shell">
      <div class="loc-cta">
        <h2>Can&rsquo;t find your area?</h2>
        <p>
          We&rsquo;re expanding across the UK all the time. Tell us where you need to stay and we&rsquo;ll source the
          right home for you.
        </p>
        <a href="{{ url('contact') }}">Get in touch</a>
      </div>
    </section>
  </main>

  <script>
    (function () {
      const search = document.getElementById('locSearch');
      const grid = document.getElementById('locGrid');
      const cards = Array.from(grid.querySelectorAll('.loc-card'));
      const azBar = document.getElementById('locAz');
      const shown = document.getElementById('locShown');
      const noRes = document.getElementById('locNoResults');
      const modal = document.getElementById('locModal');
      const modalImage = document.getElementById('locModalImage');
      const modalTitle = document.getElementById('locModalTitle');
      const modalLocation = document.getElementById('locModalLocation');
      const modalList = document.getElementById('locModalList');
      const modalEmpty = document.getElementById('locModalEmpty');
      const modalMore = document.getElementById('locModalMore');
      let activeLetter = 'ALL';
      let lastFocusedCard = null;

      function apply() {
        const q = (search.value || '').trim().toLowerCase();
        let visible = 0;
        cards.forEach(c => {
          const matchText = !q || c.dataset.name.includes(q);
          const matchLetter = activeLetter === 'ALL' || c.dataset.letter === activeLetter;
          const show = matchText && matchLetter;
          c.style.display = show ? '' : 'none';
          if (show) visible++;
        });
        shown.textContent = visible;
        noRes.style.display = visible ? 'none' : 'block';
      }

      search.addEventListener('input', apply);

      azBar.addEventListener('click', e => {
        const btn = e.target.closest('button');
        if (!btn || btn.disabled) return;
        activeLetter = btn.dataset.letter;
        azBar.querySelectorAll('button').forEach(b => b.classList.toggle('is-active', b === btn));
        apply();
      });

      function openModal(card) {
        lastFocusedCard = card;
        const title = card.dataset.title || '';
        const location = card.dataset.location || '';
        const count = card.dataset.count || '';
        const properties = JSON.parse(card.dataset.properties || '[]');

        modalTitle.textContent = title;
        modalLocation.textContent = count ? `${location} · ${count}` : location;
        modalImage.src = card.dataset.image || '';
        modalImage.alt = title;
        modalMore.href = card.dataset.url || '#';

        modalList.innerHTML = '';
        if (properties.length) {
          modalList.style.display = '';
          modalEmpty.style.display = 'none';
          properties.slice(0, 5).forEach(property => {
            const li = document.createElement('li');
            const name = document.createElement('span');
            name.textContent = property.title || '';
            li.appendChild(name);
            if (property.type) {
              const type = document.createElement('small');
              type.textContent = property.type;
              li.appendChild(type);
            }
            modalList.appendChild(li);
          });
        } else {
          modalList.style.display = 'none';
          modalEmpty.style.display = '';
        }

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        modal.querySelector('.loc-modal-close').focus();
      }

      function closeModal() {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (lastFocusedCard) lastFocusedCard.focus();
      }

      cards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
      });

      modal.addEventListener('click', e => {
        if (e.target.closest('[data-close-modal]')) closeModal();
      });

      document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
      });
    })();

    @if($hasCoords)
      (function () {
        if (typeof mapboxgl === 'undefined') return;
        if (!mapboxgl.accessToken) {
          mapboxgl.accessToken = @json($mapboxToken ?? config('services.mapbox.token'));
        }
        const points = @json($mapPoints->map(fn($p) => ['name' => $p['name'], 'lat' => (float) $p['lat'], 'lng' => (float) $p['lng']]));
        const map = new mapboxgl.Map({
          container: 'locMap',
          style: 'mapbox://styles/mapbox/light-v11',
          center: [-2.5, 54.2],
          zoom: 4.9
        });
        map.addControl(new mapboxgl.NavigationControl(), 'top-right');
        const bounds = new mapboxgl.LngLatBounds();
        points.forEach(p => {
          const el = document.createElement('div');
          el.style.cssText = 'width:18px;height:18px;border-radius:50%;background:#18362D;border:4px solid #D8BE84;box-shadow:0 6px 18px rgba(23,21,17,.28);cursor:pointer';
          new mapboxgl.Marker(el)
            .setLngLat([p.lng, p.lat])
            .setPopup(new mapboxgl.Popup({ offset: 18, closeButton: false })
              .setHTML('<strong style="font-family:\'Cormorant Garamond\',serif;font-size:18px;color:#18362D">' + p.name + '</strong>'))
            .addTo(map);
          bounds.extend([p.lng, p.lat]);
        });
        if (points.length) map.fitBounds(bounds, { padding: 70, maxZoom: 9 });
      })();
    @endif
  </script>
@endsection
