@extends('main')
@section('isi')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex justify-content-between">
                <h5>Pemeriksaan</h5>

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
                            <th class="text-center">Bayar</th>
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


                                <td>
                                    @if (is_null($item->pembayaran))
                                    <a href="{{ route('bayar.add',['id'=>$item->id]) }}" class="btn btn-primary">Bayar</a>
                                    @else
                                    <a href="{{ route('bayar.show',['id'=>$item->id]) }}" class="btn btn-primary">Lihat</a>
                                    @endif
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
