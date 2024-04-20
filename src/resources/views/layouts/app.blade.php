<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>

  @yield('css')
</head>

<body>
  <div class="app">
    <header class="header">
      <h1 class="header__heading">Atte</h1>
      @yield('link')
    </header>
    <div class="content">
      @yield('content')
      
    </div>
  </div>
</body>

</html>