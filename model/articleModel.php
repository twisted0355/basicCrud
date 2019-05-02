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

/*
 * creation d'un article
 *
 * @name createArticleRedac
 * @param mysqli
 * @param int -> idusers
 * @param string -> thetitle
 * @param string -> thetext
 * @param string
 * @param array -> idrubrique
 * @return true|false
 */



function createArticleRedac(mysqli $db, int $id, string $thetitle, string $text, string $date, array $rubrique){
    $id = (int) $id;
    $thetitle = htmlspecialchars(strip_tags(trim($thetitle)),ENT_QUOTES);
    $text = htmlspecialchars(strip_tags(trim($text)),ENT_QUOTES);
    $date = date("Y-m-d H:i:s",time());
    $sql = "INSERT INTO article (thetitle,thetext,thedate,users_idusers) VALUES ('$thetitle','$text','$date',$id)";
    // insertion de l'article dans la DB
    $insert = mysqli_query($db,$sql)or die(false);

    // si on a coché des rubriques
    if(!empty($rubrique)){
        // on récupère l'id de la dernière insertion (de l'article) avec mysqli_insert_id
        $idarticle = mysqli_insert_id($db);


        // préparation de la requête avant la boucle
        $sql = "INSERT INTO article_has_rubrique (article_idarticle,rubrique_idrubrique) VALUES ";

        // tant qu'on a des articles
        foreach ($rubrique AS $categ){
            $categ = (int) $categ;
            // concaténation de la requête dans la boucle
            $sql .= " ($idarticle,$categ),";

        }

        // on retire la dernière virgule pour avoir une requête sql valide
        $sql = substr($sql,0,-1);

        // insertion des rubriques dans article_has_rubrique avec un seul INSERT
        mysqli_query($db,$sql)or die(false);
    }
    return true;
}

// recuparation one article by idarticle and idusers for redacteur

function recupOneArticleByUsers(mysqli $db, int $idarticle, int $iduser){
    $idarticle = (int) $idarticle;
    $iduser = (int) $iduser;
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
	WHERE  a.idarticle=$idarticle AND u.idusers = $iduser 
    GROUP BY a.idarticle
;";
    $recup = mysqli_query($db,$sql);

    if(mysqli_num_rows($recup)){
        return mysqli_fetch_assoc($recup);
    }else{
        return false;
    }
}