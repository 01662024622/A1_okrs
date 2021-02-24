@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">
    <link rel="stylesheet" href="{{asset('/css/okrs/key.css')}}">
    <link rel="stylesheet" href="{{asset('/css/okrs/index.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/rowGroup.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-6">
            <canvas id="myChart"></canvas>
        </div>

    </div>
@endsection

@section('js')
    {{--    <script src="{{ asset('js/okrs/key.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/okrs/keyv2.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/okrs/key.js') }}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                datasets: [{
                    label: 'Line Dataset',
                    data: [1, 2, 3, 2],
                    yAxisID: 'B',
                    type: 'line',
                    borderColor: "rgb(237, 142, 7)",
                    order: 0,
                },{
                    label: 'Bar Dataset',
                    yAxisID: 'A',
                    data: [100, 100, 100, 100],
                    backgroundColor: '#000066',
                    order: 1
                }],
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        id: 'A',
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }, {
                        id: 'B',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            suggestedMin: 0,
                        }
                    }]
                },
                onClick: function (evt, item) {
                    console.log('legend onClick', evt);
                    console.log('legd item', item);
                }
            }
        });
    </script>
@endsection
