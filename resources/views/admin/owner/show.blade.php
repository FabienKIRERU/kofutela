@extends('admin.admin')

@section('title', $user->name)
@section('content')

<div class="container mt-4 mb-4">
    <h3 class="m-4 w-100">
        Détail sur le Bailleur
    </h3>
    <div class="row container">
        <div class="container w-100 alert alert-light">
            <h3 class="fw-bold mt-2">
                Identité:
            </h3>
            <div>
                <strong>username:</strong> {{ $user->username ? $user->username : 'pas defini'}}
            </div>
            <div>
                <strong>Nom:</strong> {{ $user->firstname ? $user->firstname : 'pas defini'}}
            </div>
            <div>
                <strong>Postnom:</strong>{{ $user->lastname ? $user->lastname : 'pas defini'}}
            </div>
            <div>
                <strong>Prénom:</strong>{{ $user->name ? $user->name : 'pas defini'}}
            </div>
        </div>        
    </div>
    <div class="row container alert alert-light">
        <div class="container">
            <h3 class="fw-bold mt-2">
                Bien(s):
            </h3>
            <div class="text-danger">
                Nombre: {{ $properties->count() ? $properties->count() : 'pas encore' }}
            </div>
            <div>
                @forelse ($properties as $property)
                    <div>
                        <ul>
                            <li>
                                <strong>{{$property->title}}</strong>
                                <p class="text-secondary">
                                    Commune: {{$property->quarter->area->name}} <br>
                                    Quartier: {{$property->quarter->name}} <br>
                                    Créé le: {{$property->created_at}} <br>
                                    modifié le: {{$property?->updated_at}}
                                </p>
                            </li>
                        </ul>
                    </div>
                @empty
                    <p>Cette utilisateur n'a pas encore de biens</p>
                @endforelse
        </div>
    </div>   
    
</div>
<div class="container">
    <form action="{{route('admin.owner.destroy', ['slug'=> $user->getSlug(), 'user' => $user])}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Supprimer le bailleur</button>
    </form>
</div>

    
@endsection