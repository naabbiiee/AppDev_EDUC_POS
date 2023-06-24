<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CES POS System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-color: #13293D;
            color: #F3A712;
            font-family: 'Anton', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            position: relative; 
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body::before {
            content: "";
            background-image: url('assets/background.png');
            background-size: cover;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.5;
}

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #FFFFFF;
            padding: 0 25px;
            font-size: 20px;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        p {
            color: #DB2B39;
        }

        .m-b-md {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class=bg>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    POS Management System
                </div>

                <div class="links">
                    <p>Login as?</p>
                    <a href="admin/index.php">Admin</a>
                    <a href="cashier/index.php">Cashier</a>
                    <a href="customer/index.php">Customer</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>