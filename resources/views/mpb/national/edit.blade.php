@extends('base')
@section('content')
    <div class="container">
        <br>
        <div class="mb-4 text-center">
            <H2>UPDATE DATA</H2>
        </div>


        <br>
        <br>

        <div class="form-floating;">
            <form action="/national/{{ $national->id }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="thrust_id">Thrust</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="thrust_id">
                            @foreach ($list as $list)
                                <option @selected($national->thrust_id == $list->id) value="{{ $list->id }}">{{ $list->namaThrust }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="year">Year</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="year" >
                            <option @selected($national->year == "1") value="1">1</option>
                            <option @selected($national->year == "2") value="2">2</option>
                            <option @selected($national->year == "3") value="3">3</option>
                            <option @selected($national->year == "4") value="4">4</option>
                            <option @selected($national->year == "5") value="5">5</option>

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="quarter">Quarter</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="quarter" >
                            <option @selected($national->quarter == "1") value="1">1</option>
                            <option @selected($national->quarter == "2") value="2">2</option>
                            <option @selected($national->quarter == "3") value="3">3</option>
                            <option @selected($national->quarter == "4") value="4">4</option>
                            <option @selected($national->quarter == "5") value="5">5</option>

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="namaNational">National Initiave</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="namaNational" value="{{ $national->namaNational }}" />

                    </div>
                </div>

                <br><br>

                <div class="mb-3">
                    <label class="form-label" for="keteranganNational"><b>National Initiave Information</b></label>
                    <textarea class="form-control" name="keteranganNational" rows="5">{{ $national->keteranganNational }}</textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                            href="/national">
                            <span class="fas fa-times-circle"></span>&nbsp;Cancel
                        </a>
                    </div>

                    <div class="col" style="text-align: right">
                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit" value="Save" onclick="return confirm('Are you sure you want to edit this Data?')"><span class="fas fa-save"></span>&nbsp;Save
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ooops!</strong> Input tidak mencukupi<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection