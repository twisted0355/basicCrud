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
    // to sha256 into database
    $pwd256 = hash("sha256",$pwd);

    $sql="SELECT users.idusers, users.thename, users.themail,
	perm.thename AS permname, perm.theperm
	FROM users
    INNER JOIN perm
		ON perm.idperm = users.perm_idperm
    WHERE users.thelogin='$login' AND users.thepwd='$pwd256';";

    $req = mysqli_query($db,$sql);

    // si connecté
    if(mysqli_num_rows($req)){
        // création de la session avec les valeurs récupérées et le phpsessid (session_id())
        $_SESSION = mysqli_fetch_assoc($req);
        $_SESSION['myident']=session_id();
        // actualisation
        header("Location: ./");
    }else{
        return false;
    }

}