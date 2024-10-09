# TP1 Découverte de Symfony (symfony-contacts)

## Auteur(s)
LAHEU Allan

## Installation / Configuration

### Installation par `Composer`

Lancer `composer install` pour installer [PHP Coding Standards Fixer](https://cs.symfony.com/) et le configurer dans PhpStorm (le fichier `.php-cs-fixer.php` contient les règles personnalisées basées sur la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html))

### Configurer PhpStorm

Configurer l'intégration de PHP Coding Standards Fixer dans PhpStorm en fixant le jeu de règles sur `Custom` et en désignant `.php-cs-fixer.php` comme fichier de configuration de règles de codage. 



## Style de codage

Le code suit la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html) :
- il peut être contrôlé avec `composer test:cs`
- il peut être reformaté automatiquement avec `composer fix:cs`