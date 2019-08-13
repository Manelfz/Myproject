<?php

namespace articleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * art
 *
 * @ORM\Table(name="art")
 * @ORM\Entity(repositoryClass="articleBundle\Repository\artRepository")
 */
class art
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
     * @var string
     *
     * @ORM\Column(name="ref_article", type="string", length=30)
     */
    private $refArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_article", type="string", length=30)
     */
    private $nomArticle; // l'attribut "nomArticle" est lié avec la BDD à l'aide de ORM 
                          //il représente le champ "nom_article" de la table "art" de la BDD "stock"
                          //le champ est de type "string" de taille 30
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix_achat_ht_article", type="float")
     */
    private $prixAchatHtArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_article", type="integer")
     */
    private $quantiteArticle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_vente_ht_article", type="float")
     */
    private $prixVenteHtArticle;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_fournisseur", type="string", length=25, unique=true)
     */
    private $nomFournisseur;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_article", type="datetime")
     */
    private $dateAjoutArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par_article", type="string", length=25)
     */
    private $ajouteParArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour_article", type="datetime")
     */
    private $dateMiseAjourArticle;
    
     /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par_article", type="string", length=25)
     */
    private $misAjourParArticle;


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
     * Set refArticle
     *
     * @param integer $refArticle
     *
     * @return art
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
     * Set nomArticle
     *
     * @param string $nomArticle
     *
     * @return art
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
     * Set prixAchatHtArticle
     *
     * @param float $prixAchatHtArticle
     *
     * @return art
     */
    public function setPrixAchatHtArticle($prixAchatHtArticle)
    {
        $this->prixAchatHtArticle = $prixAchatHtArticle;

        return $this;
    }

    /**
     * Get prixAchatHtArticle
     *
     * @return float
     */
    public function getPrixAchatHtArticle()
    {
        return $this->prixAchatHtArticle;
    }

    /**
     * Set quantiteArticle
     *
     * @param integer $quantiteArticle
     *
     * @return art
     */
    public function setQuantiteArticle($quantiteArticle)
    {
        $this->quantiteArticle = $quantiteArticle;

        return $this;
    }

    /**
     * Get quantiteArticle
     *
     * @return int
     */
    public function getQuantiteArticle()
    {
        return $this->quantiteArticle;
    }

    /**
     * Set prixVenteHtArticle
     *
     * @param float $prixVenteHtArticle
     *
     * @return art
     */
    public function setPrixVenteHtArticle($prixVenteHtArticle)
    {
        $this->prixVenteHtArticle = $prixVenteHtArticle;

        return $this;
    }

    /**
     * Get prixVenteHtArticle
     *
     * @return float
     */
    public function getPrixVenteHtArticle()
    {
        return $this->prixVenteHtArticle;
    }

    /**
     * Set dateAjoutArticle
     *
     * @param \DateTime $dateAjoutArticle
     *
     * @return art
     */
    public function setDateAjoutArticle($dateAjoutArticle)
    {
        $this->dateAjoutArticle = $dateAjoutArticle;

        return $this;
    }

    /**
     * Get dateAjoutArticle
     *
     * @return \DateTime
     */
    public function getDateAjoutArticle()
    {
        return $this->dateAjoutArticle;
    }

    /**
     * Set ajouteParArticle
     *
     * @param string $ajouteParArticle
     *
     * @return art
     */
    public function setAjouteParArticle($ajouteParArticle)
    {
        $this->ajouteParArticle = $ajouteParArticle;

        return $this;
    }

    /**
     * Get ajouteParArticle
     *
     * @return string
     */
    public function getAjouteParArticle()
    {
        return $this->ajouteParArticle;
    }

    /**
     * Set dateMiseAjourArticle
     *
     * @param \DateTime $dateMiseAjourArticle
     *
     * @return art
     */
    public function setDateMiseAjourArticle($dateMiseAjourArticle)
    {
        $this->dateMiseAjourArticle = $dateMiseAjourArticle;

        return $this;
    }

    /**
     * Get dateMiseAjourArticle
     *
     * @return \DateTime
     */
    public function getDateMiseAjourArticle()
    {
        return $this->dateMiseAjourArticle;
    }

    /**
     * Set misAjourParArticle
     *
     * @param string $misAjourParArticle
     *
     * @return art
     */
    public function setMisAjourParArticle($misAjourParArticle)
    {
        $this->misAjourParArticle = $misAjourParArticle;

        return $this;
    }

    /**
     * Get misAjourParArticle
     *
     * @return string
     */
    public function getMisAjourParArticle()
    {
        return $this->misAjourParArticle;
    }

    /**
     * Set nomFournisseur
     *
     * @param string $nomFournisseur
     *
     * @return art
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
}
