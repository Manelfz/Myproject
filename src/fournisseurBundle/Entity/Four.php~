<?php

namespace fournisseurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Four
 *
 * @ORM\Table(name="four")
 * @ORM\Entity(repositoryClass="fournisseurBundle\Repository\FourRepository")
 */
class Four
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="achatsBundle\Entity\ach",
     *                  mappedBy="fournisseur",
     *                  cascade={"persist"})
     *
     * @ORM\JoinColumn(nullable=true)
     */    
    private $achats;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_fournisseur", type="string", length=25, unique=true)
     */
    private $nomFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_personne", type="string", length=25)
     */
    private $nomPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, unique=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer", unique=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", unique=true)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par", type="string", length=25)
     */
    private $ajoutePar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour", type="datetime")
     */
    private $dateMiseAjour;

    /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par", type="string", length=25)
     */
    private $misAjourPar;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomFournisseur
     *
     * @param string $nomFournisseur
     *
     * @return Four
     */
    public function setNomFournisseur($nomFournisseur)
    {
        $this->nomFournisseur = $nomFournisseur;

        return $this;
    }

    /**
     * Get nomFournisseur
     *
     * @return string
     */
    public function getNomFournisseur()
    {
        return $this->nomFournisseur;
    }

    /**
     * Set nomPersonne
     *
     * @param string $nomPersonne
     *
     * @return Four
     */
    public function setNomPersonne($nomPersonne)
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    /**
     * Get nomPersonne
     *
     * @return string
     */
    public function getNomPersonne()
    {
        return $this->nomPersonne;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Four
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Four
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Four
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Four
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set ajoutePar
     *
     * @param string $ajoutePar
     *
     * @return Four
     */
    public function setAjoutePar($ajoutePar)
    {
        $this->ajoutePar = $ajoutePar;

        return $this;
    }

    /**
     * Get ajoutePar
     *
     * @return string
     */
    public function getAjoutePar()
    {
        return $this->ajoutePar;
    }

    /**
     * Set dateMiseAjour
     *
     * @param \DateTime $dateMiseAjour
     *
     * @return Four
     */
    public function setDateMiseAjour($dateMiseAjour)
    {
        $this->dateMiseAjour = $dateMiseAjour;

        return $this;
    }

    /**
     * Get dateMiseAjour
     *
     * @return \DateTime
     */
    public function getDateMiseAjour()
    {
        return $this->dateMiseAjour;
    }

    /**
     * Set misAjourPar
     *
     * @param string $misAjourPar
     *
     * @return Four
     */
    public function setMisAjourPar($misAjourPar)
    {
        $this->misAjourPar = $misAjourPar;

        return $this;
    }

    /**
     * Get misAjourPar
     *
     * @return string
     */
    public function getMisAjourPar()
    {
        return $this->misAjourPar;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->achats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add achat
     *
     * @param \achatsBundle\Entity\ach $achat
     *
     * @return Four
     */
    public function addAchat(\achatsBundle\Entity\ach $achat)
    {
        $this->achats[] = $achat;

        return $this;
    }

    /**
     * Remove achat
     *
     * @param \achatsBundle\Entity\ach $achat
     */
    public function removeAchat(\achatsBundle\Entity\ach $achat)
    {
        $this->achats->removeElement($achat);
    }

    /**
     * Get achats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchats()
    {
        return $this->achats;
    }
}
