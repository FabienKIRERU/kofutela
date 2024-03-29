@extends('admin.admin')

@section('title', $area->exists ? 'Editer une area' : 'Créer une area')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($area->exists ? 'admin.area.update' : 'admin.area.store', $area) }}" method="POST">
        @csrf
        @method($area->exists ? 'put' : 'post')

        <div class="row">

            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'name', 'value' => $area->name])
        </div>


        <div>
            <button class="btn btn-dark">
                @if ($area->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection