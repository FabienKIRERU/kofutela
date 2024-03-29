<div class="card">
    @if ($property->getPicture())
        <img src="{{ $property->getPicture()->getImageUrl(360, 230) }}" alt="" class="w-100">
        {{-- <img src="{{ Storage::url($property->pictures()->filename) }}" alt="" class="w-100">         --}}
    @else
    <small class="text-danger"> ce bien n'a pas de photo </small>
    <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="230px"  class="d-flex">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property])}}">{{$property->title}}</a>

        </h5>
        <p class="card-text">
            {{$property->surface}} m²  
        </p>
        <p class="card-text">
            C/ {{$property->quarter->area->name}}  <br>
            Q/ {{$property->quarter->name}} <br>
            {{$property->address}} -{{$property->city}}
        </p>
        <div class="text-info fw-bold" style="font-size:1.4em">
            {{ number_format($property->price, thousands_separator: ' ') }} $
        </div>
    </div>
</div>