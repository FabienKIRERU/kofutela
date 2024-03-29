@extends('owner.admin')

@section('content')

@section('title', 'Toutes les options')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('owner.option.create')}}" class="btn btn-primary">Ajouter une option</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td> {{$option->name}} </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('owner.option.edit', $option)}}" class="btn btn-warning">Editer</a>
                            <form action="{{route('owner.option.destroy', $option)}}" method="post">
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
    {{ $options->links() }}

@endsection