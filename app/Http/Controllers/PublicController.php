<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function indexHome() 
    {
        $announcements = Announcement::orderByDesc('created_at')->take(6)->get();
        return view('welcome', compact('announcements'));
    }

    public function index()
    {
        $announcements = Announcement::orderByDesc('created_at')->paginate(18);
        return view('announcements', compact('announcements'));
    }

}
