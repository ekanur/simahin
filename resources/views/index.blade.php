@extends('layout')

@section("content")
	<div class="container-fluid">
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

@section("js")

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

        });
</script>

@stop