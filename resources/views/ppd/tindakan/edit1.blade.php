@extends('base')
@section('content')

    <div class="container">
        <div class="mb-4 text-center">
            <H2>KEMAS KINI MAKLUMAT</H2>
        </div>

        <br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Input yang dimasuk kan adalah salah<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-floating;">

            <form action="/PPD/tindakan/{{ $tindakans->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label class="col-form-label" for="pemangkin_id">Tema</label>
                    <div>

                        <input class="form-control" value="{{ $tindakans->pemangkin->namaTema ?? 'Tiada' }}" readonly />

                    </div>

                    <label class="col-form-label" for="bab_id">Bab</label>
                    <div>

                        <input class="form-control" value="{{ $tindakans->bab->namaBab ?? 'Tiada' }}" readonly />

                    </div>

                    <label class="col-form-label" for="bidang_id">Bidang Keutamaan</label>
                    <div>

                        <input class="form-control" value="{{ $tindakans->bidang->namaBidang ?? 'Tiada' }}" readonly />

                    </div>

                    <label class="col-form-label" for="outcome_id">Outcome Nasional</label>
                    <div>

                        <input class="form-control" value="{{ $tindakans->outcome->namaOutcome ?? 'Tiada' }}" readonly />

                    </div>

                    <label class="col-form-label" for="namaTindakan">Tindakan</label>

                    <div>
                        <input class="form-control" name="namaTindakan" value="{{ $tindakans->namaTindakan }}" readonly />
                    </div>


                </div><br>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="kementerian_penyelaras">Kementerian/Agensi
                        Penyelaras</label>
                    <div class="col-sm-10" style="width:30%">

                        <input class="form-control" type="text" name="kementerian_penyelaras"
                            value="{{ $tindakans->kementerian_penyelaras }}" />

                    </div>
                    <label class="col-sm-2 col-form-label" for="kementerian_pelaksana">Kementerian/Agensi Pelaksana</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="kementerian_pelaksana"
                            value="{{ $tindakans->kementerian_pelaksana }}" />
                    </div>
                </div>

                <div class="mb-3 row">

                    <label class="col-sm-2 col-form-label" for="bahagian">Bahagian Penyelaras</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="bahagian">
                            @foreach ($users as $u)
                                <option @selected($tindakans->u_id == $u->id) value="{{ $u->id }}">{{ $u->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label" for="tempohSiap">Tempoh Siap</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="tempohSiap">
                            <option selected disabled hidden>SILA PILIH</option>
                            <option @selected($tindakans->tempohSiap = '2020') value="2020">2020</option>
                            <option @selected($tindakans->tempohSiap = '2021') value="2021">2021</option>
                            <option @selected($tindakans->tempohSiap = '2022') value="2022">2022</option>
                            <option @selected($tindakans->tempohSiap = '2023') value="2023">2023</option>
                            <option @selected($tindakans->tempohSiap = '2024') value="2024">2024</option>
                            <option @selected($tindakans->tempohSiap = '2025') value="2025">2025</option>
                            <option @selected($tindakans->tempohSiap = '2026') value="2026">2026</option>
                            <option @selected($tindakans->tempohSiap = '2027') value="2027">2027</option>
                            <option @selected($tindakans->tempohSiap = '2028') value="2028">2028</option>
                            <option @selected($tindakans->tempohSiap = '2029') value="2029">2029</option>
                            <option @selected($tindakans->tempohSiap = '2030') value="2030">2030</option>


                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="kategoriSasaran">Kategori Sasaran</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="kategoriSasaran">
                            <option selected disabled hidden>SILA PILIH</option>
                            <option @selected($tindakans->kategoriSasaran = 'Low Hanging Fruits') value="Low Hanging Fruits">Low Hanging Fruits</option>
                            <option @selected($tindakans->kategoriSasaran = 'Quantifiable Targets') value="Quantifiable Targets">Quantifiable Targets</option>
                            <option @selected($tindakans->kategoriSasaran = 'Broad Policy') value="Broad Policy">Broad Policy</option>


                        </select>
                    </div>

                    {{-- <label class="col-sm-2 col-form-label" for="catatan2021">Catatan 2021</label>
                    <div class="col-sm-10" style="width:30%">
                        <textarea class="form-control" row="10" name="catatan2021">{{ $tindakans->catatan2021 }}</textarea>
                    </div> --}}
                </div>

                {{-- <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="statusPelaksanaan2021">Status Pelaksanaan</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="statusPelaksanaan2021">
                            <option selected disabled hidden>PILIH SALAH SATU</option>
                            <option @selected($tindakans->statusPelaksanaan2021 = 'Belum Mula') value="Belum Mula">Belum Mula</option>
                            <option @selected($tindakans->statusPelaksanaan2021 = 'Dalam Pelaksanaan') value="Dalam Pelaksanaan">Dalam Pelaksanaan</option>
                            <option @selected($tindakans->statusPelaksanaan2021 = 'Siap') value="Siap">Siap</option>
                            <option @selected($tindakans->statusPelaksanaan2021 = 'Tiada Maklumat') value="Tiada Maklumat">Tiada Maklumat</option>

                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label" for="catatan2022">Catatan 2022</label>
                    <div class="col-sm-10" style="width:30%">
                        <textarea class="form-control" row="10" name="catatan2022">{{ $tindakans->catatan2022 }}</textarea>

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="sasaran2021">Sasaran 2021</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" name="sasaran2021" value="{{ $tindakans->sasaran2021 }}" />

                    </div>

                    <label class="col-sm-2 col-form-label" for="status">Status</label>

                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="status">
                            <option selected disabled hidden>SILA PILIH</option>
                            <option @selected($tindakans->status = '1') value="1">Belum Dilaksana</option>
                            <option @selected($tindakans->status = '2') value="2">Dalam Pelaksanaan</option>
                            <option @selected($tindakans->status = '3') value="3">Tamat Pelaksanaan</option>
                        </select>
                    </div>


                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="sasaran2022">Sasaran 2022</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" name="sasaran2022" value="{{ $tindakans->sasaran2022 }}" />

                    </div>
                    <label class="col-sm-2 col-form-label" for="pencapaian2021">Pencapaian 2021</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" name="pencapaian2021" value="{{ $tindakans->pencapaian2021 }}" />

                    </div>



                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="statusPelaksanaan">Status Pelaksanaan 2022</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="statusPelaksanaan">
                            <option selected disabled hidden>PILIH SALAH SATU</option>
                            <option @selected($tindakans->statusPelaksanaan = 'Belum Mula') value="Belum Mula">Belum Mula</option>
                            <option @selected($tindakans->statusPelaksanaan = 'Dalam Pelaksanaan') value="Dalam Pelaksanaan">Dalam Pelaksanaan</option>
                            <option @selected($tindakans->statusPelaksanaan = 'Siap') value="Siap">Siap</option>
                            <option @selected($tindakans->statusPelaksanaan = 'Tiada Maklumat') value="Tiada Maklumat">Tiada Maklumat</option>

                        </select>
                    </div>



                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="pencapaian2022">Pencapaian 2022</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" name="pencapaian2022" value="{{ $tindakans->pencapaian2022 }}" />

                    </div>

                </div> --}}

                <br><br>

                <div class="col" style="text-align: center">
                    <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                        type="submit" value="Save"
                        onclick="return confirm('Adakah anda mahu menyimpan data ini?')">&nbsp;Simpan Kemas Kini
                    </button>
                </div>


            </form>
        </div>

    </div>

@endsection
