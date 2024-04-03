@extends('base')

@section('content')

    {{-- <x-alert type='success'>
        des informations
    </x-alert> --}}
    <div class="p-5 container text-center alert alert-info bg-transparent bg-opacity-90">
        <div class="container">
            <h3>Bien venu sur la plateforme de deal des Maisons, bureaux, locaux, dépôts et autres de la ville de Kinshasa</h3>
            <h4>Nous connéctons le locataire au Bailleur rapidement et éfficacement</h4>
            <p>
                Abonnez-vous pour ne manquer aucun des informations 
                <a href="{{route('follower.create')}}" class="btn btn-dark border border-2 border-danger">
                   Abonnez-vous
                </a>
            </p>
            {{-- <p>Besoin de Maisons, Bureaux, Depôt et bien d'autre ?</p> --}}
            {{-- <p>
                Publiez facilement et rapidement votre bien à louer et trouver rapidement la location idéale,
                sans visites inutiles, pertes de temps ni commissions élévées. <br>
                Simplifier votre Recherche et trouvez votre prochain lieu de vie ou de travail en un clin d'oeil !
            </p> --}}

        </div>
    </div>

    <div class="container bg bg-light p-3">
        <h3>Nos 4 derniers Biens mis à jour</h3>
        <div class="row">
            @forelse ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @empty
                <p>Pas des biens disponile pour l'instant</p>
            @endforelse
        </div>
    </div>
    <div class="d-flex bg bg-light container">
        <div class="m-3 w-100 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Devenez Propriétaire</h4>
            Publiez facilement et rapidement votre bien à louer
            <div class="w-100 text-center">
                <a href="" class="btn btn-dark text-danger">s'inscrire</a>
            </div>
        </div>
        <div class="m-3 w-100 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Trouvez votre demeure</h4>
            Trouver rapidement la location idéale,
            sans visites inutiles, pertes de temps ni commissions élévées. <br>
            Simplifier votre Recherche et trouvez votre prochain lieu de vie ou de travail en un clin d'oeil !
            <div class="w-100 text-center">
                <a href="" class="btn btn-dark text-danger">voir tout les biens</a>
            </div>
        </div>
    </div>
@endsection