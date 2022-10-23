<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404 Not Found</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&amp;display=swap">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/perfectscroll/perfect-scrollbar.css">

        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/custom.css">

    </head>
    <body class="error-page err-404">
        <div class="container">
            <div class="error-container">
                <div class="error-info">
                    <h1>404</h1>
                    <p>It seems that the page you are looking for no longer exists.<br>Please contact our <a href="<?= base_url(); ?>/help">help center</a> or go to the <a href="<?= base_url(); ?>">homepage</a>.</p>
                </div>
                <div class="error-image"></div>
            </div>
        </div>

        <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="<?= base_url(); ?>/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/main.min.js"></script>
    </body>
</html>