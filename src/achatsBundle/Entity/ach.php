<?php

namespace achatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ach
 *
 * @ORM\Table(name="ach")
 * @ORM\Entity(repositoryClass="achatsBundle\Repository\achRepository")
 */
class ach
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
     * @ORM\ManyToOne(targetEntity="fournisseurBundle\Entity\Four",
     *                  inversedBy="achats",
     *                  cascade={"persist"})
     * 
     * lors de la suppression d'un achat on ne supprime pas son fournisseur
     * 
     * @ORM\JoinColumn(nullable=false)
     */    
    private $fournisseur;
    
    /**
     * @ORM\OneToMany(targetEntity="achat_detailsBundle\Entity\achadet",
     *                  mappedBy="achat",
     *                  cascade={"persist","remove"})
     *
     * @ORM\JoinColumn(nullable=true)
     */     
    private $achat_details;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix_total_dachats", type="float")
     */
    private $prixTotalDachats;

    /**
     * @var float
     *
     * @ORM\Column(name="payement", type="float")
     */
    private $payement;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float")
     */
    private $balance;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_achat", type="datetime")
     */
   
    private $dateAjoutAchat;
    
     /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par_achat", type="string", length=25)
     */
    private $ajouteParAchat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour_achat", type="datetime")
     */
    private $dateMiseAjourAchat;
    
     /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par_achat", type="string", length=25)
     */
    private $misAjourParAchat;


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
     * Set prixTotalDachats
     *
     * @param float $prixTotalDachats
     *
     * @return ach
     */
    public function setPrixTotalDachats($prixTotalDachats)
    {
        $this->prixTotalDachats = $prixTotalDachats;

        return $this;
    }

    /**
     * Get prixTotalDachats
     *
     * @return float
     */
    public function getPrixTotalDachats()
    {
        return $this->prixTotalDachats;
    }

    /**
     * Set payement
     *
     * @param float $payement
     *
     * @return ach
     */
    public function setPayement($payement)
    {
        $this->payement = $payement;

        return $this;
    }

    /**
     * Get payement
     *
     * @return float
     */
    public function getPayement()
    {
        return $this->payement;
    }

    /**
     * Set balance
     *
     * @param float $balance
     *
     * @return ach
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set dateAjoutAchat
     *
     * @param \DateTime $dateAjoutAchat
     *
     * @return ach
     */
    public function setDateAjoutAchat($dateAjoutAchat)
    {
        $this->dateAjoutAchat = $dateAjoutAchat;

        return $this;
    }

    /**
     * Get dateAjoutAchat
     *
     * @return \DateTime
     */
    public function getDateAjoutAchat()
    {
        return $this->dateAjoutAchat;
    }

    /**
     * Set ajouteParAchat
     *
     * @param string $ajouteParAchat
     *
     * @return ach
     */
    public function setAjouteParAchat($ajouteParAchat)
    {
        $this->ajouteParAchat = $ajouteParAchat;

        return $this;
    }

    /**
     * Get ajouteParAchat
     *
     * @return string
     */
    public function getAjouteParAchat()
    {
        return $this->ajouteParAchat;
    }

    /**
     * Set dateMiseAjourAchat
     *
     * @param \DateTime $dateMiseAjourAchat
     *
     * @return ach
     */
    public function setDateMiseAjourAchat($dateMiseAjourAchat)
    {
        $this->dateMiseAjourAchat = $dateMiseAjourAchat;

        return $this;
    }

    /**
     * Get dateMiseAjourAchat
     *
     * @return \DateTime
     */
    public function getDateMiseAjourAchat()
    {
        return $this->dateMiseAjourAchat;
    }

    /**
     * Set misAjourParAchat
     *
     * @param string $misAjourParAchat
     *
     * @return ach
     */
    public function setMisAjourParAchat($misAjourParAchat)
    {
        $this->misAjourParAchat = $misAjourParAchat;

        return $this;
    }

    /**
     * Get misAjourParAchat
     *
     * @return string
     */
    public function getMisAjourParAchat()
    {
        return $this->misAjourParAchat;
    }

    /**
     * Set fournisseur
     *
     * @param \fournisseurBundle\Entity\Four $fournisseur
     *
     * @return ach
     */
    public function setFournisseur(\fournisseurBundle\Entity\Four $fournisseur = null)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \fournisseurBundle\Entity\Four
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->achat_details = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add achatDetail
     *
     * @param \achat_detailsBundle\Entity\achadet $achatDetail
     *
     * @return ach
     */
    public function addAchatDetail(\achat_detailsBundle\Entity\achadet $achatDetail)
    {
        $this->achat_details[] = $achatDetail;

        return $this;
    }

    /**
     * Remove achatDetail
     *
     * @param \achat_detailsBundle\Entity\achadet $achatDetail
     */
    public function removeAchatDetail(\achat_detailsBundle\Entity\achadet $achatDetail)
    {
        $this->achat_details->removeElement($achatDetail);
    }

    /**
     * Get achatDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchatDetails()
    {
        return $this->achat_details;
    }
}
