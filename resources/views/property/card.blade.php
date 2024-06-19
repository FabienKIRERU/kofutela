<style>
    .card{
        height: 80vh;
    }
    @media screen and (max-width: 687px){
        .card{
            height: 70vh;
        }
    }
</style>
<div class="card " >
    @if ($property->getPicture())
        <img src="{{ $property->getPicture()->getImageUrl(360, 230) }}" alt="" >
    @else
        <small class="text-danger"> ce bien n'a pas de photo </small>
        <img src="{{ asset('logo/papabailleur.png') }}" alt=""  >
    @endif
    <div class="card-body">
        <div class="badge bg-danger">{{$property->category?->titre}}</div><br>
        <div class="badge bg-dark"> Propriétaire: {{$property->user?->username}}</div>
        <h5 class="card-title">
            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}" >{{$property->title}}</a>
        </h5>
        <p class="text-secondary" >
            surface: {{$property->surface}} m²  
        </p>
        <p class="text-secondary fw-bold" >
            Garantie: {{ number_format($property?->garanteed, thousands_separator: ' ') }} $ <br>
            Prix mensuel: {{ number_format($property->price, thousands_separator: ' ') }} $
        </p>
        <p class="card-text text-secondary">
            <i class="fa-solid fa-home" style="font-size: 15px; color: rgba(66, 66, 66, 0.418)"></i> {{$property->quarter->area->name}}
            ,{{$property->quarter->name}}
            ,{{$property->address}} -{{$property->city}}
        </p>
    </div>
</div>
