<!-- Modal Update Status -->
<div class="modal fade" id="statusUpdate{{ $trip['id'] }}" tabindex="-1" aria-labelledby="statusLabel{{ $trip['id'] }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="statusLabel{{ $trip['id'] }}">
                    <i class="bi bi-arrow-repeat me-1"></i> Ubah Status Perjalanan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Tutup"></button>
            </div>

            <form action="{{ route('user.trip.updateStatus', $trip['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <p class="text-muted mb-3">
                        Pilih status terbaru untuk perjalanan <strong>{{ $trip['name'] }}</strong>.
                    </p>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="terjadwal{{ $trip['id'] }}"
                            value="terjadwal" {{ $trip['status'] == 'terjadwal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="terjadwal{{ $trip['id'] }}">Terjadwal</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="berangkat{{ $trip['id'] }}"
                            value="berangkat" {{ $trip['status'] == 'berangkat' ? 'checked' : '' }}>
                        <label class="form-check-label" for="berangkat{{ $trip['id'] }}">Berangkat</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="kembali{{ $trip['id'] }}"
                            value="kembali" {{ $trip['status'] == 'kembali' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kembali{{ $trip['id'] }}">Kembali</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="batal{{ $trip['id'] }}"
                            value="batal" {{ $trip['status'] == 'batal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="batal{{ $trip['id'] }}">Batal</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
