<?php

// recuparation all articles for homepage


// ICI rajouter sections

function recupArticleHomepage(mysqli $db){
    $sql="SELECT article.idarticle, article.thetitle,LEFT(article.thetext,300) AS thetext, article.thedate,
	   users.thename
	FROM article
    INNER JOIN users
		ON users.idusers = article.users_idusers
	WHERE article.thevisibility=1
    ORDER BY article.thedate DESC
;";
    $recup = mysqli_query($db,$sql);

    if(mysqli_num_rows($recup)){
        return mysqli_fetch_all($recup, MYSQLI_ASSOC);
    }else{
        return false;
    }

}