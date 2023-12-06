@extends('main')
@section('isi')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex justify-content-between">
                <h5>Rekam Medis</h5>
                <a href="{{ route('tambah-rekam-medis') }}" class="btn btn-primary">
                    Tambah Rekam medis
                </a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama </th>
                            <th class="text-center">Jadwal </th>
                            <th class="text-center">Keluhan</th>
                            <th class="text-center">Catatan </th>
                            <th class="text-center">Obat</th>
                            <th class="text-center">Status</th>
                            {{-- <th class="text-center">Aksi</th> --}}
                        </tr>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pemeriksaan as $item)
                            <tr>
                                <td class="p-2">{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ date('d/m/Y',strtotime($item->jadwal->tanggal)).' '.date('H:i',strtotime($item->jadwal->sesi_awal)).' - ' .date('H:i',strtotime($item->jadwal->sesi_akhir))  }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>
                                    @foreach ($item->obats as $key)
                                        <span class="badge text-light bg-primary">{{ $key->nama_obat }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $item->status==''?'Belum Hadir':$item->status }}
                                </td>
                                {{-- <td>
                                    @if ($item->catatan==null)

                                    <a href="{{ route('tambah-rekam-medis',['id'=>$item->id]) }}" class="btn btn-primary"><i class='bx bxs-edit'></i></a>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>

        </div>
    </div>
@endsection
