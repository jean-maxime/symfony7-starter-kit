## Symfony 7 starter kit

Ce starter kit est basé sur le framework Symfony 7.0.* et utilise les composants suivants :

- [Symfony 7.0.*](https://symfony.com/)
- [AssetMapper](https://symfony.com/doc/current/frontend/asset_mapper.html)
- [Verify Email Bundle](https://github.com/symfonycasts/verify-email-bundle)
- [Picocss](https://picocss.com/docs/)
- [Mailer](https://symfony.com/doc/current/mailer.html)
- [Symfony UX Turbo](https://symfony.com/bundles/ux-turbo/current/index.html)

## Installation :

<p>Le repository est fait de manière à pouvoir être cloné directement et à pouvoir être utilisé comme base de projet.</p>
<p>Vous pouvez utiliser Docker ou installer le projet directement sur votre machine.</p>

## À faire après l'installation :

- Modifier le fichier .env pour configurer la base de données et le mailer
- Lancer la commande `bin/console doctrine:migrations:migrate` pour créer les tables en base de données
- Lancer la commande `bin/console asset-map:compile` pour compiler les assets
- Lancer la commande `bin/console messenger:consume async` pour lancer le worker de vérification des emails
- Modifier le fichier `src/Controller/RegistrationController.php` pour modifier les informations de l'expéditeur des
  emails
- Modifier le fichier `src/Service/MailerService.php` pour modifier les informations de l'expéditeur des
  emails

## Fonctionnalités :

- [x] Initialisation du projet
- [x] Configuration de la base de données
- [x] Configuration de l'asset mapper
- [x] Gestion des utilisateurs (connexion, inscription, mot de passe oublié)

## Commandes utiles :

- `bin/console doctrine:migrations:migrate` : Pour créer les tables en base de données
- `bin/console asset-map:compile` : Pour compiler les assets avant déploiement
- `bin/console messenger:consume async` : Pour lancer le worker de vérification d'envoi des emails



