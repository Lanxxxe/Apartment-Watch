<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/AW-logo.png" type="image/x-icon">

    <title>Apartment Watch | Registration</title>
</head>

<body>
    <div class="login-page-container d-flex justify-content-center align-items-center">
        <div class="title-container d-flex align-items-center justify-content-between flex-column p-5">
            <lord-icon class="text-center" src="https://cdn.lordicon.com/vfczflna.json" trigger="loop-on-hover" delay="800" style="width:50px;height:50px">
            </lord-icon>
            <h3 class="text-center">
                Welcome to Apartment <span class="watch">Watch</span>
            </h3>

            <p class="text-center mt-3">Your partner in managing of your Apartments</p>

        </div>

        <div class="login-container d-flex align-items-center justify-content-center flex-column p-5">
            <div class="mb-4">
                <h2 class="text-center">Registration</h2>
            </div>
            <form action="model/registerNewUser.php" method="posT">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="">
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" id="floatingInput" placeholder="">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" placeholder="">
                    <label for="floatingInput">Password</label>
                </div>

                <button class="d-block mt-4" id="submit-button" type="submit">Register</button>
            </form>
        </div>
    </div>

    <?php include './includes/footer.php' ?>
</body>

</html>