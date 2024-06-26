@extends('admin.admin')

@section('content')

@section('title', 'Toutes les categories')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.category.create')}}" class="btn btn-dark">Ajouter unen category</a>
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{$category->titre}} </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.category.edit', $category)}}" class="btn btn-light">
                                Editer
                            </a>
                            <form action="{{route('admin.category.destroy', $category)}}" method="post">
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
    {{ $categories->links() }}

@endsection