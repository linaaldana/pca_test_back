<?php

namespace App\Factory;

use App\Entity\Aerolinea;
use App\Repository\AerolineaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Aerolinea>
 *
 * @method        Aerolinea|Proxy                     create(array|callable $attributes = [])
 * @method static Aerolinea|Proxy                     createOne(array $attributes = [])
 * @method static Aerolinea|Proxy                     find(object|array|mixed $criteria)
 * @method static Aerolinea|Proxy                     findOrCreate(array $attributes)
 * @method static Aerolinea|Proxy                     first(string $sortedField = 'id')
 * @method static Aerolinea|Proxy                     last(string $sortedField = 'id')
 * @method static Aerolinea|Proxy                     random(array $attributes = [])
 * @method static Aerolinea|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AerolineaRepository|RepositoryProxy repository()
 * @method static Aerolinea[]|Proxy[]                 all()
 * @method static Aerolinea[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Aerolinea[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Aerolinea[]|Proxy[]                 findBy(array $attributes)
 * @method static Aerolinea[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Aerolinea[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AerolineaFactory extends ModelFactory
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
            'nombre' => self::faker()->name(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Aerolinea $aerolinea): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Aerolinea::class;
    }
}
