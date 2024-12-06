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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
        <!-- Fileinput CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" />
    
        <!-- Dropzone CSS -->
        <link href="https://cdn.jsdelivr.net/npm/dropzone@5.10.2/dist/min/dropzone.min.css" rel="stylesheet" />
    
        <!-- Datatable CSS -->
        <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="landing/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="landing/icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" href="landing/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="landing/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    <div id="header-wrap">
        @include('layouts.auth.navbar')

    </div><!--header-wrap-->

    @yield('content')

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
    <script src="landing/js/plugins.js"></script>
    <script src="landing/js/script.js"></script>
    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#pegawaiTable').DataTable();
        });
    
        // Initialize Select2
        $('#pegawaiForm select').select2();
    
        // Initialize Fileinput
        $("#foto").fileinput({
            showUpload: false,
            showRemove: true,
            allowedFileExtensions: ['jpg', 'png', 'gif']
        });
    
        // Initialize Dropzone
        Dropzone.options.myDropzone = {
            url: "/upload",
            paramName: "file",
            maxFilesize: 2, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    
        // jQuery Form Validation
        $("#pegawaiForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                name: {
                    required: "Nama pegawai wajib diisi",
                    minlength: "Nama minimal 3 karakter"
                },
                email: {
                    required: "Email wajib diisi",
                    email: "Masukkan email yang valid"
                },
                password: {
                    required: "Password wajib diisi",
                    minlength: "Password minimal 6 karakter"
                }
            }
        });
    </script>
</body>

</html>
