<?php

namespace App\Factory;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Category>
 *
 * @method        Category|Proxy                              create(array|callable $attributes = [])
 * @method static Category|Proxy                              createOne(array $attributes = [])
 * @method static Category|Proxy                              find(object|array|mixed $criteria)
 * @method static Category|Proxy                              findOrCreate(array $attributes)
 * @method static Category|Proxy                              first(string $sortedField = 'id')
 * @method static Category|Proxy                              last(string $sortedField = 'id')
 * @method static Category|Proxy                              random(array $attributes = [])
 * @method static Category|Proxy                              randomOrCreate(array $attributes = [])
 * @method static CategoryRepository|ProxyRepositoryDecorator repository()
 * @method static Category[]|Proxy[]                          all()
 * @method static Category[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Category[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Category[]|Proxy[]                          findBy(array $attributes)
 * @method static Category[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Category[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class CategoryFactory extends PersistentProxyObjectFactory
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
        return Category::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        $word = mb_convert_case(self::faker()->word(), MB_CASE_TITLE);

        return [
            'name' => $word,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Category $category): void {})
        ;
    }
}
