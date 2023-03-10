@extends('base')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>EDIT THRUST</H2>
        </div>

        {{-- <div class="col">
            <div class="row align-items-center">
                <div class="col col-lg-8">
                    <span><b>Profil Pengguna</b></span>
                </div>
            </div>
        </div><br> --}}
        <br>
        <div class="form-floating;">
            <form action="/MPB/thrust/{{ $users->id }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="name">Nama User</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="name" value="{{ $users->name }}" readonly />

                    </div>

                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="email" value="{{ $users->email }}" readonly />

                    </div>
                </div>

                <br><br>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="thrust1">Thrust 1</label>
                    <div class="col-sm-10" style="width:30%">
                        <div class="form-group">

                            <input class="form-control" type="number" id="num" name="thrust1"
                                value="{{ $users->thrust1 }}" />

                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" for="thrust2">Thrust 2</label>
                    <div class="col-sm-10" style="width:30%">
                        <div class="form-group">

                            <input class="form-control" type="number" id="num1" name="thrust2"
                                value="{{ $users->thrust2 }}" />

                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="thrust3">Thrust 3</label>
                    <div class="col-sm-10" style="width:30%">
                        <div class="form-group">

                            <input class="form-control" type="number" id="num2" name="thrust3"
                                value="{{ $users->thrust3 }}" />

                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" for="thrust4">Thrust 4</label>
                    <div class="col-sm-10" style="width:30%">
                        <div class="form-group">

                            <input class="form-control" type="number" id="num3" name="thrust4"
                                value="{{ $users->thrust4 }}" />

                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="thrust5">Thrust 5</label>
                    <div class="col-sm-10" style="width:30%">
                        <div class="form-group">

                            <input class="form-control" type="number" id="num4" name="thrust5"
                                value="{{ $users->thrust5 }}" />

                        </div>
                    </div>
                </div>



                <div class="col" style="text-align: right">
                    <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                        href="/MPB/mpb_view">
                        <span class="fas fa-times-circle"></span>&nbsp;Batal
                    </a>
                    <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                        type="submit" value="Save" onclick="return confirm('Adakah anda mahu mengubah data ini?')"><span
                            class="fas fa-save"></span>&nbsp;Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    <script>
        document.getElementById('num').addEventListener('input', function(e) {

            e.target.value = e.target.value.replace(/[^0-1]/g, '').replace(/(.{1})/g, '$1 ').trim();
        });

        document.getElementById('num1').addEventListener('input', function(e) {

            e.target.value = e.target.value.replace(/[^0-1]/g, '').replace(/(.{1})/g, '$1 ').trim();
        });

        document.getElementById('num2').addEventListener('input', function(e) {

            e.target.value = e.target.value.replace(/[^0-1]/g, '').replace(/(.{1})/g, '$1 ').trim();
        });

        document.getElementById('num3').addEventListener('input', function(e) {

            e.target.value = e.target.value.replace(/[^0-1]/g, '').replace(/(.{1})/g, '$1 ').trim();
        });

        document.getElementById('num4').addEventListener('input', function(e) {

            e.target.value = e.target.value.replace(/[^0-1]/g, '').replace(/(.{1})/g, '$1 ').trim();
        });
    </script>
@endsection
