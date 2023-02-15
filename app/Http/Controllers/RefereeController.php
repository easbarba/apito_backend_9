<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\RefereeResource;
use App\Models\Referee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return RefereeResource::collection(Referee::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Referee $referee): JsonResponse
    {
        return response()->json(['data' => new RefereeResource($referee)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $referee = Referee::create($request->all());

        return response()->json(['data' => new RefereeResource($referee)], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referee $referee): JsonResponse
    {
        $referee->update($request->all());

        return response()->json(['data' => new RefereeResource($referee)], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referee $referee): JsonResponse
    {
        $referee->delete();

        return response()->json(null, 204);
    }
}
