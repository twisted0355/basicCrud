<?php

/*
 *
 * connexion to admin
 *
 * @
 *
 */
function ConnectUser(mysqli $db,$login,$pwd){
    $login = htmlspecialchars(strip_tags(trim($login)),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)),ENT_QUOTES);
    $pwd256 = hash("sha256",$pwd);

    $sql="SELECT users.idusers, users.thename, users.themail,
	perm.thename AS permname, perm.theperm
	FROM users
    INNER JOIN perm
		ON perm.idperm = users.perm_idperm
    WHERE users.thelogin='$login' AND users.thepwd='$pwd256';";
}