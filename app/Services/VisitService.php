<?php


namespace App\Services\Visit;

use App\Models\Visit;

class VisitService
{
   

    /**
     * Get all visits.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllVisits()
    {
        return Visit::orderBy('created_at', 'desc')->get();
    }

    /**
     * Find a visit by ID.
     *
     * @param int $id
     * @return Visit|null
     */
    public function getVisitById(int $id): ?Visit
    {
        return Visit::findOrFail($id);
    }
     /**
     * Store a new visit.
     *
     * @param array $data
     * @return Visit
     */
    public function createVisit(array $data): Visit
    {
        return Visit::create($data);
    }

    public function updateVisit(Visit $visit, array $data): Visit
    {
        $visit->update($data);
        return $visit;
    }

    public function deleteVisit(Visit $visit): bool
    {
        return $visit->delete();
    }

    
}