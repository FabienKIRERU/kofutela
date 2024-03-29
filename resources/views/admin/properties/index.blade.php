@extends('admin.admin')

@section('content')

@section('title', 'Tous les biens')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <div class="alert alert-light p-5 mb-5 text-center" style="border-radius: 30px">
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
                <select class="form-control" name="category" id="category"  style="color: rgb(109, 105, 105)">
                    <option value="">categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" class="w-100 d-block">
                            {{$category->titre}}
                        </option>
                    @endforeach
                </select>
                {{-- <input type="text" name="user" placeholder="Propriétaire" class="form-control" value="{{ $input['user'] ?? ''}}"> --}}
                <input type="number" name="price"  placeholder="Budget Max" class="form-control" value="{{ $input['price'] ?? ''}}">
                <button class="btn btn-dark btn-sm flex-grow-0">
                    Recherche
                </button>
            </form>
        </div>
        {{-- <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a> --}}
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégory</th>
                <th>Propriétaire</th>
                <th>Pièce</th>
                <th>Prix</th>
                <th>Quartier</th>
                <th>Commune</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td class="fw-bold"> {{$property->title}} </td>
                    <td> {{$property->category?->titre}} </td>
                    <td> {{$property->user->username}} </td>
                    <td> {{$property->rooms}} </td>
                    <td> {{number_format($property->price, thousands_separator: ' ') }}$ par mois </td>
                    <td> {{$property->quarter->name}} </td>
                    <td>
                        @if ($property->quarter->area)
                        {{$property->quarter->area->name}}
                        @else
                        <a class="btn btn-light" href="{{route('owner.addQuarter', $property)}}">
                            Ajouter Quartier
                        </a>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            @can('view', $property)
                                <a href="" class="btn btn-secondary">Voir</a>                                
                            @endcan
                            @can('update', $property)
                                <a href="{{route('admin.property.edit', $property)}}" class="btn btn-light">Editer</a>                                
                            @endcan
                            {{-- @if ($property->delete_at) --}}
                            @can('delete', $property)
                                <form action="{{route('admin.property.destroy', $property)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>                                
                            @endcan
                                
                            {{-- @else
                                <p class="text-warning">
                                     restaurer ?
                                </p>
                            @endif --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $properties->links() }}

@endsection