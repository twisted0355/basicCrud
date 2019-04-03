# basicCrud
procedural basic crud

## création de basicCrud sur github

- clone sur le poste de travail des fichiers .git/ LICENSE et README.md

     git clone https://github.com/WebDevCF2019/basicCrud.git

- Création d'un VirtualHost dans WAMP nommé basiccrud
- Création du .gitignore pour protéger les fichiers non envoyables sur github
- Création d'un dossier publique, qui ne contiendra que le contrôleur frontal, les images, les fichiers css et JS () qui doivent être interprétés par le navigateur: Sécurité optimale
- Changement du VirtualHost qui pointe dorénavant vers /public
- Création hors /public/ de config.php, qui ne sera jamais envoyé sur github
- Création d'une copie de celui-ci ne contenant pas d'information dangereuses sous le nom config.php.rename (utile à la personne voulant installer notre système, à indiquer dans le fichier d'installation)
- Création de datas/ à la racine