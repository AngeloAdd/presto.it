<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function create () {
        return view('announcements.create');
    }
    public function store (AnnouncementRequest $request) {
        $announcement= AnnouncementRequest::create();
        return redirect()->back()->with('message', "Il tuo annuncio è stato creato con successo.");
    }
}

