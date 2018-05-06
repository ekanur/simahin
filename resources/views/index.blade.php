@extends('layout')

@section("content")
	<div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>Tamu internasional baru</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="pe-7s-add-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="number">
                                            {{$tamu_baru}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="stats"> 
                                    Pada {{date("Y")}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>Total Tamu Internasional</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="pe-7s-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="number">
                                            {{$total_tamu}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="stats"> 
                                    Status Aktif
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>Berkas Expired</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="pe-7s-copy-file"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="number">
                                            {{$berkas_expired}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="stats"> 
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>Pembaruan Berkas</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="pe-7s-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="number">
                                            {{$pembaruan_berkas}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="stats"> 
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Jumlah Tamu Internasional</h4>
                                <p class="category">Berdasarkan Kegiatan</p>
                            </div>
                            <div class="content">
                                <div id="chartTamuBerdasarkanKegiatan" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                       
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-calendar-o"></i> Tahun Akademik {{date("Y")-1}} - {{date("Y")}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Jumlah Tamu Internasional Baru</h4>
                                <p class="category">2013-2017</p>
                            </div>
                            <div class="content">
                                <div id="chartTotalTamu" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle" style="color:#1DC7EA"></i> Mahasiswa
                                        <i class="fa fa-circle" style="color:#FB404B"></i> Guru
                                        <i class="fa fa-circle" style="color:#FFA534"></i> Peneliti
                                        <i class="fa fa-circle" style="color:#9368E9"></i> Magang
                                        <i class="fa fa-circle" style="color:#87CB16"></i> Lain-lain
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> 5 tahun terakhir
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Mahasiswa</h4>
                                <p class="category">2009 - 2016</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <!--<div class="legend"> -->
                                        <i class="fa fa-circle text-info"></i> Total
                                        <i class="fa fa-circle text-danger"></i> Mahasiswa Baru
                                        <i class="fa fa-circle text-warning"></i> Mahasiswa Lulus
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-users"></i> Total Mahasiswa 2016 : 526
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-12">
                    <div id="mapDiagram"  style="height:450px;z-index: 9999;width: 100%"></div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Persebaran Negara Asal Tamu Internasional</h4>
                            </div>
                            <div class="content">
                               
                            </div>
                        </div>
                    </div>


{{--                     <div class="col-md-6">
                    <div class="list-group card">
                        <div class="list-group-item header">
                            <h4 class="title">Notifikasi</h4>
                                <p class="category">Aspek Legal Mahasiswa Internasional</p>
                        </div>
                       
                            <a href="" type="button" class="list-group-item">Visa David Beckham akan habis kurang dari 2 bulan</a>
                            <a href="" type="button" class="list-group-item list-group-item-danger">Masa Aktif Ijin Belajar Adam Levine telah habis</a>
                            <a href="" type="button" class="list-group-item">Masa Aktif Ijin Belajar Luis Suarez akan habis kurang dari 2 bulan</a>
                            <a href="" type="button" class="list-group-item">Masa Aktif Visa Selena Gomez akan habis kurang dari 2 bulan</a>
                            <a href="" type="button" class="list-group-item  list-group-item-danger">Ijin Belajar Kim Jong-Un telah habis</a>
                            
                        <div class="list-group-item footer text-center">
                        
                                    <div class="stats">
                                        <a href="" class="">Lihat Semua</a>
                                    </div>
                        </div>
                       
                    </div>
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifikasi</h4>
                                <p class="category">Aspek Legal Mahasiswa Internasional</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Visa David Beckham akan habis kurang dari 2 bulan
                                        </li>
                                        <li class="list-group-item">
                                            Visa David Beckham akan habis kurang dari 2 bulan
                                        </li>
                                        <li class="list-group-item">
                                            Visa David Beckham akan habis kurang dari 2 bulan
                                        </li>
                                        <li class="list-group-item">
                                            Visa David Beckham akan habis kurang dari 2 bulan
                                        </li>
                                        <li class="list-group-item">
                                            Visa David Beckham akan habis kurang dari 2 bulan
                                        </li>
                                    </ul>
                                </div>

                                <div class="footer text-center">
                                    <hr>
                                    <div class="stats">
                                        <a href="" class="">Lihat Semua</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

@stop

@section("css")
    {{-- <link href="{{url("/assets/css/flag-icon.css")}}" rel="stylesheet" /> --}}
    <link href="{{url("/assets/css/jquery-jvectormap-2.0.3.css")}}" rel="stylesheet" />
@stop

@section("js")
<script type="text/javascript" src="{{ url('/assets/js/chartist-plugin-pointlabels.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/jquery-jvectormap-world-mill.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/gdp-data.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    fetch("{{ url('/api/tamu_internasional/kegiatan') }}").then(
        function(response){
            return response.json();
        }
        ).then(function(result){
            var total_tamu = [];
            var label = [];
            $.each(result, function(key, value){
                    label.push(key+": "+value);
                    total_tamu.push(value);
                });
            var data = {
                labels :label,
                series : total_tamu
            };

            console.log(data);

            var options = {
              labelInterpolationFnc: function(value) {
                return value
              }
            };

            var responsiveOptions = [
              ['screen and (min-width: 640px)', {
                chartPadding: 5,
                labelOffset: 0,
                labelDirection: 'explode',
                labelInterpolationFnc: function(value) {
                  return value;
                }
              }],
              ['screen and (min-width: 1024px)', {
                labelOffset: 0,
                chartPadding: 5
              }]
            ];

           var Chart = new Chartist.Pie('#chartTamuBerdasarkanKegiatan', data, options, responsiveOptions);
        });

    fetch("{{ url('/api/tamu_internasional/baru') }}").then(
            function(response){
                return response.json();
            }    
        ).then(
            function(ids){
                            // console.log(Object.keys(ids[0]));
                var statistic =[];
                 $.each(ids[0], function(key, value){
                    statistic.push({ name:key, data:value}); 
                });

                            
                var data = {
                        // labels : Object.keys(ids[Object.keys(ids)[0]])[0],
                        labels : [@for ($i = intval(date("Y")-4); $i <= date("Y") ; $i++)
                            {{$i}}
                            @if ($i != date("Y"))
                                ,
                            @endif
                            
                        @endfor],
                        // series : ids.map(function(x){
                        //     var y=[];
                        //     var i = 0;
                        //     for(var property in x){
                        //         if(x.hasOwnProperty(property)){
                        //             y[i++] = x[property];
                        //         }
                        //     }

                        //     return y;
                        // })[0],
                        series : statistic 
                };

                // console.log(data.series);

                var options = {
                  lineSmooth: true,
                  showArea: false,
                  height: "285px",
                  axisX: {
                    showGrid: true,
                  },
                  showLine: true,
                  fullWidth:true,
                  chartPadding: {right: 40,top: 50},
                  showPoint: true,
                  plugins : [Chartist.plugins.ctPointLabels({
                    textAnchor: 'middle'
                  })]
                };
                
                // var responsive = [
                //   ['screen and (max-width: 640px)', {
                //     axisX: {
                //       labelInterpolationFnc: function (value) {
                //         return value[0];
                //       }
                //     }
                //   }]
                // ];

                var Chart = new Chartist.Line('#chartTotalTamu', data, options);               
            }
        );
        $(document).ready(function(){
            google.charts.load('current', {'packages':['geochart']});
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap(){
                var data = google.visualization.arrayToDataTable([
                        ["Negara", "Total"],
                        @foreach($per_negara as $total_per_negara)
                        ['{{ $total_per_negara['singkatan'] }}', {{ $total_per_negara["total"] }}],
                        @endforeach
                    ]);

                var options = {};
                var chart = new google.visualization.GeoChart(document.getElementById("mapDiagram"));

                chart.draw(data, options);
            }
            // $('#mapDiagram').vectorMap({map: 'world_mill'});
        });
</script>

@stop