<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css')}}">
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <title>@yield('title') | {{ config('app.name')}}</title>
<style>
    body{
        max-width: 100%;
    }
    nav{
        max-width: 100%;
    }
    nav a{
        text-decoration: none;
        color: #555555;
        /* margin-left: 10px; */
        padding: 10px;
    }
    .article{
        max-width: 100%;
    }
    .footer{
        max-width: 100%;
    }
    
    @media screen and (max-width: 687px){
            
            /* nav{
                position: fixed;
                top: 0;
                max-width: 100%;
            } */
            
            .identity{
                display: flex;
            }
            .text_identity{
                display: none;
                font-weight: normal;
            }
            .navProfil{
                margin: 10px;
            }
            .navAbonnement{
                margin-top: 20px;
            }
        }
</style>
</head>
<body class="bg">
    {{-- <nav class="navbar navbar-expand-lg bg-ligth navbar-dark d-block w-100" style="position: fixed; top:0; z-index:999999; background-color: white; ">
        <div class="container-fluid">
            <a href="/" class="navbar-brand "  >                
                <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="90"  class="d-flex">
                <span class=" fw-bold text-dark" style="font-size:15px; position: absolute; top:65px; left:15px">
                    {{ config('app.name')}}
                </span>
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
                    <li class="nav-item" >
                        <a href="{{route('property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')])  style="color: black; font-weight:600; font-size:20hpx">
                            Appartements
                        </a>
                    </li>
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav">
                            @if (auth()->user()->role== 'admin')
                                <li class="nav-item m-2 ">
                                    <a href="{{route('admin.dashboard')}}">Dashboard</a>    
                                </li>                                
                            @endif
                            @if (auth()->user()->role== 'owner')
                                <li class="nav-item m-2 ">
                                    <a href="{{route('owner.dashboard')}}">Dashboard</a>    
                                </li>                                
                            @endif
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf                                    
                                    <button class="nav-link" style="border: none; background-color:white; color:black">
                                        Se Déconnecter
                                    </button>
                                </form>
                            </li>
                        </ul> 
                    @else
                    <a href="{{route('login')}}" style="color: black; text-decoration:none; font-weight:600; font-size:15px">
                        Se Connecter  |
                    </a>    
                    <a href="{{route('owner')}}" style="color: black; text-decoration:none; font-weight:600; font-size:15px">
                        s'incrire
                    </a>                    
                    @endauth
                </div>
            </div>
        </div>
    </nav> --}}
        
    <nav class="navbar navbar-expand-lg navbar-light " >
        <div class="container">
            <a href="/" class="navbar-brand identity">                
                <img src="{{ asset('logo/papabailleur.png') }}" alt="logo" width="90"  class="d-flex">
                <span class="text_identity" >{{ config('app.name')}}</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('property.index')}}">
                            Appartements
                        </a>
                    </li>
                    <li class="nav-item navAbonnement">
                        <a href="{{route('follower.create')}}">
                            Abonnez-vous
                        </a>
                    </li>
                </ul>
                <div class="ms-auto">
                    @auth
                        <ul class="navbar-nav navProfil">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{auth()->user()->username ? auth()->user()->username : 'Profile'}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->role== 'admin')
                                        <li class="nav-item m-2 ">
                                            <a href="{{route('admin.dashboard')}}">Dashboard</a>    
                                        </li>                                
                                    @endif
                                    @if (auth()->user()->role== 'owner')
                                        <li class="nav-item m-2 ">
                                            <a href="{{route('owner.dashboard')}}">Dashboard</a>    
                                        </li>                                
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                                            Editer Profile
                                        </a>
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <form action="{{route('logout')}}" method="POST">
                                                @csrf                                    
                                                <button class="nav-link text-danger"  style="border: none; background-color:white; color:black">
                                                    Se Déconnecter
                                                </button>
                                            </form>
                                    </a>
                                </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item navAbonnement">
                            <a href="{{route('login')}}" class="">
                                Se Connecter 
                            </a>
                        </li>
                        <li class="nav-item navAbonnement">
                            <a href="{{route('owner')}}" class="" >
                                s'incrire
                            </a>
                        </li>
                    </ul>

                    @endauth
                </div>
            </div>
        </div>
    </nav>  
    <div class="article" style="z-index: -9999999; margin-top:50px;">
        @include('shared.flash')
    
        @yield('content')

    </div>

    {{-- </div> --}}
    
    <div class="bg bg-dark footer" style="bottom: 0%;">
        @include('footer')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>