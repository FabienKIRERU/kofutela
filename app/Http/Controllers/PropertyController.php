<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Quarter;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContatMail;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request){

        // $query = Property::query()->width('pictures')->orderBy('updated_at', 'desc');
        $query = Property::query()->with('quarter')->orderBy('updated_at', 'desc');
        // dd($query);
        $queryArea = Area::query();
        if ($request->validated('price')) {
            $query = $query->where('price', '>=', $request->input('price'));
        }
        if($request->validated('area_id')){
            $query->whereHas('quarter', function ($query) use ($request){
                $query->where('area_id', $request->validated('area_id'));
            });
        }
        if ($request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $request->input('rooms'));
        }
        if ($request->validated('title')) {
            $query = $query->where('title', 'like', "%{$request->input('title')}%");
        }

        return view('property.index', [
            'properties' => $query->paginate(16),
            'quarters' => Quarter::with('area')->get(),
            'areas' => Area::select('id', 'name')->with('quarters')->get(),
            'input' => $request->validated(),
        ]);
        
    }
    public function show(string $slug, Property $property){

        // DemoJob::dispatch($property)->delay(now()->addSeconds(2));
        // dd($property->user->id);
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', [
                'slug' => $expectedSlug,
                'property' => $property,
            ]);
        }
        return view('property.show', [
            'property' => $property,
        ]);
        
    }

    public function contact(Property $property, PropertyContactRequest $request){

        // Notification::route('mail', 'john@admin.fr')
        // ->notify(new ContactRequestNotification($property, $request->validated()));
        
        // $user = User::first();
        // $user->notify(new ContactRequestNotification($property, $request->validated()));
        
        // event(new ContactRequestEvent($property, $request->validated()));
        
        Mail::send(new PropertyContatMail($property, $request->validated()));
        return back()->with('success', 'Votre demande a été bien envoyée');


    }
}
