<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Mail\RevisorApplication;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $uniqueSecret = base_convert(sha1(uniqid(mt_rand())), 16, 36);
        return view('announcements.create', compact('uniqueSecret'));
    }

    public function store (AnnouncementRequest $request) {

        /* Mass Assignment con fillable nel modello */
        dd($request->uniqueSecret);
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
    public function application (Request $request)
    {
         Mail::to('admin@presto.it')->send(new RevisorApplication($request->all()));
         return redirect()->back();
    }


}

