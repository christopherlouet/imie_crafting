<?php

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Register
 *
 * @ORM\Table(name="Register", indexes={@ORM\Index(name="fk_Register_Guild_Perso_Perso1_idx", columns={"perso_id"}), @ORM\Index(name="fk_Register_Guild_Perso_Guild1_idx", columns={"guild_id"})})
 * @ORM\Entity
 */
class Register
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Perso
     *
     * @ORM\ManyToOne(targetEntity="Perso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perso_id", referencedColumnName="id")
     * })
     */
    private $perso;

    /**
     * @var \Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     * })
     */
    private $guild;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set perso
     *
     * @param \IMIE\CraftingBundle\Entity\Perso $perso
     * @return Register
     */
    public function setPerso(\IMIE\CraftingBundle\Entity\Perso $perso = null)
    {
        $this->perso = $perso;

        return $this;
    }

    /**
     * Get perso
     *
     * @return \IMIE\CraftingBundle\Entity\Perso 
     */
    public function getPerso()
    {
        return $this->perso;
    }

    /**
     * Set guild
     *
     * @param \IMIE\CraftingBundle\Entity\Guild $guild
     * @return Register
     */
    public function setGuild(\IMIE\CraftingBundle\Entity\Guild $guild = null)
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * Get guild
     *
     * @return \IMIE\CraftingBundle\Entity\Guild 
     */
    public function getGuild()
    {
        return $this->guild;
    }
}
