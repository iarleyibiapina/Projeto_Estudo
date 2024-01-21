<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function request(Request $request)
    {
        if (empty($request->email)) {
            return response()->json([
                'message' => 'Empty email',
            ]);
        }
        // dd($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Confirmed email',
            'route' => route('index'),
        ]);
    }
}
