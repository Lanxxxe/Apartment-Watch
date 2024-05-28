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

    <title>Apartment Watch | Login</title>
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
                <h2 class="text-center">Log In</h2>
            </div>
            <form action="model/verifyUser.php" method="posT">
                <div class="mb-3 d-flex flex-column">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" class="" name="username" id="username" required>
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" class="" name="password" id="password" required>
                </div>

                <button class="d-block mt-4" id="submit-button" type="submit">Proceed</button>
            </form>
        </div>
    </div>

    <?php include './includes/footer.php' ?>

</body>

</html>