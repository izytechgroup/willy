<?php

namespace App\Http\Controllers\views\admin;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventType;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    use SlugTrait;

    /**
     * list events
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        $status = null;
        if ( $request->has('status') && $request->status != '' ) {
            if ( in_array($request->status, ['published', 'unpublished']) ) {
                $status = $request->status;
            }
        }

        $keywords = $request->keywords;


        $events = Event::when($keywords, function($query) use ($keywords) {
            return $query->where('title', 'like', '%'.$keywords.'%');
        })
        ->when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })
        ->orderBy('id', 'desc')
        ->paginate(50);

        return view('admin.events.index', ['events' => $events]);
    }


    /**
     * Create new event
     *
     * @return view()
     */
    public function create()
    {
        $types = EventType::get();
        $countries = [
            'Allemagne', 'Belgique', 'Cameroun', 'Canada', 'Danmark', 'Espagne', 'France', 'Italie', 'Suisse'
        ];

        return view('admin.events.create', compact('types', 'countries'));
    }

    /**
     * Store a new Event
     *
     * @param  Request $request
     *
     * @return redirect()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'slug'          => 'required',
            'type'          => 'required',
            'date'          => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'Title, slug and type are required']);

        //Check if the slug exists using slug trait
        $slug = $this->getUniqueSlug($request->slug, 'events');

        $event = Event::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'flyer'             => $request->has('flyer') ? $request->flyer : null,
            'type'              => $request->has('type') ? $request->type : "",
            'description'       => $request->has('description') ? $request->description : '',
            'country'           => $request->has('country') ? $request->country : '',
            'address'           => $request->has('address') ? $request->address : '',
            'organizer'         => $request->has('organizer') ? $request->organizer : "",
            'phone'             => $request->has('phone') ? $request->phone : "",
            'phone2'            => $request->has('phone2') ? $request->phone2 : "",
            'status'            => $request->status,
            'email'             => $request->email,
            'website'           => $request->website,
            'date'              => Carbon::parse($request->date),
            'last_updated_by'   => Auth::user()->id
        ]);

        return redirect()->route('events.edit', ['id' => $event->id])
        ->with('message', 'L\'event a bien été ajouté');
    }




    /**
     * Display page for editing
     *
     * @param  integer $id page's id
     *
     * @return view()
     */
    public function edit($id)
    {

        $event = Event::find($id);
        if ( !$event )
            return redirect()->route('events.index');

        $types = EventType::get();
        $countries = [
            'Allemagne', 'Belgique', 'Cameroun', 'Canada', 'Danmark', 'Espagne', 'France', 'Italie', 'Suisse'
        ];

        return view('admin.events.edit', ['event' => $event, 'types' => $types, 'countries' => $countries]);
    }


    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'date'          => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'Le titre et la date sont requis']);


        $event = Event::find($id);
        if ( !$event )
            return redirect()->back()->withErrors(['error' => 'L\event n\existe pas']);

        $event->title           = $request->title;
        $event->flyer           = $request->flyer;
        $event->type            = $request->type;
        $event->description     = $request->description;
        $event->country         = $request->country;
        $event->address         = $request->address;
        $event->organizer       = $request->organizer;
        $event->phone           = $request->phone;
        $event->phone2          = $request->phone2;
        $event->status          = $request->status;
        $event->email           = $request->email;
        $event->website         = $request->website;
        $event->date            = Carbon::parse($request->date);
        $event->last_updated_by = Auth::user()->id;

        $event->save();

        return redirect()->back()->with('message', 'Event mis à jour avec succès');
    }

}
