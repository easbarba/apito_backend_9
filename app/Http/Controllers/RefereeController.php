<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Referee::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $article = Referee::create($request->all());

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Referee $referee): \Illuminate\Http\JsonResponse
    {
        return response()->json($referee, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referee $referee): \Illuminate\Http\JsonResponse
    {
        $referee->update($request->all());

        return response()->json($referee, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referee $referee): \Illuminate\Http\JsonResponse
    {
        $referee->delete();


        return response()->json(null, 204);
    }
}
