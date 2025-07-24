<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\Visit\VisitService;
use Illuminate\Http\Request;
use APP\HTTP\Requests\StoreVisitRequest;
use App\HTTP\Requests\UpdateVisitRequest;

class VisitController extends Controller
{

    public function __construct(protected VisitService $visitService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visit = $this->visitService->getAllVisits();
        return response()->json([
            'message' => 'List of visits',
            'data' => $visit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
        $this->visitService->createVisit($request->validated());
        return response()->json([
            'message' => 'Visit created successfully',
            'data' => $request->validated()
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        return response()->json([
            'message' => 'Visit retrieved successfully',
            'data' => $visit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        $this->visitService->updateVisit($visit, $request->validated());
        return response()->json([
            'message' => 'Visit updated successfully',
            'data' => $visit
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        $this->visitService->deleteVisit($visit);
        return response()->json([
            'message' => 'Visit deleted successfully'
        ]);
    }
}
