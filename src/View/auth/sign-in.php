
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="<?= asset('mazer/assets/css/main/app.css')?>">
    <link rel="stylesheet" href="<?= asset('mazer/assets/css/pages/auth.css')?>">
    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.svg')?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.png')?>" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo mt-0">
                <a href="index.html"><img src="<?= asset('mazer/assets/images/logo/logo.svg')?>" alt="Logo"></a>
            </div>
            <h1 class="">Log in.</h1>
            <p class="auth-subtitle mb-3">Log in with your data that you entered during registration.</p>

            <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
            <img src="<?= asset('logistics.png')?>" width="100%" height="100%" alt="">
        </div>
    </div>
</div>

    </div>
</body>

</html>
