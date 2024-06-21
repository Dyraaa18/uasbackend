<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'ticket_type' => 'required|string|max:50',
        ]);

        // Cek jumlah booking pada tanggal tertentu
        $bookingCount = Booking::where('date', $request->date)->count();

        if ($bookingCount >= 5) {
            return redirect()->back()->with('error', 'Jumlah booking untuk tanggal tersebut sudah penuh. Silakan pilih tanggal lain.');
        }

        Booking::create($request->all());

        return redirect()->back()->with('success', 'Booking berhasil!');
    }
}