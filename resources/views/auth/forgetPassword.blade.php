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
		
		
    <form action="{{ route('forget.password.post') }}" method="POST"  class="form">
                @csrf
                
                <div class="group">
                    <label  class=" col-md-12">Quên mật khẩu </label>
                 </div>
                <div class="group">     
                    <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
                </div>
                <div class="main-button">
					<input type="submit"  value="Xác nhận">
				</div>
            </form>  
			
		</div>
	</div>
</div>

</body>
</html>
