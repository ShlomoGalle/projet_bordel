$( document ).ready( function() {


    $("#test").click(function() {
    
        console.log('test');
    
        $.ajax({ ///TEST
            data :{test : 'test'},
            type: 'POST',
            url: "../public/index.php/home2",  
            success: function(data) {
                if(data.success == 1){
                    console.log(data.message)
                }
    
            }
        });
        // window.location.href = "/index.html";

    });

    var nombre_de_tir_de_des_caracteristique = 0;
    var caracteristique = [];
    $("#creation_perso_etape1_caracteristique_tirer").click(function() {
        nombre_de_tir_de_des_caracteristique++;

        if(nombre_de_tir_de_des_caracteristique <= 6)
        {
            $("#creation_perso_etape1_caracteristique").append('<form> <input type="radio" id="force" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="force">Force <input type="radio" id="agilite" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="agilite">Agilite <input type="radio" id="constitution" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="constitution">Constitution <input type="radio" id="intelligence" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="intelligence">Intelligence <input type="radio" id="intuition" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="intuition">Intuition <input type="radio" id="presence" name="jet_' + nombre_de_tir_de_des_caracteristique + '" value="presence">Presence </form>');

            
            var tir = entierAleatoire(11,100);
            caracteristique.push(tir);
            $("#creation_perso_etape1_caracteristique").append('<span id="tir_' + nombre_de_tir_de_des_caracteristique + '">' + tir + '</span><br /><br />');
            if(nombre_de_tir_de_des_caracteristique == 6)
            {
                console.log(caracteristique);
                $("#creation_perso_etape1_caracteristique_tirer").prop('disabled', true);
                $("#creation_perso_etape1_caracteristique_valider").show();
            }
        }
    });

    $("#creation_perso_etape1_caracteristique_valider").click(function() {
        console.log($("[name=jet_1]").checked().val());

    });


});



function entierAleatoire(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
