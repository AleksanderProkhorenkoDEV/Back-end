<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Storage::files($request->carpeta);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $fileName = $request->codigo . '.' . $request->image->extension();
        if (!Storage::disk('local')->putFileAs('/subjects', $request->image, $fileName)) {
            return response()->json(['message' => 'Fatal upload', 'status' => 422], 422);
        }
        $image = new Image;

        $image->image_url = $request->codigo;

        $image->save();

        return response()->json(['message' => 'Finish upload', 'status' => 200], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
