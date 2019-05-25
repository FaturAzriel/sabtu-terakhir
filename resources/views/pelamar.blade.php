@extends('layouts.app')

@section('content')
                <div class="container text-center">
                    <h3 class="text-center"> Data Pelamar</h3><br><br>
                    <div class="row">
                @foreach($lowongankerja as $p)
                    <div class="col-sm-6">
                        <div class="card pelamar1 pel1" width="auto;">
                        <img src="{{ url('/data_file/'.$p->ava) }}" class="card-img-top">
                            <div class="card-body">
                            <h2 class="card-title">{{$p->namalengkap}}</h2>
                                <h6 class="card-text">{{$p->keahlian}}</h6><br>
                                    <dl class="row text-left">
                                        <dt class="col-sm-5">Nama Panggilan</dt>
                                        <dd class="col-sm-7">{{$p->namapanggilan}}</dd>

                                        <dt class="col-sm-5">Tempat Tanggal Lahir</dt>
                                        <dd class="col-sm-7">{{$p->ttl}}</dd>
                                        
                                        <dt class="col-sm-5">Agama</dt>
                                        <dd class="col-sm-7">{{$p->agama}}</dd>
                                        
                                        <dt class="col-sm-5">No Telp</dt>
                                        <dd class="col-sm-7">{{$p->telp}}</dd>
    
                                        <dt class="col-sm-5">Jenis Kelamin</dt>
                                        <dd class="col-sm-7">{{$p->jeniskelamin}}</dd>
                                        
                                        <dt class="col-sm-5">Kota</dt>
                                        <dd class="col-sm-7">{{$p->kota}}</dd>
    
                                        <dt class="col-sm-5">Status</dt>
                                        <dd class="col-sm-7">{{$p->email}}</dd>

                                        <dt class="col-sm-5">Alamat</dt>
                                        <dd class="col-sm-7">{{$p->alamat}}</dd>
                                    </dl>
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6 text-left">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                <h5>Hasil Test Online</h4>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><h6>Apa Anda baru lulus?</h6>- {{$p->kelulusan}}</li>
                                    <li class="list-group-item">Apa Anda siap ditempatkan diluar kota/negeri?<br>- {{$p->ditempatkan}}</li>
                                    <li class="list-group-item">Apa Anda siap bekerja dibawah tekanan?<br>- {{$p->tekanan}}</li>
                                    <li class="list-group-item">Punya sertifikat kelistrikan?<br>- {{$p->sertifikat}}</li>
                                    <li class="list-group-item">Jika didaftarkan, apakah mau ikut sertifikasi kelistrikan?<br>- {{$p->sertifikasi}}</li>
                                </ul>
                                <a href="/service/tolakpelamar/{{ $p->id }}" class="btn btn-danger">Tolak Pelamar</a>

                                <button type="button" class="btn btn-success" data-toggle="modal" width="200px" data-target="#exampleModal">Terima Pelamar</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                    </div>

                    

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Terima Lamaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="confirmlamaran" action="mailto:{{$p->email}}" enctype="text/plain" method="post">
                            <textarea name="." class="form-control" type="text">Dear, {{$p->namalengkap}}
                                
Selamat! Kamu telah diterima untuk bekerja di perusahaan kami. Jadi, mulai besok hari kamu sudah bisa bekerja. Jangan lupa untuk membawa berkas-berkas yang dibutuhkan! Salam Kesetrum!
                                                    
Sugeng Atkinson
                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Terima Lamaran</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                @endforeach

                </div>
@endsection