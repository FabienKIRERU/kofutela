@extends('base')

@section('title', 'Tous nos biens')
@section('content')
<style>    
    .liste_property{
        display: flex;
        flex-wrap: wrap;
    }
    .properties{
        width: 25%;
        float: left;
    }
    .form_filter{
        
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    
    @media screen and (max-width: 687px){
        .liste_property{
            display: flex;
            flex-direction: column;
            width: 100%;
            /* background: red; */
        }
        .properties{
            width: 100%;
            float: left;
        }
        .form_filter{            
            display: flex;
            flex-direction: column;
            width: 100%;
            /* margin-top: 50px; */
        }

    }
</style>

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-1 form_filter">
        
        <input type="text" name="title"  placeholder="Mot Clé" class="form-control" value="{{ $input['title'] ?? ''}}">        
        
        <select class="form-control" name="area_id" id="area_id"  style="color: rgb(109, 105, 105)">
            <option value="">commune</option>
            @foreach ($areas as $area)
                <option value="{{$area->id}}" class="w-100 d-block">
                    {{$area->name}}
                </option>
            @endforeach
        </select>
        <input type="number" name="rooms" placeholder="Nombre pièce mimimum" class="form-control" value="{{ $input['rooms'] ?? ''}}">
        <input type="number" name="price"  placeholder="Budget Max" class="form-control" value="{{ $input['price'] ?? ''}}">
        <button class="btn btn-dark btn-sm flex-grow-0">
            Recherche
        </button>
    </form>
</div>
    
<div class="container">
    <h1>Tous Nos Biens</h1>
    <div class="liste_property ">
        @forelse ($properties as $property)
            <div class="properties">
                @include('property.card')
            </div>
        @empty
            <p class="text-danger fw-bold">Pas des biens correspondant pour l'instant</p>
        @endforelse

    </div>
    <div class="container my-4">
        {{$properties->links()}}
    </div>
</div>
@endsection