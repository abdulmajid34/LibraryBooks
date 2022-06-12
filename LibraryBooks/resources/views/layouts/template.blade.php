<!doctype html>
<html lang="en">
  <head>
    <title>@lang('index.title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
            <div class="container">
                
                @can('role',['admin','user'])
                
                <a class="navbar-brand text-light" href="{{ route('dashboard') }}">
                    <i class="bi bi-book" style="font-size: 25px; margin-right: 5px; margin-top: 5px"></i>
                    @lang('index.title')
                </a>
                    
                @endcan
            
                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        
                        {{-- @guest --}}
                        @auth('admin')
                        @can('role',['user'])
                        @if (URL::current() == route('mylist-book'))
                        
                        @else
                        <li class="nav-item">
                            <a href="{{ route('mylist-book') }}" class="nav-link text-light">@lang('index.label-mylist')</a>
                        </li>
                        @endif
                        @endcan

                        
                        @can('role',['admin'])
                        @if (URL::current() == route('borrowed-book'))
                        
                        @else
                        <li class="nav-item">
                            <a href="{{ route('borrowed-book') }}" class="nav-link text-light">@lang('index.label-listUser')</a>
                        </li>
                        @endif
                            
                        @endcan

                        @can('role','admin')
                            @if (URL::current() == route('createFormBook'))
                            @else
                            <li class="nav-item">
                                <a href="{{ route('createFormBook') }}" class="nav-link text-light">@lang('index.label-create-book')</a>
                            </li>
                            @endif
                        @endcan
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link text-light" data-toggle="dropdown">@lang('index.label-personal') {{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a href="#" class="dropdown-item">My Profile</a> --}}
                                <a href="/logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">@lang('index.label-logout')</a>
                                <form action="/logout" id="logout-form" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                        {{-- @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>