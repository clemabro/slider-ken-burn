<?php

?>
<head>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vues/lib/notiflix/notiflix-2.1.3.min.css">
    <script src="vues/lib/notiflix/notiflix-2.1.3.min.js"></script>
    <link rel="stylesheet" href="vues/css/connexion/connexion.css">
    <script src="vues/js/connexion/connexion.js"></script>
    <link rel="icon" href="vues/img/favicon.ico"/>
    <title><?php echo $title;?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Me connecter</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">M'inscrire</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" required class="form-control" placeholder="Nom d'utilisateur" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" required class="form-control" placeholder="Mot de passe">
                                    </div>
                                    <!--
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" require tabindex="4" class="form-control btn btn-login" onclick="connexion(event);" value="Me connecter">
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                </form>
                                <form id="register-form" action="inscription" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" required class="form-control" placeholder="Nom d'utilisateur" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" required class="form-control" placeholder="Mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="confirm-password" required tabindex="2" class="form-control" placeholder="Confirmez le mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" onclick="verifyRegister(event);" value="M'inscrire">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>