{{-- resources/views/website/blog_detail.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>Blog | Grhum</title></head>
<body>
  @php $b = ($blogs[0] ?? $blogs ?? null); @endphp
  @if($b)
    <h1>{{ $b->title ?? '' }}</h1>
    <div>{!! $b->content ?? $b->description ?? '' !!}</div>
  @else
    <p>Post not found.</p>
  @endif
</body></html>
