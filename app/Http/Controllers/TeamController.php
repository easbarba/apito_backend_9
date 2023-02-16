<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $sortColumn = $request->input('sort', 'id');

        return TeamResource::collection(Team::orderBy($sortColumn, 'desc')
                                      ->paginate(8));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $team = Team::create($request->all());

        return response()->json(['data' => new TeamResource($team)],
            Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team): JsonResponse
    {
        return response()->json(['data' => new TeamResource($team)],
            Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team): JsonResponse
    {
        $all = $request->only(['name', 'state']);
        if (! empty($all)) {
            $team->update($all);
        }

        return response()->json(['data' => new TeamResource($team)],
            Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): JsonResponse
    {
        $team->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
