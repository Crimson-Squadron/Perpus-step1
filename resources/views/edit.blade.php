@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="container" style="background-color:#1E1E1E;">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card border-0">
            <div class="card-header h4 font-weight-bold text-center border-0" style="background-color: #2F2F2F; color: #FFFFFF;">Edit Book</div>

                <div class="card-body" style="background-color:#2F2F2F; color: #FFFFFF;">
                  <form class="mx-auto" method="POST" action="{{ route('update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="titleInput">Title</label>
                      <input type="text" class="form-control border-secondary" id="titleInput" name="title" placeholder="Enter title" value="{{ $book->title }}" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="writerInput">Writer</label>
                      <input type="text" class="form-control border-secondary" id="writerInput" name="writer" placeholder="Enter writer" value="{{ $book->writer }}" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="publisherInput">Publisher</label>
                      <input type="text" class="form-control border-secondary" id="publisherInput" name="publisher" placeholder="Enter publisher" value="{{ $book->publisher }}" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="synopsisInput">Synopsis</label>
                      <textarea class="form-control border-secondary" id="synopsisInput" name="synopsis" rows="3" maxlength="255" placeholder="Enter synopsis" style="background-color: #2F2F2F; color: #FFFFFF;" required>{{ $book->synopsis }}</textarea>
                      <small id="synopsisHelp" class="form-text text-muted">Max 255 characters. <span id="synopsisCounter">{{ 255 - strlen($book->synopsis) }}</span> characters remaining.</small>
                    </div>
                    <script>
                      $(document).ready(function() {
                        $('#synopsisInput').on('input', function() {
                          var maxLength = $(this).attr('maxlength');
                          var currentLength = $(this).val().length;
                          var remainingLength = maxLength - currentLength;
                          $('#synopsisCounter').text(remainingLength);
                        });
                      });
                    </script>

                    <div class="form-group mb-4">
                      <label for="imageInput">Image</label>
                      <input type="file" class="form-control-file" id="imageInput" name="image">
                      @if ($book->image)
                        <img src="{{ asset('storage/'.$book->image) }}" alt="Book cover" width="100">
                      @endif
                    </div>
                    <button type="submit" class="btn" style="position: absolute; bottom: 20px; right: 20px; background-color: #20B2AA; color: #FFFFFF;">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
