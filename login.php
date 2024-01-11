<?php
include('connect.php');
session_start();
if (isset($_POST['login'])) {

  // NEW CODE FOR SECURITY
  // For Santizing User inputs:
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Preventing SQL injection
  $sql = "SELECT * FROM login WHERE email=? AND password=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email, $password);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  // Fetch user data
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  // Count the number of rows
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    // Redirect with sanitized and escaped data
    $redirect_url = "welcomelogin.php";
    header("Location: " . $redirect_url);
    exit();
  } else {
    header("Location: index.html");
    exit();
  }
}
?>

<?php
// include('connect.php');

// session_start(); // Start the session

// if (isset($_POST['login'])) {
//   $Email = $_POST['email'];
//   $Password = $_POST['password'];

//   $sql = "SELECT * FROM login WHERE email='$Email' AND password='$Password'";
//   $result = $conn->query($sql);

//   if ($result->num_rows == 1) {
//     // Fetch the user data
//     $row = $result->fetch_assoc();

//     // Set a session variable to store user login status
//     $_SESSION['user_id'] = $row['user_id'];

//     echo "Login successful!";
//     header("location: welcome.php");
//     exit();
//     // Add additional logic (e.g., session handling) here
//   } else {
//     echo "Invalid username or password";
//     exit();
//   }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="css\style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Font Awesome CSS for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Add your custom stylesheets here if needed -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Josefin+Sans&family=Lato:ital,wght@1,300&family=Roboto+Serif:opsz@8..144&family=Ysabeau+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styles/style_login.css">
</head>

<body>

  <section class="h-100 gradient-form " style="background-color: #eee;">
    <div class="container py-5 h-100 ">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-xl-10 ">
          <div class="card rounded-3 text-black shadow">
            <div class="row g-0 ">
              <div class="col-lg-6  ">
                <div class="card-body p-md-5 ">

                  <div class="text-center ">
                    <img src="logo.png" style="width: 200px;" alt="logo">

                  </div>
                  <h2 class="mt-4 mb-4 pb-1 text-center fw-bold">Login</h2>

                  <form method="post">
                    <p>Please login to your account</p>

                    <div class="col-md-20  mt-5">
                      <div class="form-group">
                        <input type="email" name="email" required id="form3Example1" class="form-control w-100" placeholder=" " />
                        <label class="form-label" for="form3Example1">Email</label>
                      </div>
                    </div>

                    <div class="col-md-20 mb-4 mt-4">
                      <div class="form-group">
                        <input type="password" name="password" required id="form3Example1" class="form-control w-100" placeholder=" " />
                        <label class="form-label" for="form3Example1">Password</label>
                      </div>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <input name="login" value="Login" type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 pt-3 pb-3" type="button"> </input>
                      <a class="text-muted" href="#!">Forgot password?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2 text-nowrap">Don't have an account?</p>
                      <button type="button" class="btn btn-outline-danger mx-2">Create new</button>
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 ">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS, Popper.js, and jQuery (required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Add your custom scripts here if needed -->

</body>

</html>