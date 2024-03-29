@extends('owner.admin')

@section('title', 'Editer un bien')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route('owner.doAddQuarter', $property) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')
        <div class="row">
            <div class="col vstack gap-2" style="flex: 100">
                <div class="row">
                    <div class="row">
                        {{-- @include('shared.input', ['label' => 'Ville', 'class' => 'col', 'name' => 'city', 'value' => $property->city]) --}}
                        <div class="form-group">
                            @error('area')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="quarter">Quartier: </label>
                            <select class="form-control" name="quarter" id="quarter">
                                <option value="">Selectionner un quartier: </option>
                                @foreach ($quarters as $quarter)
                                    <option  value="{{$quarter->id}}">
                                        {{$quarter->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @include('shared.input', ['label' => 'Code Postal', 'class' => 'col', 'name' => 'postal_code', 'value' => $property->postal_code]) --}}
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary">
                        {{-- @if ($property->exists) --}}
                            {{-- Modifier --}}
                        {{-- @else --}}
                            Ajouter
                        {{-- @endif --}}
                    </button>
                </div>
            </div>
            <div class="col vstack gap-4" style="flex: 25">
                
                {{-- @foreach ($property->pictures as $picture)
                <div id="picture{{$picture->id}}" class="position-relative">
                    <img src="{{ $picture->getImageUrl() }}" alt="" class="w-100 d-block">
                    <button type="button" hx-delete="{{route('admin.picture.destroy', $picture)}}"
                     class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                     hx-target="#picture{{$picture->id}}" hx-swap="delete">
                        <span class="htmlx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true">
                        </span> Supprimer
                    </button>
                </div>
                @endforeach
                    @include('shared.upload', ['label' => 'Image', 'name' => 'pictures', 'multiple' => true  ]) --}}
            </div>
        </div>

    </form>

@endsection