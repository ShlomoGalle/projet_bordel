$( document ).ready( function() {

    var langage_add = 0;
    var nb_pts_histor = 0;
    var nb_pts_comp = 10;
    var nb_pts_sort = 0;
    var force = 0;
    var agilite = 0;
    var constitution = 0;
    var intelligence = 0;
    var intuition = 0;
    var presence = 0;
    var personnage_finis = 0;

    $('#span_total_point_comp_add').html(nb_pts_comp);

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
                    
                    force = entierAleatoire(20,100);
                    agilite = entierAleatoire(20,100);
                    constitution = entierAleatoire(20,100);
                    intelligence = entierAleatoire(20,100);
                    intuition = entierAleatoire(20,100);
                    presence = entierAleatoire(20,100);
            
                    $.ajax({ ///initialisation des caracteristiques + langage + nb_pts_histor
                        data :{force : force, agilite : agilite, constitution : constitution, intelligence : intelligence, intuition : intuition, presence : presence},
                        type: 'POST',
                        url: "../public/index.php/initialisation_caracteristique",  
                        success: function(data) {
                            if(data.success == 1){
                                langage_add = data.langage_add;
                                nb_pts_histor = data.nb_pts_histor;

                                $('#div_identite_add').show();
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


    $("#form_identite").submit(function(e) {
        e.preventDefault();

        $.ajax({ ///IDENTITE
            data :{
                data: $(this).serialize()
            },
            type: 'POST',
            async: false,
            url: "../public/index.php/add_identite", 
            success: function(data) {
                if(data.success == 1){
                    $("#resumer").append('Identité du Personnage : <br />Nom : <b>' + data.nom + '</b><br />Taille : <b>' + data.taille + '</b><br />Age : <b>' + data.age + '</b><br />Poids : <b>' + data.poids + '</b><br />Cheveux : <b>' + data.cheveux + '</b><br />Yeux : <b>' + data.yeux + '</b><br />Signe Particulier : <b>' + data.signe_particulier + '</b><br /><br />');

                    $("#resumer").append('Resumer des caractéristiques : <br />');
                    $("#resumer").append('force : <b>' + force + '</b><br />');
                    $("#resumer").append('agilite : <b>' + agilite + '</b><br />');
                    $("#resumer").append('constitution : <b>' + constitution + '</b><br />');
                    $("#resumer").append('intelligence : <b>' + intelligence + '</b><br />');
                    $("#resumer").append('intuition : <b>' + intuition + '</b><br />');
                    $("#resumer").append('presence : <b>' + presence + '</b><br /><br />');

                    if(langage_add >= 1)
                    {
                        $('#div_identite_add').hide();
                        $('#div_langage_add').show();
                        $('#span_total_point_langage_add').html(langage_add);
                    }
                    else{
                        $('#div_identite_add').hide();
                        $('#div_pts_histor_add').show();
                        $('#span_total_point_histor_add').html(nb_pts_histor);
                    }
                }
            },
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
                            if(nb_pts_comp === 0){
                                $("#resumer").append('<br />');

                                //SET le nb de points de sort dispo (pas possible de le faire plus tot car l'habilité spéciale peut le changer)
                                nb_pts_sort = data.chance_obtenir_liste_sort_pourcentage;
                            }
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
            if(nb_pts_sort > 0)
            {
                $('#div_sort_add').show();
                $('#span_total_point_sort_add').html(nb_pts_sort);
            }
            else
            {
                personnage_finis = 1;
                $('#button_finish').show();
            }
        }
    });

    $("#button_sort_add").click(function() {
        var point_sort_add = $('#input_point_sort_add').val();
        var liste_acquise = 0;

        if(nb_pts_sort >= point_sort_add)
        {
            if(point_sort_add <= 100 && point_sort_add >= 1)
            {
                var des_pourcentage = entierAleatoire(1,100);
                $("#resumer").append('Resultat des des : <b>' + des_pourcentage + '</b><br />');

                var name_liste = $('#select_sort_add').val();
                if(des_pourcentage <= point_sort_add){liste_acquise = 1;}

                $.ajax({ ///Add sort 
                    data :{liste : name_liste, val : point_sort_add, acquise : liste_acquise},
                    type: 'POST',
                    async: false,
                    url: "../public/index.php/add_sort_additionnel",  
                    success: function(data){
                        if(data.success == 1){
                            
                            $('#select_sort_add option:selected').remove();
                            if(des_pourcentage > point_sort_add){$("#resumer").append("Zut, rater, cependant vous aurez " + point_sort_add + " % de chance en plus de l'apprendre la prochaine fois<br />");}
                            else{$("#resumer").append("Youpi, vous avez appris une nouvelle liste de sort : <b>" + name_liste + " </b><br />");}            

                            nb_pts_sort -= point_sort_add;
                            $('#span_total_point_sort_add').html(nb_pts_sort);

                           if(nb_pts_sort === 0){$("#resumer").append('<br />');}
                        }
                    },
                    error: function(){
                        $("#resumer").append('Impossible de rajouter cette liste (Error 89465), vos points sont rendus<br />');
                    }
                });
            }
            else{
                $("#resumer").append("Le pourcentage doit-être entre 1 et 100<br />");
            }
        }
        else{
            $("#resumer").append("Vous n'avez pas assez de points<br />");
        }
        if(nb_pts_sort <= 0)
        {
            $('#div_sort_add').hide();
            $('#button_finish').show();
            personnage_finis = 1;
        }
    });

    $("#button_finir_mon_personnage").click(function() {
        if(personnage_finis == 1)
        {
            $.ajax({ ///Permet d'effecter un var dmp
                type: 'POST',
                url: "../public/index.php/finir_mon_personnage",  
                success: function(data) {
                    window.location.href('index.html');
                },
            });
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