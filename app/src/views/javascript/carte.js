$( document ).ready( function() {

    $.ajax({
        async : false,
        type: 'POST',
        url: "../public/index.php/get_info_carte",  
        success: function(data) {
            if(data.success == 1)
            {
                $('#img_carte').html('<img src="' + data.img + '" usemap="#image-map">');
                $('#img_carte').append(data.code_area);
            }
        }
    });    

    $('area').click(function (e) {
        e.stopPropagation;
        return false;
    });

});


function click_on_img(type, id)
{
    switch (type) {
        case 'batiment':
            $.ajax({
                data : {id : id},
                type: 'POST',
                url: "../public/index.php/enter_in_batiment",  
                success: function(data) {
                    if(data.success == 1)
                    {
                        window.location.href = data.batiment;
                        return false;
                    }
                }
            });  
            break;
    
        case 'exterieur':
            $.ajax({
                data : {id : id},
                type: 'POST',
                url: "../public/index.php/change_map",  
                success: function(data) {
                    if(data.success == 1)
                    {
                        location.reload();
                        return false;
                    }
                }
            });    
            break;
        default:
            break;
    }
}

