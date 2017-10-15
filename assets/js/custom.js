function change_subcategory()
{

    var category = $("#category_id").val();    

    $.ajax({

        type: "POST",
        url: "classes/ajax.php",
        data: "catid="+category,
        cache: false,
        success: function(response)
        {   
            console.log(response);
            $("#subcategory_id").html(response);
        }

    });     
}
