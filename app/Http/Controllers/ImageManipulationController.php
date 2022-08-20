<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\ImageManipulation;
use App\Http\Requests\ResizeImageRequest;
use App\Http\Requests\UpdateImageManipulationRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageManipulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ResizeImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function resize(ResizeImageRequest $request)
    {
        $all = $request->all();
       /** @var UploadedFile|string $image */
        $image = $all['image'];
        unset($all['image']);

       $data = [
           'type'=> ImageManipulation::TYPE_RESIZE,
           'data'=> json_encode($all),
           'user_id' => null,
       ];
       if(isset($all['album_id'])){
           //TODO
           $data['album_id'] = $all['album_id'];

       }
        $dir = 'images/'.Str::random().'/';

       $absolutePath = public_path($dir);
       File::makeDirectory($absolutePath);

       if($image instanceof UploadedFile){
           $data['name'] = $image->getClientOriginalName();
           $filename = pathinfo($data['name'],PATHINFO_FILENAME);
           $extension = $image->getClientOriginalExtension();
           $image->move($absolutePath, $data['name']);




       }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageManipulation  $imageManipulation
     * @return \Illuminate\Http\Response
     */
    public function show(ImageManipulation $imageManipulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageManipulationRequest  $request
     * @param  \App\Models\ImageManipulation  $imageManipulation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageManipulationRequest $request, ImageManipulation $imageManipulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageManipulation  $imageManipulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageManipulation $imageManipulation)
    {

    }

    public function byAlbum(Album $album) {
        //
    }
}
