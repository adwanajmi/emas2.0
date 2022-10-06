@extends('base-mpb')
@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            @can('Approver')
                <H2>DISPLAY INFORMATION BASED ON STATUS</H2>
            @else
                <H2>DISPLAY INFORMATION OF THRUST</H2>
            @endcan

        </div>

        <div class="card-body">
            <div class="table-responsive scrollbar">
                <table class="table mb-0" style="width: 400%" value="null" id="example">
                    <thead class="text-black bg-200">
                        <tr style="text-align: center">
                            <th class="align-middle" rowspan=2>No.</th>
                            <th class="align-middle" rowspan=2>Thrust</th>
                            <th class="align-middle" rowspan=2>National Initiative </th>
                            <th class="align-middle" rowspan=2>Key Activities</th>
                            <th class="align-middle" rowspan=2>Sub-Key Activities</th>
                            <th class="align-middle" rowspan=2>KPI</th>
                            <th class="align-middle" colspan=4>Milestone </th>
                            <th class="align-middle" rowspan=2>Actual Mark (%)</th>
                            <th class="align-middle" rowspan=2>Target Mark (%)</th>
                            <th class="align-middle" rowspan=2>Achievement (%)</th>
                            <th class="align-middle" rowspan=2>Remark </th>
                            <th class="align-middle" rowspan=2>Status </th>


                        </tr>
                        <tr style="text-align: center">
                            <td>Q1</td>
                            <td>Q2 </td>
                            <td>Q3</td>
                            <td>Q4</td>
                        </tr>
                    </thead>


                    <tbody class="list myTable" id="searchUpdateTable">
                        @foreach ($miles as $thrust)
                            <tr class="thrust" style="text-align: center">
                                <td class="align-middle">{{ $loop->iteration }}.</td>
                                <td class="align-middle">{{ $thrust->thrust->namaThrust }}</td>
                                <td class="align-middle">{{ $thrust->national->namaNational ?? '' }}</td>
                                <td class="align-middle">{{ $thrust->key->namaKey ?? '' }}</td>
                                <td class="align-middle">{{ $thrust->sub->namaSub ?? '' }}</td>
                                <td class="align-middle">{{ $thrust->kpi->namaKpi ?? '' }}</td>
                                <td class="align-middle">{{ $thrust->quarter }}</td>
                                <td class="align-middle">{{ $thrust->q2 }}</td>
                                <td class="align-middle">{{ $thrust->q3 }}</td>
                                <td class="align-middle">{{ $thrust->q4 }}</td>
                                <td class="align-middle">{{ $thrust->actual_mark }}</td>
                                <td class="align-middle">{{ $thrust->targetMark }}</td>
                                <td class="align-middle">{{ $thrust->achievement }}</td>
                                <td class="align-middle">{{ $thrust->remark }}</td>

                                @can('Approver')
                                    <td class="align-middle">
                                        <div class="col-auto ms-auto">
                                            @if ($thrust->lulus == 1 && $thrust->ditolak == 0)
                                                <span class="btn btn-primary" disabled>Approved</span>
                                            @elseif ($thrust->lulus == 0 && $thrust->ditolak == 1)
                                                <span class="btn btn-danger" disabled>Rejected</span>
                                            @else
                                                <form action="/thrust/lulus/{{ $thrust->id }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                </form>
                                                <form action="/thrust/ditolak/{{ $thrust->id }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                @else
                                    <td class="align-middle">
                                        <div class="col-auto ms-auto">
                                            @if ($thrust->lulus == 1 && $thrust->ditolak == 0)
                                                <span class="btn btn-primary" disabled>Approved</span>
                                            @elseif ($thrust->lulus == 0 && $thrust->ditolak == 1)
                                                <span class="btn btn-danger" disabled>Rejected</span>
                                            @else
                                                <span class="btn btn-info" disabled>In Progress</span>
                                            @endif
                                        </div>
                                    </td>
                                @endcan


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]


            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "dom": 'lBfrtip',
                "buttons": [{
                    extend: 'collection',
                    text: 'Print Option',
                    collectionLayout: 'rcoi-dt-pdf-button-group-hack',
                    autoClose: true,
                    buttons: [{
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            orientation: 'landscape',
                            title: 'Information of Thrust',
                            exportOptions: {
                                columns: ':visible',
                                orthogonal: 'print'
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            orientation: 'landscape',
                            title: 'Information of Thrust',
                            exportOptions: {
                                columns: ':visible',
                                orthogonal: 'print'
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            orientation: 'landscape',
                            title: 'Information of Thrust',
                            exportOptions: {
                                columns: ':visible',
                                orthogonal: 'print'
                            }
                        },


                    ]
                }]
            });
        });
    </script>
@endsection
