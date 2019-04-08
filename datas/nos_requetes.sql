# les rubriques pour le menu
SELECT idrubrique, theintitule FROM rubrique ORDER BY theintitule ASC;
# les articles pour la homepage par date descendante, avec l'auteur, lorsqu'ils sont visibles
SELECT article.idarticle, article.thetitle,LEFT(article.thetext,300) AS thetext, article.thedate,
	   users.thename
	FROM article
    INNER JOIN users
		ON users.idusers = article.users_idusers
	WHERE article.thevisibility=1
    ORDER BY article.thedate DESC
;