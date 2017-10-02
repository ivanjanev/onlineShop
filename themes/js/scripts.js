$(document).on("click",".btnAddToCart",function(){
    var id=$(this).attr('id');
    $.post("addToCart.php",{
        productId:id
    },function(response,status){
        var string=response.toString();
        if ($.trim(string) === 'false')
        {
            alert("Продуктот го нема на залиха!");
        }
        else
        {
            var json=response.toString();
            var a = json.split("[");
            var b = a[1].split("]");
            var split=b[0].split(",");
            $("#itemsInCart").text(split[1]);
            $("#totalPrice").text(split[0]);
        }
    });
});

$(document).on("click",".linkLogout",function(){
    var logout="true";
    $.post("addToCart.php",{
        log:logout
    },function(response,status){
        window.location.href = "index.php";
    });
});

$(document).on("click",".btnDeleteCartItem",function(){
    debugger;
    var id=$(this).attr('id');
    $.post("addToCart.php",{
        deleteId:id
    },function(response,status){
        location.reload(true);
    });
});

$(document).on("click",".btnGoToCharge",function(){
    var email1= $.trim($('#email').val());
    var id1= $.trim($('#id').val());
    $.post("addToCart.php",{
        emailUser:email1,
        idUser:id1
    },function(response,status){
        var string=response.toString();
        if ($.trim(string) === 'Success')
        {
            window.location.href = "payment.php";
        }
        else
        {
            alert(string);
        }
    });
});

$('#file-upload').bind('change', function()
{
    var fileName = '';
    fileName = $(this).val();
    var str=fileName.split("\\");
    $('#addedPic').html(str[str.length-1]);
});