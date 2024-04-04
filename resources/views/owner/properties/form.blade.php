@extends('owner.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')
@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'owner.property.update' : 'owner.property.store', $property) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')
        <div class="row">
            <div class="col vstack gap-2" style="flex: 100">
                <div class="row">
                    {{-- @include('shared.input', ['class' => 'col','type' => 'file', 'label' => 'Image', 'name' => 'path' ]) --}}
                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
                        @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
                        @include('shared.input', ['label' => 'Prix', 'class' => 'col', 'name' => 'price', 'value' => $property->price])
                        
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])
                    <div class="row">
                        @include('shared.input', ['label' => 'Pièces', 'class' => 'col', 'name' => 'rooms', 'value' => $property->rooms])
                        @include('shared.input', ['label' => 'Chambres', 'class' => 'col', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                        @include('shared.input', ['label' => 'Etage', 'class' => 'col', 'name' => 'floor', 'value' => $property->floor])
                    </div>
                    <div class="row">
                        {{-- @include('shared.input', ['label' => 'Ville', 'class' => 'col', 'name' => 'city', 'value' => $property->city]) --}}
                        <div class="form-group">
                            @error('quarter_id')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="quarter_id">Quartier: </label>
                            <select class="form-control" name="quarter_id" id="quarter_id">
                                <option value="">Selectionner un Quartier: </option>
                                @foreach ($quarters as $quarter)
                                    <option  @selected(old('quarter_id', $property->quarter_id) == $quarter->id)  value="{{$quarter->id}}" class="w-100 d-block">
                                        {{$quarter->name}}   / c: <span>{{$quarter->area->name}}</span> 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('category_id')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="category_id">Type: </label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Selectionner une Catégorie: </option>
                                @foreach ($categories as $category)
                                    <option @selected(old('category_id', $property->category_id) == $category->id)  value="{{$category->id}}" class="w-100 d-block">
                                        {{$category->titre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @include('shared.input', ['label' => 'Adresse', 'class' => 'col', 'placeholder' => 'avenu et numéro', 'name' => 'address', 'value' => $property->address])
                        {{-- @include('shared.input', ['label' => 'Code Postal', 'class' => 'col', 'name' => 'postal_code', 'value' => $property->postal_code]) --}}
                    </div>
                    @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options ])
                    @include('shared.checkbox', ['label' => 'Occupé ?', 'class' => 'col', 'name' => 'sold', 'value' => $property->sold, ])
                </div>
                <div>
                    <button class="btn btn-dark">
                        @if ($property->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </div>
            {{-- @if ($property->exists) --}}
                <div class="col vstack gap-4" style="flex: 25">
                    
                    @foreach ($property->pictures as $picture)
                    <div id="picture{{$picture->id}}" class="position-relative">
                        <img src="{{ $picture->getImageUrl() }}" alt="" class="w-100 d-block">
                        <button type="button" hx-delete="{{route('owner.picture.destroy', $picture)}}"
                        class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                        hx-target="#picture{{$picture->id}}" hx-swap="delete">
                            <span class="htmlx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span> Supprimer
                        </button>
                    </div>
                    @endforeach
                        @include('shared.upload', ['label' => 'Image', 'name' => 'pictures', 'multiple' => true])
                </div>
                
            {{-- @endif --}}
        </div>

    </form>

@endsection