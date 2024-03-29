@extends('base')

@section('content')

    {{-- <x-alert type='success'>
        des informations
    </x-alert> --}}
    <div class="p-5 container text-center alert alert-info">
        <div class="container">
            <h3>Kinshasa</h3>
            <p>Besoin de Maisons, Bureaux, Depôt et bien d'autre ?</p>
            <p>
                Publiez facilement et rapidement votre bien à louer et trouver rapidement la location idéale,
                sans visites inutiles, pertes de temps ni commissions élévées. <br>
                Simplifier votre Recherche et trouvez votre prochain lieu de vie ou de travail en un clin d'oeil !
            </p>

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
@endsection