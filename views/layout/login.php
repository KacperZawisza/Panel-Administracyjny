<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link type="text/css" rel="stylesheet" href="<?=BASE_URL;?>/assets/css/styles.css">
</head>
<body>

    <div class="login-container">
    <div class="login-all">
        <div class="login-image"><img src="<?=BASE_URL;?>/assets/images/logo.svg"></div>

        <?php if (isset($error) && !empty($error)) : ?>
            <div id="login_error" style="display: block;">
                <strong>Błąd:</strong> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?=BASE_URL;?>/login/validate" method="POST">
            <p>
                <label for="email">Adres e-mail</label><br>
                <input type="email" name="email" required>
            </p>

            <p>
                <label for="password">Hasło</label><br>
                <input type="password" name="password" required>
            </p>
            
            <p class="submit">
                <input type="submit" value="Zaloguj się">
            </p>

            <p class="forgetmenot">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever"> 
                <label for="rememberme">Zapamiętaj mnie</label>
            </p>
            <div style="clear: both;"></div>
        </form>
        <a href="http://localhost/PracowniaProjektowaniaStronInternetowych/Swooshspot">&larrhk; Przejdź na SwooshSpot</a>
    </div>
    </div>
</body>
</html><?php if (isset($error) && !empty($error)) : ?>
            <div id="login_error" style="display: block;">
                <strong>Błąd:</strong> <?php echo $error; ?>
            </div>
        <?php endif; ?>
