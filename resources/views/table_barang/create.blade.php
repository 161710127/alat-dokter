@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tambah Data Barang</h3>
						<a class="fa fa-arrow-circle-left card-title pull-right" href="{{route('table_barang.index')}}"> Kembali</a>
					</div>
				</div>
				<!-- /.card-header -->

				<!-- form start -->
				<div class="panel-body">
					<form action="{{ route('table_barang.store') }}" method="post">
						{{ csrf_field() }}

						<div class="form-group row">
							<label for="nama_barang" class="col-md-4 col-form-label text-md-right">{{ __('Nama Barang') }}</label>

							<div class="col-md-6">
								<input id="nama_barang" type="text" class="form-control{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" name="nama_barang" value="{{ old('nama_barang') }}" required autofocus>
								@if ($errors->has('nama_barang'))
								<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('nama_barang') }}</strong>
								</span>
								@endif
							</div>
						</div>

                        <div class="form-group row">
							<label for="kategori_id" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kategori') }}</label>

                                <div class="col-md-6">
                                    <select name="kategori_id" class="form-control">
                                        @foreach($kategori as $data)
                                        <option value="{{ $data->id}}">{{$data->nama_kategori}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('kategori_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
							<label for="gambar" class="col-md-4 col-form-label text-md-right">{{ __('Gambar') }}</label>

							<div class="col-md-6">
								<input id="gambar" type="file" name="gambar" class="form-control" accept="img/*" required autofocus>
								@if ($errors->has('gambar'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('gambar') }}</strong>
								</span>
								@endif
							</div>
                        </div>

                        <div class="form-group row">
							<label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

							<div class="col-md-6">
								<input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>
								@if ($errors->has('deskripsi'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('deskripsi') }}</strong>
								</span>
								@endif
							</div>
                        </div>

                        <!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



