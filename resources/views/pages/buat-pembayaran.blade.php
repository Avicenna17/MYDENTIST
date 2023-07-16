@extends('main')
@section('isi')
    <form enctype="multipart/form-data" action="{{ route('bayar.add', ['id' => $pemeriksaan->id]) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Bayar Pemeriksaan
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="" class="form-label">Nama </label>
                    <input required type="text" disabled class="form-control" value="{{ $pemeriksaan->user->name }}">
                </div>
                <div class="row mb-3">
                    <label for="" class="form-label">Jadwal </label>
                    <input required type="text" disabled class="form-control"
                        value="{{ date('d/m/Y', strtotime($pemeriksaan->jadwal->tanggal)) . ' ' . date('H:i', strtotime($pemeriksaan->jadwal->sesi_awal)) . ' - ' . date('H:i', strtotime($pemeriksaan->jadwal->sesi_akhir)) }}">
                </div>
                <div class="row mb-3">
                    <label for="" class="form-label">Total Bayar</label>
                    <input required type="number" name="total_bayar" class="form-control">
                </div>
                <div class="row mb-3">
                    <label for="" class="form-label">Metode Bayar</label>
                    <select class="select2 form-control" name="metode" id="metode">
                        <option value="Gopay">Gopay</option>
                        <option value="Cash">Cash</option>
                        <option value="Ovo">Ovo</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="Dana">Dana</option>
                    </select>
                </div>
                <div id="buktiBayar" class=" row mb-3">
                    <label for="" class="form-label">Bukti Bayar</label>
                    <input class="" name="bukti_bayar" style="width: 100%;border:1px solid #d8dbe3;border-radius:4px" type="file"
                        id="formFile">
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('bayar.index') }}" class="btn btn-primary">Kembali</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @push('script')
    <script>
        $(document).ready(function () {

        });
    </script>
    @endpush
@endsection

