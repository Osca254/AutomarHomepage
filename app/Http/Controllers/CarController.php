<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\CarImage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars.index', ['cars' => Car::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();

        $car = Car::create($data);

        $this->uploadImages($request, $car);

        return redirect()->route('cars.index')->withSuccess('Successfully added a new car');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();

        $car->update($data);

        $this->uploadImages($request, $car);

        return redirect()->back()->withSuccess('Car updated successfully');
    }

    private function uploadImages($request, $car)
    {
        $car->carImages()->delete();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('car_images', 'public');
                CarImage::create(['image' => $imagePath, 'car_id' => $car->id]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->carImages()->delete();

        $car->delete();

        return redirect()->route('cars.index')->withSuccess('Car deleted successfully');
    }
}
