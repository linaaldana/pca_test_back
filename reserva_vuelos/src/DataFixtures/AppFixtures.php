<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\AerolineaFactory;
use App\Factory\VueloFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        AerolineaFactory::createMany(8);
        VueloFactory::createMany(8, function(){
            return ['aerolinea' => AerolineaFactory::random()];
        });

    }
}
