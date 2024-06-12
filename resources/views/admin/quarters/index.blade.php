@extends('admin.admin')

@section('content')

@section('title', 'Tout les Quartiers')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.quarter.create')}}" class="btn btn-dark">Ajouter un Quartier</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Commune</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($quarters as $quarter)
            <tr>
                <td> {{$quarter->name}} </td>
                <td>{{$quarter->area->name}}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{route('admin.quarter.edit', $quarter)}}" class="btn btn-light">Editer</a>
                        <form action="{{route('admin.quarter.destroy', $quarter)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $quarters->links() }}

@endsection