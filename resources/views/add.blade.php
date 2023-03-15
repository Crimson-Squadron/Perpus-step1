@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="container" style="background-color:#1E1E1E;">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card border-0">
            <div class="card-header h4 font-weight-bold text-center border-0" style="background-color: #2F2F2F; color: #FFFFFF;">Add Book</div>

                <div class="card-body" style="background-color:#2F2F2F; color: #FFFFFF;">
                  <form class="mx-auto" method="POST" action="{{ route('add.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="titleInput">Title</label>
                      <input type="text" class="form-control border-secondary" id="titleInput" name="title" placeholder="Enter title" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="writerInput">Writer</label>
                      <input type="text" class="form-control border-secondary" id="writerInput" name="writer" placeholder="Enter writer" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="publisherInput">Publisher</label>
                      <input type="text" class="form-control border-secondary" id="publisherInput" name="publisher" placeholder="Enter publisher" style="background-color: #2F2F2F; color: #FFFFFF;" required>
                    </div>
                    <div class="form-group">
                      <label for="synopsisInput">Synopsis</label>
                      <textarea class="form-control border-secondary" id="synopsisInput" name="synopsis" rows="3" maxlength="255" placeholder="Enter synopsis" style="background-color: #2F2F2F; color: #FFFFFF;" required></textarea>
                      <small id="synopsisHelp" class="form-text text-muted">Max 255 characters. <span id="synopsisCounter">255</span> characters remaining.</small>
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
                      <input type="file" class="form-control-file" id="imageInput" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px; right: 20px; background-color: #4CAF50; color: #FFFFFF;">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection