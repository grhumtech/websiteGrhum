@extends('layouts.app')
@section('title', 'Accreditations & Compliance | Grhum')

@section('content')

<style>
  :root{
    --grhum-dark:#1E3A30;
    --grhum-dark2:#28483C;
    --grhum-gold:#C2A06B;
    --grhum-gold-light:#D9C39A;
    --grhum-cream:#F6F1E8;
  }

  /* ── Header band ── */
  .accred-hero{
    background:var(--grhum-dark);
    padding:90px 0 70px;
    text-align:center;
  }
  .accred-hero .eyebrow{
    color:var(--grhum-gold-light);font-size:12.5px;font-weight:700;
    letter-spacing:.2em;text-transform:uppercase;margin-bottom:14px;
  }
  .accred-hero h1{
    font-family:'Cormorant Garamond',serif;font-weight:500;
    font-size:52px;line-height:1.05;color:var(--grhum-cream);
    letter-spacing:-.01em;margin:0;
  }
  @media(max-width:760px){ .accred-hero h1{font-size:34px} }

  /* ── Cards section ── */
  .accred-section{background:var(--grhum-cream);padding:80px 0}

  .accred-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));
    gap:28px;
    max-width:1240px;margin:0 auto;padding:0 32px;
  }

  .accred-card{
    position:relative;
    background:#fff;
    border:1px solid rgba(30,58,48,.08);
    border-radius:16px;
    padding:36px 28px;
    text-align:center;
    cursor:pointer;
    transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
  }
  .accred-card:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 32px rgba(30,58,48,.12);
    border-color:var(--grhum-gold);
  }

  .accred-card .accred-logo-wrap{
    height:110px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;
  }
  .accred-card img{max-width:100%;max-height:100%;object-fit:contain}
  .accred-card img.cyber-essentials-log{position:relative;bottom:6px}
  .accred-card img.ico-logo{filter:invert(.75) sepia(.2) hue-rotate(120deg)}

  .accred-card h4{
    font-family:'Cormorant Garamond',serif;font-size:20px;font-weight:600;
    color:var(--grhum-dark);margin:0 0 10px;
  }
  .accred-card p.accred-summary{
    font-size:13.5px;color:#5b6b64;line-height:1.5;margin:0;
  }
  .accred-card .accred-cta{
    display:inline-block;margin-top:14px;font-size:12.5px;font-weight:700;
    color:var(--grhum-dark);letter-spacing:.05em;text-transform:uppercase;
    border-bottom:2px solid var(--grhum-gold);padding-bottom:2px;
  }

  /* ── Modal ── */
  #infoModal .modal-dialog{max-width:520px}
  #infoModal .hive-modal-content{
    background:#fff;border-radius:16px;padding:36px 40px;position:relative;
  }
  #infoModal img{width:100%;height:100px;object-fit:contain;margin-bottom:18px}
  #infoModal h4{
    font-family:'Cormorant Garamond',serif;color:var(--grhum-dark);
    font-size:24px;margin-bottom:12px;
  }
  #infoModal p{font-size:14.5px;color:#3d4a45;line-height:1.6}
  #infoModal p a{color:var(--grhum-dark);font-weight:700;border-bottom:1px solid var(--grhum-gold)}
</style>

<section class="accred-hero">
  <p class="eyebrow">Trust &amp; standards</p>
  <h1>Accreditations &amp; Compliance</h1>
</section>

