@extends('admin.admin')

@section('title', $category->exists ? 'Editer une category' : 'Créer une category')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store', $category) }}" method="POST">
        @csrf
        @method($category->exists ? 'put' : 'post')

        <div class="row">

            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'titre', 'value' => $category->titre])
        </div>


        <div>
            <button class="btn btn-dark">
                @if ($category->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection