@extends('main')
@section('isi')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex justify-content-between">
                <h5>Akun</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAkunModal">
                    Tambah Akun
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama </th>
                            <th class="text-center">Email </th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    <tbody>

                        @foreach ($users as $key => $user)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->alamat }}</td>
                                <td class="text-center">{{ $user->no_telepon }}</td>
                                <td class="text-center">{{ $user->role }}</td>
                                <td class="d-flex gap-4">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editAkunModal{{ $user->id }}"><i class='bx bxs-edit'></i></a>

                                    <div class="modal fade" id="editAkunModal{{ $user->id }}"
                                        aria-labelledby="editAkunModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editAkunModalLabel{{ $user->id }}">
                                                        Edit Akun</h1>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('user.update', ['user' => $user->id]) }}"
                                                    method="post">

                                                    <div class="modal-body container">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row mb-3">
                                                            <label for="edit_nama{{ $user->id }}"
                                                                class="form-label">Nama</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_nama{{ $user->id }}" name="name"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_email{{ $user->id }}"
                                                                class="form-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="edit_email{{ $user->id }}" name="email"
                                                                value="{{ $user->email }}">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_password{{ $user->id }}"
                                                                class="form-label">Password</label>
                                                            <input type="password" class="form-control"
                                                                id="edit_password{{ $user->id }}" name="password">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_alamat{{ $user->id }}"
                                                                class="form-label">Alamat</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_alamat{{ $user->id }}" name="alamat"
                                                                value="{{ $user->alamat }}">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_no_telepon{{ $user->id }}"
                                                                class="form-label">No Telpon</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_no_telepon{{ $user->id }}" name="no_telepon"
                                                                value="{{ $user->no_telepon }}">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="edit_role{{ $user->id }}"
                                                                class="form-label">Role</label>
                                                            <select name="role" id="edit_role{{ $user->id }}"
                                                                class="form-control form-select">
                                                                <option value="dokter"
                                                                    {{ $user->role === 'dokter' ? 'selected' : '' }}>Dokter
                                                                </option>
                                                                <option value="admin"
                                                                    {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $user->id }})"><i
                                            class='bx bxs-trash'></i></button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>

        </div>
        {{-- Tambah akun modal --}}


        <!-- Modal -->
        <div class="modal fade" id="tambahAkunModal" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahAkunModalLabel">Tambah Akun</h1>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('user.store') }}" method="post">
                        <div class="modal-body container">
                            @csrf

                            <div class="row mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="name" required>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <div class="row mb-3">
                                <label for="no_telepon" class="form-label">No Telpon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-control form-select" required>
                                    <option value="dokter">Dokter</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(userId) {
            if (confirm('Apakah Anda yakin ingin menghapus?')) {
                // Lakukan aksi hapus, misalnya redirect atau AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/user/${userId}`,
                    success: function(response) {
                        alert('akun berhasil di hapus')
                        location.href = ''
                    }
                });
            }
        }
    </script>
@endsection
