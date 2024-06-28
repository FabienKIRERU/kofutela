@extends('base')

@section('content')
<style>
    .section .welcome{
        /* max-width: 100%; */
        background-color: #fff;
    }
    .liste_property{
        display: flex;
        flex-wrap: wrap;
    }
    .properties{
        width: 30%;
        float: left;
        margin-right: 10px;
        margin-top: 10px;
    }
    /* .property{
        display: flex;
        flex-direction: row;
    } */
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
            background-color: #fff;
        }
        .section .mon_contenu{
            max-width: 100%;
        }
        .liste_property{            
            display: block;
            /* display: flex;
            flex-direction: column; */
        }
        .properties{
            width: 100%;
            margin-top: 10px;
            /* float: left; */
        }
        .message{
            display: block;
            max-width: 95%;
            /* padding: 20px; */
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
    <div class="welcome container text-center alert alert-info ">
        <div class="container">
            <h3 class="message_desk">
                Bienvenu sur la plateforme de deal des Maisons, bureaux, locaux, dépôts et autres de la ville de 
                Kinshasa.
            </h3>
            <h4 class="message_phone">
                Bienvenu dans la Plateforme de transaction de Logement. 
                Publiez ou Trouvez un Local à Kinshasa.
            </h4>
            <p>Nous connéctons le locataire au Propriétaire rapidement et éfficacement.</p>
            <p>
                Abonnez-vous pour ne manquer aucunes des informations 
                <a href="{{route('follower.create')}}" class="btn btn-dark border border-2 border-danger">
                   Abonnez-vous
                </a>
            </p>

        </div>
    </div>

    <div class="container bg bg-light p-3 mon_contenu">
        <h3>Les recents Biens mis à jour</h3>
        <div class="liste_property bg bg-light">
            @forelse ($properties as $property)
                <div class="properties bg bg-light">
                    @include('property.card')
                </div>
            @empty
                <p class="text-danger">Pas des biens disponible pour l'instant</p>
            @endforelse
        </div>
    </div>
    <div class="bg bg-light container message">
        <div class="mt-2 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Devenez Propriétaire</h4>
            Vous êtes Bailleur, commisionnaire ou une Agence Imobilière ? <br>
            Publiez facilement et rapidement votre bien à louer
            <div class="w-100 text-center">
                <a href="{{route('owner')}}" class="btn btn-dark text-danger">inscrivez-vous</a>
            </div>
        </div>
        <div class="mt-2 container p-4"  style="background-color: white; margin-top:10px">
            <h4 class="text-danger">Trouvez votre demeure</h4>
            Trouver rapidement la location idéale,
            sans visites inutiles et pertes de temps, vous avez un endroit idéal où vivre. <br>
            Simplifier votre Recherche et trouvez votre prochain lieu de vie ou de travail en un clin d'oeil !
            <div class="w-100 text-center">
                <a href="{{route('property.index')}}" class="btn btn-dark text-danger">voir tout les biens</a>
            </div>
        </div>
    </div>

</div>
@endsection
