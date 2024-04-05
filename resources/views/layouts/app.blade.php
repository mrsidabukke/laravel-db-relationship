<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- tagify --}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.17.7/dist/tagify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.17.7/dist/tagify.css">

    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container mt-5">
  <nav>
    {{-- //cek apakah user sudah login atau belum --}}
   @if (Auth::check())
   <a href="/blog/create">New blog</a>
   

    @endif
    <a href="/blog">Blog</a>
    <a href="/home">Home</a>
    <a href="/course">Course</a>
   
    <form  method="post" action="{{route('logout')}}">
      @csrf
      <button type="submit">Logout</button>
      </form>
  
    </nav>
    <main>
      @yield('content')
    </main>
</body>
</html>
