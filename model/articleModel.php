<?php

// recuparation all articles for homepage


// ICI rajouter sections

function recupArticleHomepage(mysqli $db){
    $sql="SELECT a.idarticle, a.thetitle,LEFT(a.thetext,300) AS thetext, a.thedate,
	   u.thename,
       GROUP_CONCAT(r.idrubrique ORDER BY r.theintitule) AS idrubrique, 
       GROUP_CONCAT(r.theintitule ORDER BY r.theintitule SEPARATOR '|@|') AS theintitule
	FROM article a
    INNER JOIN users u
		ON u.idusers = a.users_idusers
    LEFT JOIN article_has_rubrique h
		ON h.article_idarticle = a.idarticle
    LEFT JOIN rubrique r
		ON h.rubrique_idrubrique = r.idrubrique
	WHERE a.thevisibility=1
    GROUP BY a.idarticle
    ORDER BY a.thedate DESC
;";
    $recup = mysqli_query($db,$sql);

    if(mysqli_num_rows($recup)){
        return mysqli_fetch_all($recup, MYSQLI_ASSOC);
    }else{
        return false;
    }

}