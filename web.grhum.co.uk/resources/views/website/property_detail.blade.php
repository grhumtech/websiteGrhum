{{-- resources/views/website/property_detail.blade.php --}}
@extends('layouts.app')

@section('title', ($p->title ?? $p->property_name ?? 'Property Detail') . ' | Grhum')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
  <style>
    .propert-detail-image { width: 100%; overflow: hidden; }
    .cl { height: 450px; width: 100%; }
    .cl img { height: 100%; width: 100%; object-fit: cover; }
    .slick-active { padding: 0px 0; }
    .slick-slide, .slick-center { transform: scale(1); }
    .slick-slide, .slick-slide:not(.slick-active) { margin: 0px 0; padding: 0 5px; }
    .child { width: 100%; }
    .slide:not(.slick-active) { cursor: pointer; }
    .pagination { text-align: center; color: #fff; font-family: "Raleway", sans-serif; font-size: 1.2rem; }
    .slick-prev:before, .slick-next:before { opacity: 1; color: black; }
    .slick-prev, .slick-next { color: black; }
    .slick-prev { left: 0; }
    .slick-next { right: 0; }
    .corporate-section h1 { margin: 0 !important; font-size: 50px !important; }
    .corporate-section .corporate-content { bottom: 0 !important; top: 0; margin: auto; height: fit-content; }
    section.contact-map-section { display: none; }
    .postcode { font-size: 14px !important; background: #ccc; padding: 1px 6px; border-radius: 30px; font-weight: 500; }
    .address { color: #434343; font-size: 20px !important; margin-bottom: 25px; }
    .bed { color: #434343; font-size: 15px !important; margin-bottom: 25px; }
    #map { height: 100%; min-height: 420px; width: 100%; border-radius: 12px; overflow: hidden; }
  </style>
@endpush

@php
  // Normalize the incoming data so the template can safely use object access
  // regardless of whether the controller passes Eloquent models or arrays.
  $p        = is_array($data[0] ?? null) ? (object) $data[0] : ($data[0] ?? null);
  $d        = is_array($detail[0] ?? null) ? (object) $detail[0] : ($detail[0] ?? null);
  $images   = collect($image ?? [])->map(fn($i) => is_array($i) ? (object) $i : $i);
  $amenities    = collect($aminities ?? [])->map(fn($a) => is_array($a) ? (object) $a : $a);
  $neighbourhoods = collect($neighborhood ?? [])->map(fn($n) => is_array($n) ? (object) $n : $n);
  $termsList    = collect($terms ?? [])->map(fn($t) => is_array($t) ? (object) $t : $t);

  $imgUrl = fn($img) => asset('upload/property/' . ($img->property_image ?? $img->image ?? ''));
@endphp

@section('content')

  <section class="product-detail-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="property-detail-main-image">
            @if($images->count())
              <a data-fancybox="gallery" href="{{ $imgUrl($images[0]) }}">
                <img src="{{ $imgUrl($images[0]) }}" alt="{{ $p->title ?? '' }}">
                <span class="property-all-img-btn">
                  <svg style="fill:#fff;" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M22.63 0H1.36A1.36 1.36 0 0 0 0 1.37v21.26A1.36 1.36 0 0 0 1.36 24h21.27A1.37 1.37 0 0 0 24 22.63V1.37A1.37 1.37 0 0 0 22.63 0Zm0 23H1.36a.36.36 0 0 1-.36-.37v-2.8l6-6 1.8 1.79.7-.7L7 12.45l-6 6V1.37A.36.36 0 0 1 1.36 1h21.27a.36.36 0 0 1 .37.36v14.8l-6.62-6.62-7.77 7.77.7.71L16.38 11 23 17.57v5.06a.37.37 0 0 1-.37.37ZM6 3a3 3 0 1 0 3 3 3 3 0 0 0-3-3Zm0 5a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z"></path>
                  </svg>
                  View all
                </span>
              </a>
              @if($images->count() > 1)
                <a data-fancybox="gallery" href="{{ $imgUrl($images[1]) }}">
                  <img src="{{ $imgUrl($images[1]) }}" alt="{{ $p->title ?? '' }}">
                </a>
              @endif
              @if($images->count() > 2)
                <a data-fancybox="gallery" href="{{ $imgUrl($images[2]) }}">
                  <img src="{{ $imgUrl($images[2]) }}" alt="{{ $p->title ?? '' }}">
                </a>
              @endif
              @foreach($images as $img)
                <a class="d-none" data-fancybox="gallery" href="{{ $imgUrl($img) }}"></a>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid bottom-top">
      <div class="row">

        {{-- ============ LEFT: DETAILS ============ --}}
        <div class="col-lg-7">
          <div class="propert-detail-content">

            <div class="propert-detail-heading">
              <p>
                <span class="address">{{ $p->address ?? '' }}, {{ $p->area ?? '' }}</span>
                <span class="postcode">{{ $p->pincode ?? '' }}</span>
              </p>
              <div>{!! $p->description ?? '' !!}</div>
              <p class="bed">Bed Configuration - {{ $d->built_year ?? '' }}</p>
            </div>

            @if(!empty($p->latitude))
              <script>
                const locations = [{
                  lat: {{ $p->latitude }},
                  lng: {{ $p->longitude }},
                  name: "{{ addslashes($p->title ?? '') }}",
                  img: "{{ $images->count() ? $imgUrl($images[0]) : '' }}"
                }];
              </script>
            @endif

            <ul class="specific-list mt-5">
              <li>
                <i class="far fa-building"></i>
                <p>{{ $p->property_type_name ?? $p->type_name ?? '' }}</p>
              </li>
              <li>
                <i class="fas fa-bed mr-1"></i>
                <p>Bedrooms - {{ $d->bedroom ?? 0 }}</p>
              </li>
              <li>
                <i class="fas fa-bath mr-1"></i>
                <p>Bathrooms - {{ $d->bathroom ?? 0 }}</p>
              </li>
              <li>
                <i class="fas fa-car mr-1"></i>
                <p>Parking - {{ $d->garage ?? 0 }}</p>
              </li>
              <li>
                <svg fill="#434343" height="40px" width="40px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M425.567,28.444c-5.236,0-8.382,4.161-8.382,9.397v85.418h-67.002c-5.236,0-8.85,4.633-8.85,9.869v75.464h-76.951c-5.236,0-8.382,4.105-8.382,9.341v75.992h-76.428c-5.236,0-8.905,4.165-8.905,9.402v75.932H93.715c-5.236,0-8.382,4.633-8.382,9.869v75.464H0v18.963h93.715c5.236,0,10.581-3.858,10.581-9.094v-76.24h75.275c5.236,0,10.058-3.858,10.058-9.094v-76.24h74.752c5.236,0,10.581-4.325,10.581-9.561v-75.772h75.22c5.236,0,10.113-4.385,10.113-9.622v-75.712h65.271c5.236,0,10.581-3.858,10.581-9.094V47.407H512V28.444H425.567z"/>
                  <path d="M425.567,293.926h-56.889c-5.236,0-9.481,4.245-9.481,9.482s4.245,9.482,9.481,9.482h29.417l-55.083,55.042c-3.704,3.704-3.704,9.682,0,13.385c1.852,1.852,4.278,2.767,6.704,2.767c2.426,0,5.402-0.931,7.254-2.783l60.216-59.672v38.583c0,5.236,4.245,9.482,9.482,9.482s9.481-4.246,9.481-9.482v-56.889C436.148,298.087,430.803,293.926,425.567,293.926z"/>
                </svg>
                <p>Floor level - {{ $d->floor ?? '' }}</p>
              </li>
              <li>
                <i class="fas fa-paw mr-1"></i>
                <p>Pet Friendly - {{ (($d->pet_friendly ?? '') === 'Yes') ? 'Yes' : 'No' }}</p>
              </li>
              <li>
                <svg height="40px" width="40px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                  <g fill="#434343">
                    <path d="M164.881,236.368c-11.791,0-21.343,9.552-21.343,21.343c0,11.791,9.552,21.343,21.343,21.343c11.791,0,21.35-9.552,21.35-21.343C186.231,245.92,176.672,236.368,164.881,236.368z"/>
                    <path d="M256.007,236.368c-11.791,0-21.35,9.552-21.35,21.343c0,11.791,9.559,21.343,21.35,21.343c11.784,0,21.35-9.552,21.35-21.343C277.358,245.92,267.791,236.368,256.007,236.368z"/>
                    <path d="M347.126,236.368c-11.791,0-21.35,9.552-21.35,21.343c0,11.791,9.559,21.343,21.35,21.343c11.791,0,21.35-9.552,21.35-21.343C368.476,245.92,358.917,236.368,347.126,236.368z"/>
                    <path d="M395.779,134.776H116.228c-21.477,0-38.966,17.481-38.966,38.959v299.299c0,21.485,17.489,38.966,38.966,38.966h279.551c21.484,0,38.958-17.481,38.958-38.966V173.735C434.738,152.257,417.264,134.776,395.779,134.776z"/>
                  </g>
                </svg>
                <p>Lift Access - {{ (($d->lift_access ?? '') === 'Yes') ? 'Yes' : 'No' }}</p>
              </li>
              <li>
                <i class="fas fa-users"></i>
                <p>Occupancy - {{ $p->occupancy ?? '' }}</p>
              </li>
            </ul>

            <div class="col-lg-12 text-right mt-5">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Enquire now
              </button>
            </div>

            <div class="property-detail-description mt-4">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link show active" data-toggle="pill" href="#amenities" role="tab">Amenities</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#terms" role="tab">Terms &amp; conditions</a>
                </li>
              </ul>

              <div class="tab-content mt-3">
                <div class="tab-pane fade active show" id="amenities" role="tabpanel">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="property-detail-list">
                        @forelse($amenities as $amenity)
                          <li>{{ $amenity->aminity_text ?? $amenity->aminity_name ?? $amenity->name ?? '' }}</li>
                        @empty
                          <li>No amenities listed.</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="neighborhood" role="tabpanel">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="property-detail-list">
                        @forelse($neighbourhoods as $n)
                          <li>{{ $n->neighborhood_text ?? $n->name ?? '' }}</li>
                        @empty
                          <li>No neighborhood information available.</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="terms" role="tabpanel">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="property-detail-list">
                        @forelse($termsList as $term)
                          <li>{{ $term->term_text ?? $term->term_name ?? $term->name ?? '' }}</li>
                        @empty
                          <li>No terms &amp; conditions listed.</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @auth
              <div class="propert-card mt-4">
                <h3>Leave a Review</h3>
                <form action="{{ route('website.sendFeedback') }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" placeholder="Enter a title" name="title">
                      <input type="hidden" name="property_id" value="{{ $p->property_id ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="rating">Rating</label>
                      <select name="rating" class="form-control">
                        <option value="1">1 Star - Poor</option>
                        <option value="2">2 Star - Fair</option>
                        <option value="3">3 Star - Average</option>
                        <option value="4">4 Star - Good</option>
                        <option value="5">5 Star - Excellent</option>
                      </select>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="review">Review</label>
                      <textarea name="review" rows="5" placeholder="Write a review" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                      <button class="btn btn-success" type="submit">Submit Review</button>
                    </div>
                  </div>
                </form>
              </div>
            @endauth

          </div>
        </div>

        {{-- ============ RIGHT: MAP ============ --}}
        <div class="col-lg-5">
          <div class="property-detail-map">
            <div id="map"></div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ============ GRHUM STANDARD / INCLUSIONS ============ --}}
  <section class="inclusions-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inclusions-heading">
            <h1>The Grhum Standard</h1>
            <p>Basic essential amenities in every property to ensure a comfortable and seamless stay.</p>
          </div>
        </div>
      </div>
      <div class="row">
        @php
          $inclusions = [
              ['img' => 'bill-11.png', 'label' => 'Utilities & bills included'],
              ['img' => 'image-3.png', 'label' => 'Wi - Fi'],
              ['img' => 'image-2.png', 'label' => 'Iron & ironing board'],
              ['img' => 'image-5.png', 'label' => 'Housekeeping'],
              ['img' => 'image-6.png', 'label' => 'Television'],
              ['img' => 'image-7.png', 'label' => 'Equipped kitchen'],
              ['img' => 'image-8.png', 'label' => 'Laundry options'],
              ['img' => 'image-9.png', 'label' => 'Fresh towels & bedding'],
          ];
        @endphp
        @foreach($inclusions as $inclusion)
          <div class="col-lg-3 col-md-4 col-6">
            <div class="inclusions-content" data-aos="fade-up" data-aos-duration="3000">
              <img src="{{ asset('upload/' . $inclusion['img']) }}" alt="{{ $inclusion['label'] }}">
              <h6>{{ $inclusion['label'] }}</h6>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ============ ENQUIRY MODAL ============ --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sendEnquiry') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="">Company Name</label>
                <input type="text" placeholder="Enter Your Company Name" name="company_name">
                <input type="hidden" name="property_id" value="{{ $p->property_id ?? '' }}">
                <input type="hidden" name="client_id" value="{{ auth()->id() ?? '' }}">
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Full Name <span>*</span></label>
                <input type="text" placeholder="Enter Your Full Name" name="full_name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Email Address <span>*</span></label>
                <input type="email" placeholder="Enter Your Email Address" name="email_id" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Phone Number <span>*</span></label>
                <input type="number" placeholder="Enter Your Phone Number" name="mobile" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Check In <span>*</span></label>
                <input type="text" id="startDateInput" class="no-calendar-icon flatpickr-input" placeholder="Check In Date" readonly name="check_in" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Check Out <span>*</span></label>
                <input type="text" id="endDateInput" class="no-calendar-icon flatpickr-input" placeholder="Check Out Date" readonly name="check_out" required>
              </div>
              <div class="col-md-6">
                <label for="guest">Guest details <span>*</span></label>
                <div class="form-group-enquire">
                  <div class="dropdown-enquire">
                    <button type="button" class="guestsButton-enquire">Guest details</button>
                    <button class="clear-button-enquire" style="display:none;">&#x2715;</button>
                    <div class="dropdown-content-enquire">
                      <div class="dropdown-row-enquire">
                        <label>Adults</label>
                        <div class="quantity-enquire">
                          <button type="button" class="quantity-button-enquire decrease-enquire">-</button>
                          <input type="number" class="adults-enquire" value="0" min="0">
                          <button type="button" class="quantity-button-enquire increase-enquire">+</button>
                        </div>
                      </div>
                      <div class="dropdown-row-enquire">
                        <label>Children</label>
                        <div class="quantity-enquire">
                          <button type="button" class="quantity-button-enquire decrease-enquire">-</button>
                          <input type="number" class="children-enquire" value="0" min="0">
                          <button type="button" class="quantity-button-enquire increase-enquire">+</button>
                        </div>
                      </div>
                      <div class="dropdown-row-enquire">
                        <label>Infants</label>
                        <div class="quantity-enquire">
                          <button type="button" class="quantity-button-enquire decrease-enquire">-</button>
                          <input type="number" class="infants-enquire" value="0" min="0">
                          <button type="button" class="quantity-button-enquire increase-enquire">+</button>
                        </div>
                      </div>
                      <div class="dropdown-row-enquire">
                        <label>Pets</label>
                        <div class="quantity-enquire">
                          <button type="button" class="quantity-button-enquire decrease-enquire">-</button>
                          <input type="number" class="pets-enquire" value="0" min="0">
                          <button type="button" class="quantity-button-enquire increase-enquire">+</button>
                        </div>
                      </div>
                      <div class="dropdown-row-enquire">
                        <button type="button" class="done-button-enquire ml-auto">Done</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Budget <span>*</span></label>
                <input type="text" placeholder="Enter Your Budget" name="budget" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Enquiry <span>*</span></label>
                <textarea name="enquiry_text" cols="30" rows="4"></textarea>
              </div>
              <div class="col-md-6 mx-auto text-center">
                <div class="modal-bottom">
                  <input type="checkbox" name="agree" id="check-tick">
                  <label for="check-tick">
                    Please tick this box to confirm that you've read our
                    <a target="_blank" href="{{ url('privacy-policy') }}">Privacy Policy</a> and Client
                    <a target="_blank" href="{{ url('terms-and-conditions') }}">Terms &amp; Conditions</a>*
                    <br><br>
                    This site is protected by reCAPTCHA and the Google
                    <a target="_blank" href="https://policies.google.com/privacy">Privacy Policy</a> and
                    <a target="_blank" href="https://policies.google.com/terms">Terms of Service</a> apply.
                  </label>
                </div>
                <button class="btn modal-btn" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {
      $('[data-fancybox="gallery"]').fancybox({
        buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
        loop: true
      });
    });
  </script>

  <script>
    let map;

    function initMap() {
      if (typeof locations === 'undefined' || locations.length === 0) {
        console.error('No locations available');
        return;
      }

      const customMapStyle = [
        { featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }] },
        { featureType: "poi.business", elementType: "labels", stylers: [{ visibility: "off" }] },
        { featureType: "transit", elementType: "labels", stylers: [{ visibility: "off" }] }
      ];

      map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: locations[0].lat, lng: locations[0].lng },
        zoom: 17,
        styles: customMapStyle,
        mapTypeControl: false,
        gestureHandling: "none",
        zoomControl: false,
        scrollwheel: false
      });

      const infowindow = new google.maps.InfoWindow();

      locations.forEach(location => {
        const marker = new google.maps.Marker({
          position: { lat: location.lat, lng: location.lng },
          map: map,
          icon: {
            url: "{{ asset('assets/img/fav.png') }}",
            scaledSize: new google.maps.Size(50, 50)
          },
          animation: google.maps.Animation.DROP
        });

        marker.addListener('mouseout', () => {
          marker.setIcon({
            url: "{{ asset('assets/img/fav.png') }}",
            scaledSize: new google.maps.Size(50, 50)
          });
          infowindow.close();
        });
      });
    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      if (window.flatpickr) {
        flatpickr("#startDateInput", {});
        flatpickr("#endDateInput", {});
      }
    });
  </script>
@endpush