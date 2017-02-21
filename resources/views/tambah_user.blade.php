@extends("layout")

@section("content")
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                    @if(sizeof($errors)>0)
                          <div class="header"><strong class="text-danger">Terjadi kesalahan :</strong></div>
                            <div class="content">
                            <ul class="alert alert-danger list-unstyled">
                              @foreach($errors->all() as $message)
                                <li>{{$message}}</li>
                              @endforeach
                            </ul>
                            </div>
                        @endif
                        @if(null !== session("flash_message"))
                          <div class="alert alert-info">
                                    <span>{{session('flash_message')}}</span>
                          </div>
                        @endif
                      <ul class="nav nav-pills nav-justified thumbnail" id="myTab">
                        <li>
                          <a href="#biodata" role="tab" data-toggle="tab">
                            <h4 class="list-group-item-heading">Biodata</h4>
                            <small class="list-group-item-text">Berisi data profil, alamat, dan telepon</small>
                          </a>
                        </li>
                        <li>
                          <a href="#berkas"  role="tab" data-toggle="tab">
                            <h4 class="list-group-item-heading">Berkas Legalitas</h4>
                            <small class="list-group-item-text">Upload scan berkas legalitas</small>
                          </a>
                        </li>
                      </ul>
                       

                      <div class="tab-content">
                        <div class="tab-pane active" id="biodata">
                          <div class="card">

                           {{--  @if(sizeof($errors)>0)
                            <div class="header"><strong class="text-danger">Terjadi kesalahan :</strong></div>
                            <div class="content">
                            <ul class="alert alert-danger list-unstyled">
                              @foreach($errors->all() as $message)
                                <li>{{$message}}</li>
                              @endforeach
                            </ul>
                            </div>
                            @endif

                            @if(session("flash_message"))
                            <span class="alert alert-default">{{session('flash_message')}}</span>
                            @endif --}}
                            <div class="header">
                              @if(isset($user))
                                <h4 class="title">Edit User</h4>
                              @else
                                <h4 class="title">User Baru</h4>
                              @endif
                            </div>
                            <div class="content">
                                {!! Form::open(array("url" => "/user/tambah", 'class'=>'', 'id'=>'tambah_user', 'role'=>'form', 'files'=>true))!!}
                                <input type="hidden" name="id" value="{{(isset($user))? $user->id: null}}">
                                <input type="hidden" name="foto_lama" value="{{(isset($user))? $user->foto: null}}">
                                <input type="hidden" name="step" value="biodata">
                                    {{-- <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="michael23">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="author center-block text-center">
                                            <div class="upload_container" style="">
                                              <input type="file" name="foto" style="" onchange="readUrl(this)">
                                            </div>
                                           
                                               
                                              
                                              <img class="avatar border-gray" src="{{ (isset($user->foto))? url('uploads/user/')."/".$user->foto : url('uploads/user/default.jpeg') }}" alt="{{ (isset($user))? $user->nama_depan." ".$user->nama_belakang : "Pilih file foto profil" }}">
                                              
                                              <h6 class="title text-center" style="margin-top: 10px">Upload foto</h6>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Depan <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{{(isset($user->nama_depan))? $user->nama_depan : old('nama_depan')}}" >
                                            </div>
                                            <div class="form-group">
                                            <label>Nama Belakang <span class="text-danger">*</span></label>
                                                <input name="nama_belakang" type="text" class="form-control" placeholder="Nama Belakang" value="{{(isset($user->nama_belakang))? $user->nama_belakang : old('nama_belakang')}}" >
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                          
                                            <div class="form-group">
                                                <label>Jenis Kegiatan <span class="text-danger">*</span></label>
                                                <select name="tipe_user" id="" class="form-control">
                                                @if (isset($user->tipe))
                                                  @foreach($tipe_user as $jenis_kegiatan)
                                                    <option value="{{$jenis_kegiatan->id}}" {{($user->tipe == $jenis_kegiatan->id)? 'selected' : null}}>{{$jenis_kegiatan->nama}}</option>
                                                  @endforeach
                                                @else
                                                  @foreach($tipe_user as $jenis_kegiatan)
                                                    <option value="{{$jenis_kegiatan->id}}">{{$jenis_kegiatan->nama}}</option>
                                                  @endforeach
                                                @endif
                                                  
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="negara">Negara Asal <span class="text-danger">*</span></label>
                                          <input type="hidden" name="negara_id" value="{{(isset($user->negara_id))? $user->negara_id : old('negara_id')}}">
                                          <input type="text" class="form-control" name="negara" id="negara" placeholder="Negara Asal" autocomplete="off" value="{{(isset($user->negara->nama))? $user->negara->nama : old('negara')}}">
                                        </div>
                                        </div>
                                    </div>
                              
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NIM</label>
                                                <input name="nim" type="text" class="form-control" placeholder="NIM" value="" >
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fakultas <span class="text-danger">*</span></label>
                                                <select name="fakultas_id" id="fakultas" class="form-control">
                                                @if(!isset($user))
                                                 @foreach($fakultas as $data_fakultas)
                                                    <option value="{{$data_fakultas->id}}">{{$data_fakultas->fak_nm}}</option>
                                                  @endforeach
                                                @else
                                                  @foreach($fakultas as $data_fakultas)
                                                    <option value="{{$data_fakultas->id}}" {{($data_fakultas->id == $user->fakultas->id)? 'selected' :''}}>{{$data_fakultas->fak_nm}}</option>
                                                  @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jurusan <span class="text-danger">*</span></label>
                                                <select name="jurusan_id" id="jurusan" class="form-control">
                                                @if(isset($user))

                                                <option value="{{$user->jurusan->id}}" id="help_jurusan">{{$user->jurusan->nama}}</option>
                                                @else
                                                @endif
                                                  <option value="" id="help_jurusan">Pilih Fakultas dahulu</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Negara Asal</label>
                                                <input type="hidden" name="negara_id" value="96">
                                                <input type="text" class="form-control" placeholder="Negara Asal" value="Brunei Darussalam"  name="negara">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div> --}}
                                    </div>
                            </div>
                            <div class="header">
                              <h4>Kontak</h4>
                            </div>
                            <div class="content">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telp">No. Telp</label>
                                    <input type="text" name="telp" class="form-control" placeholder="+62 " value="{{(isset($user->telp))? $user->telp : old('telp')}}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telp">Email <span class="text-danger">*</span></label>
                                    <input type="mail" name="email" class="form-control" placeholder="Alamat Email" value="{{(isset($user->email))? $user->email : old('email')}}">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="alamat_malang">Alamat di Malang <span class="text-danger">*</span></label>
                                    <textarea name="alamat_malang" id="alamat_malang" cols="30" rows="10" class="form-control">{{(isset($user->alamat_malang))? $user->alamat_malang : old('alamat_malang')}}</textarea>
                                    <p class="help-block">Simpan data lalu upload berkas legalitas</p>
                                  </div>
                                </div>
                              </div>
                              
                            </div>

                        <div class="content">
                          <div class="row">
                            <div class="col-md-12">
                            <span class="text-danger">*</span> Wajib diisi
                              <button type="submit" class="btn btn-info btn-fill pull-right" >Simpan</button>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                            
                          </div>
                        </div>
                         
                        </div>
                        </div>
                        <div class="tab-pane" id="berkas">

                        @if(isset($user))
                        @if(sizeof($dokumen) > 0)
                        {!! Form::open(array("url" => "/user/update_berkas", 'class'=>'', 'id'=>'berkas_legalitas', 'role'=>'form', 'files'=>true))!!}
                          <input type="hidden" name="step" value="update_berkas">
                          {{-- @if(isset($user->dokumen)) --}}
                          {{-- untuk menghapus file lama --}}
                            @foreach($dokumen as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value['scan_file'] }}">
                            @endforeach
                          {{-- @endif --}}
                         
                        @else
                          {!! Form::open(array("url" => "/user/simpan_berkas", 'class'=>'', 'id'=>'berkas_legalitas', 'role'=>'form', 'files'=>true))!!} 
                          <input type="hidden" name="step" value="upload_berkas">
                        @endif
                          <input type="hidden" name="tipe_user" value="{{ $user->tipe }}">
                          <input type="hidden" name="user_id" value="{{$user->id}}">
                        @endif
                        
                       

                          <div class="card">
                            <div class="header visa">
                                <h4 class="title">1. Visa <span class="pull-right">
                                  @if(isset($dokumen['visa']['scan_file']))
                                    <small style="display: inline-block; padding-top: 5px ;width: 100%">  
                                                <a class="text-muted" href="{{ url('/uploads/berkas') }}/{{$dokumen['visa']['scan_file']}}"  target="_blank"><i class="fa fa-download"></i></a>
                                    </small>
                                  @endif
                                </span></h4>
                            </div>
                            <div class="content visa">
                                    <div class="row">
                                       
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">File Visa</label>
                                                <input type="file" name="visa" class="form-control">
                                                
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" name="expired_visa" class="form-control" value="{{ (isset($dokumen['visa']['expired_on']))? $dokumen['visa']['expired_on']:old('expired_visa') }}">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <hr>
                        
                        <div class="header stm">
                                <h4 class="title">2. Surat Tanda Melapor (STM) <span class="pull-right">
                                  @if(isset($dokumen['stm']['scan_file']))
                                    <small style="display: inline-block; padding-top: 5px ;width: 100%">  
                                                <a class="text-muted" href="{{ url('/uploads/berkas') }}/{{$dokumen['stm']['scan_file']}}"  target="_blank"><i class="fa fa-download"></i></a>
                                    </small>
                                  @endif
                                </span></h4>
                        </div>
                        <div class="content stm">
                                    <div class="row">
                                       
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">File Surat Tanda Melapor</label>
                                                <input type="file" name="stm" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" name="expired_stm" class="form-control" value="{{ (isset($dokumen['stm']['expired_on']))? $dokumen['stm']['expired_on']:old('expired_visa') }}">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                        </div>
                        <hr>
                        <div class="header sktt">
                                <h4 class="title">3. Surat Keterangan Tempat Tinggal (SKTT) <span class="pull-right">
                                  @if(isset($dokumen['sktt']['scan_file']))
                                    <small style="display: inline-block; padding-top: 5px ;width: 100%">  
                                                <a class="text-muted" href="{{ url('/uploads/berkas') }}/{{$dokumen['sktt']['scan_file']}}"  target="_blank"><i class="fa fa-download"></i></a>
                                    </small>
                                  @endif
                                </span></h4>
                        </div>
                        <div class="content sktt">
                                    <div class="row">
                                       
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">File SKTT</label>
                                                <input type="file" name="sktt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" name="expired_sktt" class="form-control" value="{{ (isset($dokumen['sktt']['expired_on']))? $dokumen['sktt']['expired_on']:old('expired_visa') }}">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                        </div>
                        <hr>
                        @if(isset($user))
                          @if($user->tipe == 2)
                        <div class="header imta">
                                <h4 class="title">4. Ijin Menggunakan Tenaga Asing (IMTA) <small>Bagi Guru Internasional</small><span class="pull-right">
                                  @if(isset($dokumen['imta']['scan_file']))
                                    <small style="display: inline-block; padding-top: 5px ;width: 100%">  
                                                <a class="text-muted" href="{{ url('/uploads/berkas') }}/{{$dokumen['imta']['scan_file']}}"  target="_blank"><i class="fa fa-download"></i></a>
                                    </small>
                                  @endif
                                </span></h4>
                        </div>
                        <div class="content imta">
                                    <div class="row">
                                       
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">File IMTA</label>
                                                <input type="file" name="imta" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" name="expired_imta" class="form-control" value="{{ (isset($dokumen['imta']['expired_on']))? $dokumen['imta']['expired_on']:old('expired_visa') }}">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                        </div>
                        <hr>

                          @elseif($user->tipe == 1)
                        <div class="header ijin_belajar">
                                <h4 class="title">4. Ijin Belajar <small>Bagi Mahasiswa Internasional</small><span class="pull-right">
                                  @if(isset($dokumen['ijin_belajar']['scan_file']))
                                    <small style="display: inline-block; padding-top: 5px ;width: 100%">  
                                                <a class="text-muted" href="{{ url('/uploads/berkas') }}/{{$dokumen['ijin_belajar']['scan_file']}}"  target="_blank"><i class="fa fa-download"></i></a>
                                    </small>
                                  @endif
                                </span></h4>
                        </div>
                        <div class="content ijin_belajar">
                                    <div class="row">
                                       
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">File Ijin Belajar</label>
                                                <input type="file" name="ijin_belajar" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="date" name="expired_ijin_belajar" class="form-control" value="{{ (isset($dokumen['ijin_belajar']['expired_on']))? $dokumen['ijin_belajar']['expired_on']:old('expired_visa') }}">
                                            </div>
                                        </div>
                                    </div>


                                    
                        </div>
                        <hr>
                          @endif
                        @endif
                        <div class="content">
                          <div class="row">
                            <div class="col-md-12">
                            <span>Tipe File: .jpg, .jpeg, .png | Max size : 2MB</span>
                              <button type="submit" class="btn  {{(isset($user))? "btn-info" : "btn-default"}} btn-fill pull-right" {{(isset($user))? null : "disabled='true'"}} >{{(isset($user))? "Upload" : "Simpan profil dahulu"}}</button>
                                    <div class="clearfix"></div>
                                
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      {!! Form::close() !!} 
                        </div>
                      </div>
                        
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                 <input type="file" name="foto" style="height:120px;position: absolute;
    width: 130px;
    padding: 5px;
    cursor: pointer; z-index:1000;top:55px;margin-left:80px;opacity:0.00001">
                                     <a href="#">
                                    <img class="avatar border-gray" src="{{ url('/assets/img/faces/face-3.jpg') }}" alt="..."/>
                                   
                                      <h4 class="title">Mike Andrew<br />
                                         <small>11033455322</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center">
                                Fakultas Sastra <br/> Jurusan Sastra Indonesia<br/>Prancis
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple btn-success">Visa <i class="fa fa-check"></i></button>
                                <button href="#" class="btn btn-simple btn-warning">Ijin Belajar <i class="fa fa-exclamation"></i></button>
                                

                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
