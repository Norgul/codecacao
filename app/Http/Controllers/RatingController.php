<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingValidationRequest;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RatingValidationRequest $request)
    {
        Rating::create($request->all());

        return response()->json(
            [
                'status' => 'success',
                'uri'    => $request->uri,
                'rating' => $request->rating,
                'score'  => Rating::sum('rating') / count(Rating::all())
            ]
        );
    }
}
