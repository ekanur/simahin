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
                                            4
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="stats"> 
                                    Pada 2017
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
                                            79
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
                                            30
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
                                            17
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
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Mahasiswa 
                                        <i class="fa fa-circle text-danger"></i> Peneliti 
                                        <i class="fa fa-circle text-warning"></i> Guru
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-calendar-o"></i> Tahun Akademik 2015-2016
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
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Mahasiswa
                                        <i class="fa fa-circle text-danger"></i> Guru
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
                    <div id="mapDiagram"  style="height:450px;z-index: 9999"></div>
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
    <link href="{{url("/assets/css/flag-icon.css")}}" rel="stylesheet" />
    <link href="{{url("/assets/css/jquery-jvectormap-2.0.3.css")}}" rel="stylesheet" />
@stop

@section("js")
<script type="text/javascript" src="{{ url('/assets/js/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/jquery-jvectormap-world-mill.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/gdp-data.js') }}"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            // $.notify({
         //     icon: 'pe-7s-gift',
         //     message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

         //    },{
         //        type: 'info',
         //        timer: 4000
         //    });
            $('#mapDiagram').vectorMap({map: 'world_mill'});
        });
</script>

@stop