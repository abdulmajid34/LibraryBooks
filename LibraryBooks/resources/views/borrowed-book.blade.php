@extends('layouts.template')
@section('content')
{{-- <div class="jumbotron mt-3">
    <h1 class="display-4">Post Only Admin or Editor</h1>
    <p>Lorem ipsum....</p>
</div> --}}
<div class="mt-4">
  
    @auth('admin')
    @can('role', ['admin'])
    @if(count($userList) > 0)
    <h1 class="mb-4 text-center">@lang('index.label-listUser')</h1>
    <table class="table bg-secondary">
        <thead class="table-success">
          <tr>
            <th scope="col">@lang('dashboard.number')</th>
            <th scope="col">@lang('register.label-name')</th>
            <th scope="col">@lang('dashboard.table-title')</th>
            <th scope="col">@lang('index.label-loan-date')</th>
            <th scope="col">@lang('dashboard.table-status')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($userList as $data)
          @if ($data->status == 'available')
          @else
          <tr>
            <th scope="row" class="text-light">{{ $loop->iteration }}</th>
            <td class="text-light">{{ $data->name }}</td>
            <td class="text-light">{{ $data->title }}</td>
            <td class="text-light">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
            @if ($data->status == 'unavailable')
              <td class="text-warning">On Loan</td>
            @endif
            
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    @else
      <h1 class="text-center text-secondary">@lang('index.msg-no-listUser')</h1>
    @endif
    @endcan

    @endauth
</div>
@endsection