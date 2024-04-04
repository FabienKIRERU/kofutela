@extends('owner.admin')

@section('title','Vos Biens')
@section('content')

    <h1>@yield('title')</h1>

    {{-- Bien venu {{auth()->user()->name}} <br> Vous êtes Bailleur --}}
    @forelse($properties as $property)
        
        <div class="container p-2 m-3 col" style="border-radius: 10px; background-color:white">
            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}" class="d-flex " style="text-decoration: none; color:black">
                <div class="">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($property->pictures as $k => $picture)
                                <div class="carousel-item {{ $k == 0 ? 'active' : '' }} ">
                                    <img src="{{$picture->getImageUrl(360, 230)}}" alt="">
                                </div>
                                @empty
                                <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="230px"  class="d-flex">
                            @endforelse 
                        </div>
                      </div>
                    <div>
                        <small>
                            Chambre: {{$property->rooms}} | 
                            surface: {{$property->surface}} m² |
                            Etage: {{$property->floor ? $property->floor : 'Non'}}  |
                            Occupé: <span class="text-danger">{{$property->sold ? 'Oui' : 'Non'}} </span> |
                        </small>
                        <p>
                            Adresse: C:{{$property->quarter->area->name}} / Q: {{$property->quarter->name}} / {{$property->address}}
                        </p>
                    </div>
                </div>
                <div class="m-3">
                    <h1>{{$property->title}}</h1>
                    
                    <div class="text-danger fw-bold" style="">
                        Prix: {{ number_format( $property->price, thousands_separator: ' ' ) }} $ / mois
                    </div>
                    <hr>                
                    <div class="mt-4">
                        @include('shared.flash')
                        @auth                    
                            @if(auth()->user()->id == $property->user_id)
                                <p class="text-danger fw-bold"> Vos Contact</p>
                                <div class="">
                                    <p>email:  {{$property->user->email}}</p>
                                    <p>Téléphone: {{$property->user?->phone}}</p>
                                </div>
                            @endif                        
                        @endif                    
                    </div>
                    
    
                </div>
                <div class="col-4 m-3">
                    <h3>spécificité</h3>
                    <ul class="list-group">
                        @forelse ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @empty
                            <p class="text-info">Pas d'option pour ce bien</p>
                        @endforelse
                    </ul>
                </div>
                
            </a>
        </div>
    @empty
    <div class="container alert alert-danger">
        <div class="container">
            Vous n'avez pas des biens 
            <p>
                <a class="btn btn-light" href="{{route('owner.property.create')}}">Ajouter une bien</a>
            </p>
        </div>
    </div>
    @endforelse

@endsection