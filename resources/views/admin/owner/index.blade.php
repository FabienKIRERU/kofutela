@extends('admin.admin')

@section('content')

@section('title', 'Tous les Bailleurs')
    
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <div class="alert alert-light p-5 mb-5 text-center" style="border-radius: 30px">
            <form action="" method="get" class="container d-flex gap-2">
                
                <input type="text" name="username"  placeholder="Username" class="form-control" value="{{ $input['username'] ?? ''}}">
                
                <input type="text" name="name"  placeholder="Prenom" class="form-control" value="{{ $input['name'] ?? ''}}">
                <input type="text" name="firstname"  placeholder="Nom" class="form-control" value="{{ $input['firstname'] ?? ''}}">
                <input type="text" name="lastname"  placeholder="Postnom" class="form-control" value="{{ $input['lastname'] ?? ''}}">
                <button class="btn btn-primary btn-sm flex-grow-0">
                    Recherche
                </button>
            </form>
        </div>
        {{-- <a href="{{route('admin.user.create')}}" class="btn btn-primary">Ajouter un bien</a> --}}
        
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>username</th>
                <th>Nom</th>
                <th>Postnom</th>
                <th>Prenom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td class="fw-bold"> {{$user?->username}} </td>
                    <td> {{$property->user?->firstname}} </td>
                    <td> {{$property->user?->lastname}} </td>
                    <td> {{$property->user?->name}} </td>
                    <td> {{$property->user?->phone}} </td>
                    <td> {{$property->user?->email}} </td>
                    <td>
                        @if ($user->quarter->area)
                        {{$user->quarter->area->name}}
                        @else
                        <a class="btn btn-light" href="{{route('user.addQuarter', $user)}}">
                            Ajouter Quartier
                        </a>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="" class="btn btn-secondary">Voir</a>
                                <form action="{{route('admin.user.destroy', $user)}}" method="post">
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
    {{ $users->links() }}

@endsection