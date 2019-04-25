# les rubriques pour le menu
SELECT idrubrique, theintitule FROM rubrique ORDER BY theintitule ASC;

# les articles pour la homepage par date descendante, avec l'auteur, lorsqu'ils sont visibles
SELECT article.idarticle, article.thetitle,LEFT(article.thetext,300) AS thetext, article.thedate,
	   users.thename,
       GROUP_CONCAT(rubrique.idrubrique ORDER BY rubrique.theintitule) AS idrubrique, 
       GROUP_CONCAT(rubrique.theintitule ORDER BY rubrique.theintitule SEPARATOR '|@|') AS theintitule
	FROM article
    INNER JOIN users
		ON users.idusers = article.users_idusers
    LEFT JOIN article_has_rubrique
		ON article_has_rubrique.article_idarticle = article.idarticle
    LEFT JOIN rubrique
		ON article_has_rubrique.rubrique_idrubrique = rubrique.idrubrique
	WHERE article.thevisibility=1
    GROUP BY article.idarticle
    ORDER BY article.thedate DESC
;

# idem avec alias de tables
SELECT a.idarticle, a.thetitle,LEFT(a.thetext,300) AS thetext, a.thedate,
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
;

# affichage d'un article complet avec sesjointures

SELECT a.thetitle, a.thetext, a.thedate,
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
	WHERE a.thevisibility=1 AND a.idarticle=1
    GROUP BY a.idarticle
;

# affichage d'une catégorie complète grace à son id
SELECT * FROM rubrique WHERE idrubrique=1;