<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    {!! Theme::style('css/bootstrap.min.css') !!}
</head>
<body>
    <nav class="navbar bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ Theme::url('images/logo.png') }}" alt="Bootstrap" width="30" height="24">
        </a>
        {!! Menu::render('main-menu', 'Modules\Menu\Presenters\MyMenuPresenter') !!} 
      </div>
    </nav>
    @yield('content')
</body>
</html>
