@extends('admin.admin')

@section('title','welcome')
@section('content')

    <h1>@yield('title')</h1>

    Bien venu {{auth()->user()->name}} <br> Vous êtes Admin
    <div class="container d-flex">
        <div class="container">
            
            <div class="container alert alert-danger">
                Nombre de commune : <span class="fw-bold" >{{$ownerCount}}</span>
            </div>
            <div class="container alert alert-success">
                Nombre de quartier : <span class="fw-bold" >{{$ownerCount}}</span>
            </div>
            <div class="container alert alert-secondary">
                Nombre de bailleurs : <span class="fw-bold" >{{$ownerCount}}</span>
            </div>
            <div class="container alert alert-warning">
                Nombre de biens : <span class="fw-bold" >{{$PropertyCount}}</span>
            </div>
            <div class="container alert alert-info">
                Moyenne des bien par Bailleur : <span class="fw-bold" >{{$MoyenPropertyPerOwner}}</span>
            </div>
            <div class="container alert alert-danger">
                Abonné : <span class="fw-bold" >{{$followersRanking}}</span>
            </div>
        </div>
        <div class="container">
            <div class="container alert alert-light">
                <h4>Ranking de Quartier</h4>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Commune</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quartersRanking as $quarter)
                                <tr>
                                    <td>
                                        {{$quarter->name}}
                                    </td>
                                    <td>
                                        {{$quarter->area->name}}
                                    </td>
                                    <td>{{$quarter->properties_count}}</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="container d-flex">
        
        <div class="container">
            <div class="container alert alert-light">
                <h4>Ranking de Bailleur</h4>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersRanking as $user)
                                <tr>
                                    <td>{{$user?->firstname}}</td>
                                    <td>{{$user?->lastname}}</td>
                                    <td>{{$user?->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user?->email}}</td>
                                    <td>{{$user?->phone}}</td>
                                    <td>{{$user->properties_count}}</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

    </div>

@endsection