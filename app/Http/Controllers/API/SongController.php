<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Http\Requests\SongRequest;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page =$request->get('per_page',25);
        $songs= Song::paginate($per_page);
        return response()->json($songs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SongRequest $request)
    {
        $song =song::create($request->all());
        return response()->json($song,201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song =song::findOrFail($id);
        return response()->json($song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song =song::findOrFail($id);
        $song->update($request->all());
        return response()->json($song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song=song::findOrFail($id);
        $song->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Song deleted successfully',
        
        ],200);
    }
}
