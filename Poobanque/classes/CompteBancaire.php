<?php

Class CompteBancaire {
    private string $label;
    private float $soldeInitial;
    private string $devise;
    private int $numeroCompte;
    private Titulaire $titulaire;

    public function __construct(int $numeroCompte, string $label, float $soldeInitial, string $devise, Titulaire $titulaire) {
        $this->numeroCompte = $numeroCompte;
        $this->label = $label;
        $this->soldeInitial = $soldeInitial;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $this->titulaire->addCompteBancaire($this);
    }

    public function getLibel()
    {
        return $this->label;
    }

    public function setLibel($label)
    {
        $this->label = $label;

        return $this;
    }

    public function getSoldeInitial()
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function getNumeroCompte(): int
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte($numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function addOrWithdraw(float $money)
    {
        if(($this->getSoldeInitial() + $money) >= 0){
            $result = $this->getSoldeInitial() + $money;
            $this->setSoldeInitial($result);
            return "votre nouveau solde est de : ".$result."<br>";
        }
        elseif(($this->getSoldeInitial() + $money) < 0) {
            return "Impossible de retirer, fonds issufisant<br>";
        }
    return "Demarche incorrecte";
    }

    public function getInfos(){
        return "Numero de compte: ".$this->numeroCompte." / Libellé: ".$this->label." / Solde initial: ".$this->soldeInitial." / Devise: ".$this->devise."<br>";
    }

    public function __toString() {
        return $this->numeroCompte;
    }
}