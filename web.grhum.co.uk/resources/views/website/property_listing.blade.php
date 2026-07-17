@extends('layouts.app')

@section('title', 'Properties' . (!empty($street) ? ' in ' . $street : '') . ' | Grhum')

<style>
/* ── Base ──────────────────────────────────── */
.property-listing-section {
    background: #fafafa;
    padding: 0 0 60px;
}

/* ── Page header ──────────────────────────── */
.listing-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    padding: 26px 0 18px;
}
.listing-header .heading-block h1 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a1a;
    margin: 0 0 4px;
    letter-spacing: -0.3px;
}
.listing-header .heading-block p {
    font-size: 13.5px;
    color: #8a8a8a;
    margin: 0;
}
.btn-outline-dark-pill {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-radius: 24px;
    padding: 10px 20px;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a1a;
    white-space: nowrap;
    transition: border-color .15s, background .15s;
}
.btn-outline-dark-pill:hover {
    background: #f5f5f5;
    border-color: #ccc;
}

.total-properties {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}
.total-properties h4 {
    font-size: 15px;
    font-weight: 600;
    color: #6b6b6b;
    margin: 0;
}

/* ── Buttons ──────────────────────────────── */
.btn-dark {
    background: #1a1a1a;
    border: none;
    border-radius: 24px;
    padding: 9px 20px;
    font-size: 13px;
    font-weight: 600;
    transition: background .15s;
}
.btn-dark:hover {
    background: #333;
}

/* ── Property CARD GRID (image-top, 2-column) ── */
.property-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.property-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 16px;
    overflow: hidden;
    transition: box-shadow .2s, border-color .2s, transform .2s;
    display: flex;
    flex-direction: column;
}
.property-card:hover {
    box-shadow: 0 14px 34px rgba(0,0,0,.09);
    border-color: #e2e2e2;
    transform: translateY(-3px);
}

/* ── Property image / slider ─────────────── */
.property-image {
    position: relative;
    overflow: hidden;
    background: #eee;
}
.property-image .slider {
    position: relative;
    width: 100%;
    height: 100%;
}
.property-image img {
    width: 100%;
    height: 100%;
    min-height: 210px;
    max-height: 240px;
    object-fit: cover;
    display: block;
    transition: transform .35s ease;
}
.property-card:hover .property-image img {
    transform: scale(1.04);
}
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,.5);
    color: #fff;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 2;
    font-size: 12px;
    transition: background .15s;
}
.slider-nav:hover {
    background: rgba(0,0,0,.75);
}
.slider-nav.prev { left: 10px; }
.slider-nav.next { right: 10px; }
.slider-dots {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 6px;
    z-index: 2;
}
.slider-dots span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: rgba(255,255,255,.55);
    transition: width .2s, background .2s;
}
.slider-dots span.active {
    background: #fff;
    width: 16px;
    border-radius: 3px;
}

/* ── Card body / content ──────────────────── */
.property-content-top {
    padding: 16px 18px 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.property-title {
    font-size: 16.5px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 2px;
    letter-spacing: -0.2px;
}

.property-subtitle {
    font-size: 12.5px;
    color: #9a9a9a;
    margin-bottom: 14px;
}

/* ── Feature grid ─────────────────────────── */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    margin-bottom: 4px;
}

.feature-item {
    background: #f7f7f8;
    border: 1px solid #eef0f2;
    border-radius: 10px;
    padding: 9px 4px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 4px;
    transition: background .15s, transform .15s;
}

.feature-item:hover {
    background: #f0f1f3;
    transform: translateY(-1px);
}

.feature-icon {
    font-size: 15px;
    color: #6b6b6b;
}

.feature-label {
    font-size: 9px;
    color: #9a9a9a;
    line-height: 1.2;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    font-weight: 600;
}

.feature-value {
    font-size: 12.5px;
    font-weight: 700;
    color: #1a1a1a;
}

.property-content-button {
    margin-top: 14px;
}
.property-content-button .btn-primary {
    background: #1a1a1a;
    border: none;
    border-radius: 10px;
    padding: 9px 20px;
    font-size: 13px;
    font-weight: 600;
    width: 100%;
    display: inline-block;
    text-align: center;
    transition: background .15s, transform .15s;
}
.property-content-button .btn-primary:hover {
    background: #333;
    transform: translateY(-1px);
}

