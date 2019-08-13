<?php

namespace achat_detailsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * achadet
 *
 * @ORM\Table(name="achadet")
 * @ORM\Entity(repositoryClass="achat_detailsBundle\Repository\achadetRepository")
 */
class achadet
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
     * @ORM\ManyToOne(targetEntity="achatsBundle\Entity\ach",
     *                  inversedBy="achat_details",
     *                  cascade={"persist"})
     * 
     * lors de la suppression d'un achat détail on ne supprime pas l'achat
     * 
     * @ORM\JoinColumn(nullable=false)
     */    
    private $achat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_article", type="string", length=40, unique=true)
     */
    private $nomArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="ref_article", type="integer", unique=true)
     */
    private $refArticle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_achat_ht", type="float")
     */
    private $prixAchatHt;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_vente_ht", type="float")
     */
    private $prixVenteHt;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_fournisseur", type="string", length=25, unique=true)
     */
    private $nomFournisseur;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_achatdet", type="datetime")
     */
    
    
    private $dateAjoutAchatdet;
    
     /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par_achatdet", type="string", length=25)
     */
    private $ajouteParAchatdet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour_achatdet", type="datetime")
     */
    private $dateMiseAjourAchatdet;
    
     /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par_achatdet", type="string", length=25)
     */
    private $misAjourParAchatdet;


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
     * Set nomArticle
     *
     * @param string $nomArticle
     *
     * @return achadet
     */
    public function setNomArticle($nomArticle)
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    /**
     * Get nomArticle
     *
     * @return string
     */
    public function getNomArticle()
    {
        return $this->nomArticle;
    }

    /**
     * Set refArticle
     *
     * @param integer $refArticle
     *
     * @return achadet
     */
    public function setRefArticle($refArticle)
    {
        $this->refArticle = $refArticle;

        return $this;
    }

    /**
     * Get refArticle
     *
     * @return int
     */
    public function getRefArticle()
    {
        return $this->refArticle;
    }

    /**
     * Set prixAchatHt
     *
     * @param float $prixAchatHt
     *
     * @return achadet
     */
    public function setPrixAchatHt($prixAchatHt)
    {
        $this->prixAchatHt = $prixAchatHt;

        return $this;
    }

    /**
     * Get prixAchatHt
     *
     * @return float
     */
    public function getPrixAchatHt()
    {
        return $this->prixAchatHt;
    }

    /**
     * Set prixVenteHt
     *
     * @param float $prixVenteHt
     *
     * @return achadet
     */
    public function setPrixVenteHt($prixVenteHt)
    {
        $this->prixVenteHt = $prixVenteHt;

        return $this;
    }

    /**
     * Get prixVenteHt
     *
     * @return float
     */
    public function getPrixVenteHt()
    {
        return $this->prixVenteHt;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return achadet
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set dateAjoutAchatdet
     *
     * @param \DateTime $dateAjoutAchatdet
     *
     * @return achadet
     */
    public function setDateAjoutAchatdet($dateAjoutAchatdet)
    {
        $this->dateAjoutAchatdet = $dateAjoutAchatdet;

        return $this;
    }

    /**
     * Get dateAjoutAchatdet
     *
     * @return \DateTime
     */
    public function getDateAjoutAchatdet()
    {
        return $this->dateAjoutAchatdet;
    }

    /**
     * Set ajouteParAchatdet
     *
     * @param string $ajouteParAchatdet
     *
     * @return achadet
     */
    public function setAjouteParAchatdet($ajouteParAchatdet)
    {
        $this->ajouteParAchatdet = $ajouteParAchatdet;

        return $this;
    }

    /**
     * Get ajouteParAchatdet
     *
     * @return string
     */
    public function getAjouteParAchatdet()
    {
        return $this->ajouteParAchatdet;
    }

    /**
     * Set dateMiseAjourAchatdet
     *
     * @param \DateTime $dateMiseAjourAchatdet
     *
     * @return achadet
     */
    public function setDateMiseAjourAchatdet($dateMiseAjourAchatdet)
    {
        $this->dateMiseAjourAchatdet = $dateMiseAjourAchatdet;

        return $this;
    }

    /**
     * Get dateMiseAjourAchatdet
     *
     * @return \DateTime
     */
    public function getDateMiseAjourAchatdet()
    {
        return $this->dateMiseAjourAchatdet;
    }

    /**
     * Set misAjourParAchatdet
     *
     * @param string $misAjourParAchatdet
     *
     * @return achadet
     */
    public function setMisAjourParAchatdet($misAjourParAchatdet)
    {
        $this->misAjourParAchatdet = $misAjourParAchatdet;

        return $this;
    }

    /**
     * Get misAjourParAchatdet
     *
     * @return string
     */
    public function getMisAjourParAchatdet()
    {
        return $this->misAjourParAchatdet;
    }

    /**
     * Set nomFournisseur
     *
     * @param string $nomFournisseur
     *
     * @return achadet
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
     * Set achat
     *
     * @param \achatsBundle\Entity\ach $achat
     *
     * @return achadet
     */
    public function setAchat(\achatsBundle\Entity\ach $achat)
    {
        $this->achat = $achat;

        return $this;
    }

    /**
     * Get achat
     *
     * @return \achatsBundle\Entity\ach
     */
    public function getAchat()
    {
        return $this->achat;
    }
}
