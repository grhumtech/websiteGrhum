@php
  // name => [lat, lng]
  $mapLocations = [
    'London'              => [51.5074, -0.1278],
    'Edinburgh'           => [55.9533, -3.1883],
    'Manchester'          => [53.4808, -2.2426],
    'Birmingham'          => [52.4862, -1.8904],
    'Bristol'             => [51.4545, -2.5879],
    'Liverpool'           => [53.4084, -2.9916],
    'Glasgow'             => [55.8642, -4.2518],
    'Leeds'               => [53.8008, -1.5491],
    'Cardiff'             => [51.4816, -3.1791],
    'Oxford'              => [51.7520, -1.2577],
    'Newcastle Upon Tyne' => [54.9783, -1.6178],
    'Belfast'             => [54.5973, -5.9301],
    'Sheffield'           => [53.3811, -1.4701],
    'Milton Keynes'       => [52.0406, -0.7594],
    'Dublin'              => [53.3498, -6.2603],
    'Cambridge'           => [52.2053,  0.1218],
    'Southampton'         => [50.9097, -1.4044],
    'Nottingham'          => [52.9548, -1.1581],
    'Bournemouth'         => [50.7192, -1.8808],
    'Coventry'            => [52.4068, -1.5197],
    'Aberdeen'            => [57.1497, -2.0943],
    'Reading'             => [51.4543, -0.9781],
    'Dundee'              => [56.4620, -2.9707],
    'Cork'                => [51.8985, -8.4756],
  ];

  // ── Project lat/lng onto a fixed 360x460 illustration viewBox ──
  // (simple linear fit, not a real projection — this is decorative,
  // not a literal map, so it never needs external map libraries)
  $lats = array_map(fn($c) => $c[0], $mapLocations);
  $lngs = array_map(fn($c) => $c[1], $mapLocations);
  $latMin = min($lats); $latMax = max($lats);
  $lngMin = min($lngs); $lngMax = max($lngs);
  $pad = 20; $w = 360; $h = 460;

  $points = collect($mapLocations)->map(function ($c, $name) use ($latMin, $latMax, $lngMin, $lngMax, $pad, $w, $h) {
      $x = $pad + (($c[1] - $lngMin) / ($lngMax - $lngMin)) * ($w - $pad * 2);
      $y = $pad + (($latMax - $c[0]) / ($latMax - $latMin)) * ($h - $pad * 2);
      return ['name' => $name, 'x' => round($x, 1), 'y' => round($y, 1)];
  })->values();
@endphp

