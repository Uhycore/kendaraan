<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarsController extends Controller
{

    public function index()
    {

        $cars = Cars::orderByDesc('id')->get();


        return view('admin.cars.index', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        Cars::create($data);

        return back()->with('success', 'Kendaraan ditambahkan.');
    }

    public function update(Request $request, Cars $car)
    {
        $data = $this->validated($request, $car->id);

        $car->update($data);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function destroy(Cars $car)
    {
        $car->delete();

        return back()->with('success', 'Kendaraan dihapus.');
    }


    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $yearMax = now()->year + 1;

        return $request->validate([
            'brand'        => ['required', 'string', 'max:100'],
            'model'        => ['required', 'string', 'max:100'],
            'year'         => ['required', 'integer', 'min:1900', 'max:' . $yearMax],
            'color'        => ['nullable', 'string', 'max:50'],
            'price'        => ['required', 'numeric', 'min:0'], // decimal(12,2)
            'plate_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('cars', 'plate_number')->ignore($ignoreId),
            ],
            'transmission' => ['required', Rule::in(['manual', 'automatic'])],
            'fuel_type'    => ['required', 'string', 'max:50'],
            'status'       => ['required', Rule::in(['available', 'rented', 'maintenance'])],
            'description'  => ['nullable', 'string'],
        ]);
    }
}
