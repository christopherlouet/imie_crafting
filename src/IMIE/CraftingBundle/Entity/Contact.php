<?php

namespace IMIE\CraftingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="Contact", indexes={@ORM\Index(name="fk_Contact_Perso_idx", columns={"perso_ref_id"}), @ORM\Index(name="fk_Contact_Perso1_idx", columns={"perso_id"})})
 * @ORM\Entity
 */
class Contact
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
     *   @ORM\JoinColumn(name="perso_ref_id", referencedColumnName="id")
     * })
     */
    private $persoRef;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set persoRef
     *
     * @param \IMIE\CraftingBundle\Entity\Perso $persoRef
     * @return Contact
     */
    public function setPersoRef(\IMIE\CraftingBundle\Entity\Perso $persoRef = null)
    {
        $this->persoRef = $persoRef;

        return $this;
    }

    /**
     * Get persoRef
     *
     * @return \IMIE\CraftingBundle\Entity\Perso 
     */
    public function getPersoRef()
    {
        return $this->persoRef;
    }

    /**
     * Set perso
     *
     * @param \IMIE\CraftingBundle\Entity\Perso $perso
     * @return Contact
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
}
