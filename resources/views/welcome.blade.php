<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in - Lelgel secondary school</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootsrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="d-flex flex-column align-items-center" id="wrapper">
    <form action="{{route('userLogin')}}" method="post" class="row mt-4 text-white" id="sign-in">
      @csrf
        <div class="form-group col-lg-12 mt-4 mb-2">
            <label for="email" class="label">Email/phone Number</label>
            <input type="text" name="email" id="email" placeholder="Email/phone" class="form-control">
        </div>
        <div class="form-group col-lg-12 mb-2">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" placeholder="password" class="form-control">
        </div>
        <div class="form-group col-lg-12 mb-2">
           <div class="form-check">
            <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input">
            <label for="remember_me" class="form-check-label">Remember Me</label>
           </div>
        </div>
        <a href="#" class="link-light col-lg-6 m-2">Forgot password?</a>
        
        <div class="d-flex justify-content-right form-group col-lg-12" id="buttons">
            <input type="submit" value="Sign In" class="btn btn-info m-2">
            <input type="reset" value="Cancel" class="btn btn-danger m-2">
        </div>
    </form>
</div>
    <script src="{{asset('bootsrap/js/bootstrap.min.js')}}"></script>
</body>
</html>