<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Trip;
use App\Models\Peminjamans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('admin.peminjaman.index', compact('trips'));
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'               => 'required|string|max:100',
                'travel_destination' => 'required|string|max:255',
                'start'              => 'required|date',
                'end'                => 'required|date|after_or_equal:start',
                'notes'              => 'nullable|string',
                'car_id'             => 'required|exists:cars,id',
            ]);

            $validated['user_id'] = Auth::id();

            Trip::create($validated);

            return back()->with('success', 'Perjalanan berhasil dibuat!');
        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (Throwable $e) {
            Log::error('STORE TRIP error', [
                'msg'   => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:terjadwal,berangkat,kembali,batal',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->status = $validated['status'];
        $trip->save();

        return back()->with('success', 'Status perjalanan berhasil diperbarui.');
    }
}
