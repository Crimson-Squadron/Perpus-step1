@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header h5 font-weight-bold text-center">Add Le Books</div>
                <div class="card-body">
                  <form class="mx-auto">
                    <div class="form-group">
                      <label for="titleInput">Title</label>
                      <input type="text" class="form-control" id="titleInput" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                      <label for="writerInput">Writer</label>
                      <input type="text" class="form-control" id="writerInput" placeholder="Enter writer" required>
                    </div>
                    <div class="form-group">
                      <label for="publisherInput">Publisher</label>
                      <input type="text" class="form-control" id="publisherInput" placeholder="Enter publisher" required>
                    </div>
                    <div class="form-group">
                      <label for="synopsisInput">Synopsis</label>
                      <textarea class="form-control" id="synopsisInput" name="synopsis" rows="3" maxlength="300" placeholder="Enter synopsis" required></textarea>
                      <small id="synopsisHelp" class="form-text text-muted">Max 300 characters. <span id="synopsisCounter">300</span> characters remaining.</small>
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
                      <input type="file" class="form-control-file" id="imageInput" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px; right: 20px;">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header h5 font-weight-bold text-center">Add Le Books</div>
                <div class="card-body">
                  <form class="mx-auto" method="POST" action="{{ route('add.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="titleInput">Title</label>
                      <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                      <label for="writerInput">Writer</label>
                      <input type="text" class="form-control" id="writerInput" name="writer" placeholder="Enter writer" required>
                    </div>
                    <div class="form-group">
                      <label for="publisherInput">Publisher</label>
                      <input type="text" class="form-control" id="publisherInput" name="publisher" placeholder="Enter publisher" required>
                    </div>

                    <!-- <div class="form-group">
                      <label for="synopsisInput">Synopsis</label>
                      <textarea class="form-control" id="synopsisInput" name="synopsis" rows="3" maxlength="300" placeholder="Enter synopsis" required></textarea>
                      <small id="synopsisHelp" class="form-text text-muted">Max 300 characters. <span id="synopsisCounter">300</span> characters remaining.</small>
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
                    </script> -->

                    <div class="form-group">
                      <label for="synopsisInput">Synopsis</label>
                      <textarea class="form-control" id="synopsisInput" name="synopsis" rows="3" maxlength="300" placeholder="Enter synopsis" required></textarea>
                      <small id="synopsisHelp" class="form-text text-muted">Max 300 characters. <span id="synopsisCounter">300</span> characters remaining.</small>
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
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px; right: 20px;">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection