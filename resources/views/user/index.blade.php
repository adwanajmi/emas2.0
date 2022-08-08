@extends('base')
@section('content')
    <?php
    use Spatie\Permission\Models\Role;
    ?>

    <div class="container-fluid py-4">


        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Pengguna Berdaftar</h5>
            </div>
            <div class="col-lg-6">
                <div class="col-12">
                    <a href="/user/create" class="btn btn-outline-primary" type="submit" style="float: right;">Daftar
                        Pengguna</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row align-item-center">
                            <div class="col-6">
                                <h5 class="text-white">Senarai Pengguna</h5>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-primary" href="/user">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">E-mel</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Peranan</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                    {{-- @if ($current_user != 3)
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Set Semula Kata
                                            Laluan</th>
                                    @endif --}}
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                                </tr>
                            </thead>
                            @role('PPD')
                                <tbody>

                                    @foreach ($user as $key => $u)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $key + 1 }}</td>
                                            <td class="text-sm font-weight-normal" style="text-transform: uppercase">
                                                {{ $u['name'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $u['email'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $u['role'] }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal"><a
                                                    class="btn btn-info text-white" href="/user/{{ $u->id }}/edit"
                                                    style="color:black;">
                                                    Kemaskini
                                                </a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $u->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                            <div class="modal fade" id="modaldelete-{{ $u->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus pengguna?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form method="POST" action="/user/{{ $u->id }}">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button class="btn bg-gradient-danger" style="cursor: pointer"
                                                                    type="submit"> Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>

                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $index + $users->firstItem() }}</td>
                                            {{-- <td class="text-sm text-center font-weight-normal">
                                                {{ $loop->index + 1 }}</td> --}}
                                            <td class="text-sm font-weight-normal" style="text-transform: uppercase">
                                                {{ $user['name'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $user['email'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php
                                                $role = Role::where('id', $user['user_group_id'])
                                                    ->get()
                                                    ->first();
                                                ?>
                                                @if ($role != null)
                                                    @if ($role['name'] == 'pentadbir sistem')
                                                        Pentadbir sistem
                                                    @elseif ($role['name'] == 'pentadbir penilaian')
                                                        Pentadbir penilaian
                                                    @elseif ($role['name'] == 'penyelaras')
                                                        Penyelaras
                                                    @elseif ($role['name'] == 'pengawas')
                                                        Pengawas
                                                    @elseif ($role['name'] == 'calon')
                                                        Calon
                                                    @else
                                                        Pegawai korporat
                                                    @endif
                                                @else
                                                    <span class="text-warning">Sila Kemaskini</span>
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a class="btn btn-info text-white" href="/user/{{ $user->id }}/edit"
                                                    style="color:black;">
                                                    Kemaskini
                                                </a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" class="btn bg-gradient-warning"
                                                    style="cursor: pointer"
                                                    data-bs-target="#modalsetkatalauan-{{ $user->id }}">
                                                    Set Semula
                                                </a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" class="btn btn-outline-danger" style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $user->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                            <div class="modal fade" id="modaldelete-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus pengguna?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form method="POST" action="/user/{{ $user->id }}">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button class="btn bg-gradient-danger" style="cursor: pointer"
                                                                    type="submit"> Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalsetkatalauan-{{ $user->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk set semula kata laluan pengguna menggunakan No.
                                                            Kad Pengenalan Pengguna?
                                                            <br>
                                                            <span>{{ $user->name }}</span>
                                                            <br>
                                                            <span>{{ $user->nric }}</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST"
                                                                action="/set-semula-kata-laluan/{{ $user->id }}">
                                                                @method('POST')
                                                                @csrf
                                                                <input type="hidden" value="{{ $user->nric }}"
                                                                    name="password">
                                                                <button class="btn bg-gradient-danger" style="cursor: pointer"
                                                                    type="submit">
                                                                    Setuju</button>
                                                            </form>
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endrole
                        </table>
                        {{-- @unlessrole('penyelaras')
                            <div class="justify-content-end d-flex">
                                {{ $users->links() }}
                            </div>
                        @endrole --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../../assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true,
            sortable: true,
            perPageSelect: false,
            perPage: 20,
            labels: {
                info: false
            }
        });
    </script>
@stop
