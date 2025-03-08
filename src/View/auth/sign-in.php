<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="<?= asset('mazer/assets/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('mazer/assets/css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.svg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.png') ?>" type="image/png">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo mt-0">
                        <a href="<?= base_url() ?>"><img src="<?= asset('mazer/assets/images/logo/logo.svg') ?>"
                                alt="Logo"></a>
                    </div>
                    <h1 class="">Log in.</h1>
                    <p class="auth-subtitle mb-3">Log in with your data that you entered during registration.</p>

                    <form action="" id="formlogin" method="post">
                        <?= csrf() ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" id="username"
                                placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" id="password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit"
                            id="login">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="<?= asset('logistics.png') ?>" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>

        <div class="modal" id="loadingModal" tabindex="-1" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0 text-center">
                    <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <h5 class="mt-3 text-white">Processing...</h5>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    console.log(typeof $.fn.modal);

    $(document).ready(function(){
        $('#login').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/sign-in';
            var formdata = new FormData($('#formlogin')[0]);
            $('#loadingModal').modal('show');
            $.ajax({
                type: 'POST',
                url: url,
                data:formdata,
                processData:false,
                contentType:false,
                dataType: 'json',
                success:function(response){
                    if (response.status == 200) {
                        let timerInterval;
                        Swal.fire({
                            icon: 'success',
                            title: "Login Berhasil",
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then((result) => {
                            window.location.href = "<?= base_url() ?>";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: response.message
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan pada server!'
                    });
                },
                complete: function () {
                    $('#loadingModal').modal('hide');
                }
            })
        })
    });
</script>

</html>
