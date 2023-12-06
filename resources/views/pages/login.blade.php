<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>My Dentist</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bm/datatables.min.css" rel="stylesheet" />

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="text-align: center;">
                                <img src="http://images.clipartpanda.com/tooth-clip-art-tooth-clipart-7.jpg"
                                    alt=""
                                    style="max-width: 50%; max-height: 50%; display: block; margin: 0 auto; margin-top: 25%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        @csrf
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @elseif ($errors->has('password'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @elseif (session('errors'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('errors')->first() }}
                                                </div>
                                        @endif


                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Alamat Email">

                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">

                                        </div>


                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Buat Akun Anda!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/v/bm/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('table').DataTable();
        });
    </script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
