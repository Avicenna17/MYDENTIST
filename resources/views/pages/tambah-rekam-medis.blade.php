@extends('main')
@section('isi')
<form action="{{ route('tambah-rekam-medis',['id'=>$rekamMedis->id]) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Tambah Rekam Medis
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label for="" class="form-label">Nama </label>
               <input required type="text" disabled class="form-control" name="user_id" value="{{ $rekamMedis->user->name  }}" >
            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Keluhan</label>
                <textarea disabled name="keluhan"  value="{{ $rekamMedis->keluhan }}" class="form-control">{{ $rekamMedis->keluhan }}</textarea>
            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Catatan</label>
                <textarea name="catatan" class="form-control"></textarea>
            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Obat</label>
                <select class="select2 form-control" name="obat[]" multiple="multiple">
                    @foreach ($obat as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <label for="" class="form-label">Status</label>
                <select class="select2 form-control" name="status">
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('rekam-medis') }}" class="btn btn-primary">Kembali</a>
            <button class="btn btn-primary" >Submit</button>
        </div>
    </div>
</form>
@endsection
