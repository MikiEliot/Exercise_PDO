<?php 

class Insert{

    public $refProduit;
    public $description;
    public $prixUnitaire;
    public $produit;
    


    public function __construct(int $refProduit, string $description, int $prixUnitaire){
        $this->refProduit = $refProduit;
        $this->description = $description;
        $this->prixUnitaire = $prixUnitaire;
        $this->produit = "INSERT INTO produit(refProduit, `description` , prixUnitaire) VALUES ($this->refProduit,$this->description,$this->prixUnitaire)";

    }


}





?>