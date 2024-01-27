<?php

namespace App\Http\Controllers\Api;

use App\Services\SportScore\SportScoreService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class EstudoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // https://rapidapi.com/tipsters/api/sportscore1/
        $response = Http::withHeaders([
            'X-Rapidapi-Key' => 'bbca696686msh1ad3728a08e5c85p1b6006jsnf69b0ac6d2a4',
            'X-Rapidapi-Host' => 'sportscore1.p.rapidapi.com',
            'Host' => 'sportscore1.p.rapidapi.com',
        ])->get('https://sportscore1.p.rapidapi.com/sports')->json();

        $otherResponse = new SportScoreService;
        $json = $otherResponse->sports();

        dd($json);
        dd($response);

        return $response;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
