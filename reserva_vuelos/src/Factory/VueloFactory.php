<?php

namespace App\Factory;

use App\Entity\Vuelo;
use App\Repository\VueloRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Vuelo>
 *
 * @method        Vuelo|Proxy                     create(array|callable $attributes = [])
 * @method static Vuelo|Proxy                     createOne(array $attributes = [])
 * @method static Vuelo|Proxy                     find(object|array|mixed $criteria)
 * @method static Vuelo|Proxy                     findOrCreate(array $attributes)
 * @method static Vuelo|Proxy                     first(string $sortedField = 'id')
 * @method static Vuelo|Proxy                     last(string $sortedField = 'id')
 * @method static Vuelo|Proxy                     random(array $attributes = [])
 * @method static Vuelo|Proxy                     randomOrCreate(array $attributes = [])
 * @method static VueloRepository|RepositoryProxy repository()
 * @method static Vuelo[]|Proxy[]                 all()
 * @method static Vuelo[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Vuelo[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Vuelo[]|Proxy[]                 findBy(array $attributes)
 * @method static Vuelo[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Vuelo[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class VueloFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'destino' => self::faker()->name(255),
            'fechaLlegada' => self::faker()->date(),
            'fechaSalida' => self::faker()->date(),
            'origen' => self::faker()->name(255),
            'precio' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Vuelo $vuelo): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Vuelo::class;
    }
}
