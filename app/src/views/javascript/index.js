$( document ).ready( function() {

    $("#test").click(function() {

        var race = $("#field").val();

        $.ajax({ ///instanciation race
            data :{race : race},
            type: 'POST',
            url: "../public/index.php/instanciation_class_personnage",  
            success: function(data) {
                if(data.success == 1){
                    // $("#print").append('test');
                    $("#print").append(data.message + '<br />');

                    // console.log(data.message);
                    // window.location.href = "/creationpersonnage.html";
                }
                else{
                    $("#print").append(data.message + '<br />');
                }
            }
        });

        var force = entierAleatoire(11,100);
        var agilite = entierAleatoire(11,100);
        var constitution = entierAleatoire(11,100);
        var intelligence = entierAleatoire(11,100);
        var intuition = entierAleatoire(11,100);
        var presence = entierAleatoire(11,100);

        $("#print").append('force : ' + force + '<br />');
        $("#print").append('agilite : ' + agilite + '<br />');
        $("#print").append('constitution : ' + constitution + '<br />');
        $("#print").append('intelligence : ' + intelligence + '<br />');
        $("#print").append('intuition : ' + intuition + '<br />');
        $("#print").append('presence : ' + presence + '<br />');


        $.ajax({ ///initialisation des caracteristiques
            data :{force : force, agilite : agilite, constitution : constitution, intelligence : intelligence, intuition : intuition, presence : presence},
            type: 'POST',
            url: "../public/index.php/initialisation_caracteristique",  
            success: function(data) {
                if(data.success == 1){
                    // $("#print").append('test');
                    $("#print").append(data.message + '<br />');

                    console.log(data.message);
                    // window.location.href = "/creationpersonnage.html";
                }
                else{
                    // $("#print").append(data.message + '<br />');
                }
            }
        });
    });
});


function entierAleatoire(min, max)
{
    return Math.floor(Math.random() * (max - min + 1) + min);
}