<?php

namespace App\Model\Classe\Factory;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\ElfeNoldor;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Nain;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Humain;
Use Exception;

class FactoryPersonnage extends Factory {

    public function __construct(string $selected)
    {
        parent::__construct($selected);
    }

    public function switch_instance_class_race() //Permet d'instancier une class Elfe/Nain etc en fonction de la race selectionne
    {
        switch ($this->selected) {
            case 'ElfeNoldor':
                return new ElfeNoldor();
                break;

            case 'Nain':
                return new Nain();
                break;

            case 'Humain':
                return new Humain();
                break;
            
            default:
                throw new Exception("La classe n'existe pas");
                break;
        }
    }

    public function switch_set_caracteristique($MonPersonnage, int $val, string $key = 'val') //Rentre dans l'objet la caracteristique
    {
        switch ($this->selected) {
            case 'force':
                $MonPersonnage->set_caracteristique_force($key, $val);
                break;

            case 'agilite':
                $MonPersonnage->set_caracteristique_agilite($key, $val);
                break;

            case 'constitution':
                $MonPersonnage->set_caracteristique_constitution($key, $val);
                break;
            
            case 'intelligence':
                $MonPersonnage->set_caracteristique_intelligence($key, $val);
                break;

            case 'intuition':
                $MonPersonnage->set_caracteristique_intuition($key, $val);
                break;

            case 'presence':
                $MonPersonnage->set_caracteristique_presence($key, $val);
                break;
            
            default:
                throw new Exception("La caracteristique n'existe pas");
                break;
        }
    }

    public function switch_set_comp($MonPersonnage, int $val, string $key = 'degre') //Incremente les degres dans les comp
    {
        switch ($this->selected) {
            case 'comp_manoeuvreetmouvement_sansarmure':
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_sansarmure($key);
                $MonPersonnage->set_comp_manoeuvreetmouvement_sansarmure($this->switch_convertir_degre_en_bonus($bonus_actuel, $val), $key);
                break;

            case 'comp_manoeuvreetmouvement_cuirsouple':
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirsouple($key);
                $MonPersonnage->set_comp_manoeuvreetmouvement_cuirsouple($this->switch_convertir_degre_en_bonus($bonus_actuel, $val), $key);
                break;

            case 'comp_manoeuvreetmouvement_cuirrigide':
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirrigide($key);
                $MonPersonnage->set_comp_manoeuvreetmouvement_cuirrigide($this->switch_convertir_degre_en_bonus($bonus_actuel, $val), $key);
                break;
            
            case 'comp_manoeuvreetmouvement_cottedemaille':
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cottedemaille($key);
                $MonPersonnage->set_comp_manoeuvreetmouvement_cottedemaille($this->switch_convertir_degre_en_bonus($bonus_actuel, $val), $key);
                break;

            case 'comp_manoeuvreetmouvement_plate':
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_plate($key);
                $MonPersonnage->set_comp_manoeuvreetmouvement_plate($this->switch_convertir_degre_en_bonus($bonus_actuel, $val), $key);
                break;

            default:
                throw new Exception("La comp n'existe pas");
                break;
        }
    }

    private function switch_convertir_degre_en_bonus(int $bonus_actuel, int $degre_a_incrementer) //Incremente les degres dans les comp
    {
        for ($i=1; $i <= $degre_a_incrementer; $i++) { 
            switch ($bonus_actuel) {
                case $bonus_actuel < 0:
                    $bonus_actuel += 30; 
                    break;
                case $bonus_actuel < 50:
                    $bonus_actuel += 5; 
                    break;
                case $bonus_actuel < 70:
                    $bonus_actuel += 2; 
                    break;
                case $bonus_actuel >= 70:
                    $bonus_actuel += 1; 
                    break;
                
                default:
                    throw new Exception("Impossible de convertir les degres en bonus");
                    break;
            }
        }
        return $bonus_actuel;
    }

    public function switch_calcul_bonus_caracteristique(int $val) //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        switch ($val) {
            case $val >= 102:
                return 35;
                break;

            case $val >= 101:
                return 30;
                break;

            case $val >= 100:
                return 25;
                break;
            
            case $val >= 98:
                return 20;
                break;
            
            case $val >= 95:
                return 15;
                break;
            
            case $val >= 90:
                return 10;
                break;
            
            case $val >= 75:
                return 5;
                break;
            
            case $val >= 25:
                return 0;
                break;
            
            case $val >= 10:
                return -5;
                break;
            
            case $val >= 5:
                return -10;
                break;
            
            case $val >= 3:
                return -15;
                break;
            
            case $val >= 2:
                return -20;
                break;
            
            case $val >= 1:
                return -25;
                break;
            
            default:
                throw new Exception("La valeur de la caracteristique n'est pas valide");
                break;
        }
    }

}