<section class="accred-section">
  <div class="accred-grid">

    {{-- ITM --}}
    <div class="accred-card" data-title="ITM"
         data-body="Grhum Ltd is a business member of the Institute of Travel Management (ITM), which is committed to advancing and supporting corporate travel worldwide."
         data-link="https://www.itm.org.uk/home" data-link-label="www.itm.org.uk"
         data-logo="{{ asset('upload/Main-web-logo-Copy.png') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/Main-web-logo-Copy.png') }}" class="img-fluid cyber-essentials-log" alt="ITM">
      </div>
      <h4>ITM</h4>
      <p class="accred-summary">Business member of the Institute of Travel Management, supporting corporate travel worldwide.</p>
      <span class="accred-cta">Learn more</span>
    </div>

    {{-- ASAP --}}
    <div class="accred-card" data-title="asap"
         data-body="Grhum Ltd is a registered agent member of asap, a global non-profit trade association dedicated to uniting and representing the serviced accommodation industry."
         data-link="https://theasap.org.uk/asap-agent-members/" data-link-label="theasap.org.uk"
         data-logo="{{ asset('upload/asap_logo.png') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/asap_logo.png') }}" class="img-fluid" alt="asap">
      </div>
      <h4>asap</h4>
      <p class="accred-summary">Registered agent member representing the serviced accommodation industry globally.</p>
      <span class="accred-cta">Learn more</span>
    </div>

    {{-- ISAAP --}}
    <div class="accred-card" data-title="ISAAP"
         data-body="Grhum is an Accredited Agent Member of ISAAP — the leading independent global quality standard for the corporate housing, aparthotel, and serviced apartment sector within the hospitality industry."
         data-link="https://isaap.org/" data-link-label="isaap.org"
         data-logo="{{ asset('upload/isaap-logo.png') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/isaap-logo.png') }}" class="img-fluid" alt="ISAAP">
      </div>
      <h4>ISAAP</h4>
      <p class="accred-summary">Accredited Agent Member — global quality standard for serviced apartments.</p>
      <span class="accred-cta">Learn more</span>
    </div>

    {{-- GBTA --}}
    <div class="accred-card" data-title="GBTA"
         data-body="Grhum Ltd is a proud member of GBTA, the world's largest business travel association. Their specialized events, educational programs, and research tools empower our serviced apartment experts to stay ahead of industry trends."
         data-link="https://www.gbta.org/" data-link-label="www.gbta.org"
         data-logo="{{ asset('upload/GBTA_FullName_Tagline_RGB_Pos-1.svg') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/GBTA_FullName_Tagline_RGB_Pos-1.svg') }}" class="img-fluid" alt="GBTA">
      </div>
      <h4>GBTA</h4>
      <p class="accred-summary">Proud member of the world's largest business travel association.</p>
      <span class="accred-cta">Learn more</span>
    </div>

    {{-- ICO / UK GDPR --}}
    <div class="accred-card" data-title="UK GDPR"
         data-body="Grhum Ltd. is ICO UK registered and fully compliant with UK GDPR regulations, ensuring secure and transparent data protection in line with legal standards."
         data-link="https://ico.org.uk/" data-link-label="ico.org.uk"
         data-logo="{{ asset('upload/ico-header-logo.svg') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/uk-gdpr_logo.png') }}" class="img-fluid" alt="UK GDPR">
      </div>
      <h4>UK GDPR</h4>
      <p class="accred-summary">ICO UK registered and fully compliant with UK GDPR data protection standards.</p>
      <span class="accred-cta">Learn more</span>
    </div>

    {{-- Cyber Essentials --}}
    <div class="accred-card" data-title="Cyber Essentials"
         data-body="Grhum Ltd is Cyber Essentials certified, reflecting our commitment to safeguarding systems, data, and clients against common cyber threats with robust and compliant security practices."
         data-link="https://iasme.co.uk/cyber-essentials/" data-link-label="iasme.co.uk"
         data-logo="{{ asset('upload/cyber-essentials.png') }}">
      <div class="accred-logo-wrap">
        <img src="{{ asset('upload/cyber-essentials.png') }}" class="img-fluid cyber-essentials-log" alt="Cyber Essentials">
      </div>
      <h4>Cyber Essentials</h4>
      <p class="accred-summary">Certified for robust, compliant protection against common cyber threats.</p>
      <span class="accred-cta">Learn more</span>
    </div>

  </div>
</section>

{{-- Bootstrap 4/5 compatible modal --}}
<div class="modal" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="hive-modal-content">
      <h4 id="infoModalLabel"></h4>
      <div id="modalContent"></div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $(".accred-card").on("click", function () {
      const title = $(this).data("title");
      const body  = $(this).data("body");
      const link  = $(this).data("link");
      const label = $(this).data("link-label");
      const logo  = $(this).data("logo");

      const html = `
        <img src="${logo}" alt="${title}">
        <p>${body}</p>
        <p>To learn more, visit <a href="${link}" target="_blank">${label}</a></p>
      `;

      $("#infoModalLabel").text(title);
      $("#modalContent").html(html);
      $("#infoModal").modal("show");
    });
  });
</script>
@endpush