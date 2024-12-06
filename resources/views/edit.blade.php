@extends('layouts.auth.app')

@section('content')
<section id="home" class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Section Header -->
                <div class="section-header text-center mb-4">
                    <div class="title">
                        <span>Data Pegawai</span>
                    </div>
                    <h2 class="section-title">Edit Data</h2>
                </div>

                <form action="{{ route('update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Used to specify PUT method for update -->

                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pegawai->user->name) }}" required>
                    </div>
                
                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pegawai->user->email) }}" required>
                    </div>
                
                    <!-- Tanggal Lahir -->
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir) }}" required>
                    </div>
                
                    <!-- Telepon -->
                    <div class="form-group mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $pegawai->telepon) }}">
                    </div>
                
                    <!-- Alamat -->
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $pegawai->alamat) }}</textarea>
                    </div>
                
                    <!-- Foto -->
                    <div class="form-group mb-4">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        @if ($pegawai->foto)
                            <div class="mt-3">
                                <label>Current Photo:</label><br>
                                <img src="{{ asset('storage/fotos/' . $pegawai->foto) }}" alt="Current Photo" width="100" class="img-fluid">
                            </div>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
