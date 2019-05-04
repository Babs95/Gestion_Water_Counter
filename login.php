<!DOCTYPE html>
<html lang="en">
<head>
    <title>AUTHENTIFICATION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="public2/login2/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public2/login2/css/util.css">
    <link rel="stylesheet" type="text/css" href="public2/login2/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('public/login2/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="loginController">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-youtube"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27" >
						SEN_NOKH
					</span>
                <!-- Ceci permet d'afficher au niveau de la page login le message d'erreur si le login ou le mot de passe sont incorrect-->
                <?php

                if(isset($_GET['error'])){
                echo "<div style='color:#ff0000;'>Email ou Password incorrect</div>";
                echo "<div class=\"alert alert-dismissible alert-danger\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>Oh Erreur!</strong> <a href=\"#\" class=\"alert-link\">Email ou Password incorrect</a>Réessayer de nouveau.
             </div>";
                }
                ?>

                <div class="wrap-input100 validate-input" data-validate = "Entrer votre email">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Entrer le mot de passe">
                    <input class="input100" type="password" name="pass" placeholder="Mot de Passe">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Se Connecter
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="public2/login2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/vendor/bootstrap/js/popper.js"></script>
<script src="public2/login2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/vendor/daterangepicker/moment.min.js"></script>
<script src="public2/login2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="public2/login2/js/main.js"></script>

</body>
</html>