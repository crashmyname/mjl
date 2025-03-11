<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Setting User Pages</h3>
                <p class="text-subtitle text-muted">Setting User</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Setting User
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Account Content</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORM ACCOUNT INFO</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="" id="updateprofile" method="POST"
                                        enctype="multipart/form-data">
                                        <?= csrf() ?>
                                        <center>
                                            <div class="col-xl-2 col-md-6 col-sm-12">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <img src="<?= asset('profile-users/') . $user->profile ?>"
                                                            width="10%" class="card-img img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Username</label>
                                                    <input type="text" name="username"
                                                        value="<?= $user->username ?>"
                                                        class="form form-control" id="username" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Name</label>
                                                    <input type="text" name="name"
                                                        value="<?= $user->name ?>"
                                                        class="form form-control" id="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Password</label>
                                                    <input type="text" name="password" id="password"
                                                        class="form form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Role</label>
                                                    <select name="role_id" id="role_id" class="form form-control">
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Profile</label>
                                                    <input type="file" name="profile"
                                                        value="<?= $user->profile ?>"
                                                        class="form form-control" id="profile">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" id="update">
                                                        Update </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $('#update').on('click', function(e) {
        e.preventDefault();
        uID = '<?= \Support\Session::user()->uuid?>';
        var url = "<?= base_url()?>/profile" + '/' + uID;
        var formData = new FormData($('#updateprofile')[0]);
        Swal.fire({
            title: 'Update',
            icon: 'warning',
            text: 'Apakah yakin data ingin diubah?',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update!!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    processData: false,
                    contentType: false,
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 201) {
                            Swal.fire({
                                title: 'Success',
                                icon: 'success',
                                text: 'User berhasil diupdate',
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Gagal membuat User',
                            })
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Error dalam melakukan fungsi',
                        })
                    }
                })
            }
        })
    })
</script>
