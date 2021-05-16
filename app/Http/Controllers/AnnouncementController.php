<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create () {
        return view('announcements.create');
    }

    public function store (AnnouncementRequest $request) {

        /* Mass Assignment con fillable nel modello */
        Auth::user()->announcements()->create($request->validated());
        return redirect()->back()->with('message', "Il tuo annuncio è stato creato con successo.");
    }

    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('announcements.show',compact('announcement'));
    }
    public function work() 
    {
        return view('revisors.workOffer');
    }

}

