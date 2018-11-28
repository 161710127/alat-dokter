@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tambah Data Gambar</h3>
						<a class="fa fa-arrow-circle-left card-title pull-right" href="{{route('gambar.index')}}"> Kembali</a>
					</div>
				</div>
				<!-- /.card-header -->

				<!-- form start -->
				<div class="panel-body">
					<form action="{{ route('gambar.store') }}" method="post">
						{{ csrf_field() }}

						<div class="form-group row">
							<label for="nama_gambar" class="col-md-4 col-form-label text-md-right">{{ __('Nama Gambar') }}</label>

							<div class="col-md-6">
								<input id="nama_gambar" type="text" class="form-control{{ $errors->has('nama_gambar') ? ' is-invalid' : '' }}" name="nama_gambar" value="{{ old('nama_gambar') }}" required autofocus>
								@if ($errors->has('nama_gambar'))
								<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('nama_gambar') }}</strong>
								</span>
								@endif
							</div>
						</div>

                        <div class="panel-body">
                            <form action="{{ route('gambar.store') }}" method="post">
                                {{ csrf_field() }}

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



