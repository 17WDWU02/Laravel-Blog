<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\BlogPosts;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete']]);
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPosts::paginate(12);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'post_title' => 'required|min:5|max:255',
            'post_description' => 'required',
            'image' => 'required|image|dimensions:min_width=200'
        ]);

        $newPost = new BlogPosts();
        $newPost->post_title = $request->post_title;
        $newPost->post_description = $request->post_description;

        $filename = uniqid();
        $newPost->image_name = $filename;

        $manager = new ImageManager();

        $uploadedImage = $manager->make($request->image);

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

        $newPost->save();
        return redirect()->route('blog.show', $newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = BlogPosts::where('id', "=", $id)->firstOrFail();
      return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = BlogPosts::where('id', "=", $id)->firstOrFail();
      return view('blog.edit', compact('post'));
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
        $post = BlogPosts::findOrFail($id);
        $this->validate($request, [
            'post_title' => 'required|min:5|max:255',
            'post_description' => 'required',
            'image' => 'image|dimensions:min_width=200'
        ]);
        $post->post_title = $request->post_title;
        $post->post_description = $request->post_description;

        if($request->image){
            //you will only get here, if someone uploads a new image
            $filename = $post->image_name;
            //remove old images
            unlink('images/uploads/'.$filename.'-large.jpg');
            unlink('images/uploads/'.$filename.'-thumb.jpg');
            //add new images
            $manager = new ImageManager();

            $uploadedImage = $manager->make($request->image);

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
        $post->update();
        return redirect()->route('blog.show', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPosts::findOrFail($id);
        $filename = $post->image_name;
        unlink('images/uploads/'.$filename.'-large.jpg');
        unlink('images/uploads/'.$filename.'-thumb.jpg');
        $post->delete();
        return redirect()->route('blog.index');
    }
}
