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
        case 'marchand':
            console.log("marchand");
            window.location.href = "/marchand.html?id=" + id;
            break;
    
        case 'taverne':
            console.log("tavervne");
            window.location.href = "/taverne.html?id=" + id;

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

