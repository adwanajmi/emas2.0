@extends('base')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>KEMASUKAN DATA</H2>
        </div>


        <br>
        <br>

        {{-- <div class="mb-3 row" >
            <label class="col-sm-2 col-form-label" for="fokus_id">Fokus Utama</label>
            <div class="col-sm-10" style="width:30%">
                <input class="form-control" name="fokus_id" placeholder="Sila Pilih"/>
            </div>
        </div> --}}



        <div class="form-floating;">
            <form action="{{ route('kpi.store') }}" method="POST">
                @csrf


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="outcome_id">Outcome Nasional</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="outcome_id">
                            <option value="">SILA PILIH</option>

                            @foreach ($list as $list)
                                <option value="{{ $list->id }}">{{ $list->keteranganOutcome }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="outcome">Indikator Terpilih</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="outcome">
                            <option value="">SILA PILIH</option>

                        </select>
                    </div>
                </div>


                <br>
                <br>

                <div class="mb-3">
                    <label class="form-label" for="keteranganKpi"><b>Keterangan KPI Nasional</b></label>
                    <textarea class="form-control" name="keteranganKpi" rows="5"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3" href="/kpi">
                            <span class="fas fa-times-circle"></span>&nbsp;Batal
                        </a>
                    </div>

                    <div class="col" style="text-align: right">
                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit"><span class="fas fa-save"></span>&nbsp;Simpan
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
