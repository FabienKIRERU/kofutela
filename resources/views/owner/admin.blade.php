<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | Administration</title>
    <style>
        @layer reset{
            button{
                all : unset
            }
        }
        .htmlx-indicator{
            display: none;
        }
        .htmlx-request .htmlx-indicator{
            display: inline-block;
        }
        .htmlx-request.htmlx-indicator{
            display: inline-block;
        }

    </style>
</head>
<body class=" bg bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark d-block w-100" style="position: fixed; top:0; z-index:999999; background-color: white; box-shadow:0 2px 5px rgb(230, 230, 230)">
        <div class="container-fluid">
            <a href="/" class="navbar-brand "  >                
                <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="90"  class="d-flex">
                <span class=" fw-bold text-dark" style="font-size:15px; position: absolute; top:65px; left:15px">{{ config('app.name')}}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggeler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('owner.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Gerer les biens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('owner.option.index')}}" @class(['nav-link', 'active' => str_contains($route, 'option.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Gerer les options
                        </a>
                    </li>
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('profile.edit')}}">  
                                    <span class="nav-link"  style="border: none; background-color:white; color:black">
                                        {{auth()->user()->username ? auth()->user()->username : 'Profile'}}
                                    </span>
                                </a>
                            </li> -
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf                                    
                                    <button class="nav-link"  style="border: none; background-color:white; color:black">
                                        Se Déconnecter
                                    </button>
                                </form>
                            </li>
                        </ul>

                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="container"  style="z-index: -9999999; margin-top:100px">
        @include('shared.flash')
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>