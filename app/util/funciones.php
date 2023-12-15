<?php

function getRealIP()
{
  $ip = $_SERVER['SERVER_ADDR'];
    if (PHP_OS == 'WINNT'){
        $ip = getHostByName(getHostName());
    }
    if (PHP_OS == 'Linux'){
        $command="/sbin/ifconfig";
        exec($command, $output);
        // var_dump($output);
        $pattern = '/inet addr:?([^ ]+)/';
        $ip = array();
        foreach ($output as $key => $subject) {
            $result = preg_match_all($pattern, $subject, $subpattern);
            if ($result == 1) {
                if ($subpattern[1][0] != "127.0.0.1")
                $ip = $subpattern[1][0];
            }
        }
    }
    return $ip;
}


function EntradaSegura($dato) {
  $dato = trim($dato);
  $dato = stripslashes($dato);
  $dato = htmlspecialchars($dato,ENT_QUOTES,"ISO-8859-1");
  $dato = strip_tags($dato);
  $dato = htmlentities($dato);
  return $dato;
}

/******************************************/
/******* Funciones de encriptación ********/
/******************************************/
function encripta($password) {
  return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}

function desencripta($password, $hash) {
  return password_verify($password, $hash);
}

function encrypt ($input,$Key="C0mf4n0rt32020") {
    $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($Key), $input, MCRYPT_MODE_CBC, md5(md5($Key))));
    return $output;
  }

function decrypt ($input,$Key="C0mf4n0rt32020") {
    $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($Key))), "\0");
    return $output;
  }
/***************************************************/

?>
