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

  $mapLocationItems = collect($mapLocations)
    ->map(fn ($coords, $name) => [
      'name' => $name,
      'lat' => $coords[0],
      'lng' => $coords[1],
    ])
    ->values();
@endphp

@once
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
@endonce

<style>
  .locations-map-section {
    --forest: #173a31;
    --forest-2: #214d41;
    --cream: #f8f2e8;
    --muted: #d7cbb7;
    --gold: #c9a463;
    --ink: #10221e;
    background:
      linear-gradient(135deg, rgba(23, 58, 49, .98), rgba(33, 77, 65, .96)),
      var(--forest);
    color: var(--cream);
    padding: clamp(44px, 7vh, 72px) 0;
  }

  .locations-map-inner {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 clamp(16px, 3vw, 48px);
  }

  .locations-map-header {
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: 28px;
    align-items: end;
    margin-bottom: 34px;
  }

  .locations-map-eyebrow {
    color: var(--gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .18em;
    margin: 0 0 12px;
    text-transform: uppercase;
  }

  .locations-map-title {
    color: var(--cream);
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-size: clamp(34px, 5vw, 60px);
    font-weight: 500;
    line-height: .98;
    margin: 0;
    max-width: 760px;
  }

  .locations-map-copy {
    color: var(--muted);
    font-size: 16px;
    line-height: 1.7;
    margin: 18px 0 0;
    max-width: 670px;
  }

  .locations-map-link {
    border-bottom: 2px solid var(--gold);
    color: var(--cream);
    font-size: 14px;
    font-weight: 800;
    padding-bottom: 4px;
    text-decoration: none;
    white-space: nowrap;
  }

  .locations-map-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(430px, 34vw);
    gap: 26px;
    align-items: stretch;
  }

  .locations-map-shell {
    background: rgba(248, 242, 232, .08);
    border: 1px solid rgba(248, 242, 232, .18);
    border-radius: 8px;
    box-shadow: 0 24px 70px rgba(0, 0, 0, .24);
    height: min(740px, 100vh);
    min-height: 420px;
    overflow: hidden;
    z-index: 9;
    position: relative;
  }

  #grhumLocationsMap {
    height: 100%;
    width: 100%;
  }

  .locations-map-panel {
    background: rgba(248, 242, 232, .07);
    border: 1px solid rgba(248, 242, 232, .16);
    border-radius: 8px;
    padding: 24px;
    min-width: 0;
  }

  .locations-map-panel h3 {
    color: var(--cream);
    font-size: 18px;
    font-weight: 800;
    margin: 0 0 8px;
  }

  .locations-map-panel p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.6;
    margin: 0 0 18px;
  }

  .locations-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 8px;
    max-height: none;
    overflow: visible;
    padding-right: 0;
  }

  .location-button {
    align-items: center;
    background: rgba(248, 242, 232, .08);
    border: 1px solid rgba(248, 242, 232, .14);
    border-radius: 6px;
    color: var(--cream);
    cursor: pointer;
    display: flex;
    font: inherit;
    font-size: 14px;
    font-weight: 750;
    gap: 10px;
    justify-content: space-between;
    min-height: 42px;
    padding: 9px 12px;
    text-align: left;
    transition: background .18s ease, border-color .18s ease, color .18s ease;
    width: 100%;
  }

  .location-button::after {
    background: var(--gold);
    border-radius: 999px;
    content: "";
    flex: 0 0 8px;
    height: 8px;
    opacity: .8;
    width: 8px;
  }

  .location-button:hover,
  .location-button.is-active {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--ink);
  }

  .location-button:hover::after,
  .location-button.is-active::after {
    background: var(--ink);
  }

  .location-marker {
    align-items: center;
    background: var(--gold);
    border: 3px solid var(--cream);
    border-radius: 999px;
    box-shadow: 0 8px 18px rgba(16, 34, 30, .32);
    display: flex;
    height: 20px;
    justify-content: center;
    transition: background .18s ease, box-shadow .18s ease, transform .18s ease;
    width: 20px;
  }

  .location-marker::after {
    background: var(--ink);
    border-radius: 999px;
    content: "";
    height: 6px;
    width: 6px;
  }

  .leaflet-marker-icon.is-highlighted {
    z-index: 999 !important;
  }

  .leaflet-marker-icon.is-highlighted .location-marker {
    background: var(--cream);
    box-shadow: 0 0 0 8px rgba(201, 164, 99, .28), 0 14px 28px rgba(16, 34, 30, .42);
    transform: scale(1.45);
  }

  .leaflet-popup-content-wrapper {
    border-radius: 8px;
  }

  .leaflet-popup-content {
    color: var(--ink);
    font: 700 14px/1.3 'Hanken Grotesk', Arial, sans-serif;
    margin: 10px 12px;
  }

  @media (max-width: 980px) {
    .locations-map-layout {
      grid-template-columns: 1fr;
    }

    .locations-map-panel {
      padding: 20px;
    }

    .locations-list {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      max-height: none;
      overflow: visible;
      padding-right: 0;
    }
  }

  @media (max-width: 720px) {
    .locations-map-section {
      padding: 64px 0;
    }

    .locations-map-header {
      grid-template-columns: 1fr;
    }

    .locations-map-link {
      justify-self: start;
    }

    .locations-map-shell {
      height: min(520px, 100vh);
      min-height: 380px;
    }

    .locations-list {
      grid-template-columns: 1fr;
    }
  }
