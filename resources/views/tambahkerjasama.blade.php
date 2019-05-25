@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1>Kerja Sama</h1><br>
<div class="container">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
 
				<form action="/upload/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
                    <div class="form-group">
						<b>Nama Gambar</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>

                <h4 class="my-5">Data</h4>
 
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">File</th>
							<th>Nama gambar</th>
							<th width="1%">Opsi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($kerjasama as $g)
						<tr>
							<td><img width="150px" src="{{ url('/data_file/'.$g->gambar) }}"></td>
							<td>{{$g->namagambar}}</td>
                            <td><a href="/upload/hapus/{{ $g->id }}" class="btn btn-danger">Hapus</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
</div>
</div>

@endsection