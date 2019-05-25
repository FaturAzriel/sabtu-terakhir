@extends('layouts.app')

@section('content')
<!-- DAFTAR PELANGGAN -->
      <div class="container-fluid pelanggan">
        <div class="row">
          <div class="col-sm-12 table-responsive">
            <h4>Daftar Pelanggan</h4>
            <a href="/pelanggan/export_excel" class="btn btn-success my-3 ml-auto" target="_blank">EXPORT EXCEL</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Daya</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                @foreach ($pesanan as $p)
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->daya}}</td>
                    <td><span>{{$p->email}}</span></td>
                    <td>{{$p->telp}}</td>
                    <td>{{$p->alamat}}</td>
                    <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Selesaikan</a></td>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selesaikan Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Selesaikan pesanan atas nama <b>{{$p->nama}}?</b></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <a href="/service/hapuspelanggan/{{ $p->id }}"><button type="button" class="btn btn-success">Selesaikan</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
@endsection