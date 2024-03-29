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
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggeler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('admin.area.index')}}" @class(['nav-link', 'active' => str_contains($route, 'area.')])>Gerer les Communes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.quarter.index')}}" @class(['nav-link', 'active' => str_contains($route, 'quarter.')])>Gerer les quarters</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.category.index')}}" @class(['nav-link', 'active' => str_contains($route, 'category.')])>Les catégories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Les property</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.owner.index')}}" @class(['nav-link', 'active' => str_contains($route, 'owner.')])>Les Bailleurs</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Gerer les biens</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.option.index')}}" @class(['nav-link', 'active' => str_contains($route, 'option.')])>Gerer les options</a>
                    </li> --}}
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="nav-link">
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
    <div class="container mt-5">
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>