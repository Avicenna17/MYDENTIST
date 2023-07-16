@extends('main')
@section('isi')

        <div class="card">
            <div class="card-header">
            Lihat Pembayaran
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
                    <input required type="number" disabled ="total_bayar"  value="{{ $pemeriksaan->pembayaran->total_bayar }}" class="form-control">
                </div>
                <div class="row mb-3">
                    <label for="" class="form-label">Metode Bayar</label>
                    <input required type="text" disabled ="total_bayar"  value="{{ $pemeriksaan->pembayaran->metode }}" class="form-control">

                </div>
                <div id="buktiBayar" class=" row mb-3">
                    <label for="" class="form-label">Bukti Bayar</label>
                </div>
                <div class="row d-flex justify-content-center">
                    <img src="/{{ $pemeriksaan->pembayaran->bukti_bayar }}" width="300px" alt="">
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('bayar.index') }}" class="btn btn-primary">Kembali</a>

            </div>
        </div>
    </form>
    @push('script')
    <script>
        $(document).ready(function () {
            $('#metode').on('change', function () {
                console.log($(this).val())

                if($(this).val()==='Cash'){
                    $('#buktiBayar').addClass('d-none');
                }else{
                    $('#buktiBayar').removeClass('d-none');
                }
            });
        });
    </script>
    @endpush
@endsection

