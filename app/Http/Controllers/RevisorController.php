<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }
    
    public function index()
    {
       $announcement = Announcement::where('is_accepted', null)->orderByDesc('created_at')->first();
       $toBeRevised = Announcement::toBeRevised();
       return view('revisors.index', compact('announcement', 'toBeRevised'));
    }

    private function setAccepted($announcement_id, $value) {
        $announcement = Announcement::find($announcement_id);
        $announcement->is_accepted = $value;
        $announcement->save();
        return redirect(route('revisor.index'));
    }

    public function accept(Announcement $announcement)
    {
        $announcement_id = $announcement->id;
        return $this->setAccepted($announcement_id, true);
    }

    public function reject(Announcement $announcement)
    {
        $announcement_id = $announcement->id;
        return $this->setAccepted($announcement_id, false);
    }

    public function bin() 
    {
        $announcements_rejected = Announcement::where('is_accepted', false)->get();
        return view('revisors.bin', compact('announcements_rejected'));
    }

    public function unDo(Announcement $announcement)
    {
        $announcement->is_accepted = null;
        $announcement->save();
        return redirect(route('revisor.bin'));
    }
}
