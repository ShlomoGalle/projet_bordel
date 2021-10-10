<?php




class Objet {
    protected $nom;
    protected $prix;
}

class Equipement extends Objet{     
    protected $abreviation;
    protected $poids;
    protected $type;
    protected $enchantement;
    protected $sort_charge;
}

class Arme extends Equipement {
    private $maladresse;
    private $coup_crit_primaire;
    private $coup_crit_secondaire;
    private $portee_de_base;
    private $modificateurs_speciaux;
}

class Accessoire extends Objet {
    private $poids;
    private $note;
    private $sort_charge;
}

class PlantesmedicinalesPoisonsMaladies extends Objet {
    private $codes;
    private $forme_prep;
    private $effet;
}


?>