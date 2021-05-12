<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;

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
        $announcement= Announcement::create($request->validated());
        return redirect()->back()->with('message', "Il tuo annuncio è stato creato con successo.");
    }
}

