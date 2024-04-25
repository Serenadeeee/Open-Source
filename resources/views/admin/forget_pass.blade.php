<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lấy lại mật khẩu </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/client/img/icoo-logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('public/server/css/admin.min.css')}}" rel="stylesheet">
</head>
<body class="bg-body">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" ></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @if (session()->has('message'))
                                    <div class='alert alert-success'>
                                    {!! session()->get('message')!!}
                                    </div>
                                    @elseif (session()->has('error'))
                                    <div class='alert alert-danger'>
                                    {!! session()->get('error')!!}
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-grape mb-4">Điền email để lấy lại mật khẩu</h1>
                                    </div>
                                    <form class="user" action="{{URL('/recover_pass')}}"  method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập email đăng nhập!"
                                            name="admin_email" class="form-control form-control-user" placeholder="Email...">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-grape btn-user btn-block">Gửi</button>
                                    </form>
                                    <hr>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Form validator -->
    <script src="{{asset('public/server/js/jquery.form-validator.min.js')}}"></script>
    <script type="text/javascript">
        $.validate({

        });
    </script>
</body>
</html>