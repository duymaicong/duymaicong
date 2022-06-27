
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
  
  <livewire:styles />
  <livewire:scripts />
  
  @livewireStyles
</head>

<body class="antialiased container d-block m-auto" >
<!-- :intinialComments="$comments" -->
<div class="d-flex justify-content-between ">
        <div> <a class="d-d-inline " href="/">Home</a><a class="d-inline mx-5 " href="/rsa">RSA</a></div>
        @auth
        <livewire:logout />
        @endauth
        @guest
        <div class="d-flex ">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
        @endguest

    </div>
    <div class="d-flex justify-content-center">
       {{$slot}}
    </div>
    
  @livewireScripts
</body>

</html>