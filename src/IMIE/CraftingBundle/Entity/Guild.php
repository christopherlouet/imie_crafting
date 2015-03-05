<?php

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guild
 *
 * @ORM\Table(name="Guild")
 * @ORM\Entity
 */
class Guild {
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
	 * @var string @ORM\Column(name="banner", type="string", length=45, nullable=false)
	 */
	private $banner;
	
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
	 * @return Guild
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
	 * Set banner
	 *
	 * @param string $banner        	
	 * @return Guild
	 */
	public function setBanner($banner) {
		$this->banner = $banner;
		
		return $this;
	}
	
	/**
	 * Get banner
	 *
	 * @return string
	 */
	public function getBanner() {
		return $this->banner;
	}
	
	/**
	 *
	 * Representation of a guild.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->name;
	}
}
