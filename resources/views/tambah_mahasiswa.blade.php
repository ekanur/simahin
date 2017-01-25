@extends("layout")

@section("content")
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                {!! Form::open(array("url" => "/mahasiswa/tambah", 'class'=>'', 'id'=>'tambah_mahasiswa', 'role'=>'form'))!!}
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
                                            <div class="form-group">
                                                <label>Nama Depan</label>
                                                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Belakang</label>
                                                <input name="nama_belakang" type="text" class="form-control" placeholder="Nama Belakang" value="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fakultas</label>
                                                <select name="fakultas_id" id="fakultas" class="form-control">
                                                                <option value="01">Fakultas Ilmu Pendidikan</option>
                              <option value="02">Fakultas Sastra</option>
                              <option value="03">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                              <option value="04">Fakultas Ekonomi</option>
                              <option value="05">Fakultas Teknik</option>
                              <option value="06">Fakultas Ilmu Keolahragaan</option>
                              <option value="07">Fakultas Ilmu Sosial</option>
                              <option value="08">Fakultas Pendidikan Psikologi</option>
                              <option value="21">Pascasarjana</option>
                              <option value="31">Program Pendidikan Profesi dan Vokasi</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <select name="jurusan_id" id="jurusan" class="form-control">
                              <option value="013">Administrasi Pendidikan</option>
                              <option value="015">Kependidikan Sekolah Dasar dan Pra Sekolah</option>
                              <option value="012">Teknologi Pendidikan</option>
                              <option value="311">Program Pendidikan Profesi FIP</option>
                              <option value="011">Bimbingan Konseling</option>
                              <option value="016">Pendidikan Luar Biasa</option>
                              <option value="014">Pendidikan Luar Sekolah</option>
                              <option value="313">Program Pendidikan Profesi FS</option>
                              <option value="022">Sastra Inggris</option>
                              <option value="021">Sastra Indonesia</option>
                              <option value="023">Sastra Arab</option>
                              <option value="024">Sastra Jerman</option>
                              <option value="025">Seni dan Desain</option>
                              <option value="312">Program Pendidikan Profesi FMIPA</option>
                              <option value="032">Fisika</option>
                              <option value="033">Kimia</option>
                              <option value="034">Biologi</option>
                              <option value="031">Matematika</option>
                              <option value="035">Pendidikan Ilmu Pengetahuan Alam</option>
                              <option value="042">Akuntansi</option>
                              <option value="041">Manajemen</option>
                              <option value="314">Program Pendidikan Profesi FE</option>
                              <option value="043">Ekonomi Pembangunan  </option>
                              <option value="054">Teknologi  Industri</option>
                              <option value="051">Teknik Mesin</option>
                              <option value="052">Teknik Sipil</option>
                              <option value="053">Teknik Elektro</option>
                              <option value="315">Program Pendidikan Profesi FT</option>
                              <option value="316">Program Pendidikan Profesi FIK</option>
                              <option value="063">Pendidikan Kepelatihan Olahraga</option>
                              <option value="062">Ilmu Keolahragaan</option>
                              <option value="061">Pend. Jasmani dan Kesehatan</option>
                              <option value="075">Sosiologi</option>
                              <option value="073">Sejarah</option>
                              <option value="071">Hukum dan Kewarganegaraan</option>
                              <option value="317">Program Pendidikan Profesi FIS</option>
                              <option value="074">Pendidikan Ilmu Pengetahuan Sosial</option>
                              <option value="072">Geografi</option>
                              <option value="081">Psikologi</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIM</label>
                                                <input name="nim" type="text" class="form-control" placeholder="NIM" value="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Negara Asal</label>
                                                <input type="hidden" name="negara_id" value="96">
                                                <input type="text" class="form-control" placeholder="Negara Asal" value="Brunei Darussalam"  name="negara">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div> --}}
                                    </div>
                            </div>
                            <div class="header">
                                <h4 class="title">Visa</h4>
                            </div>
                            <div class="content">
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
                                                <input type="date" name="expired_visa" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        <div class="header">
                                <h4 class="title">Ijin Belajar</h4>
                            </div>
                            <div class="content">
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
                                                <input type="date" name="expired_ijin_belajar" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                     <button type="submit" class="btn btn-info btn-fill pull-right" >Update Profile</button>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                 <input type="file" name="foto" style="    position: absolute;
    width: 240px;
    padding: 5px;
    cursor: pointer; z-index:1000;top:100px;margin-left:30px;opacity:0.00001">
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