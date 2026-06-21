<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::where('status', 'available')->where('featured', 0)->with('branch')->with('primaryImage')->with('brand')->cursorPaginate(4);
        return response()->json([
            'success' => true,
            'message' => 'Cars retrieved successfully',
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car = Car::with('branch')->with('images')->with('brand')->find($car->id);
        return response()->json([
            'success' => true,
            'message' => 'Car retrieved successfully',
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
    public function search(SearchRequest $request)
    {
        $request->validated();
        $cars = Car::query()
            ->when($request->input('query'), function ($q) use ($request) {
                $q->where('model', 'like', "%{$request->input('query')}%");
            })
            ->when($request->brand_id, fn($q) => $q->where('brand_id', $request->brand_id))
            ->when($request->color, fn($q) => $q->where('color', $request->color))
            ->when($request->transmission, fn($q) => $q->where('transmission', $request->transmission))
            ->when($request->year, fn($q) => $q->where('year', $request->year))
            ->when($request->fuel_type, fn($q) => $q->where('fuel_type', $request->fuel_type))
            ->when($request->seats, fn($q) => $q->where('seats', $request->seats))
            ->when($request->featured, fn($q) => $q->where('featured', $request->featured))
            ->when($request->min_price, fn($q) => $q->where('price_per_day', '>=', $request->min_price))
            ->when($request->max_price, fn($q) => $q->where('price_per_day', '<=', $request->max_price))
            ->with('branch')->with('primaryImage')->with('brand')
            ->cursorPaginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Filtered cars retrieved successfully',
            'cars' => $cars
        ]);
    }
}