@media (max-width: 991px) {
    .property-grid { grid-template-columns: 1fr; }

    /* On tablet/mobile, drop the sticky-pane trick — let the page
       scroll normally with the map shown as a normal block above the list */
    .listing-sticky-row {
        position: static;
        height: auto;
    }
    .property-scroll-col {
        height: auto;
        overflow-y: visible;
    }
    .map-fixed-col {
        height: 340px;
        margin-bottom: 20px;
        order: -1;
    }
}
@media (max-width: 480px) {
    .feature-grid { grid-template-columns: repeat(2, 1fr); }
}

/* ── Mapbox popup custom styles ───────────── */
.mapboxgl-popup-content {
    padding: 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 28px rgba(0,0,0,0.2);
    min-width: 200px;
    max-width: 240px;
    font-family: Arial, sans-serif;
}

.mapboxgl-popup-content .popup-body {
    padding: 12px 14px;
}

.mapboxgl-popup-content .popup-body a {
    text-decoration: none;
    color: #1a1a1a;
    font-size: 14px;
    font-weight: 700;
}

.mapboxgl-popup-content .popup-body p {
    color: #666;
    font-size: 12px;
    margin: 5px 0 0;
    line-height: 1.4;
}

.mapboxgl-popup-close-button {
    font-size: 18px;
    color: #333;
    padding: 4px 8px;
}

/* Custom marker */
.custom-marker {
    width: 30px;
    height: 30px;
    cursor: pointer;
    transition: transform 0.2s;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,.25));
}

.custom-marker:hover {
    transform: scale(1.2);
}

.custom-marker.highlighted {
    filter: hue-rotate(100deg) brightness(1.2) drop-shadow(0 2px 6px rgba(0,0,0,.3));
    transform: scale(1.3);
}

/* Marker cluster badge (visual style like the reference image) */
.marker-cluster-badge {
    background: #1a1a1a;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0,0,0,.25);
    border: 2px solid #fff;
}

/* Expand map button */
.mapbox-expand-btn {
    position: absolute;
    top: 14px;
    left: 14px;
    z-index: 10;
    background: #fff;
    border: none;
    border-radius: 8px;
    padding: 9px 16px;
    font-size: 13px;
    font-weight: 700;
    color: #1a1a1a;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: box-shadow .15s;
}
.mapbox-expand-btn:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}

/* ── Sticky-pane row: pins to top of viewport, map stays put,
      only the property list scrolls inside its own column ── */
.listing-sticky-row {
    position: sticky;
    top: 0;
    height: 100vh;
    align-items: stretch;
}

.property-scroll-col {
    height: 100vh;
    overflow-y: auto;
    overflow-x: hidden;
    padding-top: 20px;
    padding-bottom: 20px;
    scrollbar-width: thin;
    scrollbar-color: #ccc transparent;
}
.property-scroll-col::-webkit-scrollbar { width: 6px; }
.property-scroll-col::-webkit-scrollbar-thumb { background: #ccc; border-radius: 6px; }
.property-scroll-col::-webkit-scrollbar-track { background: transparent; }

.map-fixed-col {
    height: 100vh;
    padding-top: 20px;
    padding-bottom: 20px;
}

/* ── Map column (rounded, right side like reference) ── */
.google-map {
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    height: 100%;
}

#maps {
    width: 100%;
    height: 100%;
}

.filter-btn {
    background: #f5f5f5;
    border: 1px solid #eee;
    border-radius: 20px;
    padding: 7px 18px;
    margin-right: 8px;
    margin-bottom: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #444;
    cursor: pointer;
    transition: all .15s;
}
.filter-btn:hover {
    border-color: #ccc;
}
.filter-btn.active {
    background: #1a1a1a;
    color: #fff;
    border-color: #1a1a1a;
}

#filterContainer .p-4 {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 14px;
    margin-bottom: 18px;
}

#filterContainer .font-weight-bold {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .4px;
    color: #888;
}
</style>

@push('scripts-head')
<!-- Mapbox GL JS CSS -->
<link href="https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet">
<!-- Mapbox GL JS -->
<script src="https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
@endpush

