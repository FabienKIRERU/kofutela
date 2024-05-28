@extends('admin.admin')

@section('content')

@section('title', 'Toutes les areas')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.area.create')}}" class="btn btn-dark">Ajouter une Commune</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td> {{$area->name}} </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.area.edit', $area)}}" class="btn btn-light">Editer</a>
                            <form action="{{route('admin.area.destroy', $area)}}" method="post">
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
    {{ $areas->links() }}

@endsection