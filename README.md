CREATION OF PROJECT
# 1. INSTALL REQUIRED
We use ORM packages: composer require symfony/orm-pack
Use symfony runtime for console on bin: composer require symfony/runtime
Use maker package: composer require symfony/maker-bundle --dev
php composer.phar require security
php composer.phar require twig
php composer.phar require form validator
php composer.phar require symfonycasts/verify-email-bundle symfony/mailer
php composer.phar require symfony/google-mailer
php composer.phar symfonycasts/reset-password-bundle 

# 2 Creations of Entities
I created the entities by using symfony cli
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate ( Or 'DoctrineMigrations\Version2021....' to select the version to migrate)
- Event entity
- Tournament
- TypeGame
- PlayerLevel
- Player
- Team
- Pre-registration
- User
# 3 Creations of Controllers without Role
This part is using for test the main functions of Application by using Restful API. Then I will make the authentication for each Role of users in next part.
3.1. PlayerLevel Controler

# 4 make authentication
php bin/console make:auth -> make login/logout form
php bin/console make:registration-form -> make registers form

