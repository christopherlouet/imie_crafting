<?php

/**
 * Guild entity.
 *
 */

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guild class.
 *
 * @ORM\Table(name="Guild")
 * @ORM\Entity
 */
class Guild {
	/**
	 * Id of guild.
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 * Name of guild.
	 *
	 * @var string @ORM\Column(name="name", type="string", length=45, nullable=false)
	 */
	private $name;
	
	/**
	 * Banner of guild.
	 *
	 * @var string @ORM\Column(name="banner", type="string", length=45, nullable=false)
	 */
	private $banner;
	
	/**
	 * Get id of guild.
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set name of guild.
	 *
	 * @param string $name        	
	 * @return Guild
	 */
	public function setName($name) {
		$this->name = $name;
		
		return $this;
	}
	
	/**
	 * Get name of guild.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Set banner of guild.
	 *
	 * @param string $banner        	
	 * @return Guild
	 */
	public function setBanner($banner) {
		$this->banner = $banner;
		
		return $this;
	}
	
	/**
	 * Get banner of guild.
	 *
	 * @return string
	 */
	public function getBanner() {
		return $this->banner;
	}
	
	/**
	 *
	 * Representation of guild.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->name;
	}
}
