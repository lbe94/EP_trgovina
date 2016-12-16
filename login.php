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
                    <a class="navbar-brand" href="#">E - trgovina</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="h2">Prijavi se</h2>
                </div>
                <div class="panel-body">
                    <form action="login.php" class="col-md-6 col-md-offset-3">
                        <div>
                            <label for="usr">Uporabniško ime:</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div>
                            <label for="pwd">Geslo:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <br>
                        <button type="button" class="btn btn-success btn-lg col-md-6">Prijava</button>
                        <a href="#" class="col-md-offset-2">Nov uporabnik?</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