<style>
  .map-band{background:#1E3A30;padding:96px 0 90px}
  .map-band-head{max-width:1240px;margin:0 auto;padding:0 32px 44px;display:flex;align-items:flex-end;justify-content:space-between;gap:24px;flex-wrap:wrap}
  .map-band-head .eyebrow{color:#D9C39A;font-size:12.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px}
  .map-band-head h2{font-family:'Cormorant Garamond',serif;font-weight:500;font-size:46px;line-height:1.05;color:#F6F1E8;letter-spacing:-.01em;margin:0}
  .map-band-head a{font-size:14.5px;font-weight:600;color:#F6F1E8;border-bottom:2px solid #C2A06B;padding-bottom:3px}

  .map-illustration-wrap{
    max-width:1240px;margin:0 auto;padding:0 32px;
    display:grid;grid-template-columns:1fr 320px;gap:48px;align-items:center;
  }

  /* The SVG is intrinsic-sized (viewBox) and scales via CSS only —
     no JS resize/canvas logic, so there is nothing that can leave a gap. */
  .map-svg-wrap{position:relative;width:100%}
  .map-svg-wrap svg{width:100%;height:auto;display:block;max-height:640px;margin:0 auto}

  .city-dot{fill:#C2A06B;stroke:#1E3A30;stroke-width:1.5;transition:r .15s, fill .15s}
  .city-pulse{fill:none;stroke:#C2A06B;stroke-width:1;opacity:.55}

  /* Labels are ALWAYS visible now (small + muted), and brighten on hover
     instead of appearing from nothing — fixes "map looks empty" issue */
  .city-label{
    font-family:'Hanken Grotesk',sans-serif;font-size:8px;font-weight:600;
    fill:#D9C39A;opacity:.85;transition:opacity .15s, fill .15s, font-size .15s;
    pointer-events:none;
  }
  .city-group{cursor:pointer}
  .city-group:hover .city-dot,
  .city-group.active .city-dot{ r:5.5; fill:#F6F1E8; }
  .city-group:hover .city-label,
  .city-group.active .city-label{ opacity:1; fill:#F6F1E8; font-size:10px; }

  .locations-chip-list{display:flex;flex-wrap:wrap;gap:8px;align-content:flex-start}
  .locations-chip-list .eyebrow2{
    width:100%;color:#D9C39A;font-size:11.5px;font-weight:700;letter-spacing:.15em;
    text-transform:uppercase;margin-bottom:6px;
  }
  .location-chip{
    background:rgba(246,241,232,.06);border:1px solid rgba(246,241,232,.16);
    border-radius:20px;padding:6px 14px;font-size:12.5px;font-weight:600;
    color:#F6F1E8;cursor:pointer;transition:background .15s,border-color .15s;
  }
  .location-chip:hover,
  .location-chip.active{background:#C2A06B;border-color:#C2A06B;color:#1E3A30}

  @media(max-width:900px){
    .map-illustration-wrap{grid-template-columns:1fr}
  }
  @media(max-width:760px){
    .map-band{padding-top:64px}
    .map-band-head h2{font-size:32px}
  }
</style>

<section class="map-band">
  <div class="map-band-head">
    <div>
      <p class="eyebrow">Our destinations</p>
      <h2>{{ count($mapLocations) }}+ locations across the UK &amp; Ireland</h2>
    </div>
    <a href="https://www.grhum.co.uk/locations">Explore all locations →</a>
  </div>

  <div class="map-illustration-wrap">

    {{-- Illustrated network map — pure SVG, always fills its box --}}
    <div class="map-svg-wrap">
      <svg viewBox="0 0 360 460" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Map of GRHUM locations across the UK and Ireland">
        <defs>
          {{-- reduced blur so landmass shapes read clearly instead of dissolving --}}
          <filter id="blobBlur" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur stdDeviation="10"/>
          </filter>
        </defs>

        {{-- landmass glows — brighter + less blurred so they're actually visible
             against the dark band background (this was the main "map not visible" bug) --}}
        <ellipse cx="175" cy="105" rx="105" ry="85"  fill="#3A5F4F" opacity=".85" filter="url(#blobBlur)"/>
        <ellipse cx="80"  cy="285" rx="65"  ry="140" fill="#3A5F4F" opacity=".8"  filter="url(#blobBlur)"/>
        <ellipse cx="255" cy="320" rx="105" ry="150" fill="#3A5F4F" opacity=".85" filter="url(#blobBlur)"/>

        {{-- city markers --}}
        @foreach($points as $p)
          <g class="city-group" data-city="{{ $p['name'] }}">
            <circle class="city-pulse" cx="{{ $p['x'] }}" cy="{{ $p['y'] }}" r="8"></circle>
            <circle class="city-dot" cx="{{ $p['x'] }}" cy="{{ $p['y'] }}" r="3.5"></circle>
            <text class="city-label" x="{{ $p['x'] + 8 }}" y="{{ $p['y'] + 3 }}">{{ $p['name'] }}</text>
          </g>
        @endforeach
      </svg>
    </div>

    {{-- Full location list — always visible, doubles as touch-friendly index --}}
    <div class="locations-chip-list">
      <span class="eyebrow2">All locations</span>
      @foreach($points as $p)
        <span class="location-chip" data-city="{{ $p['name'] }}">{{ $p['name'] }}</span>
      @endforeach
    </div>

  </div>
</section>

@push('scripts')
<script>
(function () {
  // Simple, dependency-free hover sync between the chip list and the
  // SVG dots — no external map library, nothing async, nothing that
  // can race and leave a blank gap.
  const chips = document.querySelectorAll('.location-chip');
  const groups = document.querySelectorAll('.city-group');
  const groupByCity = {};
  groups.forEach(g => groupByCity[g.getAttribute('data-city')] = g);

  chips.forEach(chip => {
    const city = chip.getAttribute('data-city');
    const group = groupByCity[city];
    if (!group) return;
    chip.addEventListener('mouseenter', () => group.classList.add('active'));
    chip.addEventListener('mouseleave', () => group.classList.remove('active'));
  });
})();
</script>
@endpush