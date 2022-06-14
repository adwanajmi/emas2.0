@extends('base')
@section('content')
    <div class="container">
        <br>
        <div class="mb-4 text-center">
            <H2>KEMASUKAN DATA</H2>
        </div>


        <br>
        <br>



        <div class="form-floating;">
            <form action="{{ route('bab.store') }}" method="POST">
                @csrf


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="pemangkin_id">Tema/Pemangkin Dasar</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="pemangkin_id">
                            <option selected disabled hidden>SILA PILIH</option>

                            @foreach ($list as $list)
                        <option value="{{ $list->id }}">{{ $list->namaTema }}</option>
                    @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row" >
                    <label class="col-sm-2 col-form-label" for="namaBab">Nama Bab</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" name="namaBab" placeholder="Sila isi"/>
                    </div>
                </div>

                <div class="mb-3 row" >
                    <label class="col-sm-2 col-form-label" for="noBab">No. Bab</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="noBab" >
                            <option selected disabled hidden>SILA PILIH</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>

                    </div>
                </div>


                <br>
                <br>

                <div class="mb-3">
                    <label class="form-label" for="keteranganBab"><b>Keterangan Bab</b></label>
                    <textarea class="form-control" name="keteranganBab" rows="5"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3" href="/bab">
                            <span class="fas fa-times-circle"></span>&nbsp;Batal
                        </a>
                    </div>

                    <div class="col" style="text-align: right">
                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit" value="Save" onclick="return confirm('Adakah anda mahu menyimpan data ini?')"><span class="fas fa-save"></span>&nbsp;Simpan
                        </button>
                    </div>
                </div>

                <input class="form-control" name="user_id" type="hidden" value="{{ $user->id }}" />


            </form>

        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Input tidak mencukupi<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
