{{-- resources/views/website/enquiry_history.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>My Enquiries | Grhum</title></head>
<body>
  <h1>My Enquiries</h1>
  <table border="1" cellpadding="6">
    <tr><th>#</th><th>Property</th><th>Check In</th><th>Check Out</th><th>Status</th></tr>
    @forelse($data ?? [] as $e)
      <tr>
        <td>{{ $e->enquiry_id }}</td>
        <td>{{ $e->property_name ?? $e->title ?? '' }}</td>
        <td>{{ $e->check_in ?? '' }}</td>
        <td>{{ $e->check_out ?? '' }}</td>
        <td>{{ $e->reason ?? '' }}</td>
      </tr>
    @empty
      <tr><td colspan="5">No enquiries yet.</td></tr>
    @endforelse
  </table>
</body></html>
