<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PWL Kasir| Ubah Password</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="#">Login Awal</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Silahkan Masukkan Password baru anda</p>

			<form id="form-first-login" action="<?= site_url("login/saveNewPassword") ?>" method="post">
				<div class="form-group">
					<div class="input-group mb-3">
						<input type="password" required name="password" id="password" class="form-control"
							   placeholder="Password">
						<div class="input-group-prepend reveal">
							<button type="button" class="btn btn-danger">
								<i class="fas fa-eye-slash"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input type="password" required name="confirm_password" id="confirm-password"
							   class="form-control"
							   placeholder="Confirm Password">
						<div class="input-group-prepend reveal">
							<button type="button" class="btn btn-danger">
								<i class="fas fa-eye-slash"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button id="btn-save" type="button" class="btn btn-primary btn-block">Simpan Password</button>
					</div>
					<!-- /.col -->
				</div>
			</form>


		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() . 'assets/' ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() . 'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() . 'assets/' ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/additional-methods.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/localization/messages_id.js"></script>
<script>
    $(function () {
        $(".reveal").on('click', function () {
            console.log($(this).children("i"));
            $(this).find("i").toggleClass("fa-eye-slash fa-eye");
            var $pwd = $(this).siblings("input");
            if ($pwd.attr('type') === 'password') {
                $pwd.attr('type', 'text');
            } else {
                $pwd.attr('type', 'password');
            }
        });
        var form = $("#form-first-login");
        form.validate({
            rules: {
                password: {
                    minlength: 6
                },
                confirm_password: {
                    equalTo: "#password",
                }
            },
            messages: {
                confirm_password: {
                    equalTo: "Nilai harus sama dengan password"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                if (element.hasClass('select2') && element.next('.select2-container').length) {
                    error.insertAfter(element.next('.select2-container'));
                } else {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
        $("#btn-save").on("click", function () {
            if (form.valid()) {
                form.submit();
            }
        });
    });
</script>
</body>
</html>
