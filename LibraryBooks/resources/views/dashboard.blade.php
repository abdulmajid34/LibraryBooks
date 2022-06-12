@extends('layouts.template')
@section('content')
<div class="mt-4">
    @if (session()->has('success'))
      <div class="alert alert-success" style="width: 400px" role="alert">
        <div class="d-flex flex-row justify-content-between">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
      </div>   
    @endif
    <h1>@lang('dashboard.title-listbooks')</h1>
    <table class="table table-bordered border">
        <thead class="table-warning">
          <tr>
            <th scope="col" class="text-center" style="width: 80px">@lang('dashboard.number')</th>
            <th scope="col" class="text-center" style="width: 150px">@lang('dashboard.table-title')</th>
            <th scope="col" class="text-center" style="width: 100px">@lang('dashboard.table-genre')</th>
            <th scope="col" class="text-center">@lang('dashboard.table-sinopsis')</th>
            <th scope="col" class="text-center" style="width: 80px">@lang('dashboard.table-rating')</th>
            <th scope="col" class="text-center">@lang('dashboard.table-status')</th>
            <th scope="col" class="text-center" style="width: 200px">@lang('dashboard.table-action')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $book)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="text-center">{{ $book->title }}</td>
              <td class="text-center">{{ $book->genre }}</td>
              <td class="text-center">{{ $book->sinopsis }}</td>
              <td class="text-center">{{ $book->rating }}</td>
              @if ($book->status == 'available')
              <td class="text-center text-success">{{ $book->status }}</td>
              @else
              <td class="text-center text-danger">{{ $book->status }}</td>
              @endif
              @can('role','admin')
                <td class="text-center">
                  <button type="button" class="btn btn-success"><a style="text-decoration: none; color: white" href="{{ url('/edit/'.$book->id) }}">@lang('dashboard.label-edit')</a></button>
                  <form action="{{ url('/destroy/'. $book->id) }}" method="post" class="d-inline pl-2">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">@lang('dashboard.label-delete')</button>
                  </form>
                </td>
              @endcan
              @can('role','user')
              @if($book->status == 'unavailable')
              <td class="text-center text-secondary">
                @lang('dashboard.label-borrowed')
              </td>
              @else
              <td class="text-center">
                <form action="{{ url('/borrowed/'. $book->id) }}" method="post" class="d-inline">
                  @method('PATCH')
                  @csrf
                  <button type="submit" class="btn btn-primary">@lang('dashboard.label-borrow')</button>
                </form>
              </td>
              @endif
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection