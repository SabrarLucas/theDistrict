<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_plat = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?float $total = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_commande = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_client = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone_client = null;

    #[ORM\Column(length: 255)]
    private ?string $email_client = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlat(): ?int
    {
        return $this->id_plat;
    }

    public function setIdPlat(int $id_plat): self
    {
        $this->id_plat = $id_plat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeImmutable
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeImmutable $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): self
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    public function getTelephoneClient(): ?string
    {
        return $this->telephone_client;
    }

    public function setTelephoneClient(string $telephone_client): self
    {
        $this->telephone_client = $telephone_client;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->email_client;
    }

    public function setEmailClient(string $email_client): self
    {
        $this->email_client = $email_client;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresse_client;
    }

    public function setAdresseClient(string $adresse_client): self
    {
        $this->adresse_client = $adresse_client;

        return $this;
    }
}
