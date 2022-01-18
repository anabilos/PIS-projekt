<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        $data = Event::where('user_id',"=", $id)->get(['id', 'title', 'start', 'color']);
        return Response()->json($data);

    }
    public function indexchildren()
    {
        $id=Auth::id();
        $data = Event::where('user_id',"=", $id)->get(['id', 'title', 'start', 'color']);
        return Response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|min:3',
            'date_start' => 'required',
            'time_start' => 'required',
            'color' => 'required',
            
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->start = $request->date_start . ' ' . $request->time_start;
        $event->user_id = Auth::id();
        $event->color = $request->color;
        $event->save();

        return redirect('/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|min:3',
            'date_start' => 'required',
            'time_start' => 'required',
            'color' => 'required',
            
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->start = $request->date_start . ' ' . $request->time_start;
     
        $event->color = $request->color;
       

        if($event->save())
            return response()->json([
                'status'    =>  201,
                'message'   =>  'Događaj uspješno ažuriran'
            ]);
        return response()->json([
            'status'    =>  503, 
            'message'   =>  'Dogodila se pogreška prilikom ažuriranja događaja'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event == null)
            return Response()->json([
                'message'   =>  'Dogodila se pogreška prilikom brisanja događaja'
            ]);

        $event->delete();

        return Response()->json([
            'message'   =>  'Događaj uspješno izbrisan'
        ]);

    }
}
