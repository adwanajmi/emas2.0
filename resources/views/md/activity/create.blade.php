@extends('base-md')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <H2>DATA ENTRY FOR ACTIVITY</H2>
        </div>
        <div class="form-floating;">
            <form action="/MD/activity" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <div class="mb-3 row">
                            <label class="col-form-label" for="cluster_id">Cluster</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="cluster_id">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>

                                    @foreach ($clusters as $cluster)
                                        <option value="{{ $cluster->id }}">{{ $cluster->namaCluster }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <div class="mb-3 row">

                            <label class="col-form-label" for="initiative_id">Initiative Code</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="initiative_id">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>

                                    @foreach ($initiatives as $initiative)
                                        <option value="{{ $initiative->id }}">{{ $initiative->code }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <label class="col-form-label" for="initiative_id">Initiative</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="initiative_id">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>

                                    @foreach ($initiatives as $initiative)
                                        <option value="{{ $initiative->id }}">
                                            {{ $initiative->namaInitiative }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="program_id">Program</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="program_id">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>

                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->namaProgram }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <label class="col-form-label" for="plan_id">Plan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="plan_id">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>

                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->namaPlan }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div><br>

                        <hr>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="namaActivity">Activity Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="namaActivity" />

                            </div>

                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="startDate">Start Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="startDate" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="endDate">End Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="endDate" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="unit">Unit</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="unit">
                                    <option selected disabled hidden>PLEASE CHOOSE</option>
                                    <option value="%">%</option>
                                    <option value="Number">Number</option>

                                </select>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label class="col-form-label" for="output">Output Target</label>
                            <div class="col-sm-10">
                                <input class="form-control output" type="number" name="output" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="weightage">Weightage</label>
                            <div class="col-sm-10">

                                <input class="form-control output" type="number" name="weightage" />

                            </div>

                        </div>

                        {{-- <div class="mb-3 row">
                            <label class="col-form-label" for="weightage_progress">Weightage Progress</label>
                            <div class="col-sm-10">
                                <input class="form-control" onchange="myFunction()" type="number" name="weightage_progress"
                                    readonly />

                            </div>
                        </div> --}}

                        {{-- <div class="mb-3 row">
                            <label class="col-form-label" for="leadAgency">Lead Agency</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="leadAgency" />

                            </div>
                        </div> --}}


                        <div class="mb-3 row">
                            <label class="col-form-label" for="PIC">Person In Charge</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="PIC" />

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label" for="email">Primary Email Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" />

                            </div>
                        </div>


                        {{-- <div class="mb-3 row">
                            <label class="col-form-label" for="output_progress">Output Progress</label>
                            <div class="col-sm-10">
                                <input class="form-control output" type="number" name="output_progress" />

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label" for="additionalOutput">Additional Output
                                Information</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="additionalOutput" />

                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label class="col-form-label" for="remarks">Remark</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="remarks" />

                            </div>
                        </div> --}}

                        <div class="mb-3 row">
                            <label class="col-form-label" for="document">Attachment Document</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="document" type="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>

                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="col" style="text-align: right">
                            <a class="btn btn-falcon-default btn-sm" style="background-color: white; color:#047FC3"
                                href="/MD/activity">
                                <span class="fas fa-times-circle"></span>&nbsp;Cancel
                            </a>
                            <button class="btn btn-falcon-default btn-sm" style="background-color: #047FC3; color:white;"
                                type="submit" value="Save"
                                onclick="return confirm('Adakah anda mahu menyimpan data ini?')"><span
                                    class="fas fa-save"></span>&nbsp;Save
                            </button>
                        </div>

                        <input class="form-control" name="user_id" type="hidden" value="{{ $user->id }}" />
                    </div>
                </div>

            </form>

        </div>

    </div><br>

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

    <script>
        $(".output").keyup(function() {

            var checkAllInputFilled = true;
            jQuery.each($(".output"), function(key, val) {
                if (val.value == '') {
                    checkAllInputFilled = false;
                }
            });

            if (checkAllInputFilled) {
                let num1 = $('input[name="output"]').val();
                let num2 = $('input[name="weightage"]').val();
                let num3 = $('input[name="weightage_progress"]').val();
                let num4 = $('input[name="output_progress"]').val();


                // let result = (output / weightage) * weightage_progress;
                let result = [(num4 / num1) * num2];

                $('input[name="weightage_progress"]').val(result);
                $('input[name="weightage_progress"]').trigger('change');

            }

            // [(Output progress / Output Target) x Weightage]

            //    outputprogress/ output

            //     progressoutput / output * weightage
        });
    </script>
@endsection
