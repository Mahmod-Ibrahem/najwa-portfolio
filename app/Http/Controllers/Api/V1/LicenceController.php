<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Licence;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    /**
     * Display a listing of licences.
     */
    public function index(Request $request): JsonResponse
    {
        $licences = Licence::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $licences,
        ]);
    }

    /**
     * Store a newly created licence.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'licence_number' => 'required|string|max:255|unique:licences,licence_number',
        ]);

        $licence = Licence::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم إنشاء الرخصة بنجاح',
            'data' => $licence,
        ], 201);
    }

    /**
     * Display the specified licence.
     */
    public function show(Licence $licence): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $licence,
        ]);
    }

    /**
     * Update the specified licence.
     */
    public function update(Request $request, Licence $licence): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'licence_number' => 'required|string|max:255|unique:licences,licence_number,' . $licence->id,
        ]);

        $licence->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الرخصة بنجاح',
            'data' => $licence->fresh(),
        ]);
    }

    /**
     * Remove the specified licence.
     */
    public function destroy(Licence $licence): JsonResponse
    {
        $licence->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف الرخصة بنجاح',
        ]);
    }
}
