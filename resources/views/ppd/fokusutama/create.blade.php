@extends('base')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>KEMASUKAN DATA</H2>
        </div>

        <br>
        <br>

        <div class="form-floating;">
            <form action="{{ route('fokusutama.store') }}" method="POST">
                @csrf

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="namaFokus">Nama Fokus Utama*</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="namaFokus" />

                    </div>
                </div>

                <br>
                <br>

                <div class="mb-3">
                    <label class="form-label" for="keteranganFokus"><b>Keterangan Fokus Utama</b></label>
                    <textarea class="form-control" name="keteranganFokus" rows="5"></textarea>
                </div>



                <div class="row">
                    <div class="col">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                            href="/PPD/fokusutama">
                            <span class="fas fa-times-circle"></span>&nbsp;Batal
                        </a>
                    </div>

                    <div class="col" style="text-align: right">
                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit" value="Save"
                            onclick="return confirm('Adakah anda mahu menyimpan data ini?')"><span
                                class="fas fa-save"></span>&nbsp;Simpan
                        </button>
                    </div>
                </div>

                <input class="form-control" name="user_id" type="hidden" value="{{ $user->id }}" />


            </form>

        </div>

    </div>
    <br>

    {{-- <script>
        function ConfirmSave() {
            var isconfirm = window.confirm("Adakah anda mahu menyimpan data?");
            if (isconfirm)
                self.location = "Save.php";
        }
    </script> --}}

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
