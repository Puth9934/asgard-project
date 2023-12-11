<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    {!! Theme::style('css/bootstrap.min.css') !!}
</head>
<body>
    {{-- <nav class="navbar bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ Theme::url('images/logo.png') }}" alt="Bootstrap" width="30" height="24">
            </a>
            {!! Menu::render('main-menu', 'Modules\Menu\Presenters\MyMenuPresenter') !!} 
        </div>
    </nav> --}}
    {{-- <div class="container-fluid bg-dark text-decoration-underline " > --}}
        {{-- {{ dd(LaravelLocalization::getSupportedLocales()) }} --}}
        <div class="container">
            <div class="lan-switcher "  style="float: right; margin-top:6px;">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                    <img src="{{ $localeCode == 'en' ? Module::asset('Frontend:flags/en.png') : Module::asset('Frontend:flags/kh.png') }}" alt="" width="40" height="40">
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">{{ trans('frontend::tamplete.menu.home') }}</a>
                    <a class="nav-link" href="{{ route('stafflist') }}">{{ trans('frontend::tamplete.menu.staff-list') }}</a>
                    <a class="nav-link" href="{{ route('department') }}">{{ trans('frontend::tamplete.menu.department') }}</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
