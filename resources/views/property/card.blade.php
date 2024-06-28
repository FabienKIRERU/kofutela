<style>
    .card{
        height: 85vh;
        border-radius:20px
    }
    @media screen and (max-width: 687px){
        .card{
            height: 71vh;
        }
    }
</style>
<div class="card " >
    @if ($property->getPicture())
        <img src="{{ $property->getPicture()->getImageUrl(360, 230) }}" alt="" style="border-radius:20px">
    @else
        <small class="text-danger"> ce bien n'a pas de photo </small>
        <img src="{{ asset('logo/papabailleur.png') }}" alt=""  style="border-radius:20px">
    @endif
    <div class="card-body text-secondary">
        <div class="badge bg-danger">{{$property->category?->titre}}</div><br>
        <div class="badge bg-dark"> Propriétaire: {{$property->user?->username}}</div>
        <h5 class="card-title">
            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}" >{{$property->title}}</a>
        </h5>
        <p class="text-secondary" >
            <i class="fa-regular fa-square-full" style="font-size: 15px; color: rgba(255, 0, 0, 0.596)"></i> {{$property->surface}} m²  |   
            <small style="size:5px">Garantie:</small> {{ number_format($property?->garanteed, thousands_separator: ' ') }} $ |  
            <small style="size:5px">Prix mensuel:</small> {{ number_format($property->price, thousands_separator: ' ') }} $ par mois
        </p>
        <p class="card-text text-secondary">
            <i class="fa-solid fa-location-dot"  style="font-size: 20px; color: rgba(255, 0, 0, 0.596)"> </i> {{$property->quarter->area->name}}
            ,{{$property->quarter->name}}
            ,{{$property->address}} -{{$property->city}}
        </p>
    </div>
</div>
