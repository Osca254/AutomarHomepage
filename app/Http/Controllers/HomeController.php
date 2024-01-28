<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show() 
    {
        $cars = Car::latest()->get();

        return view('home', ['cars' => $cars]);
    }
    

    // private function getCarDetails($car)
    // {
    //     $carDetails = [
    //         'car' => $car,
    //         'carImages' => $car->carImages,
    //     ];
    //     return $carDetails;
    // }
}
