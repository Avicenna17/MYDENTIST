@extends('main')
@section('isi')
<form action="{{ route('jadwal.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Tambah Jadwal
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label for="" class="form-label">Tanggal </label>
                <input type="date" name="tanggal"  class="form-control">
            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Jam Mulai</label>
                <input type="time" name="sesi_awal"  class="form-control">

        </div>
            <div class="row mb-3">
                <label for="" class="form-label">Jam Akhir</label>
                <input type="time" name="sesi_akhir"  class="form-control">

            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Max Pasien</label>
                <input type="number" name="max_pasien"  class="form-control">
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route('jadwal.index') }}" class="btn btn-primary">Kembali</a>
            <button class="btn btn-primary" >Submit</button>
        </div>
    </div>
</form>
@endsection
