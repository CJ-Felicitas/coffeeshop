<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12 head-style">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mid">
                <h1>COFFEE SHOP!</h1>
            </div>
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="col-md-12 mid">
                <div class="col-md-5" id="">
                    <div>
                        <img src="images/coffee_one.png" alt="" width=100%>
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5" id="">
                    <div>
                        <img src="images/coffee_two.png" width=100% alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-extended" style="margin-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h1>Our Products</h1>
                    </center>
                    <div class="about">
                    <div class="row">
            <div class="col-md-4">
                <div style="padding: 10px;">
                    <div>
                        <img src="images/matcha.png" alt="" width=100%>
                    </div>
                    <form action="addtocart.php" method="post">
                        <input type="hidden" name="matcha">
                        <br>
                        <center> <input value="0" class="custom-form-control" type="number" id="quantity"
                                name="quantity" min="1" max="5"></center>
                </div>
            </div>
            <!--  -->
            <div class="col-md-4">
                <div style="padding: 10px;">
                    <div>
                        <img src="images/choco.png" alt="" width=100%>
                    </div>
                    <input type="hidden" name="choco">
                    <br>
                    <center> <input value="0" class="custom-form-control" type="number" id="quantity" name="quantity"
                            min="1" max="5"></center>
                </div>
            </div>
            <!--  -->
            <div class="col-md-4">
                <div style="padding: 10px;">
                    <div>
                        <img src="images/espresso.png" alt="" width=100%>
                    </div>
                    <input type="hidden" name="espresso">
                    <br>
                    <center> <input value="0" class="custom-form-control" type="number" id="quantity" name="quantity"
                            min="1" max="5"></center>
                </div>
            </div>
        </div>
        <div class="row">

            </form>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>