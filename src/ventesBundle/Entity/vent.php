<?php

namespace ventesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * vent
 *
 * @ORM\Table(name="vent")
 * @ORM\Entity(repositoryClass="ventesBundle\Repository\ventRepository")
 */
class vent
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
     * @ORM\OneToMany(targetEntity="vente_detailsBundle\Entity\ventdet",
     *                  mappedBy="vente",
     *                  cascade={"persist","remove"})
     * 
     * lors de la suppression d'une vente on supprime les détails mais lorsque 
     * toutes ls détails sont supprimés on met ce champ à NULL
     * 
     * @ORM\JoinColumn(nullable=true)
     */    
    private $vente_details;
    
    /**
     * lorsqu'on supprime le client on ne supprime pas les ventes qui lui correspond mais on les met en NULL
     * 
     * @ORM\ManyToOne(targetEntity="clientBundle\Entity\cli",
     *                  inversedBy="ventes",
     *                  cascade={"persist"})
     * 
     * lors de la suppression d'une vente on ne supprime pas le client
     * 
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */    
    private $client;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix_vente_total", type="float")
     */
    private $prixVenteTotal;
    /**
     * @var integer
     *
     * @ORM\Column(name="num_vente_", type="integer")
     */
    private $numVente;
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
     * @ORM\Column(name="date_ajout_vente", type="datetime")
     */
    private $dateAjoutVente;

    /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par_vente", type="string", length=25)
     */
    private $ajouteParVente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour_vente", type="datetime")
     */
    private $dateMiseAjourVente;

    /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par_vente", type="string", length=25)
     */
    private $misAjourParVente;


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
     * Set prixVenteTotal
     *
     * @param float $prixVenteTotal
     *
     * @return vent
     */
    public function setPrixVenteTotal($prixVenteTotal)
    {
        $this->prixVenteTotal = $prixVenteTotal;

        return $this;
    }

    /**
     * Get prixVenteTotal
     *
     * @return float
     */
    public function getPrixVenteTotal()
    {
        return $this->prixVenteTotal;
    }

    /**
     * Set payement
     *
     * @param float $payement
     *
     * @return vent
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
     * @return vent
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
     * Set dateAjoutVente
     *
     * @param \DateTime $dateAjoutVente
     *
     * @return vent
     */
    public function setDateAjoutVente($dateAjoutVente)
    {
        $this->dateAjoutVente = $dateAjoutVente;

        return $this;
    }

    /**
     * Get dateAjoutVente
     *
     * @return \DateTime
     */
    public function getDateAjoutVente()
    {
        return $this->dateAjoutVente;
    }

    /**
     * Set ajouteParVente
     *
     * @param string $ajouteParVente
     *
     * @return vent
     */
    public function setAjouteParVente($ajouteParVente)
    {
        $this->ajouteParVente = $ajouteParVente;

        return $this;
    }

    /**
     * Get ajouteParVente
     *
     * @return string
     */
    public function getAjouteParVente()
    {
        return $this->ajouteParVente;
    }

    /**
     * Set dateMiseAjourVente
     *
     * @param \DateTime $dateMiseAjourVente
     *
     * @return vent
     */
    public function setDateMiseAjourVente($dateMiseAjourVente)
    {
        $this->dateMiseAjourVente = $dateMiseAjourVente;

        return $this;
    }

    /**
     * Get dateMiseAjourVente
     *
     * @return \DateTime
     */
    public function getDateMiseAjourVente()
    {
        return $this->dateMiseAjourVente;
    }

    /**
     * Set misAjourParVente
     *
     * @param string $misAjourParVente
     *
     * @return vent
     */
    public function setMisAjourParVente($misAjourParVente)
    {
        $this->misAjourParVente = $misAjourParVente;

        return $this;
    }

    /**
     * Get misAjourParVente
     *
     * @return string
     */
    public function getMisAjourParVente()
    {
        return $this->misAjourParVente;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vente_details = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set numVente
     *
     * @param integer $numVente
     *
     * @return vent
     */
    public function setNumVente($numVente)
    {
        $this->numVente = $numVente;

        return $this;
    }

    /**
     * Get numVente
     *
     * @return integer
     */
    public function getNumVente()
    {
        return $this->numVente;
    }

    /**
     * Add venteDetail
     *
     * @param \vente_detailsBundle\Entity\ventdet $venteDetail
     *
     * @return vent
     */
    public function addVenteDetail(\vente_detailsBundle\Entity\ventdet $venteDetail)
    {
        $this->vente_details[] = $venteDetail;

        return $this;
    }

    /**
     * Remove venteDetail
     *
     * @param \vente_detailsBundle\Entity\ventdet $venteDetail
     */
    public function removeVenteDetail(\vente_detailsBundle\Entity\ventdet $venteDetail)
    {
        $this->vente_details->removeElement($venteDetail);
    }

    /**
     * Get venteDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVenteDetails()
    {
        return $this->vente_details;
    }

    /**
     * Set client
     *
     * @param \clientBundle\Entity\cli $client
     *
     * @return vent
     */
    public function setClient(\clientBundle\Entity\cli $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \clientBundle\Entity\cli
     */
    public function getClient()
    {
        return $this->client;
    }
}
