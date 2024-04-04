@extends('base')

@section('title', $property->title)
@section('content')

<div class="container mt-4 mb-4">

    <div class="row">
        <div class="col-8">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @forelse ($property->pictures as $k => $picture)
                        <div class="carousel-item {{ $k == 0 ? 'active' : '' }} ">
                            <img src="{{$picture->getImageUrl(800, 530)}}" alt="">
                        </div>
                        @empty
                        <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="530px"  class="d-flex">
                    @endforelse                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-4">
            <h1>{{$property->title}}</h1>
            <h4>
                Nombre Pièce: {{$property->rooms}} <br>
                Surface: {{$property->surface}} m²
            </h4>
            
            <div class="text-danger fw-bold" style="font-size:2rem">
                {{ number_format( $property->price, thousands_separator: ' ' ) }} $
            </div>
            <hr>
            
            <div class="mt-4">
                @include('shared.flash')
                @auth                    
                    @if(auth()->user()->id == $property->user_id)
                        <h1 class="text-primary"> Vos Contact</h1>
                        <div class="">
                            <p><i class="fa-solid fa-envelope w-30 text-danger"></i>:  {{$property->user->email}}</p>
                            <p><i class="fa-solid fa-phone w-30 text-danger"></i>: {{$property->user?->phone}} </p>
                        </div>
                    @endif
                @else                     
                    <h3 class="text-danger">Interréssé(e) par ce bien ?</h3>
                    <form action="{{route('property.contact', $property)}}" method="post" class="vstack gap-3">
                        @csrf
                        <div class="row">
                            {{-- <x-input class="col" name="firstname" label="Prénom" /> --}}
                            @include('shared.input', ['label' => 'Prénom', 'class' => 'col', 'name' => 'firstname', ])
                            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'lastname', ])
                        </div>
                        <div class="row">
                            @include('shared.input', ['label' => 'Téléphone', 'class' => 'col', 'name' => 'phone', ])
                            @include('shared.input', ['label' => 'Email', 'type' => 'email', 'class' => 'col', 'name' => 'email', ])
                        </div>
                        @include('shared.input', ['label' => 'Votre message', 'type' => 'textarea', 'class' => 'col', 'name' => 'message', ])
                        <div class="mt-2">
                            <button class="btn btn-dark">
                                Envoyer Mail
                            </button>
                        </div>
                        <div class="m-3 p-2">
                            <span class="alert alert-danger">Joignez-nous sur :</span> 
                            <a href="{{$property?->telephone}}" class="m-2 "><i class="fa-solid fa-phone" style="font-size: 40px; color: rgb(66, 66, 66)"></i></a>
                            <a href="whatsapp://send?Hello, Intéressé par le bien {{$property->title}}?&phone={{$property?->telephone}}" class="m-2 "><i class="fa-brands fa-square-whatsapp" style="font-size: 40px; color: rgb(7, 168, 7)" ></i></a>
                            <a href="sms:{{$property?->telephone}}" class="m-2 "><i class="fa-solid fa-comment-sms" style="font-size: 40px"></i></a>
                        </div>
                    </form>
                    
                @endif
                
            </div>

        </div>
    </div>
    
    <div class="container">
        <div class="mt-4">
            <p>
                {!! nl2br($property->description) !!}
            </p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2> 
                    <table class="table table-striped">
                        <tr>
                            <td>Surface Habitable</td>
                            <td>{{$property->surface}} m²</td>
                        </tr>
                        <tr>
                            <td>Nombre des Pièce</td>
                            <td>{{$property->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Nombre Chambre</td>
                            <td>{{$property->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$property->floor ?: 'Red de chaussé'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$property->address}}/{{$property->quarter->name}} <br>
                                Commune: <strong>{{$property->quarter->area->name}}</strong>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h3>spécificité</h3>
                    <ul class="list-group">
                        @forelse ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @empty
                            <p class="text-info">Pas d'option pour ce bien</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

    
@endsection