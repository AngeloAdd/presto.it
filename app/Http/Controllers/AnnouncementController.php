<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Mail\RevisorApplication;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $announcement = Auth::user()->announcements()->create($request->validated());

        $uniqueSecret = $request->uniqueSecret;
        $images = session()->get("images.{$uniqueSecret}");
        $id = $announcement->id;
        foreach ($images as $image)
        {
            $fileName = basename($image);
            $newFileName =  "public/announcements/{$id}/{$fileName}";
            $file = Storage::move($image, $newFileName);
            $announcement->announcementImages()->create([
              'file'=> $file,
          ]);
        }
        $directory = storage_path("app/public/temp/{$uniqueSecret}");
        Storage::deleteDirectory($directory);
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

    public function uploadImages(Request $request) {

        $uniqueSecret = $request->uniqueSecret;

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
               'id' => $fileName,
            ]
        );
    }

    public function removeImages(Request $request) {

        $uniqueSecret = $request->uniqueSecret;

        $fileName = $request->id;

        session()->push("removedimages.{$uniqueSecret}", $fileName);
        
        Storage::delete($fileName);

        return response()->json('ok');
    }

}

