<?php

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leg
 *
 * @ORM\Table(name="Leg")
 * @ORM\Entity
 */
class Leg {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 *
	 * @var string @ORM\Column(name="name", type="string", length=45, nullable=false)
	 */
	private $name;
	
	/**
	 *
	 * @var integer @ORM\Column(name="rarity", type="integer", nullable=false)
	 */
	private $rarity;
	
	/**
	 *
	 * @var integer @ORM\Column(name="level", type="integer", nullable=false)
	 */
	private $level;
	
	/**
	 *
	 * @var integer @ORM\Column(name="weight", type="integer", nullable=false)
	 */
	private $weight;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set name
	 *
	 * @param string $name        	
	 * @return Leg
	 */
	public function setName($name) {
		$this->name = $name;
		
		return $this;
	}
	
	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Set rarity
	 *
	 * @param integer $rarity        	
	 * @return Leg
	 */
	public function setRarity($rarity) {
		$this->rarity = $rarity;
		
		return $this;
	}
	
	/**
	 * Get rarity
	 *
	 * @return integer
	 */
	public function getRarity() {
		return $this->rarity;
	}
	
	/**
	 * Set level
	 *
	 * @param integer $level        	
	 * @return Leg
	 */
	public function setLevel($level) {
		$this->level = $level;
		
		return $this;
	}
	
	/**
	 * Get level
	 *
	 * @return integer
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Set weight
	 *
	 * @param integer $weight        	
	 * @return Leg
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
		
		return $this;
	}
	
	/**
	 * Get weight
	 *
	 * @return integer
	 */
	public function getWeight() {
		return $this->weight;
	}
	
	/**
	 *
	 * Representation of a leg.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->name;
	}
}
