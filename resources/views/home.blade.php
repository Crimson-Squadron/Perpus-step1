@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="container" style="background-color:#1E1E1E;">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card border-0">
                <div class="card-header h4 font-weight-bold text-center border-0" style="background-color: #2F2F2F; color: #FFFFFF;">Le Books</div>
                
                <div class="card-body" style="background-color:#2F2F2F;">
                    <div class="row">
                      <div class="mb-2">
                        <div class="col">
                          <a href="/add" class="btn" style="background-color: #4CAF50; color: #FFFFFF;">Add Book</a>
                        </div>
                      </div>
                      <div class="col">
                        
                      <form action="{{ route('add.search') }}" method="GET">
                        <div class="input-group" style="width: 280px; position: absolute; right: 10px;">
                          <input type="text" class="form-control rounded-left border-secondary border-right-0" name="search" placeholder="Search" style="background-color: #2F2F2F; color: #FFFFFF;">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-secondary rounded-right">
                              <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div>
                      </form>
                      </div>
                    </div>
                    
                    <div class="container pt-2">
                      <div class="row">
                        @foreach ($books as $book)
                        <div class="col-md-4">
                          <div class="card mb-4 pb-2 shadow-sm border-0" style="width: 300px; background-color:#1E1E1E; color: #FFFFFF;">
                          <div style="height: 450px; overflow: hidden;">
                            <img class="card-img-top" src="{{ asset('storage/'.$book->image_path) }}" alt="{{ $book->title }}" style="object-fit: cover; height: 100%; width: 100%;" data-toggle="modal" data-target="#bookModal{{ $book->id }}">
                          </div>
                          <div class="card-body" style="height: 110px;">
                            <h5 class="card-title font-weight-bold" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" data-toggle="modal" data-target="#bookModal{{ $book->id }}">
                              {{ $book->title }}
                            </h5>
                            <div class="row">
                              <div class="m-auto">
                                <a href="/edit/{{$book->id}}" class="btn px-5 py-2 mt-2" style="background-color: #20B2AA; color: #FFFFFF;">Edit</a>
                              </div>
                              <div class="m-auto">
                                <a href="/{{$book->id}}/delete" class="btn px-5 py-2 mt-2" style="background-color: #DC3545; color: #FFFFFF;">Delete</a>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($books as $book)
<div class="modal fade" style="color: #FFFFFF;" id="bookModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="bookModal{{ $book->id }}Label" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 900px;">
  <div class="modal-content" style="background-color: #2F2F2F;">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('storage/'.$book->image_path) }}" alt="{{ $book->title }}" style="height: 100%; width: 100%; object-fit: cover;">
      </div>
      <div class="col-md-8">
        <div class="modal-header" style="border: none;">
          <h5 class="modal-title" id="bookModal{{ $book->id }}Label">{{ $book->title }}</h5>
        </div>
        <div class="modal-body" style="border: none;">
          <p><strong>Penulis:</strong> {{ $book->writer }}</p>
          <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
          <p style="-webkit-line-clamp: 5; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;" maxlength="260"><strong>Synopsis:</strong> {{ $book->synopsis }}</p>
        </div>
        <div class="modal-footer" style="border: none;">
          <a href="{{ route('generate.pdf') }}" class="btn" style="position: absolute; bottom: 20px; right: 100px; background-color: #4CAF50; color: #FFFFFF;">Generate PDF</a>
          <button type="button" class="btn" data-dismiss="modal" style="position: absolute; bottom: 20px; right: 30px; background-color: #E0E0E0;">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach


@endsection