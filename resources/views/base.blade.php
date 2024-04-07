<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css')}}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | {{ config('app.name')}}</title>
<style>
    body{
        max-width: 100%;
    }
    nav{
        max-width: 100%;
    }
    .article{
        max-width: 100%;
    }
    .footer{
        max-width: 100%;
    }
</style>
</head>
<body class="bg">
    <nav class="navbar navbar-expand-lg bg-ligth navbar-dark d-block w-100" style="position: fixed; top:0; z-index:999999; background-color: white; box-shadow:0 2px 5px rgb(230, 230, 230)">
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
    </nav>
    <div class="article" style="z-index: -9999999; margin-top:100px;">
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