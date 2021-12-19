<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMEC-ERP</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>SIMEC</b>ERP</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form id="userDetail" action="{{route('user.registration')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Retype password"
                           onkeyup="checkPassword()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p id="message"></p>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="terms" name="terms" value="accepted">
                            <label for="terms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" onclick="checkPassword()">Register</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="{{route('login')}}" class="text-center">I already have a membership</a>
        </div>
    </div>
</div>

<script>

    function checkPassword() {
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirm_password').value;
        let message = document.getElementById('message');

        if (password.length !== 0) {
            if (password === confirmPassword) {
                document.getElementById('message').innerHTML =
                    message.style = "<span style='color:green'>Password Match </span>"
            } else {
                document.getElementById('message').innerHTML =
                    message.style = "<span style='color:red'>Password  Do not Match </span>"
            }
        }
    }

    document.getElementById('userDetail').addEventListener('submit', function (e) {
        if (document.getElementById('terms').checked === false) {
            e.preventDefault();
            alert("You Must accept terms and condition");
            return false;
        }
    })
</script>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
