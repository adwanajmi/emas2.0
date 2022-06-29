@extends('base')
@section('content')
    <div class="container">
        <br>

        <div class="mb-4 text-center">
            <H2>PELAN PELAKSANAAN DASAR</H2>
        </div>

        <br>

        <span><b>Bab</b></span>
        <a class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white" href="/bab/create">
            <span class="fas fa-plus-circle"></span>&nbsp;Tambah
        </a>

        <hr style="width:100%;text-align:center;">

        <div class="row g-3" style="width: 60%">
            <div class="col-sm">

                <select class="form-select search">
                    <option selected disabled hidden value="null">PILIH FOKUS UTAMA</option>
                    @foreach ($fokus as $fokus)
                        <option value="{{ $fokus->id }}">{{ $fokus->namaFokus }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm">

                <select class="form-select search">
                    <option selected disabled hidden value="null">PILIH TEMA/PEMANGKIN DASAR</option>
                    @foreach ($list as $list)
                        <option value="{{ $list->id }}">{{ $list->namaTema }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="table-responsive scrollbar">
            <table class="table table-hover table-striped overflow-hidden" value="null">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="searchUpdateTable">
                    @foreach ($babs as $bab)
                        <tr class="align-middle">

                            <td>
                                <div class="d-flex align-items-center" data-bs-toggle="modal"
                                    data-bs-target="#error-modal-{{ $bab->id }}">
                                    <div class="ms-2"><b>{{ $loop->iteration }}. {{ $bab->namaBab }}</b></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center" data-bs-toggle="modal"
                                    data-bs-target="#error-modal-{{ $bab->id }}">
                                    <div class="ms-2"><b>Bab {{ $bab->noBab }}</b></div>
                                </div>

                            </td>

                            <div class="modal fade" id="error-modal-{{ $bab->id }}" tabindex="-1" role="dialog"
                                aria-hidden value="null"="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0">

                                            <div class="p-4 pb-0">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Bab:</label>
                                                        <label class="form-control"
                                                            disabled="disabled">{{ $bab->namaBab }}</label>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">No Bab:</label>
                                                        <label class="form-control"
                                                            disabled="disabled">{{ $bab->noBab }}</label>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Keterangan:</label>
                                                        <label class="form-control"
                                                            disabled="disabled">{{ $bab->keteranganBab }}</label>
                                                    </div>
                                                </form>
                                                <br>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <td align="right">
                                <div>
                                    {{-- <form action="{{ route('bab.destroy', $bab->id) }}" method="POST"> --}}

                                    <a class="btn btn-primary" style="border-radius: 38px"
                                        href="{{ route('bab.edit', $bab->id) }}"><i class="fas fa-edit"></i>
                                    </a>
                                    {{-- @csrf
                                        @method('DELETE') --}}

                                    <button type="submit" onclick="myFunction({{ $bab->id }})" class="btn btn-danger"
                                        style="border-radius: 38px">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <p id="ppd"></p>


                                    {{-- </form> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



    </div>

    <script>
        $(".search").change(function() {
            var result = [];
            jQuery.each($(".search"), function(key, val) {
                result.push(val.value);
            });

            $.ajax({
                method: "POST",
                url: "/search_bab",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "result": result,
                },
            }).done(function(response) {
                console.log(response);
                $("#searchUpdateTable").html('');
                // $("#searchUpdateTable2").html('');

                response.forEach(el => {
                    $("#searchUpdateTable").append(`
                    <tr class="align-middle">

                        <td>
                                <div class="d-flex align-items-center" data-bs-toggle="modal"
                                    data-bs-target="#error-modal-` + el.id + `">
                                    <div class="ms-2"><b>` + el.noBab + `. ` + el.namaBab + `</b></div>
                                </div>
                        </td>
                        <td>

                            <div class="d-flex align-items-center" data-bs-toggle="modal"
                                        data-bs-target="#error-modal-` + el.id + `">

                                    <div class="ms-2"><b>Bab ` + el.noBab + `</b></div>
                            </div>
                        </td>
                        <td align="right">

                            <div>

                                    <a class="btn btn-primary" style="border-radius: 38px"
                                        href="/bab/` + el.id + `/edit"><i class="fas fa-edit"></i>
                                    </a>

                                    <button type="submit" onclick="myFunction({{ `+el.id+` }})" class="btn btn-danger"
                                        style="border-radius: 38px">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                        </td>

                    </tr>

                    `);

                    // $("#searchUpdateTable2").append(`
                //     <div>

                //         <a class="btn btn-primary" style="border-radius: 38px"
                //             href="/bab/` + el.id + `/edit"><i class="fas fa-edit"></i>
                //         </a>

                //         <button type="submit" onclick="myFunction({{ `+el.id+` }})" class="btn btn-danger"
                //             style="border-radius: 38px">
                //             <i class="fas fa-trash"></i>
                //         </button>
                //     </div>
                // `);
                });
            });


        });

        function myFunction(id) {


            let alert = "Adakah anda mahu membuang data?";
            if (confirm(alert) == true) {
                $.ajax({
                    method: "DELETE",
                    url: "/bab/" + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    }
                });

                alert = "Berjaya di buang!";
                location.reload();

            } else {
                alert("Dibatalkan!");
            }
            document.getElementById("ppd").innerHTML = text;
        }

        // $('.searchBab').change(function(e) {
        //     let val = this.value;
        //     var bab = @json($babs->toArray());
        //     $("#tablebody").html('');
        //     bab.forEach(e => {
        //         if (val == e.pemangkin_id) {
        //             $("#tablebody").append(`
    //             <tr class="align-middle">
    //                     <td>
    //                         <div class="d-flex align-items-center" data-bs-toggle="modal"
    //                             data-bs-target="#error-modal-` + e.id + `">
    //                             <div class="ms-2"><b>` + e.namaBab + `</b></div>
    //                         </div>
    //                     </td>

    //                     <div class="modal fade" id="error-modal-` + e.id + `" tabindex="-1" role="dialog"
    //                         aria-hidden="true">
    //                         <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    //                             <div class="modal-content position-relative">
    //                                 <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
    //                                     <button
    //                                         class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
    //                                         data-bs-dismiss="modal" aria-label="Close">
    //                                     </button>
    //                                 </div>
    //                                 <div class="modal-body p-0">

    //                                     <div class="p-4 pb-0">
    //                                         <form>
    //                                             <div class="mb-3">
    //                                                 <label class="col-form-label">Nama Bab:</label>
    //                                                 <label class="form-control"
    //                                                     disabled="disabled">` + e.namaBab + `</label>

    //                                             </div>
    //                                             <div class="mb-3">
    //                                                 <label class="col-form-label">Keterangan:</label>
    //                                                 <label class="form-control"
    //                                                     disabled="disabled">` + e.keteranganbab + `</label>
    //                                             </div>
    //                                         </form>
    //                                     </div>
    //                                 </div>
    //                                 <div class="modal-footer">

    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>

    //                     <td align="right">
    //                         <div>
    //                             <form action="/bab/` + e.id + `" method="POST">

    //                                 <a class="btn btn-primary" style="border-radius: 38px"
    //                                     href="/bab/` + e.id + `"><i
    //                                         class="fas fa-edit"></i>
    //                                 </a>

    //                                 @csrf
    //                                 @method('DELETE')

    //                                 <button type="submit" onclick="myFunction()" class="btn btn-danger"
    //                                     style="border-radius: 38px">
    //                                     <i class="fas fa-trash"></i>
    //                                 </button>

    //                             </form>
    //                         </div>
    //                     </td>
    //                 </tr>
    //             `);

        //         }
        //     });



        // });
    </script>
@endsection