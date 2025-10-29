<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\Cars;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CarsController extends Controller
{

    public function index()
    {

        $cars = Cars::orderByDesc('id')->get();


        return view('admin.cars.index', compact('cars'));
    }


    public function store(Request $request)
    {
        try {
            $yearMax = now()->year + 1;

            $data = $request->validate([
                'brand'        => ['required', 'string', 'max:100'],
                'model'        => ['required', 'string', 'max:100'],
                'year'         => ['required', 'integer', 'min:1900', 'max:' . $yearMax],
                'color'        => ['nullable', 'string', 'max:50'],
                'type'         => ['nullable', 'string', 'max:50'],
                'price'        => ['required', 'numeric', 'min:0'],
                'plate_number' => ['required', 'string', 'max:20', Rule::unique('cars', 'plate_number')],
                'transmission' => ['required', Rule::in(['manual', 'automatic'])],
                'fuel_type'    => ['required', 'string', 'max:50'],
                'status'       => ['required', Rule::in(['available', 'rented', 'maintenance', 'sold'])],
                'tanggal_pengurusan' => ['nullable', 'date'],
                'masa_berlaku_pajak_1_tahun' => ['nullable', 'date'],
                'masa_berlaku_pajak_5_tahun' => ['nullable', 'date'],
                'uji_kir' => ['nullable', 'date'],
                'keterangan' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ]);

            // upload gambar
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if (!$file->isValid()) {
                    return back()->withErrors(['image' => 'File upload tidak valid.'])->withInput();
                }

                $base = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $ext = $file->getClientOriginalExtension();
                $finalName = $base . '-' . Str::random(6) . '.' . $ext;

                Storage::disk('public')->putFileAs('cars', $file, $finalName);
                $data['image'] = $finalName;
            }

            Cars::create($data);

            return back()->with('success', 'Data kendaraan berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (Throwable $e) {
            Log::error('STORE CAR error', ['msg' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }




    public function update(Request $request, Cars $car)
    {
        try {
            $yearMax = now()->year + 1;

            // ✅ Validasi input lengkap
            $data = $request->validate([
                'brand'        => ['required', 'string', 'max:100'],
                'model'        => ['required', 'string', 'max:100'],
                'year'         => ['required', 'integer', 'min:1900', 'max:' . $yearMax],
                'color'        => ['nullable', 'string', 'max:50'],
                'price'        => ['required', 'numeric', 'min:0'],
                'plate_number' => [
                    'required',
                    'string',
                    'max:20',
                    Rule::unique('cars', 'plate_number')->ignore($car->id),
                ],
                'transmission' => ['required', Rule::in(['manual', 'automatic'])],
                'fuel_type'    => ['required', 'string', 'max:50'],
                'vehicle_type' => ['nullable', 'string', 'max:50'],
                'status'       => ['required', Rule::in(['available', 'rented', 'maintenance', 'sold'])],
                'tanggal_pengurusan'          => ['nullable', 'date'],
                'masa_berlaku_pajak_1_tahun'  => ['nullable', 'date'],
                'masa_berlaku_pajak_5_tahun'  => ['nullable', 'date'],
                'uji_kir'                     => ['nullable', 'date'],
                'keterangan'                  => ['nullable', 'string', 'max:255'],
                'description'                 => ['nullable', 'string'],
                'image'        => ['nullable', 'image', 'max:2048'],
            ]);

            // 🚗 Upload baru (hapus lama jika ada)
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                if ($car->image && Storage::disk('public')->exists('cars/' . $car->image)) {
                    Storage::disk('public')->delete('cars/' . $car->image);
                }

                $base = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $ext  = $file->getClientOriginalExtension();
                $finalName = $base . '-' . Str::random(6) . '.' . $ext;

                Storage::disk('public')->putFileAs('cars', $file, $finalName);
                $data['image'] = $finalName;
            } else {
                unset($data['image']);
            }

            // 🧩 Update data
            $car->update($data);

            return redirect()->back()->with('success', 'Data kendaraan berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }




    public function destroy(Cars $car)
    {
        $car->delete();

        return back()->with('success', 'Kendaraan dihapus.');
    }
}
