@extends('base')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>KEMAS KINI DATA</H2>
        </div>


        <br>
        <br>



        <div class="form-floating;">
            <form action="/PPD/strategi/{{ $strategi->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="fokus_id">Fokus Utama*</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="fokus_id" id="pilih1">

                            @foreach ($fokuss as $fokus)
                                <option @selected($strategi->fokus_id == $fokus->id) value="{{ $fokus->id }}">{{ $fokus->namaFokus }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="perkara_id">Perkara Utama*</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="perkara_id" id="pilih2">

                            @foreach ($perkaras as $perkara)
                                <option @selected($strategi->perkara_id == $perkara->id) value="{{ $perkara->id }}">{{ $perkara->namaPerkara }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="pemangkin_id">Tema/Pemangkin Dasar*</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pemangkin_id">

                            @foreach ($pemangkin as $pemangkin)
                                <option @selected($strategi->pemangkin_id == $pemangkin->id) value="{{ $pemangkin->id }}">{{ $pemangkin->namaTema }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="bab_id">Bab*</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="bab_id">

                            @foreach ($bab as $bab)
                                <option @selected($strategi->bab_id == $bab->id) value="{{ $bab->id }}">Bab {{ $bab->noBab }}.
                                    {{ $bab->namaBab }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="bidang_id">Bidang Keutamaan*</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="bidang_id">

                            @foreach ($list as $list)
                                <option @selected($strategi->bidang_id == $list->id) value="{{ $list->id }}">{{ $list->namaBidang }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="namaStrategi">Nama Strategi*</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="namaStrategi"
                            value="{{ $strategi->namaStrategi }}" />

                    </div>
                </div>

                <br>
                <br>


                <div class="mb-3">
                    <label class="form-label" for="keteranganStrategi"><b>Keterangan Strategi</b></label>
                    <textarea class="form-control" name="keteranganStrategi" rows="5">{{ $strategi->keteranganStrategi }}</textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                            href="/PPD/strategi">
                            <span class="fas fa-times-circle"></span>&nbsp;Batal
                        </a>
                    </div>

                    <div class="col" style="text-align: right">
                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit" value="Save"
                            onclick="return confirm('Adakah anda mahu mengubah data ini?')"><span
                                class="fas fa-save"></span>&nbsp;Simpan
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ooops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        $("#pilih1").change(function() {

            var fokus_id = $(this).val();
            var perkaras = @json($perkaras->toArray());
            $("#pilih2").html(``);
            perkaras.forEach(perkara => {
                if (perkara.fokus_id == fokus_id) {
                    $("#pilih2").append(`
                            <option value="` + perkara.id + `">` + perkara.namaPerkara + `</option>
                        `);
                }
            });
        });
    </script>
@endsection
