@extends('main')
@section('isi')
<div class="card">
    <div class="card-header">
        <div class="row d-flex justify-content-between">
            <h5>Rekam Medis</h5>
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
                Tambah Jadwal
            </a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal </th>
                        <th class="text-center">Jam Mulai</th>
                        <th class="text-center">Jam Akhir </th>
                        <th class="text-center">Max Pasien </th>
                        <th class="text-center">Aksi</th>
                    </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ date('H:i',strtotime($item->sesi_awal)) }}</td>
                        <td>{{ date('H:i',strtotime($item->sesi_akhir)) }}</td>
                        <td>{{ $item->max_pasien }}</td>
                        <td>
                            <a href="{{ route('jadwal.edit',['jadwal'=>$item->id]) }}" class="btn btn-primary"><i class='bx bxs-edit'></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>

    </div>
</div>
@endsection
