<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingValidationRequest;
use App\Rating;
use App\Uri;

class RatingController extends Controller
{
    public function store(RatingValidationRequest $request)
    {
        $uri = Uri::where('uri', $request->uri)->first();

        if (is_null($uri))
            $uri = Uri::create(['uri' => $request->uri]);

        Rating::create($request->all());

        $uri->update([
            'sum_ratings' => $uri->sum_ratings + $request->rating,
            'sum_users'   => ++$uri->sum_users
        ]);

        return response()->json(
            [
                'status' => 'success',
                'uri'    => $request->uri,
                'rating' => $request->rating,
                'score'  => $uri->sum_ratings / $uri->sum_users
            ]
        );
    }
}
