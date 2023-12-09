<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        .container {
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            padding: 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div>
        <div class="head-style"></div>
        <center>
            <h1>Thank you for your purchase!</h1>
        </center>
        <div class="container">
            <div class="row mid">
                <div class="col-md-5">

                    <form action='index.php' method="post">
                        <center>
                            <h3>We're preparing your order!</h3>
                        </center>
                        <center><a><button class="btn btn-success">Home</button></a></center>
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

</html>