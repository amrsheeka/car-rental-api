<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Car;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ReviewRequest $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request, Car $car)
    {
        $validated = $request->validated();
        $review = $car->reviews()->firstOrCreate([
            'user_id' => Auth::id(),
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);

        if (! $review->wasRecentlyCreated) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this car.'
            ], 409);
        }

        return response()->json(
            [
                'message' => 'Review added successfully!',
                'success' => true
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $reviews = $car->reviews()
            ->with('user:id,name')->latest()
            ->cursorPaginate(4);

        $data = $reviews->toArray();

        $data['reviews_count'] = $car->reviews()->count();
        $data['average_rating'] = round($car->reviews()->avg('rating'), 1);
        return response()->json([
            'success' => true,
            'message' => 'Car: ' . $car->id . ' retrieved successfully',
            'reviews' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
