## Symfony 7 Starter Kit

This starter kit is based on the Symfony 7.0.* framework and utilizes the following components:

- [Symfony 7.0.*](https://symfony.com/)
- [AssetMapper](https://symfony.com/doc/current/frontend/asset_mapper.html)
- [Verify Email Bundle](https://github.com/symfonycasts/verify-email-bundle)
- [Picocss](https://picocss.com/docs/)
- [Mailer](https://symfony.com/doc/current/mailer.html)
- [Symfony UX Turbo](https://symfony.com/bundles/ux-turbo/current/index.html)

## Installation:

<p>The repository is designed to be cloned directly and used as a project base.</p>
<p>You can use Docker or install the project directly on your machine.</p>

## Steps to take after installation:

- Modify the .env file to configure the database and mailer settings
- Run the command `bin/console doctrine:migrations:migrate` to create the database tables
- Run the command `bin/console messenger:consume async` to start the email verification worker
- Modify the file `src/Service/MailerService.php` to change the sender's email information

## Features:

- [x] Project initialization
- [x] Database configuration
- [x] Asset mapper configuration
- [x] User management (login, registration, forgot password)

## Useful commands:

- `bin/console doctrine:migrations:migrate`: To create database tables
- `bin/console asset-map:compile`: To compile assets before deployment
- `bin/console messenger:consume async`: To start the email delivery verification worker
