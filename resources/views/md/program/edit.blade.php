@extends('base-md')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>UPDATE DATA FOR PROGRAM</H2>
        </div>


        <br>
        <br>

        <div class="form-floating;">
            <form action="/MD/program/{{ $program->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="intiative_id">Initiative Code</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="intiative_id">
                            @foreach ($initiatives as $initiative)
                                <option @selected($program->intiative_id == $initiative->id) value="{{ $initiative->id }}">
                                    {{ $initiative->code }} - {{ $initiative->namaInitiative }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label" for="programLead">Program Lead</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="programLead" value="{{ $program->programLead }}" />

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="cluster_id">Cluster</label>
                    <div class="col-sm-10" style="width:30%">
                        <select class="form-control" name="cluster_id">
                            @foreach ($clusters as $cluster)
                                <option @selected($program->cluster_id == $cluster->id) value="{{ $cluster->id }}">
                                    {{ $cluster->code }} - {{ $cluster->namaCluster }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label" for="PIC">Person In Charge</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="PIC" value="{{ $program->PIC }}" />

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="namaProgram">Program Name</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="namaProgram" value="{{ $program->namaProgram }}" />

                    </div>

                    <label class="col-sm-2 col-form-label" for="position">Position</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="position" value="{{ $program->position }}" />

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="leadAgency">Lead Agency/Ministry</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="leadAgency" value="{{ $program->leadAgency }}" />

                    </div>

                    <label class="col-sm-2 col-form-label" for="phoneNo">Contact Number</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="number" name="phoneNo" value="{{ $program->phoneNo }}" />

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="programTarget">Program Target</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="programTarget"
                            value="{{ $program->programTarget }}" />

                    </div>

                    <label class="col-sm-2 col-form-label" for="email">Primary Email Address</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="email" value="{{ $program->email }}" />

                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for=""></label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" hidden />

                </div>

                    <label class="col-sm-2 col-form-label" for="email2">Secondary Email Address</label>
                    <div class="col-sm-10" style="width:30%">
                        <input class="form-control" type="text" name="email2" value="{{ $program->email2 }}" />

                    </div>
                </div>

                {{-- <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="progress">Progress Plan</label>
                            <div class="col-sm-10" style="width:30%">
                                <input class="form-control" type="text" name="progress"
                                    value="{{ $program->progress }}" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="cost">Project Cost</label>
                            <div class="col-sm-10" style="width:30%">
                                <input class="form-control" type="number" name="cost" value="{{ $program->cost }}" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="source">Source Funding</label>
                            <div class="col-sm-10" style="width:30%">
                                <input class="form-control" type="number" name="source" value="{{ $program->source }}" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="totalDisbursed">Total Disbursed Amount</label>
                            <div class="col-sm-10" style="width:30%">
                                <input class="form-control" type="text" name="totalDisbursed"
                                    value="{{ $program->totalDisbursed }}" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="totalAmount">Total Amount Spending</label>
                            <div class="col-sm-10" style="width:30%">
                                <input class="form-control" type="text" name="totalAmount"
                                    value="{{ $program->totalAmount }}" />

                            </div>
                        </div> --}}

                <br><br>

                <div class="row">


                    <div class="col" style="text-align: right">
                        <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                            href="/MD/program">
                            <span class="fas fa-times-circle"></span>&nbsp;Cancel
                        </a>

                        <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                            type="submit" value="Save"
                            onclick="return confirm('Are you sure you want to edit this Data?')"><span
                                class="fas fa-save"></span>&nbsp;Save
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
