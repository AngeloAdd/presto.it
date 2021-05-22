<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionFaceDetection;
use App\Jobs\ResizeImage;
use App\Mail\RevisorApplication;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Facades\Bus;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request) {
        $uniqueSecret = $request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('announcements.create', compact('uniqueSecret'));
    }

    public function store (AnnouncementRequest $request) {

        /* Mass Assignment con fillable nel modello */
        $announcement = Auth::user()->announcements()->create($request->validated());

        $uniqueSecret = $request->uniqueSecret;
        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);
        $images = array_diff($images, $removedImages);
        if($images){

            $id = $announcement->id;
            foreach ($images as $image)
            {
                $i = new AnnouncementImage();
                $fileName = basename($image);
                $newFileName =  "public/announcements/{$id}/{$fileName}";
                $file = Storage::move($image, $newFileName);

                $i->file = $newFileName;
                $i->announcement_id = $announcement->id;

                $i->save();
                
                Bus::chain(
                    [
                        new GoogleVisionImage($i->id),
                        new GoogleVisionLabelImage($i->id),
                        new GoogleVisionFaceDetection($i->id),
                        new ResizeImage($i->file,250,250),
                    ]
                )->dispatch();

            }
            Storage::deleteDirectory("public/temp/{$uniqueSecret}");
        }
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
        
        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

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

    public function getImage(Request $request) {

        $uniqueSecret = $request->uniqueSecret;

        $images = session()->get("images.{$uniqueSecret}",[]);

        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);
        $images = array_diff($images, $removedImages);

        
        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id'=>$image,
                'src'=>AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        
        return response()->json($data);
    }
}

