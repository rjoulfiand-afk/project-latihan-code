<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Aplikasi</title>
    <!-- Panggil Bootstrap dari internet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center" style="height: 100vh;">
    <!-- Wadah di tengah layar -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Login SAS</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nampilin pesan error kalau gagal login -->
                        <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                        
                        <!-- Form login, method POST biar datanya nggak keliatan di URL -->
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <!-- Input username -->
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <!-- Input password -->
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <!-- Tombol Login -->
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>