CREATION OF PROJECT
I. INSTALL REQUIRED
We use ORM packages: composer require symfony/orm-pack
Use symfony runtime for console on bin: composer require symfony/runtime
Use maker package: composer require symfony/maker-bundle --dev
1. Creations of Entities
I created the entities by using symfony cli
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
- Event entity
- Tournament
- TypeGame
- PlayerLevel
- Player
- Team
- Pre-registration