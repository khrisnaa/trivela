<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PackageBank;
use App\Models\PackageTour;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePackageBookingRequest;
use App\Models\PackageBooking;

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

    public function book_store(StorePackageBookingRequest $request, PackageTour $packageTour)
    {
        $user = Auth::user();
        $bank = PackageBank::orderByDesc('id')->first();

        $packageBookingId = null;

        //& agar variabel diluar berganti / tidak null
        DB::transaction(function () use ($request, $user, $packageTour, $bank, &$packageBookingId) {
            $validated = $request->validated();

            $startDate = new Carbon($validated['start_date']);
            $totalDays = $packageTour->days - 1;

            $endDate = $startDate->addDays($totalDays);
            $subTotal = $packageTour->price * $validated['quantity'];
            $insurance = 300000 * $validated['quantity'];
            $tax = $subTotal * 0.10;

            $validated['end_date'] = $endDate;
            $validated['user_id'] = $user->id;
            $validated['is_paid'] = false;
            $validated['proof'] = 'dummytrx.png';
            $validated['package_tour_id'] = $packageTour->id;
            $validated['package_bank_id'] = $bank->id;
            $validated['insurance'] = $insurance;
            $validated['tax'] = $tax;
            $validated['sub_total'] = $subTotal;
            $validated['total_amount'] = $subTotal + $tax + $insurance;

            $packageBooking = PackageBooking::create($validated);

            $packageBookingId = $packageBooking->id;

        });

        if ($packageBookingId) {
            return redirect()->route('front.choose_bank', $packageBookingId);
        } else {
            return back()->withErrors('Failed to create booking');
        }
    }
}
