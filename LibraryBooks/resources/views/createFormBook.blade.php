@extends('layouts.template')
@section('content')
<div class="mt-4 card p-2 m-2 shadow-lg rounded">
    <div>
        <h1>Form Create Book</h1>
    </div>
    <form class="mb-4" action="" method="post">
        @csrf
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" required class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label>
          <input type="text" required class="form-control" name="genre" id="genre">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="text" required name="rating" class="form-control" id="rating">
          </div>
        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" required name="sinopsis" id="sinopsis" rows="3"></textarea>
          </div>
        <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
      </form>
</div>
@endsection