@extends('layouts.app')

@section('style')
    <style>
        .card-stats {
            background-color: #15294e;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="y">Home</a></li>
                        <li class="breadcrumb-item active">
                            <a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h5>Welcome back, {{ auth()->user()->name }}</h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <div class="d-flex align-items-center card-stats w-100 p-3 rounded">
                        <div>
                            <h5>Total Tickets</h5>
                            <p class="m-0">{{ $allCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center card-stats w-100 p-3 rounded">
                        <div>
                            <h5>Open Tickets</h5>
                            <p class="m-0">{{ $openCount }} <span
                                    class="text-muted">({{ $allCount ? number_format(($openCount / $allCount) * 100) : 0 }}%)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center card-stats w-100 p-3 rounded">
                        <div>
                            <h5>Closed Tickets</h5>
                            <p class="m-0">{{ $closedCount }} <span
                                    class="text-muted">({{ $allCount ? number_format(($closedCount / $allCount) * 100) : 0 }}%)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Tickets By Priority</h6>
                        </div>
                        <div class="card-body">
                            <div id="priority-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Tickets By Due Date</h6>
                        </div>
                        <div class="card-body">
                            <div id="due-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/bundle/apexcharts.bundle.js') }}"></script>
    <script>
        var options = {
            chart: {
                type: 'donut'
            },
            series: [{{ $priorityCount['low'] }}, {{ $priorityCount['medium'] }}, {{ $priorityCount['high'] }}],
            labels: ['Low', 'Medium', 'High'],
        };
        var chart = new ApexCharts(document.querySelector("#priority-chart"), options);
        chart.render();

        var options = {
            chart: {
                type: 'donut'
            },
            series: [{{ $dueCount['overdue'] }}, {{ $dueCount['today'] }}, {{ $dueCount['tomorrow'] }}, {{ $dueCount['nextWeek'] }}],
            labels: ['Overdue', 'Today', 'Tomorrow', 'Over 7 Days'],
        };
        var chart = new ApexCharts(document.querySelector("#due-chart"), options);
        chart.render();
    </script>
@endsection
