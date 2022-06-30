
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Livewire</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
   -->
  <livewire:styles />
  <livewire:scripts />
  
  @livewireStyles
</head>

<body class="antialiased container d-block m-auto" >

<!-- :intinialComments="$comments" -->
<div class="d-flex justify-content-between bg-primary text-white py-2">
        <div> <a class="d-d-inline text-white mx-3 text-decoration-none" href="/">Home</a><a class="text-decoration-none d-inline mx-3 text-white" href="/rsa">RSA</a><a class="text-decoration-none d-inline mx-3 text-white" href="/products">Products</a>
        <a class="text-decoration-none mx-3 text-white" href="/searchCustomer">Search typeahead </a><a class="text-decoration-none mx-3 text-white" href="/search">SearchLivewire</a></div>
        
        @auth
        <livewire:logout />
        @endauth
        @guest
        <div class="d-flex ">
            <a class="mx-3 text-white text-decoration-none" href="/login">Login</a>
            <a class="mx-3 text-white text-decoration-none" href="/register">Register</a>
        </div>
        @endguest

    </div>
    <div class="d-flex justify-content-center">
       {{$slot}}
    </div>
    
  @livewireScripts
</body>

</html>