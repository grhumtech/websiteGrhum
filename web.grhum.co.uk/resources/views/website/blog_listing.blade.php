{{-- resources/views/website/blog_listing.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>Blog | Grhum</title></head>
<body>
  <h1>Blog</h1>
  @forelse($blogs ?? [] as $b)
    <article>
      <h3><a href="{{ url('website/blog_detail/'.$b->id) }}">{{ $b->title ?? '' }}</a></h3>
      <p>{{ \Illuminate\Support\Str::limit(strip_tags($b->content ?? $b->description ?? ''), 160) }}</p>
    </article>
  @empty
    <p>No posts yet.</p>
  @endforelse
</body></html>
