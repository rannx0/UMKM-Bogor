@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h2 class="h3 my-3">Dashboard</h2>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-5 col-lg-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total User</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalUsers) }}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total UMKM</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalUsaha) }}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Admin</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalAdmins) }}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
        </div> <!-- end row -->
    </div> <!-- end col -->
    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Projections Vs Actuals</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </div>

                <div dir="ltr">
                    <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            chart: {
                type: 'bar', // atau line, pie, dll sesuai kebutuhan
                height: 350
            },
            series: [{
                name: 'Sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            colors: ['#727cf5', '#e3eaef']
        };
        
        var chart = new ApexCharts(document.querySelector("#high-performing-product"), options);
        chart.render();
    });
</script>

@endsection