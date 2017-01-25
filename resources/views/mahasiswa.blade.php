@extends("layout")

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
                                <h4 class="title">Data Mahasiswa Asing <a href="{{ url('/mahasiswa/tambah') }}" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i>Mahasiswa Baru</a></h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No.</th>
                                    	<th>Name</th>
                                    	<th>NIM</th>
                                    	<th>Jurusan/Fakultas</th>
                                    	<th>Negara Asal</th>
                                    	<th>Visa</th>
                                    	<th>Ijin Belajar</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @if(is_null($mahasiswa))
                                    <tr>
                                        <td colspan="8"><strong class="help-text">Data tidak tersedia</strong></td>
                                    </tr>
                                    @else
                                    
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($mahasiswa as $mhs)
                                   <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$mhs->nama_depan}} {{$mhs->nama_belakang}}</td>
                                            <td>{{$mhs->nim}}</td>
                                            <td>Sastra Indonesia/Fakultas Sastra</td>
                                            <td>{{$mhs->negara->nama}}</td>
                                            <td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                            <td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                            <td><a href="{{ url('/mahasiswa/detail') }}/{{$mhs->id}}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/hapus') }}/{{$mhs->id}}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                    </tr> 
                                    @endforeach
                                    @endif   
                                        {{--  <tr class="danger">
                                        	<td>2</td>
                                        	<td>Dakota Rice</td>
                                        	<td>1011345849535</td>
                                        	<td>Sastra Indonesia/Fakultas Sastra</td>
                                        	<td>Prancis</td>
                                        	<td><span class="label label-danger"><i class="fa fa-ban"></i></span></td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><a href="{{ url('/mahasiswa/detail') }}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/detail') }}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>3</td>
                                        	<td>Dakota Rice</td>
                                        	<td>1011345849535</td>
                                        	<td>Sastra Indonesia/Fakultas Sastra</td>
                                        	<td>Prancis</td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><a href="{{ url('/mahasiswa/detail') }}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/detail') }}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        <tr class="warning">
                                        	<td>4</td>
                                        	<td>Dakota Rice</td>
                                        	<td>1011345849535</td>
                                        	<td>Sastra Indonesia/Fakultas Sastra</td>
                                        	<td>Prancis</td>
                                        	<td><span class="label label-warning"><i class="fa fa-exclamation"></i></span></td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><a href="{{ url('/mahasiswa/detail') }}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/detail') }}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                        </tr> 
                                        <tr class="danger">
                                        	<td>5</td>
                                        	<td>Dakota Rice</td>
                                        	<td>1011345849535</td>
                                        	<td>Sastra Indonesia/Fakultas Sastra</td>
                                        	<td>Prancis</td>
                                        	<td><span class="label label-warning"><i class="fa fa-exclamation"></i></span></td>
                                        	<td><span class="label label-danger"><i class="fa fa-ban"></i></span></td>
                                        	<td><a href="{{ url('/mahasiswa/detail') }}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/detail') }}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                        </tr> 
                                        <tr>
                                        	<td>6</td>
                                        	<td>Dakota Rice</td>
                                        	<td>1011345849535</td>
                                        	<td>Sastra Indonesia/Fakultas Sastra</td>
                                        	<td>Prancis</td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><span class="label label-success"><i class="fa fa-check"></i></span></td>
                                        	<td><a href="{{ url('/mahasiswa/detail') }}" class="btn btn-info btn-simple btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/mahasiswa/detail') }}" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                                        </tr> --}}
                                        
                                    </tbody>
                                    <tfoot><tr><td colspan="8">
                                    	<strong>Legend </strong><br/>
                                    	<br/>[ <span class="label label-success"><i class="fa fa-check"></i></span> : Masih Berlaku
                                    	 ]  [ <span class="label label-warning"><i class="fa fa-exclamation"></i></span> : Berakhir kurang dari 2 bulan ] [ <span class="label label-danger"><i class="fa fa-ban"></i></span> : Expired ]
                                    </td></tr></tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop