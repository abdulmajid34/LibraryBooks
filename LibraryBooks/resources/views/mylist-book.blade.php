@extends('layouts.template')
@section('content')
    <div class="mt-4">
        @auth('admin')
        @can('role', ['user'])
        @if(count($mylistBook) > 0)
        <h1 class="text-center mb-4">@lang('index.label-mylist')</h1>
        <table class="table table-bordered border">
          <thead class="table-success">
            <tr>
              <th class="text-center" style="width: 80px" scope="col">@lang('dashboard.number')</th>
              <th class="text-center" scope="col">@lang('dashboard.table-title')</th>
              <th class="text-center" style="width: 100px" scope="col">@lang('dashboard.table-genre')</th>
              <th class="text-center" scope="col">@lang('dashboard.table-sinopsis')</th>
              <th class="text-center" style="width: 80px" scope="col">@lang('dashboard.table-rating')</th>
              <th class="text-center" style="width: 150px" scope="col">@lang('index.label-loan-date')</th>
              <th class="text-center" style="width: 130px" scope="col">@lang('dashboard.table-action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mylistBook as $book)
            <tr>
              <th class="text-center" scope="row">{{ $loop->iteration }}</th>
              <td class="text-center">{{ $book->title }}</td>
              <td class="text-center">{{ $book->genre }}</td>
              <td class="text-center">{{ $book->sinopsis }}</td>
              <td class="text-center">{{ $book->rating }}</td>
              <td class="text-center">{{ date('d-m-Y', strtotime($book->created_at)) }}</td>
              <td class="text-center">
                <form action="{{ url('/returnBook/'. $book->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-warning">@lang('index.label-return')</button>
                </form>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
        @else
        <h1 class="text-center text-secondary">@lang('index.msg-no-mylist-book')</h1>
        @endif
        @endcan
        @endauth
    </div>
@endsection