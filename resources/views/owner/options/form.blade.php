@extends('owner.admin')

@section('title', $option->exists ? 'Editer une option' : 'Créer une option')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($option->exists ? 'owner.option.update' : 'owner.option.store', $option) }}" method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row">

            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'name', 'value' => $option->name])
        </div>


        <div>
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection