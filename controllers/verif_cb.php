<?php


function Luhn($numero,$longueur){ // On passe à la fonction la variable contenant le numéro à vérifier
    // et la longueur qu'il doit impérativement avoir

    if ((strlen($numero)==$longueur) && ereg("[0-9]{".$longueur."}", $numero)){ // si la longueur est bonne et que l'on n'a que des chiffres

        /* on décompose le numéro dans un tableau  */
        for ($index=0;$index<$longueur;$index++){
            $tableauChiffresNumero[$index]=substr($numero,$index,1);
        }

        /* on parcours le tableau pour additionner les chiffres */
        $luhn=0; // clef de luhn à tester
        for ($index=0;$index<$longueur;$index++){
            if ($index%2==0){ // si le rang est pair (0,2,4 etc.)
                if(($tableauChiffresNumero[$index]*2) > 9){
                    $tableauChiffresNumero[$index]=($tableauChiffresNumero[$index]*2)-9;
                }
                else{

                    $tableauChiffresNumero[$index]=$tableauChiffresNumero[$index]*2; // si non on remplace la valeur
                    // par le double
                }
            }
            $luhn=$luhn+$tableauChiffresNumero[$index]; // on additionne le chiffre à la clef de luhn
        }

        /* test de la divition par 10 */
        if($luhn%10==0){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
$longueur=16;
$numero=$_POST['cb'];
Luhn($numero,$longueur);

if(Luhn($numero,$longueur)==false){
    echo 'Vous avez entré un mauvais numéro de carte bleu';
    sleep(5);
    header('Location:../views/Other_pages/commande.php');
}elseif(Luhn($numero,$longueur)==true){
    echo 'Achat réussi';
    sleep(5);
    unset($_SESSION['panier']);
    unset($_SESSION['panier']['id']);
    $_SESSION['panier'] = array();
    /* Subdivision du panier */
    $_SESSION['panier']['id'] = array();
}