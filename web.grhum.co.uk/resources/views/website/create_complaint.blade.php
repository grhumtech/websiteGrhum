{{-- resources/views/website/create_complaint.blade.php --}}
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>Create Complaint | Grhum</title></head>
<body>
  <h1>Raise a Complaint</h1>
  @if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
  <form method="post" action="{{ url('website/createComplaint') }}">
    @csrf
    <label>Booking</label>
    <select name="booking_id" required>
      @foreach($booking ?? [] as $b)
        <option value="{{ $b->booking_id }}">#{{ $b->booking_id }}</option>
      @endforeach
    </select><br>
    <label>Title</label><input type="text" name="complaint_title" required><br>
    <label>Details</label><textarea name="complaint_text" required></textarea><br>
    <button type="submit" name="submit" value="1">Submit</button>
  </form>
</body></html>
