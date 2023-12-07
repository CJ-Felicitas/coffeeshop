<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="new-favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="buttons.css">
</head>
<body>
    <div class="head-style">
    </div>
    <div class="container">
        <center>
            <h1>Select Order</h1>
        </center>
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
            <center> <button type="submit" class="btn btn-success">Checkout</button> </center>
            </form>
        </div>
    </div>
</body>

</html>