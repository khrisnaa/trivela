<?php

namespace App\Http\Controllers;

use App\Models\PackageTour;

class FrontController extends Controller
{
    public function index()
    {
        $package_tours = PackageTour::orderByDesc('id')->take(3)->get();
        return view('front.index', compact('package_tours'));
    }

    public function details(PackageTour $packageTour)
    {
        $latestPhotos = $packageTour->photos()->orderByDesc('id')->take(3)->get();
        return view('front.details', compact('packageTour', 'latestPhotos'));
    }

    public function book(PackageTour $packageTour)
    {
        return view('front.book', compact('packageTour'));
    }
}
