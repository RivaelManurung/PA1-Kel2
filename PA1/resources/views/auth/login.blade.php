<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitani</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

</head>
<body>
<div class="wrapper">
    <div class="logo">  
        <img src="{{asset('assets/img/SiTani.png')}}" alt="">
    </div>
    <div class="text-center name">
        Sitani
    </div>
    <form class="p-3 mt-3" action="{{ route('login.aksi') }}" method="POST" class="user">
    {{-- melindungi aplikasi dari serangan CSRF dengan memastikan bahwa hanya permintaan yang berasal dari aplikasi sendiri yang diterima --}}
    @csrf
	@if ($errors->any())
	<div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
		</div>
		@endif       
    <div class="form-group">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" class="form-control form-control-user" name="email"  placeholder="email">
            </div>
        </div>
        <div class="form-group">
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class="form-control form-control-user" name="password"  placeholder="Password">
            </div>
        </div>
        <button type="submit" class="btn mt-3 btn btn-primary btn-block btn-user">Login</button>
    </form>
    <div class="text-center fs-6">
        <a href="{{ route('register') }}">Create an Account! Sign up</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>