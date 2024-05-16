@extends('layouts.template')

@section('content')
    <div class="row">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <span class="d-inline-block">
                            {{ $title ?? 'Judul' }}
                        </span>
                        <div class="float-right">
                            <a class="btn btn-success text-light" href="{{ route('user.create') }}">
                                <i class="fas fa-plus mr-1"></i>Tambah
                            </a>
                        </div>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">

                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->name }}</td>
                                        @if ($item->role == 'admin')
                                            <td>Admin</td>
                                        @else
                                            <td>Pegawai</td>
                                        @endif
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success px-2 py-1 dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Pilih Aksi
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item edit"
                                                        href="{{ route('user.edit', $item->id) }}">
                                                        <i class="fas fa-pencil-alt mr-1" hre></i> Edit
                                                    </a>
                                                    <a class="dropdown-item delete" href="{{ route('user.destroy', $item->id) }}" data-confirm-delete="true">
                                                        <i class="fas fa-trash mr-1"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection