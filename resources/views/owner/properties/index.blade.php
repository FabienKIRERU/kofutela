@extends('owner.admin')

@section('content')

@section('title', 'Tous les biens')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('owner.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
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
                    <td> {{$property->title}} </td>
                    <td> {{$property->surface}}m² </td>
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
                            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}" class="btn btn-secondary">Voir</a>
                            <a href="{{route('owner.property.edit', $property)}}" class="btn btn-light">Editer</a>
                            {{-- @if ($property->delete_at) --}}
                            {{-- @can('delete', $property) --}}
                                <form action="{{route('owner.property.destroy', $property)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                                
                            {{-- @endcan --}}
                                
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