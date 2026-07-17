{{-- resources/views/website/history.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>Booking History | Grhum</title></head>
<body>
  <h1>My Bookings</h1>
  <table border="1" cellpadding="6">
    <tr><th>#</th><th>Property</th><th>Check In</th><th>Check Out</th></tr>
    @forelse($data ?? [] as $b)
      <tr>
        <td>{{ $b->booking_id }}</td>
        <td>{{ $b->property_name ?? $b->title ?? '' }}</td>
        <td>{{ $b->check_in ?? '' }}</td>
        <td>{{ $b->check_out ?? '' }}</td>
      </tr>
    @empty
      <tr><td colspan="4">No bookings yet.</td></tr>
    @endforelse
  </table>
</body></html>
