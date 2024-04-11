@extends('base')

@section('content')
<style>
    .property{
        display: flex;
        flex-direction: row;
    }
    .message_phone{
        display: none;
    }
    
    .message{
            display: flex;
        }
    @media screen and (max-width: 687px){
        .section{
            display: inline-block;
            max-width: 100%;
        }
        .section .welcome{
            max-width: 100%;
        }
        .section .mon_contenu{
            max-width: 100%;
        }
        .property{
            display: flex;
            flex-direction: column;
        }
        .message{
            display: block;
            max-width: 95%;
            padding: 20px;
        }
        .message_desk{
            display: none;
        }
        .message_phone{
            display: block;
        }

    }
</style>
<div class="container section">
    <div class="welcome p-5 container text-center alert alert-info bg-transparent bg-opacity-90">
        <div class="container">
            <h3 class="message_desk">
                Bien venu sur la plateforme de deal des Maisons, bureaux, locaux, dépôts et autres de la ville de 
                Kinshasa
            </h3>
            <h4 class="message_phone">
                Bienvenu dans la Plateforme de transaction de Logement. 
                Publier ou Trouver un Local à Kinshasa
            </h4>
            <p>Nous connéctons le locataire au Propriétaire rapidement et éfficacement</p>
            <p>
                Abonnez-vous pour ne manquer aucun des informations 
                <a href="{{route('follower.create')}}" class="btn btn-dark border border-2 border-danger">
                   Abonnez-vous
                </a>
            </p>

        </div>
    </div>

    <div class="container bg bg-light p-3 mon_contenu">
        <h3>Nos 4 derniers Biens mis à jour</h3>
        <div class="property">
            @forelse ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @empty
                <p>Pas des biens disponile pour l'instant</p>
            @endforelse
        </div>
    </div>
    <div class="bg bg-light container message">
        <div class="m-2 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Devenez Propriétaire</h4>
            Vous êtes Bailleur, commisionnaire ou une Agence Imobilière ? <br>
            Publiez facilement et rapidement votre bien à louer
            <div class="w-100 text-center">
                <a href="" class="btn btn-dark text-danger">inscrivez-vous</a>
            </div>
        </div>
        <div class="m-2 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Trouvez votre demeure</h4>
            Trouver rapidement la location idéale,
            sans visites inutiles, pertes de temps ni commissions élévées. <br>
            Simplifier votre Recherche et trouvez votre prochain lieu de vie ou de travail en un clin d'oeil !
            <div class="w-100 text-center">
                <a href="" class="btn btn-dark text-danger">voir tout les biens</a>
            </div>
        </div>
    </div>

</div>
@endsection