<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <title>@yield('title') | Agence</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-ligth navbar-dark d-block w-100" style="position: fixed; top:0; z-index:999999; background-color: white; box-shadow:0 2px 5px rgb(230, 230, 230)">
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
            <div class="collapse navbar-collapse" id="navbarNav">
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
                        Devenez Propriétaire
                    </a>                    
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="bg bg-light" style="z-index: -9999999; margin-top:100px">
        @include('shared.flash')
    
            @yield('content')

    </div>

    {{-- </div> --}}
    
    <div class="" style="bottom: 0%; height:75vh">
        @include('footer')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>