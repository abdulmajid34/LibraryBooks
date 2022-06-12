{{-- @extends('template')
@section('content') --}}
<html lang="en">
  <head>
    <title>@lang('index.title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="form-signin w-100 m-auto mt-4 card shadow-lg rounded">
                <h1 class="h3 mb-3 fw-normal text-center text-primary">@lang('register.title-register')</h1>
                <form method="post" action="">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name">
                        <label for="name">@lang('register.label-name')</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                  <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @error('name') is-invalid @enderror" id="email" placeholder="name@example.com">
                    <label for="email">@lang('login.label-email')</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control @error('name') is-invalid @enderror" id="password" placeholder="Password">
                    <label for="password">@lang('login.label-password')</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                    @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">@lang('login.btn-submit')</button>
                </form>
                <small class="d-block text-center mt-3">@lang('register.paraf-have-account') <a href="{{ route('login') }}">@lang('login.title-login')</a></small>
                <p class="mt-5 mb-3 text-muted">&copy; @lang('index.copyright')</p>
              </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>