@stop

@section("css")
<link rel="stylesheet" href="{{ url('/assets/css/easy-autocomplete.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/css/easy-autocomplete.themes.min.css') }}">
@stop

@section("js")
<script type="text/javascript" src="{{ url('/assets/js/jquery.easy-autocomplete.min.js') }}"></script>
<script type="text/javascript">
@if(isset($user))
@if(sizeof($user->dokumen) > 0)
  @foreach ($user->dokumen as $dokumen)
    @if($dokumen->expired_on < date("Y-m-d"))
    $(".{{ strtolower($dokumen->kategori_dokumen->singkatan) }}").addClass("bg-danger");
    @else
    $(".{{ strtolower($dokumen->kategori_dokumen->singkatan) }}").addClass("bg-success");
    @endif
  @endforeach
@endif()
@endif()
  function readUrl(input){
    if(input.files  && input.files[0]){
      var reader = new FileReader();

      reader.onload = function(e){
        $("img.avatar").attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

$("#fakultas").change(function(){
  var fak_id = $("#fakultas").val();
  $.ajax({
    "url"       : "{{ url('/api/fakultas/') }}/"+fak_id+"/jurusan",
    "method"    : "GET",
    "dataType"  : "json"
  }).done(function(data){
    var option = null;
    $.each(data, function(index, value){
      // console.log(value.id);
      option = option+"<option value='"+value.id+"'>"+value.nama+"</option>";
    });
    $("#jurusan").empty().append(option);
  });
});

var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
    $('#myTab a[href="'+hash.replace(prefix,"")+'"]').tab('show');
}else{
  $("#myTab a[href='#biodata']").tab("show");
}

// Change hash for page-reload
$('#myTab a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});

var options = {
  url: function(phrase){
      return "{{ url('/api/negara') }}/"+phrase;
  },
  getValue : "nama",
  list : {
          onSelectItemEvent:function(){
            $("input[name='negara_id']").val($("#negara").getSelectedItemData().id);
          }
  },
  adjustWidth : false
};


$("#negara").easyAutocomplete(options);
</script>
@stop