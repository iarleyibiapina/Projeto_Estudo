<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimpleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Marca::create($request->all());
        return response()->json(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Marca::find($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Marca::find($id)->update($request->all());
        return response()->json(['Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Marca::find($id)->delete();
        return response()->json('Deleted', 200);
    }
}
