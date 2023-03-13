<!DOCTYPE html>
<html>
<head>
    <title>BOOK REPORT</title>
    <style>
        body {
            font-family: "Futura", sans-serif;
        }
    </style>
</head>
<body>
    <h1>Book Report</h1>

    @foreach ($books as $book)
    <div style="border: 1px solid black; padding: 20px; margin-bottom: 20px;">
      <div style="display: flex;">
        <div style="flex: 1; border: 1px solid black; display: inline-block;">
          <img src="{{ public_path('storage/'.$book->image_path) }}" alt="{{ $book->title }}" style="height: 200px; width: auto; object-fit: cover;">
        </div>
        <div style="flex: 2;">
            <h2>{{ $book->title }}</h2>
            <p><strong>Penulis:</strong> {{ $book->writer }}</p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
            <p><strong>Synopsis:</strong> {{ $book->synopsis }}</p>
        </div>
      </div>
    </div>
@endforeach

</body>
</html>