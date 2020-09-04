<?php

namespace App\DataFixtures;

use App\Entity\ArtworkRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * LoadArtworkRole form.
 */
class ArtworkRoleFixtures extends Fixture {
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em) {
        for ($i = 0; $i < 4; $i++) {
            $fixture = new ArtworkRole();
            $fixture->setName('artwork-role-' . $i);
            $fixture->setLabel('Artwork Role ' . $i);
            $em->persist($fixture);
            $this->setReference('artworkrole.' . $i, $fixture);
        }

        $em->flush();
    }
}