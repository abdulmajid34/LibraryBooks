@extends('layouts.template')
@section('content')
<div class="mt-4 card p-2 m-2 shadow-lg rounded">
    <div>
        <h1>Form Update Book</h1>
    </div>
    <form class="mb-4" action="{{ url('/update/'.$dataBooks->id) }}" method="POST">
        @method('PUT')
        @csrf
        {{-- <input type="hidden" name="_method" value="PATCH">  --}}
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" required name="title" value="{{ $dataBooks->title }}">
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label>
          <input type="text" class="form-control" name="genre" required id="genre" value="{{ $dataBooks->genre }}">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" required id="rating" value="{{ $dataBooks->rating }}">
          </div>
        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" name="sinopsis" id="sinopsis" required rows="3">{{ $dataBooks->sinopsis }}</textarea>
          </div>
          <div class="mb-3">
            <label for="sinopsis" class="form-label">status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                {{-- <option selected>Open this select menu</option> --}}
                <option value="available" @if(old('status') == 'available') {{ 'selected' }} @endif>available</option>
                <option value="unavailable" @if(old('status') == 'unavailable') {{ 'selected' }} @endif>unavailable</option>
              </select>
          </div>
        <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
      </form>
</div>
@endsection