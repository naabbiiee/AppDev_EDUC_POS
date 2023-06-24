<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CES Point Of Sale </title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/brand/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/brand/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/brand/favicon-16x16.png">
    <link rel="manifest" href="assets/img/brand/favicon.png">
    <link rel="mask-icon" href="assets/img/brand/favicon.png" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#032B43">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <script src="assets/js/swal.js"></script>

    <!--Load Swal-->
    <?php if (isset($success)) { ?>

    <!--This code for injecting success alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>

    <?php if (isset($err)) { ?>

    <!--This code for injecting error alert-->
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>

    <?php } ?>

    <?php if (isset($info)) { ?>
    
    <!--This code for injecting info alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $info; ?>", "info");
                },
                100);
        </script>

    <?php } ?>

    <script>
        function getCustomer(val) {
            $.ajax({

                type: "POST",
                url: "customer_ajax.php",
                data: 'custName=' + val,
                success: function(data) {
                    //alert(data);
                    $('#customerID').val(data);
                }
            });

        }
    </script>

</head>