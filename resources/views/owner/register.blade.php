@extends('base')

@section('title', "S'inscrire'")
@section('content')

    <div class="container mt-4">
        <h1>@yield('title')</h1>
        @include('shared.flash')

        <form action="{{route('beOwner')}}" method="post" class="vstack gap-3">
            @csrf
            
            {{-- @include('shared.input', ['label' => 'Prenom', 'class' => 'col', 'name' => 'name', ])
            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'first_name', ]) --}}
            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'name', ])
            @include('shared.input', ['label' => 'Username', 'class' => 'col', 'name' => 'username', ])
            @include('shared.input', ['label' => 'Email', 'class' => 'col', 'name' => 'email', ])
            @include('shared.input', ['label' => 'Phone','type' => 'tel', 'class' => 'col', 'name' => 'phone', ])
            @include('shared.input', ['label' => 'Mot de passe','type' => 'password', 'class' => 'col', 'name' => 'password', ])
            @include('shared.input', ['label' => null, 'type' => 'hidden', 'class' => 'col', 'name' => 'role', 'value' => 'owner', ])

            
            <div class="mt-2">
                <button class="btn btn-primary">
                    S"inscrire
                </button>
            </div>
            <a href="{{route('login')}}">j'ai déjà un compte. me connecter</a>
        </form>
    </div>
    
@endsection