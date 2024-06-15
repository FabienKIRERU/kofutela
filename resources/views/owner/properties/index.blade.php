@extends('owner.admin')

@section('content')

@section('title', 'Tous les biens')
<style>
    
    @media screen and (max-width: 687px){
        .d_desk{
            display: none;
        }

    }
</style>
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('owner.property.create')}}" class="btn btn-dark">Ajouter un bien</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Titre</th>
                <th  class="d_desk">Surface</th>
                <th  class="d_desk">Pièce</th>
                <th  class="di_desk">Prix</th>
                <th  class="d_desk">Quartier</th>
                <th class="d_desk">Commune</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td> {{$property->title}} </td>
                    <td class="d_desk"> {{$property->surface}}m² </td>
                    <td class="d_desk"> {{$property->rooms}} </td>
                    <td> {{number_format($property->price, thousands_separator: ' ') }} $ <span class="d_desk"> par mois </span> </td>
                    <td  class="d_desk"> {{$property->quarter->name}} </td>
                    <td class="d_desk">
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
                            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}" class="btn btn-light d_desk">
                                Voir
                            </a>
                            <a href="{{route('owner.property.edit', $property)}}" class="btn btn-link">Edit</a>
                            {{-- @if ($property->delete_at) --}}
                            {{-- @can('delete', $property) --}}
                            
                                    <a href("{{route('deleteproperty', ["id" => $property->id])}}") class="btn btn-link text-danger">Supp</button>
                                
                                
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $properties->links() }}

@endsection
