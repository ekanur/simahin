@extends("layout")

@section("css")
<link rel="stylesheet" href="{{url("/assets/css/dataTables.bootstrap.min.css")}}">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> --}}
@endsection

@section("content")
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    @if(Session::has('flash_message'))
                                                <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                                                    {{ Session::get('flash_message') }}
                                                </div>
                                @endif
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Tamu Internasional <a href="{{ url('/tamu_internasional/tambah') }}" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i>Baru</a></h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="tamu_internasionalTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Kegiatan</th>
                                            <th>Jurusan/Fakultas</th>
                                            <th>Negara Asal</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @if(!isset($tamu_internasional))
                                    <tr>
                                        <td colspan="8"><strong class="help-text">Data tidak tersedia</strong></td>
                                    </tr>
                                    @else
                                    
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($tamu_internasional as $data_tamu_internasional)
                                   <tr class="{{ (sizeof($data_tamu_internasional->dokumen)>0 && $dokumen_status[$data_tamu_internasional->id] == 0)? "": "danger" }}">
                                            <td>{{$i++}}</td>
                                            <td>{{$data_tamu_internasional->nama_depan}} {{$data_tamu_internasional->nama_belakang}}</td>
                                            <td>{{$data_tamu_internasional->tipe_kegiatan->nama}}</td>
                                            <td>{{$data_tamu_internasional->jurusan->nama}}/{{$data_tamu_internasional->jurusan->fakultas->fak_skt}}</td>
                                            <td>{{$data_tamu_internasional->negara->nama}}</td>
                                            {{-- <td>
                                                @if(sizeof($data_tamu_internasional->dokumen)>0 && $dokumen_status[$data_tamu_internasional->id] == 0)
                                                <span class="label label-success"><i class="fa fa-check"></i></span>
                                                @else
                                                <span class="label label-danger"><i class="fa fa-info"></i></span>
                                                @endif
                                            </td> --}}
                                            <td><a href="{{ url('/tamu_internasional/edit') }}/{{$data_tamu_internasional->id}}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#confirmDelete" data-name="{{$data_tamu_internasional->nama_depan}} {{$data_tamu_internasional->nama_belakang}}"><i class="fa fa-times"></i></a></td>
                                    </tr> 
                                    @endforeach
                                    @endif   
                                       
                                    </tbody>
                                    {{-- <tfoot><tr><td colspan="8">
                                    	<strong>Legend </strong><br/>
                                    	<br/><span class="label label-danger">&nbsp;</span> : Berkas Expired, berkas belum lengkap
                                    </td></tr></tfoot> --}}
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
@endsection

@if(isset($data_tamu_internasional))
@section("modal")
<div id="confirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Tamu Internasional</h4>
            </div>
            <div class="modal-body">
                Anda yakin akan menghapus data tamu <strong id="#nama"></strong> ?
                    
            </div>
            <div class="modal-footer">
                <a href=""  class="btn btn-secondary waves-effect" data-dismiss="modal">Tidak</a>
                <a href="{{ url('/tamu_internasional/hapus') }}/{{$data_tamu_internasional->id}}" class="btn btn-success waves-effect waves-light">Ya</a>
            </div>
    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>  
@endsection
@endif

@section("js")
    <script type="text/javascript" src="{{ url('/assets/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#tamu_internasionalTable").DataTable();
    });
</script>
@endsection