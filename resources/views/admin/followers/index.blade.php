@extends('admin.admin')

@section('content')

@section('title', 'Toutes les followers')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        {{-- <a href="{{route('admin.follower.create')}}" class="btn btn-dark">Ajouter une Commune</a> --}}
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Nom</th>
                <th>Postnom</th>
                <th>Prenom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($followers as $follower)
                <tr>
                    <td class="fw-bold"> {{$follower->email}} </td>
                    <td class="fw-bold"> {{$follower->phone}} </td>
                    <td> {{$follower->nom ? $follower->nom : "Pas definie"}} </td>
                    <td> {{$follower->postnom ? $follower->postnom : "Pas definie"}} </td>
                    <td> {{$follower->prenom ? $follower->prenom : "Pas definie"}} </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.follower.edit', $follower)}}" class="btn btn-light">Editer</a>
                            <form action="{{route('admin.follower.destroy', $follower)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Désabonner</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $followers->links() }}

@endsection