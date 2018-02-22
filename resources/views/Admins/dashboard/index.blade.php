@extends('admins.layouts.master')
@section('title',' Admin Dashboard')
@section('styles')
    <link rel="stylesheet" href="{{url('')}}/css/admin/admin.css">
    <!--  Material Dashboard CSS    -->
    <link href="{{url('')}}/css/admin/material-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" media="all" href="/css/admin/jvectorMap/jquery-jvectormap.css"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
            @include('Admins.partials._date_time')
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $ret['new_user'] }}</h3>

                        <p>New User This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $ret['total_employee'] }}</h3>

                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $ret['user'] }}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $ret['unique_visitor'] }}</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="fa fa-copy"></i>
                    </div>
                    <div class="card-content">
                        <?php
                        $path = getcwd();
                        $path = str_replace('\public','',$path);
                        ?>
                        <p class="category">Used Space</p>
                        <h3 class="title">{{ round((disk_total_space($path)/(1024*1024*1024)) - (disk_free_space("../")/(1024*1024*1024)),2) }}/{{ round((disk_total_space($path)/(1024*1024*1024)),2) }}
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-exclamation-triangle"></i>
                            <a href="#pablo">Get More Space...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Revenue</p>
                        <h3 class="title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Last 24 Hours
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Fixed Issues</p>
                        <h3 class="title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-git"></i> Tracked from Github
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="fa fa-smile-o"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Emoji</p>
                        <h3 class="title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="green">
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Daily Sign ups</h4>
                        <p class="category">
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sign ups.</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> updated 4 minutes ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Employees Stats</h4>
                        <p class="category">All employees on {{ date('t F,Y',time()) }}</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Country</th>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($ret['employees'] as $employee)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $employee->user()->name }}</td>
                                <td>{{ $employee->role()->display_name }}</td>
                                <td>{{ $employee->user()->profile() }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">

                    <div class="header">
                        <h4 class="title">Email Statistics</h4>
                        <p class="category">Last Campaign Performance</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Bounce
                                <i class="fa fa-circle text-warning"></i> Unsubscribe
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Users Behavior</h4>
                        <p class="category">24 Hours performance</p>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Click
                                <i class="fa fa-circle text-warning"></i> Click Second Time
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Updated 3 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visitors Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <div class="pad">
                                    <!-- Map will be created here -->
                                    <div id="map1" style="width: 100%;height: 100%;"></div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-4">
                                <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                    <div class="description-block margin-bottom">
                                        <div class="sparkbar pad" data-color="#fff" style="height: 50px;"></div>
                                        <h5 class="description-header">8390</h5>
                                        <span class="description-text">Visits</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block margin-bottom">
                                        <div class="sparkbar pad" data-color="#fff" style="height: 50px;"></div>
                                        <h5 class="description-header">30%</h5>
                                        <span class="description-text">Referrals</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block">
                                        <div class="sparkbar pad" data-color="#fff" style="height: 50px;"></div>
                                        <h5 class="description-header">70%</h5>
                                        <span class="description-text">Organic</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Browser Usage</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <div id="pie"></div>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">United States of America
                                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                            <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                            </li>
                            <li><a href="#">China
                                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <!--  Charts Plugin -->
    <script src="{{url('')}}/js/admin//chartist.min.js"></script>
    <script src="{{url('')}}/js/admin//perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('')}}/js/admin/bootstrap-notify.js"></script>
    <script src="{{url('')}}/js/admin/material-dashboard.js"></script>
    <script src="{{url('')}}/js/admin/demo.js"></script>
    <script src="{{url('')}}/js/admin/light-bootstrap-dashboard.js"></script>
    <script src="{{url('')}}/js/admin/light-dsh.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            demo.initDashboardPageCharts();
            emailst.initChartist();
        });
    </script>
    <script src="/js/admin/jvectorMap/jquery-jvectormap.js"></script>
    <script src="/js/admin/jvectorMap/jquery-mousewheel.js"></script>
    <script src="/js/admin/jvectorMap/jvectormap.js"></script>
    <script src="/js/admin/jvectorMap/abstract-element.js"></script>
    <script src="/js/admin/jvectorMap/abstract-canvas-element.js"></script>
    <script src="/js/admin/jvectorMap/abstract-shape-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-group-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-canvas-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-shape-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-path-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-circle-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-image-element.js"></script>
    <script src="/js/admin/jvectorMap/svg-text-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-group-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-canvas-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-shape-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-path-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-circle-element.js"></script>
    <script src="/js/admin/jvectorMap/vml-image-element.js"></script>
    <script src="/js/admin/jvectorMap/map-object.js"></script>
    <script src="/js/admin/jvectorMap/region.js"></script>
    <script src="/js/admin/jvectorMap/marker.js"></script>
    <script src="/js/admin/jvectorMap/vector-canvas.js"></script>
    <script src="/js/admin/jvectorMap/simple-scale.js"></script>
    <script src="/js/admin/jvectorMap/ordinal-scale.js"></script>
    <script src="/js/admin/jvectorMap/numeric-scale.js"></script>
    <script src="/js/admin/jvectorMap/color-scale.js"></script>
    <script src="/js/admin/jvectorMap/legend.js"></script>
    <script src="/js/admin/jvectorMap/data-series.js"></script>
    <script src="/js/admin/jvectorMap/proj.js"></script>
    <script src="/js/admin/jvectorMap/map.js"></script>
    <script src="/js/admin/jvectorMap/jquery-jvectormap-world-mill-en.js"></script>
    <script>

        jQuery(function(){
            var markers = [
                {latLng: [40.66, -73.56], name: 'New York City', style: {r: 8, fill: '#ddd'}},
                {latLng: [41.52, -87.37], name: 'Indiana', style: {r: 8, fill: '#ddd'}},
            ];
            var $ = jQuery;
            $('#map1').vectorMap({
                map: 'world_mill_en',
                panOnDrag: true,
                focusOn: {
                    x: 0.5,
                    y: 0.5,
                    scale: 1,
                    animate: true
                },
                series: {
                    regions: [{
                        scale: ['#C8EEFF', '#0071A4'],
                        normalizeFunction: 'polynomial',
                        values: {
                            "AF": 16.63,
                            "AL": 11.58,
                            "DZ": 158.97,
                            "AO": 85.81,
                            "AG": 1.1,
                            "AR": 351.02,
                            "AM": 8.83,
                            "AU": 1219.72,
                            "AT": 366.26,
                            "AZ": 52.17,
                            "BS": 7.54,
                            "BH": 21.73,
                            "BD": 105.4,
                            "BB": 3.96,
                            "BY": 52.89,
                            "BE": 461.33,
                            "BZ": 1.43,
                            "BJ": 6.49,
                            "BT": 1.4,
                            "BO": 19.18,
                            "BA": 16.2,
                            "BW": 12.5,
                            "BR": 2023.53,
                            "BN": 11.96,
                            "BG": 44.84,
                            "BF": 8.67,
                            "BI": 1.47,
                            "KH": 11.36,
                            "CM": 21.88,
                            "CA": 1563.66,
                            "CV": 1.57,
                            "CF": 2.11,
                            "TD": 7.59,
                            "CL": 199.18,
                            "CN": 5745.13,
                            "CO": 283.11,
                            "KM": 0.56,
                            "CD": 12.6,
                            "CG": 11.88,
                            "CR": 35.02,
                            "CI": 22.38,
                            "HR": 59.92,
                            "CY": 22.75,
                            "CZ": 195.23,
                            "DK": 304.56,
                            "DJ": 1.14,
                            "DM": 0.38,
                            "DO": 50.87,
                            "EC": 61.49,
                            "EG": 216.83,
                            "SV": 21.8,
                            "GQ": 14.55,
                            "ER": 2.25,
                            "EE": 19.22,
                            "ET": 30.94,
                            "FJ": 3.15,
                            "FI": 231.98,
                            "FR": 2555.44,
                            "GA": 12.56,
                            "GM": 1.04,
                            "GE": 11.23,
                            "DE": 3305.9,
                            "GH": 18.06,
                            "GR": 305.01,
                            "GD": 0.65,
                            "GT": 40.77,
                            "GN": 4.34,
                            "GW": 0.83,
                            "GY": 2.2,
                            "HT": 6.5,
                            "HN": 15.34,
                            "HK": 226.49,
                            "HU": 132.28,
                            "IS": 12.77,
                            "IN": 1430.02,
                            "ID": 695.06,
                            "IR": 337.9,
                            "IQ": 84.14,
                            "IE": 204.14,
                            "IL": 201.25,
                            "IT": 2036.69,
                            "JM": 13.74,
                            "JP": 5390.9,
                            "JO": 27.13,
                            "KZ": 129.76,
                            "KE": 32.42,
                            "KI": 0.15,
                            "KR": 986.26,
                            "KW": 117.32,
                            "KG": 4.44,
                            "LA": 6.34,
                            "LV": 23.39,
                            "LB": 39.15,
                            "LS": 1.8,
                            "LR": 0.98,
                            "LY": 77.91,
                            "LT": 35.73,
                            "LU": 52.43,
                            "MK": 9.58,
                            "MG": 8.33,
                            "MW": 5.04,
                            "MY": 218.95,
                            "MV": 1.43,
                            "ML": 9.08,
                            "MT": 7.8,
                            "MR": 3.49,
                            "MU": 9.43,
                            "MX": 1004.04,
                            "MD": 5.36,
                            "MN": 5.81,
                            "ME": 3.88,
                            "MA": 91.7,
                            "MZ": 10.21,
                            "MM": 35.65,
                            "NA": 11.45,
                            "NP": 15.11,
                            "NL": 770.31,
                            "NZ": 138,
                            "NI": 6.38,
                            "NE": 5.6,
                            "NG": 206.66,
                            "NO": 413.51,
                            "OM": 53.78,
                            "PK": 174.79,
                            "PA": 27.2,
                            "PG": 8.81,
                            "PY": 17.17,
                            "PE": 153.55,
                            "PH": 189.06,
                            "PL": 438.88,
                            "PT": 223.7,
                            "QA": 126.52,
                            "RO": 158.39,
                            "RU": 1476.91,
                            "RW": 5.69,
                            "WS": 0.55,
                            "ST": 0.19,
                            "SA": 434.44,
                            "SN": 12.66,
                            "RS": 38.92,
                            "SC": 0.92,
                            "SL": 1.9,
                            "SG": 217.38,
                            "SK": 86.26,
                            "SI": 46.44,
                            "SB": 0.67,
                            "ZA": 354.41,
                            "ES": 1374.78,
                            "LK": 48.24,
                            "KN": 0.56,
                            "LC": 1,
                            "VC": 0.58,
                            "SD": 65.93,
                            "SR": 3.3,
                            "SZ": 3.17,
                            "SE": 444.59,
                            "CH": 522.44,
                            "SY": 59.63,
                            "TW": 426.98,
                            "TJ": 5.58,
                            "TZ": 22.43,
                            "TH": 312.61,
                            "TL": 0.62,
                            "TG": 3.07,
                            "TO": 0.3,
                            "TT": 21.2,
                            "TN": 43.86,
                            "TR": 729.05,
                            "TM": 0,
                            "UG": 17.12,
                            "UA": 136.56,
                            "AE": 239.65,
                            "GB": 2258.57,
                            "US": 14624.18,
                            "UY": 40.71,
                            "UZ": 37.72,
                            "VU": 0.72,
                            "VE": 285.21,
                            "VN": 101.99,
                            "YE": 30.02,
                            "ZM": 15.69,
                            "ZW": 5.57
                        }
                    }]
                },
                markers: markers
            });
        })
    </script>
    <script src="/js/admin/piechart/jquery.rotapie.js"></script>
    <script>
        jQuery(function(){
            jQuery('#pie').rotapie({
                slices: [
                    { color: '#00a65a', percentage: 10 }, // If color not set, slice will be transparant.
                    { color: '#f39c12', percentage: 20 }, // Font color to render percentage defaults to 'color' but can be overriden by setting 'fontColor'.
                    { color: '#00c0ef', percentage: 20 },
                    { color: '#dd4b39', percentage: 35 },
                    { color: '#3c8dbc', percentage: 7 },
                    { color: '#d2d6de', percentage: 8 },
                ],
                sliceIndex: 0, // Start index selected slice.
                deltaAngle: 0.2, // The rotation angle in radians between frames, smaller number equals slower animation.
                minRadius: 100, // Radius of unselected slices, can be set to percentage of container width i.e. '50%'
                maxRadius: 110, // Radius of selected slice, can be set to percentage of container width i.e. '45%'
                minInnerRadius: 55, // Smallest radius inner circle when animated, set to 0 to disable inner circle, can be set to percentage of container width i.e. '35%'
                maxInnerRadius: 65, // Normal radius inner circle, set to 0 to disable inner circle, can be set to percentage of container width i.e. '30%'
                innerColor: '#fff', // Background color inner circle.
                minFontSize: 30, // Smallest fontsize percentage when animated, set to 0 to disable percentage display, can be set to percentage of container width i.e. '20%'
                maxFontSize: 40, // Normal fontsize percentage, set to 0 to disable percentage display, can be set to percentage of container width i.e. '10%'
                fontYOffset: 0, // Vertically offset the percentage display with this value, can be set to percentage of container width i.e. '-10%'
                fontFamily: 'Times New Roman', // FontFamily percentage display.
                fontWeight: 'bold', // FontWeight percentage display.
                decimalPoint: '.', // Can be set to comma or other symbol.
                clickable: true // If set to true a user can select a different slice by clicking on it.
            });
        });
    </script>
@endsection