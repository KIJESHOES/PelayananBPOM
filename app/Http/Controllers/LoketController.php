<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoketController extends Controller
{
    // GET /lokets
    public function index()
    {
        return response()->json(Loket::all());
    }

    // POST /lokets
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_loket' => 'required|string|max:255',
        ]);

        $loket = Loket::create($validated);

        return response()->json($loket, Response::HTTP_CREATED);
    }

    // GET /lokets/{loket}
    public function show(Loket $loket)
    {
        return response()->json($loket);
    }

    // PUT /lokets/{loket}
    public function update(Request $request, Loket $loket)
    {
        $validated = $request->validate([
            'nama_loket' => 'required|string|max:255',
        ]);

        $loket->update($validated);

        return response()->json($loket);
    }

    // DELETE /lokets/{loket}
    public function destroy(Loket $loket)
    {
        $loket->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
