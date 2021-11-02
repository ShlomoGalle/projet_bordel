$( document ).ready( function() {

    var langage_add = 0;
    var nb_pts_histor = 0;
    var nb_pts_comp = 10;

    $("#button_creation_personnage").click(function() {

        var race = $("#field").val();

        $.ajax({ ///instanciation race
            data :{race : race},
            type: 'POST',
            url: "../public/index.php/instanciation_class_personnage",  
            success: function(data) {
                if(data.success == 1){

                    $("#resumer").append('Race du joueur : <br />');
                    $("#resumer").append(data.message + '<br /><br />');
                    
                    var force = entierAleatoire(11,100);
                    var agilite = entierAleatoire(11,100);
                    var constitution = entierAleatoire(11,100);
                    var intelligence = entierAleatoire(11,100);
                    var intuition = entierAleatoire(11,100);
                    var presence = entierAleatoire(11,100);
                    
                    $("#resumer").append('Resumer des caractéristiques : <br />');
                    $("#resumer").append('force : <b>' + force + '</b><br />');
                    $("#resumer").append('agilite : <b>' + agilite + '</b><br />');
                    $("#resumer").append('constitution : <b>' + constitution + '</b><br />');
                    $("#resumer").append('intelligence : <b>' + intelligence + '</b><br />');
                    $("#resumer").append('intuition : <b>' + intuition + '</b><br />');
                    $("#resumer").append('presence : <b>' + presence + '</b><br /><br />');
            
            
                    $.ajax({ ///initialisation des caracteristiques
                        data :{force : force, agilite : agilite, constitution : constitution, intelligence : intelligence, intuition : intuition, presence : presence},
                        type: 'POST',
                        url: "../public/index.php/initialisation_caracteristique",  
                        success: function(data) {
                            if(data.success == 1){
                                langage_add = data.langage_add;
                                nb_pts_histor = data.nb_pts_histor;
                                if(langage_add >= 1)
                                {
                                    $('#div_langage_add').show();
                                    $('#span_total_point_langage_add').append(langage_add);
                                }
                                else{
                                    $('#div_pts_histor_add').show();
                                    $('#span_total_point_histor_add').append(nb_pts_histor);
                                }
                            }
                        }
                    });

                }
                else{
                    $("#resumer").append(data.message + '<br />');
                }
            }
        });
    });


    $("#button_langage_add").click(function() {
        var point_langage_add = $('#select_point_langage_add').val();
        var langage_add_selected = $('#select_langage_add').val();

        if(langage_add >= point_langage_add){
            $.ajax({ ///Langages additionnels
                data :{langage : langage_add_selected, val : point_langage_add},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_langage_additionnel",  
                success: function(data) {
                    if(data.success == 1){
                        if(langage_add >= 1)
                        {
                            langage_add -= point_langage_add;//POURQUOI DEUX FOIS LES MEMES LIGNES, A REGARDER l84 et l81
                            $('#span_total_point_langage_add').html(langage_add);
                            $("#resumer").append('<b>' + $('#select_langage_add option:selected').text() + '</b> appris :<b> + ' + point_langage_add + ' </b>points. Total pour cette langue : ' + data.nb_point + ' points<br />');
                            if(langage_add == 0){$("#resumer").append('<br />');}
                        }
                    }
                },
                error: function(){
                    $("#resumer").append("Impossible d'ajouter cette langue<br />");
                }
            });

            if(langage_add <= 0)
            {
                $('#button_langage_add').prop('disabled', true);
                $('#div_langage_add').hide();
                $('#div_pts_histor_add').show();
                $('#span_total_point_histor_add').append(nb_pts_histor);
            }
        }
    });

    $("#button_histor_comp_add").click(function() {
        if(nb_pts_histor > 0)
        {
            var histor_comp_add = $('#select_histor_comp_add').val();
            $.ajax({ ///Add Compétence depuis les points d'historiques
                data :{comp : histor_comp_add, val : 2, key : "degre"},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_competence_additionnel",  
                success: function(data) {
                    if(data.success == 1){
                        nb_pts_histor -= 1;

                        $('#span_total_point_histor_add').html(nb_pts_histor);
                        $("#resumer").append("Bonus niveau : <b> +10 </b> dans la compétence <b>" + $('#select_histor_comp_add option:selected').text() + '</b><br />');
                        if(nb_pts_histor === 0){$("#resumer").append('<br />');}
                    }
                },
                error: function(){
                    $("#resumer").append('Impossible de rajouter cette comp<br />');
                }
            });
        }
        if(nb_pts_histor <= 0)
        {
            $('#div_pts_histor_add').hide();
            $('#div_comp_add').show();
            $('#span_total_point_comp_add').html(nb_pts_comp);
        }
    });

    $("#button_histor_carac_add").click(function() {
        if(nb_pts_histor > 0)
        {
            var histor_carac_add = $('#select_histor_carac_add').val();
            console.log(histor_carac_add)
            $.ajax({ ///Add carac depuis les points d'historiques 
                data :{carac : histor_carac_add, val : 2},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_carac_additionnel",  
                success: function(data) {
                    if(data.success == 1){
                        nb_pts_histor -= 1;

                        $('#span_total_point_histor_add').html(nb_pts_histor);
                        $("#resumer").append("Bonus valeur : <b> +2 </b> dans la caractéristique <b>" + $('#select_histor_carac_add option:selected').text() + '</b> <br />');
                        if(nb_pts_histor === 0){$("#resumer").append('<br />');}
                    }
                },
                error: function(){
                    $("#resumer").append('Impossible de rajouter cette comp<br />');
                }
            });
        }
        if(nb_pts_histor <= 0)
        {
            $('#div_pts_histor_add').hide();
            $('#div_comp_add').show();
            $('#span_total_point_comp_add').html(nb_pts_comp);
        }
    });

    $("#button_histor_langue_add").click(function() {
        if(nb_pts_histor > 0)
        {
            var langage_add_selected = $('#select_histor_langue_add').val();

            $.ajax({ ///Langages additionnels
                data :{langage : langage_add_selected, val : 1},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_langage_additionnel",  
                success: function(data) {
                    if(data.success == 1){
                        $.ajax({ ///Langages additionnels
                            data :{langage : langage_add_selected, val : 1},
                            type: 'POST',
                            async: false,
                            url: "../public/index.php/add_langage_additionnel",  
                            success: function(data) {
                                if(data.success == 1){
                                    $.ajax({ ///Langages additionnels
                                        data :{langage : langage_add_selected, val : 1},
                                        type: 'POST',
                                        async: false,
                                        url: "../public/index.php/add_langage_additionnel",  
                                        success: function(data) {
                                            if(data.success == 1){
                                                $.ajax({ ///Langages additionnels
                                                    data :{langage : langage_add_selected, val : 1},
                                                    type: 'POST',
                                                    async: false,
                                                    url: "../public/index.php/add_langage_additionnel",  
                                                    success: function(data) {
                                                        if(data.success == 1){
                                                            $.ajax({ ///Langages additionnels
                                                                data :{langage : langage_add_selected, val : 1},
                                                                type: 'POST',
                                                                async: false,
                                                                url: "../public/index.php/add_langage_additionnel",  
                                                                success: function(data) {
                                                                }
                                                            });
                                                        }
                                                    }
                                                });
                                            }
                                        }
                                    });
                                }
                            }
                        });
                        nb_pts_histor -= 1;

                        $('#span_total_point_histor_add').html(nb_pts_histor);
                        $("#resumer").append('<b>' + $('#select_histor_langue_add option:selected').text() + '</b> a été apprise <br />');
                        if(nb_pts_histor === 0){$("#resumer").append('<br />');}
                    }
                },
                error: function(){
                    $("#resumer").append('Impossible de rajouter cette langue car elle est déjà apprise<br />');
                }
            });
        }
        if(nb_pts_histor <= 0)
        {
            $('#div_pts_histor_add').hide();
            $('#div_comp_add').show();
            $('#span_total_point_comp_add').html(nb_pts_comp);
        }
    });

    $("#button_habilite_speciale_add").click(function() {
        if(nb_pts_histor > 0)
        {
            var habilite_speciale = entierAleatoire(1,100);
            $("#resumer").append('Vous avez fait <b>' + habilite_speciale + '</b> au dés pour une habilité spéciale<br />');

            $.ajax({ ///Add habilité spécial depuis les points d'historiques 
                data :{habilite_speciale : habilite_speciale},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_habilite_speciale",  
                success: function(data) {
                    if(data.success == 1){
                        nb_pts_histor -= 1;

                        $('#span_total_point_histor_add').html(nb_pts_histor);
                        $("#resumer").append(data.message + '<br />');
                        if(nb_pts_histor === 0){$("#resumer").append('<br />');}
                    }
                },
                error: function(){
                    $("#resumer").append("Impossible d'avoir une habilité spéciale<br />");
                }
            });
        }
        if(nb_pts_histor <= 0)
        {
            $('#div_pts_histor_add').hide();
            $('#div_comp_add').show();
            $('#span_total_point_comp_add').html(nb_pts_comp);
        }
    });
    
    $("#button_option_finance_add").click(function() {
        if(nb_pts_histor > 0)
        {
            var option_finance = entierAleatoire(1,100);
            $("#resumer").append('Vous avez fait <b>' + option_finance + '</b> au dés pour une option finance<br />');

            $.ajax({ ///Add une option finance depuis les points d'historiques 
                data :{option_finance : option_finance},
                type: 'POST',
                async: false,
                url: "../public/index.php/add_option_finance",  
                success: function(data) {
                    if(data.success == 1){
                        nb_pts_histor -= 1;

                        $('#span_total_point_histor_add').html(nb_pts_histor);
                        $("#resumer").append(data.message + '<br />');
                        if(nb_pts_histor === 0){$("#resumer").append('<br />');}
                    }
                },
                error: function(){
                    $("#resumer").append('Impossible de prendre une option finance<br />');
                }
            });
        }
        if(nb_pts_histor <= 0)
        {
            $('#div_pts_histor_add').hide();
            $('#div_comp_add').show();
            $('#span_total_point_comp_add').html(nb_pts_comp);
        }
    });

    $("#button_comp_add").click(function() {
        var point_comp_add = $('#select_point_comp_add').val();

        if(nb_pts_comp >= point_comp_add)
        {
            if(point_comp_add <= 3)
            {
                $.ajax({ ///Add Compétence depuis les points d'historiques
                    data :{comp : $('#select_comp_add').val(), val : point_comp_add, key : "innee"},
                    type: 'POST',
                    async: false,
                    url: "../public/index.php/add_competence_additionnel",  
                    success: function(data){
                        if(data.success == 1){
                            nb_pts_comp -= point_comp_add;

                            $('#span_total_point_comp_add').html(nb_pts_comp);
                            point_comp_add *= 5;
                            $("#resumer").append("Bonus innée : <b>+" + point_comp_add + "</b> dans la compétence <b>" + $('#select_comp_add option:selected').text() + '</b><br />');
                            if(nb_pts_comp === 0){$("#resumer").append('<br />');}
                        }
                    },
                    error: function(){
                        $("#resumer").append('Impossible de rajouter cette comp<br />');
                    }
                });
            }
        }
        if(nb_pts_comp <= 0)
        {
            $('#div_comp_add').hide();
        }
    });

    $("#var_dump").click(function() {
        $.ajax({ ///Permet d'effecter un var dmp
            type: 'POST',
            url: "../public/index.php/var_dump",  
            success: function(data) {
            },
        });
    });

});


function entierAleatoire(min, max)
{
    return Math.floor(Math.random() * (max - min + 1) + min);
}