<?php

namespace Swtorelite\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Swtorelite\CraftingBundle\Entity\Rarity;

class rarityData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$rarity = new Rarity();
		$rarity->setName('Bon marché');
		$rarity->setColor('gris');
		$rarity->setLevel(1);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-gris', $rarity);
		
		$rarity = new Rarity();
		$rarity->setName('Standard');
		$rarity->setColor('blanc');
		$rarity->setLevel(2);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-blanc', $rarity);

		$rarity = new Rarity();
		$rarity->setName('Qualité supérieure');
		$rarity->setColor('vert');
		$rarity->setLevel(3);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-vert', $rarity);

		$rarity = new Rarity();
		$rarity->setName('Prototype');
		$rarity->setColor('bleu');
		$rarity->setLevel(4);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-bleu', $rarity);

		$rarity = new Rarity();
		$rarity->setName('Artefact');
		$rarity->setColor('violet');
		$rarity->setLevel(5);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-violet', $rarity);

		$rarity = new Rarity();
		$rarity->setName('Légendaire');
		$rarity->setColor('mauve');
		$rarity->setLevel(6);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-mauve', $rarity);

		$rarity = new Rarity();
		$rarity->setName('Personnalisé');
		$rarity->setColor('orange');
		$rarity->setLevel(7);
		$em->persist($rarity);
		$em->flush();
		$this->addReference('rarity-orange', $rarity);
		
	}

	public function getOrder()
	{
		return 1;
	}
}