</style>

<section class="locations-map-section">
  <div class="locations-map-inner">
    <div class="locations-map-header">
      <div>
        <p class="locations-map-eyebrow">Our destinations</p>
        <h2 class="locations-map-title">{{ count($mapLocations) }}+ locations across the UK &amp; Ireland</h2>
        <p class="locations-map-copy">
          Explore our city network across major business, culture, and education hubs.
          Select a location to focus the map.
        </p>
      </div>

      <a class="locations-map-link" href="https://www.grhum.co.uk/locations">Explore all locations &rarr;</a>
    </div>

    <div class="locations-map-layout">
      <div class="locations-map-shell">
        <div
          id="grhumLocationsMap"
          aria-label="Interactive map of GRHUM locations across the UK and Ireland"
        ></div>
        <script type="application/json" id="grhumLocationsData">@json($mapLocationItems)</script>
      </div>

      <aside class="locations-map-panel" aria-label="Location list">
        <h3>Choose a city</h3>
        <p>Tap a location to zoom in and view it on the map.</p>

        <div class="locations-list">
          @foreach($mapLocationItems as $location)
            <button class="location-button" type="button" data-location-name="{{ $location['name'] }}">
              {{ $location['name'] }}
            </button>
          @endforeach
        </div>
      </aside>
    </div>
  </div>
</section>

@once
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endonce

  <script>
    (function () {
      const mapElement = document.getElementById('grhumLocationsMap');
      const dataElement = document.getElementById('grhumLocationsData');

      if (!mapElement || typeof L === 'undefined') {
        return;
      }

      const locations = JSON.parse(dataElement ? dataElement.textContent : '[]');
      const buttons = document.querySelectorAll('.location-button');
      let selectedName = null;

      const map = L.map(mapElement, {
        scrollWheelZoom: false,
        zoomControl: true
      });

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);

      const markerIcon = L.divIcon({
        className: '',
        html: '<span class="location-marker"></span>',
        iconSize: [20, 20],
        iconAnchor: [10, 10],
        popupAnchor: [0, -12]
      });

      const markers = new Map();
      const bounds = [];

      locations.forEach((location) => {
        const marker = L.marker([location.lat, location.lng], { icon: markerIcon })
          .addTo(map)
          .bindPopup(location.name);

        markers.set(location.name, marker);
        bounds.push([location.lat, location.lng]);
      });

      if (bounds.length) {
        map.fitBounds(bounds, {
          padding: [42, 42],
          maxZoom: 6
        });

        setTimeout(function () {
          map.invalidateSize();
        }, 150);
      }

      function setHighlightedMarker(name) {
        markers.forEach((marker, markerName) => {
          const markerElement = marker.getElement();

          if (markerElement) {
            markerElement.classList.toggle('is-highlighted', markerName === name);
          }
        });
      }

      function setActiveButton(name) {
        buttons.forEach((button) => {
          button.classList.toggle('is-active', button.dataset.locationName === name);
        });
      }

      function highlightLocation(name, moveMap) {
        const marker = markers.get(name);

        if (!marker) {
          return;
        }

        setActiveButton(name);
        setHighlightedMarker(name);

        if (moveMap) {
          map.setView(marker.getLatLng(), 9, { animate: true });
        } else {
          map.panTo(marker.getLatLng(), { animate: true });
        }

        marker.openPopup();
      }

      buttons.forEach((button) => {
        button.addEventListener('mouseenter', () => {
          highlightLocation(button.dataset.locationName, false);
        });

        button.addEventListener('focus', () => {
          highlightLocation(button.dataset.locationName, false);
        });

        button.addEventListener('mouseleave', () => {
          if (selectedName) {
            highlightLocation(selectedName, false);
            return;
          }

          setActiveButton(null);
          setHighlightedMarker(null);
          map.closePopup();
        });

        button.addEventListener('click', () => {
          selectedName = button.dataset.locationName;
          highlightLocation(selectedName, true);
        });
      });
    })();
  </script>
