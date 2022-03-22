<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>


<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<title>E-Learning @yield('title')</title>
<link rel = "icon" href = 
"https://previews.123rf.com/images/sputanski/sputanski1508/sputanski150800078/44239067-modern-twisted-letter-e-icon-design-element-template.jpg?fj=1" 
	type = "image/x-icon">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Additional Icon bootstrap Files -->
<link id="bootstrap-css" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/user.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">


</head>
  <div class='classrooms'>
<div class="login-wrap">
    
	
        
@section('logo')
	Cao thắng
@endsection
@section('sub_logo')
	 E-learning
@endsection
    @include('layout.logo')
		
		
			<form method="POST" action="{{ route('login') }}" class="form">
			@csrf 
            <?php //Hiển thị thông báo thành công?>
<br>
            <div>
					
					<input required="" name="email" type="email" class="form-control  @error('email') is-invalid @enderror"  placeholder="Email">
					@error('email')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div >
				
					<input required=""  name="password" type="password" class=" form-control  @error('password') is-invalid @enderror" data-type="password"  placeholder="Mật khẩu">
					@error('password')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<label class="toggle" for="uniqueID">
			<input type="checkbox" class="toggle__input" id="uniqueID" />
			<span class="toggle-track">
				<span class="toggle-indicator">
					<!-- 	This check mark is optional	 -->
					<span class="checkMark">
						<svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
							<path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
						</svg>
					</span>
				</span>
			</span>
			Nhớ tài khoản
			
		</label><br class="col-md-12">
				<div class="main-button">
					<input type="submit"  value="Đăng Nhập">
				</div>
               
@if(session('alert'))

<section class='alert alert-success'>{{session('alert')}}</section>

@endif




				
				
				<a href="{{route('forget.password.get')}}">Quên Mật Khẩu?</a>
				
</form>
			
		</div>
	</div>
</div>

</body>
</html>
