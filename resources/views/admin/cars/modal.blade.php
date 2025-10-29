{{-- ==== MODALS ==== --}}
@foreach ($cars as $car)
    {{-- ==== MODAL TAMBAH KENDARAAN (Versi Minimalis Bapak-Bapak Friendly) ==== --}}
    <div class="modal fade" id="carCreate" tabindex="-1" aria-labelledby="carCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">

                <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- HEADER --}}
                    <div class="modal-header bg-light">
                        <h5 class="modal-title fw-bold text-dark" id="carCreateLabel">
                            🚘 Tambah Data Kendaraan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body bg-white">
                        <div class="row g-3">

                            {{-- MEREK / MODEL / TAHUN --}}
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Merek</label>
                                <input type="text" name="brand" class="form-control" placeholder="Contoh: Toyota"
                                    value="{{ old('brand') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Model</label>
                                <input type="text" name="model" class="form-control" placeholder="Contoh: Avanza"
                                    value="{{ old('model') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Tahun</label>
                                <input type="number" name="year" class="form-control" min="1900"
                                    max="{{ now()->year + 1 }}" value="{{ old('year') }}" required>
                            </div>

                            {{-- WARNA / NOMOR POLISI / HARGA --}}
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Warna</label>
                                <input type="text" name="color" class="form-control"
                                    placeholder="Contoh: Hitam / Silver" value="{{ old('color') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Nomor Polisi</label>
                                <input type="text" name="plate_number" class="form-control" placeholder="L 1234 XX"
                                    value="{{ old('plate_number') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Harga (Rp)</label>
                                <input type="number" name="price" class="form-control" placeholder="Masukkan harga"
                                    value="{{ old('price') }}" required>
                            </div>

                            {{-- TRANSMISI / BAHAN BAKAR / STATUS --}}
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Transmisi</label>
                                <select name="transmission" class="form-select" required>
                                    <option value="">Pilih Transmisi</option>
                                    <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>
                                        Manual</option>
                                    <option value="automatic"
                                        {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Otomatis</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Bahan Bakar</label>
                                <select name="fuel_type" class="form-select" required>
                                    <option value="">Pilih Jenis</option>
                                    <option value="bensin" {{ old('fuel_type') == 'bensin' ? 'selected' : '' }}>Bensin
                                    </option>
                                    <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel
                                    </option>
                                    <option value="listrik" {{ old('fuel_type') == 'listrik' ? 'selected' : '' }}>
                                        Listrik</option>
                                    <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>Hybrid
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                        Tersedia</option>
                                    <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Terpakai
                                    </option>
                                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                                        Perawatan</option>
                                </select>
                            </div>

                            {{-- TIPE / FOTO / TANGGAL PENGURUSAN --}}
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Tipe</label>
                                <input type="text" name="type" class="form-control"
                                    placeholder="Mobil / Motor / Bus" value="{{ old('type') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Foto Kendaraan</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Tanggal Pengurusan</label>
                                <input type="date" name="tanggal_pengurusan" class="form-control"
                                    value="{{ old('tanggal_pengurusan') }}">
                            </div>

                            {{-- PAJAK & KIR --}}
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Pajak 1 Tahun</label>
                                <input type="date" name="masa_berlaku_pajak_1_tahun" class="form-control"
                                    value="{{ old('masa_berlaku_pajak_1_tahun') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Pajak 5 Tahun</label>
                                <input type="date" name="masa_berlaku_pajak_5_tahun" class="form-control"
                                    value="{{ old('masa_berlaku_pajak_5_tahun') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark">Uji KIR</label>
                                <input type="date" name="uji_kir" class="form-control"
                                    value="{{ old('uji_kir') }}">
                            </div>

                            {{-- KETERANGAN --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="2" placeholder="Contoh: Pajak diperpanjang Juli 2025.">{{ old('keterangan') }}</textarea>
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="2" placeholder="Contoh: Enak buat ketua balai 😄">{{ old('description') }}</textarea>
                            </div>

                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div class="modal-footer bg-light d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4" data-bs-dismiss="modal">
                            ❌ Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-lg fw-bold px-4">
                            💾 Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- VIEW DETAIL — Minimalis & Ramah Orang Tua --}}
    <div class="modal fade" id="carView{{ $car->id }}" tabindex="-1"
        aria-labelledby="carViewLabel{{ $car->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-sm">

                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-dark" id="carViewLabel{{ $car->id }}">
                        Detail Kendaraan #{{ $car->id }}
                    </h5>
                    <button type="button" class="btn-close" aria-label="Tutup" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body pt-0">
                    {{-- Gambar (opsional) --}}
                    @if ($car->image)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/cars/' . $car->image) }}"
                                alt="Foto kendaraan {{ $car->brand }} {{ $car->model }}"
                                class="img-fluid rounded shadow-sm" style="max-height: 280px; object-fit: contain;">
                        </div>
                    @endif

                    {{-- Info utama --}}
                    <div class="row gy-3 gx-3 fs-6 text-dark">
                        <div class="col-12 col-md-6">
                            <div class="small text-secondary">Merek</div>
                            <div class="fw-semibold">{{ $car->brand ?? '—' }}</div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="small text-secondary">Model</div>
                            <div class="fw-semibold">{{ $car->model ?? '—' }}</div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Tahun</div>
                            <div>{{ $car->year ?? '—' }}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Warna</div>
                            <div class="text-capitalize">{{ $car->color ?: '—' }}</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="small text-secondary">Nomor Polisi</div>
                            <div>{{ $car->plate_number ?? '—' }}</div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Transmisi</div>
                            <div class="text-capitalize">{{ $car->transmission ?? '—' }}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Bahan Bakar</div>
                            <div class="text-capitalize">{{ $car->fuel_type ?? '—' }}</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="small text-secondary">Tipe Kendaraan</div>
                            <div class="text-capitalize">{{ $car->vehicle_type ?? '—' }}</div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="small text-secondary">Status</div>
                            @php
                                $statusText =
                                    [
                                        'available' => 'Tersedia',
                                        'rented' => 'Terpakai',
                                        'maintenance' => 'Perawatan',
                                        'sold' => 'Terjual',
                                    ][$car->status] ?? ucfirst($car->status ?? '—');

                                $statusColor = match ($car->status) {
                                    'available' => 'text-success',
                                    'rented' => 'text-primary',
                                    'maintenance' => 'text-warning',
                                    'sold' => 'text-secondary',
                                    default => 'text-muted',
                                };
                            @endphp
                            <div class="{{ $statusColor }} fw-semibold">{{ $statusText }}</div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="small text-secondary">Harga</div>
                            <div class="fw-semibold">
                                @if (!is_null($car->price))
                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                @else
                                    —
                                @endif
                            </div>
                        </div>

                        {{-- Tambahan kolom baru --}}
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold text-dark border-bottom pb-1 mb-3">Informasi Administratif</h6>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Tanggal Pengurusan</div>
                            <div>
                                {{ $car->tanggal_pengurusan ? \Carbon\Carbon::parse($car->tanggal_pengurusan)->translatedFormat('d F Y') : '—' }}
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Pajak 1 Tahun</div>
                            <div>
                                {{ $car->masa_berlaku_pajak_1_tahun ? \Carbon\Carbon::parse($car->masa_berlaku_pajak_1_tahun)->translatedFormat('d F Y') : '—' }}
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Pajak 5 Tahun</div>
                            <div>
                                {{ $car->masa_berlaku_pajak_5_tahun ? \Carbon\Carbon::parse($car->masa_berlaku_pajak_5_tahun)->translatedFormat('d F Y') : '—' }}
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="small text-secondary">Uji KIR</div>
                            <div>
                                {{ $car->uji_kir ? \Carbon\Carbon::parse($car->uji_kir)->translatedFormat('d F Y') : '—' }}
                            </div>
                        </div>

                        @if (!empty($car->keterangan))
                            <div class="col-12">
                                <div class="small text-secondary">Keterangan</div>
                                <div class="lh-base">{{ $car->keterangan }}</div>
                            </div>
                        @endif

                        @if (!empty($car->description))
                            <div class="col-12">
                                <div class="small text-secondary">Deskripsi</div>
                                <div class="lh-base">{{ $car->description }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer border-0">

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>



    {{-- EDIT (FORM dalam modal, submit ke cars.update) --}}
    <div class="modal fade" id="carEdit{{ $car->id }}" tabindex="-1"
        aria-labelledby="carEditLabel{{ $car->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="carEditLabel{{ $car->id }}">Edit Kendaraan
                            #{{ $car->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label">Merek</label>
                                <input type="text" name="brand" class="form-control"
                                    value="{{ old('brand', $car->brand) }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Model</label>
                                <input type="text" name="model" class="form-control"
                                    value="{{ old('model', $car->model) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Tahun</label>
                                <input type="number" name="year" class="form-control"
                                    value="{{ old('year', $car->year) }}" min="1900"
                                    max="{{ now()->year + 1 }}" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Warna</label>
                                <input type="text" name="color" class="form-control"
                                    value="{{ old('color', $car->color) }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Tipe</label>
                                <input type="text" name="type" class="form-control"
                                    value="{{ old('type', $car->vehicle_type) }}" placeholder="Motor / Mobil / Bus">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                @if ($car->image)
                                    <small class="text-muted d-block mt-1">
                                        Saat ini:
                                        <a target="_blank" class="link-primary text-decoration-underline"
                                            href="{{ asset('storage/cars/' . $car->image) }}">
                                            lihat gambar
                                        </a>
                                    </small>
                                @endif

                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Harga</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ old('price', $car->price) }}" min="0" step="1" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" name="plate_number" class="form-control"
                                    value="{{ old('plate_number', $car->plate_number) }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Transmisi</label>
                                <select name="transmission" class="form-select" required>
                                    <option value="manual" @selected(old('transmission', $car->transmission) === 'manual')>Manual</option>
                                    <option value="automatic" @selected(old('transmission', $car->transmission) === 'automatic')>Automatic</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Bahan bakar</label>
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
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $car->description) }}</textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Tanggal Pengurusan</label>
                                <input type="date" name="tanggal_pengurusan" class="form-control"
                                    value="{{ old('tanggal_pengurusan', $car->tanggal_pengurusan) }}">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Masa Berlaku Pajak (1 Tahun)</label>
                                <input type="date" name="masa_berlaku_pajak_1_tahun" class="form-control"
                                    value="{{ old('masa_berlaku_pajak_1_tahun', $car->masa_berlaku_pajak_1_tahun) }}">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Masa Berlaku Pajak (5 Tahun)</label>
                                <input type="date" name="masa_berlaku_pajak_5_tahun" class="form-control"
                                    value="{{ old('masa_berlaku_pajak_5_tahun', $car->masa_berlaku_pajak_5_tahun) }}">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Uji KIR</label>
                                <input type="date" name="uji_kir" class="form-control"
                                    value="{{ old('uji_kir', $car->uji_kir) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" rows="2" class="form-control"
                                    placeholder="Masukkan info tambahan (misal pajak diperpanjang, kondisi kendaraan, dll)">{{ old('keterangan', $car->keterangan) }}</textarea>
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
