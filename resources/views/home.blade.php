@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <div class="card-header h5 font-weight-bold text-center">Le Books</div>
           
                <div class="card-body">
                    <div class="row">
                      <div class="mb-2">
                        <div class="col">
                          <a href="/add" class="btn btn-primary">Tambah Book</a>
                        </div>
                      </div>
                      <div class="col">
                        <form action="" class="form-inline float-right">
                        <div class="input-group">
                          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                          <button type="button" class="btn btn-primary rounded">search</button>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="container">
                      <div class="row">
                        @foreach ($books as $book)
                        <div class="col-md-4">
                          <div class="card mb-4 shadow-sm" style="width: 300px;">
                          <div style="height: 395px; overflow: hidden;">
                            <img class="card-img-top" src="{{ asset('storage/'.$book->image_path) }}" alt="{{ $book->title }}" style="object-fit: cover; height: 100%; width: 100%;" data-toggle="modal" data-target="#bookModal">
                          </div>
                          <div class="card-body" style="height: 110px;">
                            <h5 class="card-title font-weight-bold" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" data-toggle="modal" data-target="#bookModal{{ $book->id }}">
                              {{ $book->title }}
                            </h5>
                            <!-- <h5 class="card-title" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">The King in Yellow</h5> -->
                            <div class="row">
                              <div class="m-auto">
                                <a href="#" class="btn btn-primary px-5 py-2 mt-2">Edit</a>
                              </div>
                              <div class="m-auto">
                                <a href="#" class="btn btn-primary px-5 py-2 mt-2">Hapus</a>
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
<div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="bookModal{{ $book->id }}Label" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 900px;">
  <div class="modal-content">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ $book->image_path }}" alt="{{ $book->title }}" style="height: 100%; width: 100%; object-fit: cover;">
      </div>
      <div class="col-md-8">
        <div class="modal-header" style="border: none;">
          <h5 class="modal-title" id="ookModal{{ $book->id }}Label">{{ $book->title }}</h5>
        </div>
        <div class="modal-body" style="border: none;">
          <p><strong>Penulis:</strong> {{ $book->writer }}</p>
          <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
          <p style="-webkit-line-clamp: 6; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"><strong>Synopsis:</strong> {{ $book->synopsis }}</p>
        </div>
        <div class="modal-footer" style="border: none;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach


@endsection