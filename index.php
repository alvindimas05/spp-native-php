<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pembayaran SPP</title>
    <style>

    body {
        background-image: url('css/IMG-20220914-WA0025.jpg');
    }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .card {
            border-radius: 8px;
        }

        .card-body {
            padding: 0;
        }

        .text-center {
            color: white;
            margin-bottom: 10px;
            text-align: center;
            font-size: 23pt;
        }

        .form-container {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .d-grid {
            display: grid;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Apikasi Pembayaran SPP <br> Login Siswa</h5>
                        </div>

                        <div class="form-container">
                            <form action="proses_login_siswa.php" method="post">
                                <div class="form-group mb-2">
                                    <label>NISN</label>
                                    <input type="number" name="nisn" class="form-control" placeholder="Masukkan Nisn. ." required>
                                </div>
                                <div class="form-group mb-2">
                                    <label>NIS</label>
                                    <input type="number" name="nis" class="form-control" placeholder="Masukkan Nis. ." required>
                                </div>
                                <div class="d-grid mb-2">
                                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                                    <a href="index2.php">Login Petugas & Administrator</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>