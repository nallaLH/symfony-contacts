# TP1 Découverte de Symfony (symfony-contacts)

## Auteur(s)
LAHEU Allan

## Installation / Configuration

### Installation par `Composer`

Lancer `composer install` pour installer [PHP Coding Standards Fixer](https://cs.symfony.com/) et le configurer dans PhpStorm (le fichier `.php-cs-fixer.php` contient les règles personnalisées basées sur la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html))

### Configurer PhpStorm

Configurer l'intégration de PHP Coding Standards Fixer dans PhpStorm en fixant le jeu de règles sur `Custom` et en désignant `.php-cs-fixer.php` comme fichier de configuration de règles de codage. 

## Serveur Web local

Lancez le serveur Web local avec cette commande :
```bash
composer start
```
### Accès au serveur Web
Naviguez alors à partir de cette adresse : <https://127.0.0.1:8000/>

## Style de codage

Le code suit la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html) :
- il peut être contrôlé avec `composer test:phpcs`
- il peut être reformaté automatiquement avec `composer fix:phpcs`
- il peut être contrôlé avec `composer test:twigcs`
- il peut être reformaté automatiquement avec `composer fix:twigcs`
- il peut être contrôlé avec `composer test` qui teste la mise en forme PHP, Twig et lance les tests de Codeception

## Codeception

Nettoyez le répertoire output et lancez les tests Codeception avec `composer test:codeception`

## Base de données

Pour détruire la base de données, la créer, y générer des données factices tout en appliquant des migrations successives : `composer db`