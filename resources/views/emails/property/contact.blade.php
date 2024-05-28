<x-mail::message>
# Nouvelle demande de contact

une nouvelle demande a été fait pour le bien <a href="{{route('property.show', [
    'slug' => $property->getSlug(),
    'property' => $property,
])}}">{{$property->title}}</a>

<h5>Client</h5>
- Prenom: {{$data['firstname']}} <br>
- Nom: {{$data['lastname']}} <br>
- Téléphone: {{$data['phone']}} <br>
- Email: {{$data['email']}} <br>

The body of your message.

**Message :** <br>
{{$data['message']}}


{{ config('app.name') }}
</x-mail::message>
