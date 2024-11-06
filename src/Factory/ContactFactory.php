<?php

namespace App\Factory;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Contact>
 *
 * @method        Contact|Proxy                              create(array|callable $attributes = [])
 * @method static Contact|Proxy                              createOne(array $attributes = [])
 * @method static Contact|Proxy                              find(object|array|mixed $criteria)
 * @method static Contact|Proxy                              findOrCreate(array $attributes)
 * @method static Contact|Proxy                              first(string $sortedField = 'id')
 * @method static Contact|Proxy                              last(string $sortedField = 'id')
 * @method static Contact|Proxy                              random(array $attributes = [])
 * @method static Contact|Proxy                              randomOrCreate(array $attributes = [])
 * @method static ContactRepository|ProxyRepositoryDecorator repository()
 * @method static Contact[]|Proxy[]                          all()
 * @method static Contact[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Contact[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Contact[]|Proxy[]                          findBy(array $attributes)
 * @method static Contact[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Contact[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class ContactFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Contact::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'email' => self::faker()->text(100),
            'firstname' => self::faker()->text(30),
            'lastname' => self::faker()->text(40),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Contact $contact): void {})
        ;
    }
}
