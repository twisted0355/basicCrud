<?php

/*
 *
 * public function
 *
 */

// recuparation all articles for homepage

function recupArticleHomepage(mysqli $db){
    $sql="SELECT a.idarticle, a.thetitle,LEFT(a.thetext,350) AS thetext, a.thedate,
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

// recuparation one article by idarticle

function recupOneArticle(mysqli $db, int $id){
    $idarticle = (int) $id;
    $sql="SELECT a.thetitle, a.thetext, a.thedate,
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
	WHERE a.thevisibility=1 AND a.idarticle=$idarticle
    GROUP BY a.idarticle
;";
    $recup = mysqli_query($db,$sql);

    if(mysqli_num_rows($recup)){
        return mysqli_fetch_assoc($recup);
    }else{
        return false;
    }
}

/*
 * Récupération des articles se trouvant dans une rubrique en version optimisée
 */
function recupArticleRub(mysqli $db, int $idRub){
    $idRub = (int) $idRub;
    $sql="SELECT a.idarticle, a.thetitle,LEFT(a.thetext,300) AS thetext, a.thedate,
	   u.thename,
       GROUP_CONCAT(r.idrubrique ORDER BY r.theintitule) AS idrubrique, 
       GROUP_CONCAT(r.theintitule ORDER BY r.theintitule SEPARATOR '|@|') AS theintitule
	FROM article a
    INNER JOIN users u
		ON u.idusers = a.users_idusers
    INNER JOIN article_has_rubrique h
		ON h.article_idarticle = a.idarticle
    INNER JOIN rubrique r
		ON h.rubrique_idrubrique = r.idrubrique
	WHERE a.thevisibility=1
		AND a.idarticle IN (SELECT art.idarticle FROM rubrique rub
					INNER JOIN article_has_rubrique has 
						ON has.rubrique_idrubrique = rub.idrubrique
					INNER JOIN article art 
						ON art.idarticle = has.article_idarticle
					WHERE has.rubrique_idrubrique= $idRub
                    ORDER BY rub.theintitule ASC)
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



/*
 *
 * Rédacteur function
 *
 */

// recuparation all articles for homepage

function recupArticleRedac(mysqli $db, int $idusers){

    $idusers = (int)$idusers;

    $sql="SELECT a.idarticle, a.thetitle,LEFT(a.thetext,350) AS thetext, a.thedate, a.thevisibility,
       GROUP_CONCAT(r.idrubrique ORDER BY r.theintitule) AS idrubrique, 
       GROUP_CONCAT(r.theintitule ORDER BY r.theintitule SEPARATOR '|@|') AS theintitule
	FROM article a
    LEFT JOIN article_has_rubrique h
		ON h.article_idarticle = a.idarticle
    LEFT JOIN rubrique r
		ON h.rubrique_idrubrique = r.idrubrique
	WHERE a.users_idusers = $idusers
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