<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\RefereeResource;
use App\Models\Referee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $sortColumn = $request->input('sort', 'id');

        return RefereeResource::collection(Referee::orderBy($sortColumn, 'desc')->paginate(8));
    }

    /**
     * Display the specified resource.
     */
    public function show(Referee $referee): JsonResponse
    {
        return response()->json(['data' => new RefereeResource($referee)],
            Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $referee = Referee::create($request->all());

        return response()->json(['data' => new RefereeResource($referee)],
            Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referee $referee): JsonResponse
    {
        $referee->update($request->all());

        return response()->json(['data' => new RefereeResource($referee)],
            Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referee $referee): JsonResponse
    {
        $referee->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
