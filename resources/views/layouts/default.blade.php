<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First PHP project</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body>
  <header>
    @yield('header')
  </header>
  <main>

    @yield('content')
  </main>
  <footer>
    <h3>Thi is footer</h3>
  </footer>
</body>
</html>