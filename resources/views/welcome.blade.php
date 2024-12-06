<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pegawai</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/datatables@1.12.1/media/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="landing/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="landing/icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" href="landing/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="landing/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    <div id="header-wrap">

        <header id="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2">
                        {{-- <div class="main-logo">
                            <a href="index.html"><img src="landing/images/main-logo.png" alt="logo"></a>
                        </div> --}}

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    <li class="menu-item active"><a href="#home">Pegawai</a></li>
                                    </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>

                    </div>

                </div>
            </div>
        </header>

    </div><!--header-wrap-->

    <section id="home" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section Header -->
					<div class="section-header text-center">
						<div class="title">
							<span>Data Pegawai</span>
						</div>
						<h2 class="section-title">Data Pegawai</h2>
					</div>
	
					<!-- Tombol untuk membuka modal -->
					<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPegawaiModal">
						Tambah Pegawai
					</button>
	
					<!-- Modal Tambah Pegawai -->
					<div class="modal fade" id="addPegawaiModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalLabel">Tambah Pegawai</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="mb-3">
											<label for="name" class="form-label">Nama</label>
											<input type="text" class="form-control" id="name" name="name" required>
										</div>
										<div class="mb-3">
											<label for="email" class="form-label">Email</label>
											<input type="email" class="form-control" id="email" name="email" required>
										</div>
										<div class="mb-3">
											<label for="password" class="form-label">Password</label>
											<input type="password" class="form-control" id="password" name="password" required>
										</div>
										<div class="mb-3">
											<label for="telepon" class="form-label">Telepon</label>
											<input type="text" class="form-control" id="telepon" name="telepon">
										</div>
										<div class="mb-3">
											<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
											<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
										</div>
										<div class="mb-3">
											<label for="alamat" class="form-label">Alamat</label>
											<textarea class="form-control" id="alamat" name="alamat"></textarea>
										</div>
										<div class="mb-3">
											<label for="foto" class="form-label">Foto</label>
											<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
										</div>
										<button type="submit" class="btn btn-success">Simpan</button>
									</form>
								</div>
							</div>
						</div>
					</div>
	
					<!-- Tabel Data Pegawai -->
					<table id="pegawaiTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Telepon</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Foto</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pegawais as $pegawai)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $pegawai->user->name }}</td>
									<td>{{ $pegawai->user->email }}</td>
									<td>{{ $pegawai->telepon }}</td>
									<td>{{ $pegawai->tanggal_lahir }}</td>
									<td>{{ $pegawai->alamat }}</td>
									<td>
										<img width="100" height="100" src="{{ url('storage/fotos/' . $pegawai->foto) }}" alt="Foto Pegawai">
									</td>
									<td>
										<ul class="list-unstyled">
											<li>
												<a href="{{ url('edit' . $pegawai->id) }}">
													<i class="ti ti-pencil"></i> Edit
												</a>
											</li>
											<li>
												<a href="{{ url('deleteinstructor/' . $pegawai->id) }}">
													<i class="ti ti-trash"></i> Delete
												</a>
											</li>
										</ul>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
	
				</div>
			</div>
		</div>
	</section>
	
	@section('scripts')
		<script>
			$(document).ready(function() {
				$('#pegawaiTable').DataTable();
			});
		</script>
	@endsection
	

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="copyright">
                        <div class="row">

                            <div class="col-md-6">
                                <p>© 2022 All rights reserved. Muhammad Lutfi
                                </p>
                            </div>

                            <div class="col-md-6">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-behance-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!--grid-->

                </div><!--footer-bottom-content-->
            </div>
        </div>
    </div>

    <script src="landing/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/datatables@1.12.1/media/js/jquery.dataTables.min.js"></script>
	
    <script src="landing/js/plugins.js"></script>
    <script src="landing/js/script.js"></script>

</body>

</html>
