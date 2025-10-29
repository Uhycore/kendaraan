<!-- Modal Create Trip -->
<div class="modal fade" id="tripCreate{{ $car['id'] }}" tabindex="-1"
    aria-labelledby="tripCreateLabel{{ $car['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">

            {{-- Header --}}
            <div class="modal-header text-white" style="background-color: #364878;">
                <h5 class="modal-title fw-semibold" id="tripCreateLabel{{ $car['id'] }}">
                    Pesan Kendaraan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            {{-- Form --}}
            <form action="{{ route('trips.store') }}" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car['id'] }}">

                <div class="modal-body">
                    {{-- Info singkat kendaraan --}}
                    <div class="d-flex align-items-center mb-3 p-2 rounded bg-light border">
                        <img src="{{ $car['image'] 
                            ? asset('storage/cars/' . $car['image']) 
                            : 'https://placehold.co/100x70?text=No+Image' }}" 
                            alt="Foto {{ $car['brand'] }}" 
                            class="rounded me-3" width="100" height="70"
                            style="object-fit: cover;">
                        <div>
                            <strong class="d-block">{{ $car['brand'] }} {{ $car['model'] }}</strong>
                            <small class="text-muted">Plat: {{ $car['plate_number'] ?? '–' }}</small><br>
                            <small class="text-muted">Tahun: {{ $car['year'] ?? '-' }}</small>
                        </div>
                    </div>

                    <hr>

                    {{-- Input nama pemesan --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pemesan</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ auth()->user()->name }}" required>
                    </div>

                    {{-- Tujuan perjalanan --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tujuan Perjalanan</label>
                        <input type="text" name="travel_destination" class="form-control" placeholder="Masukkan tujuan..." required>
                    </div>

                    {{-- Waktu berangkat --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Waktu Berangkat</label>
                        <input type="datetime-local" name="start" class="form-control" required>
                    </div>

                    {{-- Waktu kembali --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Waktu Kembali</label>
                        <input type="datetime-local" name="end" class="form-control" required>
                    </div>

                    {{-- Catatan opsional --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Tambahkan keterangan bila perlu..."></textarea>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        Kirim Permintaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
