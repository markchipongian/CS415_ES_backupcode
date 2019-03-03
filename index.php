<!DOCTYPE html>
<html>

<head>
    <title>USP Enrollment System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="Container">
        <div class="Logo">
            <img src="images/usp_logo.jpg" style="width: 100%;">
        </div>
        <div class="title">
            Enrollment System Login
        </div>
        <div class="Login">
            <form action="login.php" method="POST">
                <div class="rounded">
                    <label id="label" for="username"><b>Username:</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required class="form-control">
                    <label id="label" for="password"><b>Password:</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required class="form-control">
                </div>
                <div class="LoginButton">
                    <button type="submit" name="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <p>@Copyright CS415: Group 2</p>
        </div>
    </div>
</body>

</html>