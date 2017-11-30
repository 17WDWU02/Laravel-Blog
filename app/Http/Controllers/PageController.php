<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use File;
use Storage;
use App\Pages;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        $templates = array();
        $files = Storage::disk('views')->files('templates');
        foreach($files as $file){
            $file = str_replace('templates/', '', $file);
            $file = str_replace('.blade.php', '', $file);
            array_push($templates, $file);
        }
        return view('admin.pages.index', compact('templates', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pageName' => 'required',
            'featuredImage' => 'image|dimensions:min_width=200',
            'template' => 'required',
        ]);
        $newPage = new Pages;
        $newPage->page_name = $request->pageName;
        $newPage->url_alais = str_replace(' ', '-', $request->pageName);
        $newPage->page_content = $request->pageContent;
        $newPage->template = $request->template;

        if($request->featuredImage){
            $filename = uniqid();
            $newPage->featured_image = $filename;
            $manager = new ImageManager();
            $uploadedImage = $manager->make($request->featuredImage);
            //largerImage
            $uploadedImage->resize(500, null, function($constraint){
                $constraint->aspectRatio();
            });
            $uploadedImage->save('images/uploads/'.$filename.'-large.jpg', 100);

            //thumbnail
            $uploadedImage->fit(300, 200, function($constraint){
                $constraint->upsize();
            });
            $uploadedImage->save('images/uploads/'.$filename.'-thumb.jpg', 100);
        }
        $newPage->save();
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Pages::where('url_alais', '=', $id)->firstOrFail();
        $templateFile = $page->template;
        return view('templates.'. $templateFile, compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
