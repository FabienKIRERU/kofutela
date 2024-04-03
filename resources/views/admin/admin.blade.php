<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark d-block w-100" style="position: fixed; top:0; z-index:999999; background-color: white; box-shadow:0 2px 5px rgb(230, 230, 230)">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">                
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a href="{{route('admin.area.index')}}" @class(['nav-link', 'active' => str_contains($route, 'area.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les Communes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.quarter.index')}}" @class(['nav-link', 'active' => str_contains($route, 'quarter.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les quarters
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.category.index')}}" @class(['nav-link', 'active' => str_contains($route, 'category.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les catégories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les property
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.owner.index')}}" @class(['nav-link', 'active' => str_contains($route, 'owner.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les Bailleurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.follower.index')}}" @class(['nav-link', 'active' => str_contains($route, 'follower.')]) style="color: black; font-weight:600; font-size:20hpx">
                            Les Abonnés
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
    {{-- @include('shared.flash') --}}
    <div class="container"  style="z-index: -9999999; margin-top:100px">
        @include('shared.flash')
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>