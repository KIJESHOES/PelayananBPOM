<?php


namespace App\Http\Controllers;


use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PetugasController extends Controller
{
// GET /petugas
public function index()
{
return response()->json(Petugas::orderBy('name')->get());
}


// POST /petugas
public function store(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
]);


$petugas = Petugas::create($validated);


return response()->json($petugas, Response::HTTP_CREATED);
}


// GET /petugas/{id}
public function show(Petugas $petugas)
{
return response()->json($petugas);
}


// PUT/PATCH /petugas/{id}
public function update(Request $request, Petugas $petugas)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
]);


$petugas->update($validated);


return response()->json($petugas);
}


// DELETE /petugas/{id}
public function destroy(Petugas $petugas)
{
$petugas->delete();


return response()->json(null, Response::HTTP_NO_CONTENT);
}
}
