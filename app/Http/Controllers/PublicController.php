<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
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
    public function show (Category $category) {
        $announcements = $category->announcements()->paginate(6);
        return view('category', compact('announcements'));
    }
    public function search(Request $request) {
        $q = $request->q;
        $announcements = Announcement::search($q)->paginate(6);
        return view('search.search_results', compact('q', 'announcements'));
    }
}
