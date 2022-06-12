<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>@lang('index.title')</title>
</head>
<body>
    <main style="max-height: 770px">
        <div class="container py-4" style="background-image: url(landingpage.png); background-position: 150px 50px; background-size: cover">
          <header class="pb-3 mb-4 border-bottom d-flex flex-row justify-content-between">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <i class="bi bi-book" style="font-size: 25px; margin-right: 10px"></i>
              {{-- <span class="fs-4">{{ config('app.name') }}</span> --}}
              <span class="fs-4">@lang('index.title')</span>
            </a>
            {{-- <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ strtoupper(session('locale') ?? config('app.locale')) }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('/switchLang/ja') }}">Japanese (JA)</a></li>
                <li><a class="dropdown-item" href="{{ url('/switchLang/en') }}">English (EN)</a></li>
                <li><a class="dropdown-item" href="{{ url('/switchLang/id') }}">Indonesia (ID)</a></li>
              </ul>
            </div> --}}

          </header>
      
          <div class="p-5 mb-4 rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">@lang('index.title')</h1>
              <p class="col-md-8 fs-4">{{ __('landingPage.description') }}</p>
              <button class="btn btn-primary btn-lg" type="button"><a href="{{ route('login') }}" style="text-decoration: none; color: white">{{ trans('landingPage.btn-browse-now') }}</a></button>
            </div>
          </div>
      
      
          <footer class="pt-3 mt-4 text-muted border-top">
            &copy; @lang('index.copyright')
          </footer>
        </div>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>