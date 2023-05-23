<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('assets/img/SiTani.png') }}" alt="">
        </div>
        <div class="text-center name">
            Sitani
        </div>
        <form action="{{ route('register.simpan') }}" method="POST" class="user" class="p-3 mt-3">
            @csrf
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="nama"
                        class="form-control form-control-user @error('nama')is-invalid @enderror"
                        placeholder="Full Name">
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="alamat"
                        class="form-control form-control-user @error('alamat')is-invalid @enderror"
                        placeholder="alamat Address">
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="nomorhp"
                        class="form-control form-control-user @error('nomorhp')is-invalid @enderror"
                        onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="nomorhp Address">
                    @error('nomorhp')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-at"></span>
                    <input type="email" name="email"
                        class="form-control form-control-user @error('email')is-invalid @enderror"
                        placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="username"
                        class="form-control form-control-user @error('username')is-invalid @enderror"
                        placeholder="Username">
                    @error('username')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password"
                        class="form-control form-control-user @error('password')is-invalid @enderror"
                        placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn mt-3 btn btn-primary btn-user btn-block">Register</button>
        </form>
        <div class="text-center fs-6">
            <a href="{{ route('login') }}">Already have an account?</a> or <a>Login</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
