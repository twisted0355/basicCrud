-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 avr. 2019 à 09:47
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `basiccrud`
--

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `thetitle`, `thetext`, `thedate`, `thevisibility`, `users_idusers`) VALUES
(1, 'Reprise en main ?', 'J’ai lu dans la presse un roman sur ma « reprise en main de la campagne ». Comme si j’étais susceptible d’avoir jamais quitté mon poste de combat dans ce domaine ! J’ai même lu une mise en scène de « mes doutes ».  Comme si un homme qui a fait ma trajectoire pouvait agir autrement que par confiance inébranlable dans l’avenir de la cause qu’il incarne à l’heure où les événements confirment ses analyses !\r\n\r\nLa manœuvre sent surtout la misogynie à plein nez. Manon Aubry, notre tête de liste étant une femme, jeune et sans passé politique, les vieux et vieilles du système médiatique s’en donnent à cœur joie contre elle. La réalité c’est que ma présence plus active était prévue à cette étape de la campagne. Elle a lieu. Imaginait-on que je ne prenne aucune part à cette bataille ? Nous avons donc dosé pour laisser le temps à la liste de s’installer dans le paysage médiatique. J’estime que l’apparition de Manon Aubry dans le classement des personnalités à qui est souhaitée une influence croissante est un bon signe de réussite de celle-ci. Qu’elle soit d’ores et déjà devant Jadot et Faure dans ce classement devrait inspirer plus de respect que de jalousie ou de machisme dans les rédactions. Faut-il souligner à quel point c’est une fierté pour nous d’avoir eu son accord pour mener notre liste et de l’avoir vu assimiler en si peu de temps tous les savoir-faire qu’exige cette position éminente ?\r\n\r\nJ’y trouve pour ma part la confirmation de la méthode de construction ouverte pour notre force politique qui prévaut à cette heure. Mon travail depuis la présidentielle consiste à installer « La France insoumise » comme une force pérenne, avec ou sans moi. Ce travail passe par l’émergence de nouveaux visages exprimant aussi largement que possible les réalités sociales et culturelles si différentes qui composent notre peuple. Depuis l’élection législative, les membres du groupe parlementaire à l’Assemblée Nationale ont réussi cette percée. Dans la même séquence plusieurs autres visages se sont imposés. Ils sont venus du Mouvement « insoumis » lui-même et à présent de la liste des candidats de l’élection européenne. Parmi tous ceux-là, des figures se remarquent davantage qui captent d’une façon singulière une ample sympathie populaire par leur manière d’être autant que par leurs messages. Rien ne correspond mieux a mon plan de marche. Tout cela, bien sûr, ne dépend pas de moi mais du talent et des opportunités que chacun(e) a su relever ou pas.\r\n\r\nMon rôle à cette étape est de rendre possible la cohabitation de tant de gens différents et d’organiser le jeu de l’orchestre. Notre propos n’est pas de produire un présidium de je ne sais quel improbable soviet suprême mais de mettre en place une équipe capable de gouverner le pays et de mener à son terme la révolution citoyenne qu’il contient. Nous formons un ensemble d’un genre nouveau par rapport aux autres familles politiques de la vieille gauche où les luttes de personnes continuent à être centrales. C’est pourquoi tant de commentateurs voudraient que nous y sombrions à notre tour et arrangent pour cela des mises en scène. Mais finalement celles-ci sont bien utile à notre système puisqu’il valide que je n’en suis pas la seule figure. L’existence d’une liste d’héritier(e)s réels ou supposés est finalement un signe de bonne santé que l’on n’observe pas partout…\r\n\r\nMais devant notre famille politique et devant la société, la crédibilité d’une alternative politique passe par l’existence d’une véritable équipe variée mais unie comme nous devons l’être. Il est donc normal que tous les professeurs cyclotrons qui ont vécu et vivent de l’impuissance, du croupissement et des sempiternels « débats fondamentaux » clivant n’y trouvent pas leur compte. Ils m’accablent de l’interminable rancœur propre à certaines catégories « d’ex » au lieu d’aider la construction patiente à laquelle nous sommes attelés. Cela n’a aucun impact sur moi. S’ils savent faire mieux, qu’ils le montrent. Mais il est déjà trop tard pour espérer notre disparition et le retour aux délices de la guerre des groupuscules et la compétition des « personnalités ». Tout le futur est dans ces visages que vous voyez rassemblés sur nos affiches et dont vous connaissez souvent mieux les noms et les personnages que celles de bon nombre de mes donneurs de leçons. D’autres s’y adjoindront bientôt. Car si la vieille gauche et les débris du PS ont été incapables de produire autre chose que des malédictions mutuelles, notre liste aux européennes montre que nous savons faire beaucoup mieux. Et ce n’est pas fini.', '2019-04-02 08:00:00', 1, 2);

--
-- Déchargement des données de la table `article_has_rubrique`
--

INSERT INTO `article_has_rubrique` (`article_idarticle`, `rubrique_idrubrique`) VALUES
(1, 2),
(1, 5);

--
-- Déchargement des données de la table `perm`
--

INSERT INTO `perm` (`idperm`, `thename`, `theperm`) VALUES
(1, 'Administrateur', 0),
(2, 'Rédacteur', 1);

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`idrubrique`, `theintitule`, `thedesc`) VALUES
(1, 'BD', 'Une bande dessinée (dénomination communément abrégée en BD ou en bédé) est une forme d\'expression artistique, souvent désignée comme le « neuvième art », utilisant une juxtaposition de dessins (ou d\'autres types d\'images fixes, mais pas uniquement photographiques), articulés en séquences narratives et le plus souvent accompagnés de textes (narrations, dialogues, onomatopées).'),
(2, 'Social', 'Dans une définition large de la notion du social, on peut l\'entendre comme l\'expression de l\'existence de relations et de communication entre les êtres vivants. Bien que toutes les espèces interagissent avec leur environnement, certains animaux sont qualifiés d\'espèces sociales. Il en va de même pour certains insectes et plantes dont les comportements sociaux font objet d\'études.'),
(3, 'Entreprise', 'Une entreprise est une organisation ou une unité institutionnelle , mue par un projet décliné en stratégie, en politiques et en plans d\'action, dont le but est de produire et de fournir des biens ou des services à destination d\'un ensemble de clients ou d\'usagers, en réalisant un équilibre de ses comptes de charges et de produits.'),
(4, 'Belgique', 'Située à mi-chemin entre l’Europe germanique et l’Europe romane, la Belgique abrite principalement deux groupes linguistiques : les néerlandophones, membres de la Communauté flamande (qui constitue 57 % de la population), et les francophones, membres de la Communauté française (qui représente 43 % des Belges).'),
(5, 'Monde', 'A propos du monde.');

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `thelogin`, `thepwd`, `thename`, `themail`, `perm_idperm`) VALUES
(1, 'Admin', 'C1C224B03CD9BC7B6A86D77F5DACE40191766C485CD55DC48CAF9AC873335D6F', 'Pitz Michaël', 'michael.pitz@cf2m.be', 1),
(2, 'Redac1', 'C5C2B11535B1A623C65F6C8856C87095176905797471EF56644A07304970F348', 'JL Mélenchon', 'jlm@gmail.com', 2);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