@php
    // Per-property related data (type / bed-bath-etc / images), mirroring
    // the lookups the original CI page did per row.
    $rows = collect($data ?? [])->map(function ($value) {
        $propertyId = $value->property_id ?? $value->id ?? null;

        $type = DB::table('property_type')
            ->where('property_type_id', $value->property_type_id ?? null)
            ->first();

        $detail = DB::table('p_detail')
            ->where('property_id', $propertyId)
            ->first();

        $images = DB::table('property_image')
            ->where('property_id', $propertyId)
            ->pluck('property_image')
            ->toArray();

        return [
            'id'          => $propertyId,
            'area'        => $value->area ?? '',
            'pincode'     => $value->pincode ?? '',
            'address'     => $value->address ?? '',
            'description' => $value->description ?? '',
            'occupancy'   => $value->occupancy ?? '',
            'latitude'    => $value->latitude ?? null,
            'longitude'   => $value->longitude ?? null,
            'type_name'   => $type->type_name ?? 'N/A',
            'bedroom'     => $detail->bedroom ?? 0,
            'bathroom'    => $detail->bathroom ?? 0,
            'parking'     => $detail->parking_type ?? 0,
            'floor'       => $detail->floor ?? 'N/A',
            'pet'         => (!empty($detail->pet_friendly) && $detail->pet_friendly == 'Yes') ? 'Yes' : 'No',
            'lift'        => (!empty($detail->lift_access) && $detail->lift_access == 'Yes') ? 'Yes' : 'No',
            'images'      => $images,
        ];
    });

    $mapLocations = $rows->filter(fn($r) => $r['latitude'] && $r['longitude'])->map(function ($r) {
        return [
            'id'          => $r['id'],
            'latitude'    => $r['latitude'],
            'longitude'   => $r['longitude'],
            'area'        => $r['area'],
            'description' => $r['description'],
            'images'      => $r['images'],
        ];
    })->values();
@endphp

@section('content')

