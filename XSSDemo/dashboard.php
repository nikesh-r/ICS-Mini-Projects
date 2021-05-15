<?php

$con = mysqli_connect("localhost", "root", "", "xss_data");

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $userQuery = "SELECT * FROM user WHERE username = '$username'";
    $userResult = mysqli_query($con, $userQuery);

    $data = mysqli_fetch_assoc($userResult);
} else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <style>
      body {
        min-height: 100vh;
        max-height: 100vh;
        display: flex;
        align-items: center;
        flex-direction: column;
        font-family: "Helvetica", "sans-serif";
        background-image: linear-gradient(
          135deg,
          #6c6c92 0%,
          rgba(219, 219, 219, 0.788) 50%,
          #6c6c92 100%
        );
      }
      p {
        /* font-family: "Helvetica", "sans-serif"; */
        font-size: 36px;
        margin-top: 150px;
        color: rgb(31, 42, 66);
      }
      a {
        margin-top: 250px;
        font-size: 24px;
        padding: 8px;
        border: 2px solid #223322;
        border-radius: 2px;
        background: rgb(253, 247, 247);
        text-decoration: none;
        color: #222222;
      }
      a:hover {
        color: rgb(158, 158, 158);
      }
      a:visited {
        color: #775252;
      }
    </style>
  </head>

  <body>
    <p>
      Welcome to dashboard,
      <?php echo $data['name']; ?>
    </p>
    <a href="logout.php">Logout</a>
  </body>
</html>
