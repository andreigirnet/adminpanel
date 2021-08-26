@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Dashboard</h2>
           <p>Hello:  {{auth()->user()->name}}</p>

        </div>
    </div>
    <div class="row bg-white">
        <div class="col-12 show_cart_1">
            <div id="barchart_values" style="width: 900px; height: 300px;"></div>
        </div>
    </div>

@endsection

@push('footer')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            @foreach($users as $user)
            ["{{$user->name}}", {{$user->posts->count()}}, "{{Helper::getHexColor()}}"],

                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
        { calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation" },
            2]);

            var options = {
            title: "Nr of posts per user",
            width: 600,
            height: 300,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
            chart.draw(view, options);
        }
    </script>

@endpush
