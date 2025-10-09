{{-- ==== MODALS ==== --}}
@foreach ($cars as $car)
    {{-- VIEW DETAIL (punyamu sudah oke) --}}
    <div class="modal fade" id="carView{{ $car->id }}" tabindex="-1" aria-labelledby="carViewLabel{{ $car->id }}"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carViewLabel{{ $car->id }}">Detail Kendaraan #{{ $car->id }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-sm-6"><small class="text-muted">Brand</small>
                            <div class="fw-semibold">{{ $car->brand }}</div>
                        </div>
                        <div class="col-sm-6"><small class="text-muted">Model</small>
                            <div class="fw-semibold">{{ $car->model }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Year</small>
                            <div>{{ $car->year }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Color</small>
                            <div>{{ $car->color }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Plate</small>
                            <div>{{ $car->plate_number }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Transm.</small>
                            <div class="text-capitalize">{{ $car->transmission }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Fuel</small>
                            <div class="text-capitalize">{{ $car->fuel_type }}</div>
                        </div>
                        <div class="col-sm-4"><small class="text-muted">Status</small>
                            <div class="text-capitalize">{{ $car->status }}</div>
                        </div>
                        <div class="col-sm-6"><small class="text-muted">Price</small>
                            <div>Rp {{ number_format($car->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-12"><small class="text-muted">Desc</small>
                            <div>{{ $car->description }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT (FORM dalam modal, submit ke cars.update) --}}
    <div class="modal fade" id="carEdit{{ $car->id }}" tabindex="-1"
        aria-labelledby="carEditLabel{{ $car->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('cars.update', $car) }}">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="carEditLabel{{ $car->id }}">Edit Kendaraan
                            #{{ $car->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label">Brand</label>
                                <input type="text" name="brand" class="form-control"
                                    value="{{ old('brand', $car->brand) }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Model</label>
                                <input type="text" name="model" class="form-control"
                                    value="{{ old('model', $car->model) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Year</label>
                                <input type="number" name="year" class="form-control"
                                    value="{{ old('year', $car->year) }}" min="1900" max="{{ now()->year + 1 }}"
                                    required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Color</label>
                                <input type="text" name="color" class="form-control"
                                    value="{{ old('color', $car->color) }}">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ old('price', $car->price) }}" min="0" step="1" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Plate Number</label>
                                <input type="text" name="plate_number" class="form-control"
                                    value="{{ old('plate_number', $car->plate_number) }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Transmission</label>
                                <select name="transmission" class="form-select" required>
                                    <option value="manual" @selected(old('transmission', $car->transmission) === 'manual')>Manual</option>
                                    <option value="automatic" @selected(old('transmission', $car->transmission) === 'automatic')>Automatic</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Fuel</label>
                                <select name="fuel_type" class="form-select" required>
                                    @php $fuels = ['bensin','diesel','listrik','hybrid']; @endphp
                                    @foreach ($fuels as $f)
                                        <option value="{{ $f }}" @selected(old('fuel_type', $car->fuel_type) === $f)>
                                            {{ ucfirst($f) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    @foreach (['available', 'sold', 'rented', 'maintenance'] as $st)
                                        <option value="{{ $st }}" @selected(old('status', $car->status) === $st)>
                                            {{ ucfirst($st) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $car->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DELETE CONFIRM (perbaiki action ke route destroy) --}}
    <div class="modal fade" id="carDelete{{ $car->id }}" tabindex="-1"
        aria-labelledby="carDeleteLabel{{ $car->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carDeleteLabel{{ $car->id }}">Hapus Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Yakin hapus <strong>{{ $car->brand }} {{ $car->model }}</strong> ({{ $car->plate_number }})?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ route('cars.destroy', $car) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
