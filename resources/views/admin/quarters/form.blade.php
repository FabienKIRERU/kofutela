@extends('admin.admin')

@section('title', $quarter->exists ? 'Editer une quarter' : 'Créer une quarter')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($quarter->exists ? 'admin.quarter.update' : 'admin.quarter.store', $quarter) }}" method="POST">
        @csrf
        @method($quarter->exists ? 'put' : 'post')

        <div class="row">

            @include('shared.input', ['label' => 'Nom', 'class' => 'col', 'name' => 'name', 'value' => $quarter->name])
            {{-- @include('shared.select', ['label' => 'Commune', 'name' => 'area', 'value' => $quarter->area(), 'multiple' => false, 'options' => $area ]) --}}
            <div class="container vstack gap-2 mt-3">
                <select name="area" id="" class="form-control">
                    <option value="">Selectionner un Quartier</option>
                    
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}" selected>{{$area->name}}</option>                        
                    @endforeach
                </select>
                @error('area')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>                    
                @enderror
            </div>
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($quarter->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection