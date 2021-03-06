<?php

/**
 * Register entity.
 *
 */
namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Register class.
 *
 * @ORM\Table(name="Register", indexes={@ORM\Index(name="fk_Register_Guild_Perso_Perso1_idx", columns={"perso_id"}), @ORM\Index(name="fk_Register_Guild_Perso_Guild1_idx", columns={"guild_id"})})
 * @ORM\Entity
 */
class Register {
	/**
	 * Id of register.
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 * Level of register.
	 *
	 * @var integer @ORM\Column(name="level", type="integer", nullable=false)
	 */
	private $level;
	
	/**
	 * Rang of register.
	 *
	 * @var integer @ORM\Column(name="rang", type="integer", nullable=false)
	 */
	private $rang;
	
	/**
	 * Perso of register.
	 *
	 * @var \Perso @ORM\ManyToOne(targetEntity="Perso")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="perso_id", referencedColumnName="id")
	 *      })
	 */
	private $perso;
	
	/**
	 * Guild of register.
	 *
	 * @var \Guild @ORM\ManyToOne(targetEntity="Guild")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
	 *      })
	 */
	private $guild;
	
	/**
	 * Get id of register.
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set level of register.
	 *
	 * @param integer $level        	
	 * @return Register
	 */
	public function setLevel($level) {
		$this->level = $level;
		
		return $this;
	}
	
	/**
	 * Get level of register.
	 *
	 * @return integer
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Set rang of register.
	 *
	 * @param integer $rang        	
	 * @return Register
	 */
	public function setRang($rang) {
		$this->rang = $rang;
		
		return $this;
	}
	
	/**
	 * Get rang of register.
	 *
	 * @return integer
	 */
	public function getRang() {
		return $this->rang;
	}
	
	/**
	 * Set perso of register.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Perso $perso        	
	 * @return Register
	 */
	public function setPerso(\IMIE\CraftingBundle\Entity\Perso $perso = null) {
		$this->perso = $perso;
		
		return $this;
	}
	
	/**
	 * Get perso of register.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Perso
	 */
	public function getPerso() {
		return $this->perso;
	}
	
	/**
	 * Set guild of register.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Guild $guild        	
	 * @return Register
	 */
	public function setGuild(\IMIE\CraftingBundle\Entity\Guild $guild = null) {
		$this->guild = $guild;
		
		return $this;
	}
	
	/**
	 * Get guild of register.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Guild
	 */
	public function getGuild() {
		return $this->guild;
	}
}