<section class="property-listing-section">
    <div class="container-fluid">

        {{-- Page header (title + show all locations, like the reference) --}}
        <div class="listing-header">
            <div class="heading-block">
                <h1>Serviced Apartments{{ !empty($street) ? ' in ' . $street : '' }}</h1>
                <p>Find your perfect serviced accommodation{{ !empty($street) ? ' in ' . $street : '' }}.</p>
            </div>
            <button class="btn-outline-dark-pill" type="button">Show all locations</button>
        </div>

        <div class="row listing-sticky-row">
            <div class="col-lg-8 col-md-12 col-12 property-scroll-col">

                {{-- Filter section --}}
                <div id="filterContainer" class="collapse">
                    <div class="p-4">
                        <span class="font-weight-bold">Beds</span>
                        <div class="d-flex flex-wrap mt-2">
                            <button class="filter-btn" data-value="Studio">Studio</button>
                            <button class="filter-btn" data-value="1 Bed">1 Bed</button>
                            <button class="filter-btn" data-value="2 Bed">2 Bed</button>
                            <button class="filter-btn" data-value="3 Bed">3 Bed</button>
                        </div>
                    </div>
                </div>

                <div class="total-properties">
                    <h4>
                        Showing {{ $rows->count() }} result{{ $rows->count() === 1 ? '' : 's' }}
                    </h4>
                    <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#filterContainer"
                        aria-expanded="false" aria-controls="filterContainer">
                        Show Filters
                    </button>
                </div>

                {{-- Card grid: image on top, details below (2 columns) --}}
                <div class="property-grid">
                    @forelse($rows as $p)

                        <div class="property-card" data-property-id="{{ $p['id'] }}">

                            {{-- Image --}}
                            <div class="property-image">
                                <div class="slider">
                                    @forelse($p['images'] as $i => $img)
                                        <div class="slide-img-{{ $p['id'] }}" style="display: {{ $i === 0 ? 'block' : 'none' }}">
                                            <a href="{{ url('website/propertyDetail/' . $p['id']) }}" target="_blank">
                                                <img src="https://crm.grhum.co.uk/storage/properties/5EoZjrotOwU55r66yjGRG5RWBAvzAEO4casxjnxf.png" alt="{{ $p['area'] }}">
                                            </a>
                                        </div>
                                    @empty
                                        <div class="slide-img-{{ $p['id'] }}">
                                            <a href="{{ url('website/propertyDetail/' . $p['id']) }}" target="_blank">
                                                <img src="https://crm.grhum.co.uk/storage/properties/5EoZjrotOwU55r66yjGRG5RWBAvzAEO4casxjnxf.png" alt="{{ $p['area'] }}">
                                            </a>
                                        </div>
                                    @endforelse

                                    @if(count($p['images']) > 1)
                                        <button type="button" class="slider-nav prev" onclick="prevSlide({{ $p['id'] }})">&#10094;</button>
                                        <button type="button" class="slider-nav next" onclick="nextSlide({{ $p['id'] }})">&#10095;</button>
                                        <div class="slider-dots">
                                            @foreach($p['images'] as $i => $img)
                                                <span class="{{ $i === 0 ? 'active' : '' }}"></span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Details --}}
                            <div class="property-content-top">

                                <a href="{{ url('website/propertyDetail/' . $p['id']) }}" target="_blank" class="text-decoration-none">
                                    <h3 class="property-title">{{ $p['area'] }} &ndash; {{ $p['pincode'] }}</h3>
                                </a>
                                <p class="property-subtitle">{{ $p['type_name'] }} &middot; {{ $p['bedroom'] }} bed</p>

                                <div class="feature-grid">

                                    <div class="feature-item">
                                        <i class="far fa-building feature-icon"></i>
                                        <span class="feature-label">Type</span>
                                        <span class="feature-value">{{ $p['type_name'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-bed feature-icon"></i>
                                        <span class="feature-label">Bedrooms</span>
                                        <span class="feature-value">{{ $p['bedroom'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-bath feature-icon"></i>
                                        <span class="feature-label">Bathrooms</span>
                                        <span class="feature-value">{{ $p['bathroom'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-car feature-icon"></i>
                                        <span class="feature-label">Parking</span>
                                        <span class="feature-value">{{ $p['parking'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-layer-group feature-icon"></i>
                                        <span class="feature-label">Floor</span>
                                        <span class="feature-value">{{ $p['floor'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-paw feature-icon"></i>
                                        <span class="feature-label">Pet</span>
                                        <span class="feature-value">{{ $p['pet'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-arrow-up feature-icon"></i>
                                        <span class="feature-label">Lift</span>
                                        <span class="feature-value">{{ $p['lift'] }}</span>
                                    </div>

                                    <div class="feature-item">
                                        <i class="fas fa-users feature-icon"></i>
                                        <span class="feature-label">Occupancy</span>
                                        <span class="feature-value">{{ $p['occupancy'] }}</span>
                                    </div>

                                </div><!-- /feature-grid -->

                                <div class="property-content-button">
                                    <a href="{{ url('website/propertyDetail/' . $p['id']) }}"
                                       target="_blank"
                                       class="btn btn-primary">
                                        Enquire Now
                                    </a>
                                </div>

                            </div><!-- /property-content-top -->

                        </div><!-- /property-card -->
                    @empty
                        <div class="alert alert-warning text-center my-4">
                            <strong>No properties found.</strong>
                        </div>
                    @endforelse
                </div><!-- /property-grid -->

            </div><!-- /col-lg-8 -->

            {{-- MAP COLUMN --}}
            <div class="col-lg-4 col-md-12 col-12 map-fixed-col">
                <div class="google-map">
                    <button class="mapbox-expand-btn" onclick="toggleFullscreen()">
                        <span>&#8592;</span> Expand map
                    </button>
                    <div id="maps"></div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // ─── CONFIG ────────────────────────────────────────────────────────

    const mapData2            = @json($mapLocations);
    const highlightPropertyId = @json($highlight_id ?? null);
    const baseUrl             = @json(url('/') . '/');
    const markerMap           = {};   // propertyId → { marker, el }

    let maps;

    function initMapbox() {
        if (!mapData2 || mapData2.length === 0) {
            console.warn('No map data found');
            return;
        }

        const center = [
            parseFloat(mapData2[0].longitude),
            parseFloat(mapData2[0].latitude)
        ];

        maps = new mapboxgl.Map({
            container: 'maps',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: center,
            zoom: 12
        });

        maps.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
        maps.on('load', () => addMarkers());
    }

    function addMarkers() {
        const offsetDuplicates = {};
        const popup = new mapboxgl.Popup({
            closeButton: true,
            closeOnClick: false,
            offset: 30
        });

        mapData2.forEach(location => {
            const key = `${location.latitude},${location.longitude}`;

            if (!offsetDuplicates[key]) {
                offsetDuplicates[key] = 0;
            } else {
                const offset = 0.00005 * offsetDuplicates[key];
                location.latitude  = parseFloat(location.latitude)  + offset;
                location.longitude = parseFloat(location.longitude) + offset;
                offsetDuplicates[key]++;
            }

            const isHighlighted = highlightPropertyId && location.id == highlightPropertyId;

            const el = document.createElement('img');
            el.src       = baseUrl + 'assets/img/fav.png';
            el.className = 'custom-marker' + (isHighlighted ? ' highlighted' : '');
            el.title     = `Property in ${location.area}`;

            const marker = new mapboxgl.Marker({ element: el, anchor: 'bottom' })
                .setLngLat([parseFloat(location.longitude), parseFloat(location.latitude)])
                .addTo(maps);

            markerMap[location.id] = { marker, el };

            const shortDesc = location.description
                ? location.description.substring(0, 60) + '...'
                : '';

            const popupHTML = `
                <div class="mapboxgl-popup-content">
                    <div class="popup-body">
                        <a href="${baseUrl}website/propertyDetail/${location.id}" target="_blank">
                            Flat in ${location.area}
                        </a>
                        <p>${shortDesc}</p>
                    </div>
                </div>`;

            el.addEventListener('click', () => {
                popup
                    .setLngLat([parseFloat(location.longitude), parseFloat(location.latitude)])
                    .setHTML(popupHTML)
                    .addTo(maps);

                window.open(`${baseUrl}website/propertyDetail/${location.id}`, '_blank');
            });

            if (isHighlighted) {
                popup
                    .setLngLat([parseFloat(location.longitude), parseFloat(location.latitude)])
                    .setHTML(popupHTML)
                    .addTo(maps);
            }
        });
    }

    // ─── HOVER HIGHLIGHT (from property list) ──────────────────────────
    function highlightMapMarker(propertyId) {
        const entry = markerMap[propertyId];
        if (entry) {
            entry.el.src = baseUrl + 'assets/green.png';
            entry.el.classList.add('highlighted');
        }
    }

    function resetMapMarker(propertyId) {
        const entry = markerMap[propertyId];
        if (entry) {
            entry.el.src = baseUrl + 'assets/img/fav.png';
            entry.el.classList.remove('highlighted');
        }
    }

    document.querySelectorAll('.property-card').forEach(el => {
        const propertyId = el.getAttribute('data-property-id');
        el.addEventListener('mouseenter', () => highlightMapMarker(propertyId));
        el.addEventListener('mouseleave', () => resetMapMarker(propertyId));
    });

    // ─── EXPAND / FULLSCREEN toggle ─────────────────────────────────────
    function toggleFullscreen() {
        const mapEl = document.getElementById('maps');
        if (!document.fullscreenElement) {
            mapEl.requestFullscreen().then(() => maps.resize());
        } else {
            document.exitFullscreen();
        }
    }

    initMapbox();

    // ─── Filter button toggle ────────────────────────────────────────
    document.querySelectorAll(".filter-btn").forEach((button) => {
        button.addEventListener("click", () => {
            button.classList.toggle("active");
        });
    });

    // ─── Manual image slider ────────────────────────────────────────
    const slideIndexes = {};

    function showSlide(id, n) {
        const slides = document.querySelectorAll(`.slide-img-${id}`);
        if (!slides.length) return;
        if (!slideIndexes[id]) slideIndexes[id] = 0;
        if (n >= slides.length) slideIndexes[id] = 0;
        if (n < 0) slideIndexes[id] = slides.length - 1;
        slides.forEach((slide, i) => {
            slide.style.display = (i === slideIndexes[id]) ? 'block' : 'none';
        });

        const dots = document.querySelectorAll(`[data-property-id="${id}"] .slider-dots span`);
        dots.forEach((dot, i) => dot.classList.toggle('active', i === slideIndexes[id]));
    }

    function nextSlide(id) {
        slideIndexes[id] = (slideIndexes[id] ?? 0) + 1;
        showSlide(id, slideIndexes[id]);
    }

    function prevSlide(id) {
        slideIndexes[id] = (slideIndexes[id] ?? 0) - 1;
        showSlide(id, slideIndexes[id]);
    }
</script>
@endpush
