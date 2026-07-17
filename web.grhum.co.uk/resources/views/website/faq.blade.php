{{-- resources/views/website/faq.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>FAQ | Grhum</title></head>
<body>
  <h1>Frequently Asked Questions</h1>
  @forelse($faq ?? [] as $f)
    <div class="faq-item">
      <h3>{{ $f->question ?? $f->title ?? '' }}</h3>
      <div>{!! $f->answer ?? '' !!}</div>
    </div>
  @empty
    <p>No FAQs available.</p>
  @endforelse
</body></html>
