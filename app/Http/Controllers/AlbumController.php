<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\AlbumResource;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return AlbumResource::collection(Album::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbumRequest $request
     * @return AlbumResource
     */
    public function store(StoreAlbumRequest $request): AlbumResource
    {
        $album = Album::create($request->all());
        return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return Response
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlbumRequest $request
     * @param Album $album
     * @return Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
         $album->update($request->all());
         return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @return Response
     */
    public function destroy(Album $album)
    {
         $album->delete();

         return response('',204);
    }
}
