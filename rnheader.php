<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Start Bootstrap Template </title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/logo-nav.css" rel="stylesheet">
        <link href="tryCssFile.css" rel="stylesheet" type ="text/css"/>

    </head>
    <body>
  <?php
        include 'rnfunctions.php';
        session_start();

        if (isset($_SESSION['user']))
          {
            $user = $_SESSION['user'];
            $loggedin= TRUE;
          }
        else $loggedin = FALSE;

// echo "<html><head><title>$appname";

if($loggedin) echo "($user)";
// echo "</title></head><body><font face='verdana' size = '2'>";
// echo "<h2>$appname</h2>";
echo <<<_END
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="http://placehold.it/150x50&text=Logo" alt="">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
_END;

        if($loggedin)
          {
            echo "  <li>
                      <a href='rnmembers.php?view=$user'>Home</a>
                    </li>
                    <li>
                        <a href='rnmembers.php'>Members</a>
                    </li>
                    <li>
                        <a href='rnfriends.php'>Friends</a>
                    </li>
                    <li>
                        <a href='rnmessages.php'>Messages</a>
                    </li>
                    <li>
                        <a href='rnprofile.php'>Profile</a>
                    </li>
                    <li>
                        <a href='rnlogout.php'>Log out</a>
                    </li>
                <b id = \"introName\">$user</b>:

            ";
          }
        else
          {
            echo "
            <li>
                <a href='index.php'>Home</a>
            </li>
            <li>
                <a href='rnsignup.php'>Sign up</a>
            </li>
            <li>
                <a href='rnlogin.php'>Log in</a>
            </li>

            ";
          }

          echo "
                  </ul>
              </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
        </nav>
             ";

echo <<<_END
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1></h1>
                <p></p>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

_END;

    ?>

  </body>
</html>
