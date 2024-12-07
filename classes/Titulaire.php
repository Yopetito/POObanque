<h1> BANQUE </h1>

<?php

Class Titulaire {
    private string $nom;
    private string $prenom;
    private DateTime $birthDate;
    private string $ville;
    private array $compteBancaires;

    public function __construct(string $nom, string $prenom, string $birthDate, string $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthDate = new DateTime ($birthDate);
        $this->ville = $ville;
        $this->compteBancaires = [];
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate->format('d-m-Y');
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCompteBancaires()
    {
        return $this->compteBancaire;
    }

    public function setCompteBancaires($compteBancaires)
    {
        $this->compteBancaires = $compteBancaires;

        return $this;
    }

    public function addCompteBancaire($compteBancaire) {
        $this->compteBancaires[] = $compteBancaire;
    }

    //-----------------Function pour obtenir l'age

     public function getAge(){
        $today = new DateTime(); //date d'aujourd'hui
        $age = $today->diff($this->birthDate); //calculer la difference grace au DateTime
        return $age->y; //return l'age en 'y' years. (années)
    }

    //-----------------function pour obtenir infos du titulaire.

    public function getInfosTitulaire(){
        return "Age: ".$this->getAge()."<br>Lieu de naissance: ".$this->ville."<br>";
    }

    //-----------function pour obtenir infos des comptes d'un titulaire

    public function getInfosComptes(){
        $result = "<h2>Comptes bancaires de ".$this."</h2><br>"; 
        foreach ($this->compteBancaires as $compteBancaire) {
            $result .= $compteBancaire->getInfos();
        }
        return $result;
    }

    //----------function pour obtenir infos D'UN compte d'un titulaire
    
    public function getInfosUnCompte(int $numeroCompte): string
    {
        foreach($this->compteBancaires as $compte) { //parcours du tableau de comptes
            if ($compte->getNumeroCompte() === $numeroCompte){ //get du numero de compte pour comparer avec largument passé
               return "le Numero de compte: ".$numeroCompte." appartient a:".$this." Voici les info <br>".$compte->getInfos();
            }
        }
        return "naah";
    }

    //---------------function pour obtenir TOUTES les info d'un titulaire

    public function afficherInfos() {
        $result = "<h2>".$this."<br></h2>";
        $result .= $this->getInfosTitulaire()."Comptes Bancaires: <br>";
        foreach ($this->compteBancaires as $compteBancaire) {
            $result .= $compteBancaire->getInfos();
        }
        return $result;
    }

    

    public function __toString() {
        return $this->nom." ".$this->prenom;
    }
}