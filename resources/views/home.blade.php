@extends('base')

@section('content')

    {{-- <x-alert type='success'>
        des informations
    </x-alert> --}}
    <div class="p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum quibusdam, culpa beatae aut 
                temporibus exercitationem ratione dolor libero aperiam consectetur sapiente blanditiis illo eius 
                impedit quaerat fuga quas cupiditate totam?
            </p>

        </div>
    </div>

    <div class="container bg bg-light p-3">
        <h3>Nos 4 derniers Biens mis à jour</h3>
        <div class="row">
            @forelse ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @empty
                <p>Pas des biens disponile pour l'instant</p>
            @endforelse

        </div>
    </div>
@endsection