@extends('base')

@section('title', 'Tous nos biens')
@section('content')
    

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        
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
        <button class="btn btn-primary btn-sm flex-grow-0">
            Recherche
        </button>
    </form>
</div>
    
<div class="container">
    <h1>Tous Nos Biens</h1>
    <div class="row">
        @forelse ($properties as $property)
            <div class="col-3 mb-4">
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