<?php

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perso.
 *
 * @ORM\Table(name="Perso", indexes={@ORM\Index(name="fk_Perso_Helmet1_idx", columns={"Helmet_id"}), @ORM\Index(name="fk_Perso_Boot1_idx", columns={"Boot_id"}), @ORM\Index(name="fk_Perso_Leg1_idx", columns={"Leg_id"}), @ORM\Index(name="fk_Perso_Guild1_idx", columns={"Guild_id"})})
 * @ORM\Entity
 */
class Perso {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 *
	 * @var string @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;
	
	/**
	 *
	 * @var integer @ORM\Column(name="level", type="integer", nullable=false)
	 */
	private $level;
	
	/**
	 *
	 * @var string @ORM\Column(name="class", type="string", length=45, nullable=false)
	 */
	private $class;
	
	/**
	 *
	 * @var string @ORM\Column(name="race", type="string", length=45, nullable=false)
	 */
	private $race;
	
	/**
	 *
	 * @var string @ORM\Column(name="sexe", type="string", length=45, nullable=false)
	 */
	private $sexe;
	
	/**
	 *
	 * @var \Helmet @ORM\ManyToOne(targetEntity="Helmet")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="Helmet_id", referencedColumnName="id")
	 *      })
	 */
	private $helmet;
	
	/**
	 *
	 * @var \Boot @ORM\ManyToOne(targetEntity="Boot")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="Boot_id", referencedColumnName="id")
	 *      })
	 */
	private $boot;
	
	/**
	 *
	 * @var \Leg @ORM\ManyToOne(targetEntity="Leg")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="Leg_id", referencedColumnName="id")
	 *      })
	 */
	private $leg;
	
	/**
	 *
	 * @var \Guild @ORM\ManyToOne(targetEntity="Guild")
	 *      @ORM\JoinColumns({
	 *      @ORM\JoinColumn(name="Guild_id", referencedColumnName="id")
	 *      })
	 */
	private $guild;
	
	/**
	 * Get id.
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set name.
	 *
	 * @param string $name        	
	 * @return Perso
	 */
	public function setName($name) {
		$this->name = $name;
		
		return $this;
	}
	
	/**
	 * Get name.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Set level.
	 *
	 * @param integer $level        	
	 * @return Perso
	 */
	public function setLevel($level) {
		$this->level = $level;
		
		return $this;
	}
	
	/**
	 * Get level.
	 *
	 * @return integer
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Set class.
	 *
	 * @param string $class        	
	 * @return Perso
	 */
	public function setClass($class) {
		$this->class = $class;
		
		return $this;
	}
	
	/**
	 * Get class.
	 *
	 * @return string
	 */
	public function getClass() {
		return $this->class;
	}
	
	/**
	 * Set race.
	 *
	 * @param string $race        	
	 * @return Perso
	 */
	public function setRace($race) {
		$this->race = $race;
		
		return $this;
	}
	
	/**
	 * Get race.
	 *
	 * @return string
	 */
	public function getRace() {
		return $this->race;
	}
	
	/**
	 * Set sexe.
	 *
	 * @param string $sexe        	
	 * @return Perso
	 */
	public function setSexe($sexe) {
		$this->sexe = $sexe;
		
		return $this;
	}
	
	/**
	 * Get sexe.
	 *
	 * @return string
	 */
	public function getSexe() {
		return $this->sexe;
	}
	
	/**
	 * Set helmet.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Helmet $helmet        	
	 * @return Perso
	 */
	public function setHelmet(\IMIE\CraftingBundle\Entity\Helmet $helmet = null) {
		$this->helmet = $helmet;
		
		return $this;
	}
	
	/**
	 * Get helmet.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Helmet
	 */
	public function getHelmet() {
		return $this->helmet;
	}
	
	/**
	 * Set boot.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Boot $boot        	
	 * @return Perso
	 */
	public function setBoot(\IMIE\CraftingBundle\Entity\Boot $boot = null) {
		$this->boot = $boot;
		
		return $this;
	}
	
	/**
	 * Get boot.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Boot
	 */
	public function getBoot() {
		return $this->boot;
	}
	
	/**
	 * Set leg.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Leg $leg        	
	 * @return Perso
	 */
	public function setLeg(\IMIE\CraftingBundle\Entity\Leg $leg = null) {
		$this->leg = $leg;
		
		return $this;
	}
	
	/**
	 * Get leg.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Leg
	 */
	public function getLeg() {
		return $this->leg;
	}
	
	/**
	 * Set guild.
	 *
	 * @param \IMIE\CraftingBundle\Entity\Guild $guild        	
	 * @return Perso
	 */
	public function setGuild(\IMIE\CraftingBundle\Entity\Guild $guild = null) {
		$this->guild = $guild;
		
		return $this;
	}
	
	/**
	 * Get guild.
	 *
	 * @return \IMIE\CraftingBundle\Entity\Guild
	 */
	public function getGuild() {
		return $this->guild;
	}
	
	/**
	 *
	 * Representation of a perso.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->name;
	}
}
