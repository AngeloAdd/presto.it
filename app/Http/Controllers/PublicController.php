<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function indexHome()
    {
        $announcements = Announcement::orderByDesc('created_at')->where('is_accepted', true)->take(6)->get();
        $lasts = Announcement::orderByDesc('created_at')->where('is_accepted', true)->get();
        $lCD = [];
        foreach ($lasts as $a)
        {
            $lCD[]= $a->category->name;
        }
        $lCC = array_unique($lCD); 
        $lC = [];
        foreach($lCC as $l)
        {
            $lC[]=$l;
        }


        return view('welcome', compact('announcements', 'lC'));
    }

    public function index()
    {
        $announcements = Announcement::orderByDesc('created_at')->where('is_accepted', true)->paginate(18);
        return view('announcements', compact('announcements'));
    }
    public function show (Category $category) {
        $announcements = $category->announcements()->paginate(6);
        return view('category', compact('announcements', 'category'));
    }
    public function search(Request $request) {
        $q = $request->q;
        $announcements = Announcement::search('%'.$q.'%')->where('is_accepted', true)->paginate(6);
        
        return view('search.search_results', compact('q', 'announcements'));
    }
    public function showAnnouncement (Announcement $announcement) {
        return view('announcements.showAnnouncement', compact('announcement'));
    }
    public function locale($locale) 
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function last($cat){
        $category = Category::where('name', $cat);
        $announcement = $category->announcements()->first();
        return view('showAnnouncement', compact('announcement'));
    }
}

