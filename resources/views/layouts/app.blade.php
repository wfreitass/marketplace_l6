<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace-L6</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
                <a class="navbar-brand" href="{{route('home')}}" >Marketplace L6</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @if (request()->is('admin/stores*'))
                        active
                        @endif ">
                        <a class="nav-link" href="{{route("admin.stores.index")}}">Lojas <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item @if (request()->is('admin/products*'))
                            active
                            @endif">
                        <a class="nav-link" href="{{route("admin.products.index")}}">Produtos</a>
                        </li>
                        <li class="nav-item @if (request()->is('admin/categories*'))
                            active
                            @endif">
                        <a class="nav-link" href="{{route("admin.categories.index")}}">Categorias</a>
                        </li>
                    </ul>

                  <div class=" my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                          <a class="nav-link" onclick="event.preventDefault();document.querySelector('form.logout').submit()" href="#">Sair </a>
                          <form action="{{route('logout')}}" class="logout" method="post" style="display: none">
                            @csrf
                        </form>
                        </li>
                        <li class="nav-item"><span class="nav-link">{{auth()->user()->name}}</span></li>
                    </ul>
                  </div>
                  @endauth
                </div>
              </nav>
    </div>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
