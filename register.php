<?php
/**
 * Created by PhpStorm.
 * User: Puska
 * Date: 13. 01. 2017
 * Time: 20:40
 */
include("register_script.php");

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>E - trgovina</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="engine.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="login.php">E - trgovina</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="h2">Ustvari nov račun</h2>
                </div>
                <div class="panel-body">
                    <form action="register.php" class="col-md-6 col-md-offset-3" method="post">
                        <div>
                            <label for="usr">Ime:</label>
                            <input type="text" class="form-control" id="ime" name="ime" required>
                        </div>
                        <div>
                            <label for="usr">Priimek:</label>
                            <input type="text" class="form-control" id="priimek" name="priimek" required>
                        </div>
                        <div>
                            <label for="usr">E-mail:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="pwd">Geslo:</label>
                            <input type="password" class="form-control" id="pwd" name="password1" required>
                        </div>
                        <div>
                            <label for="pwd">Potrditev gesla:</label>
                            <input type="password" class="form-control" id="pwd" name="password2" required>
                         </div>
                        <br>
                        <input type="submit" name="register" class="btn btn-success btn-lg col-md-6" value="Ustvari">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>