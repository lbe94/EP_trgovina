/**
 * Created by Luka on 16. 12. 2016.
 */

$(document).ready(function () {
    console.log("HEHEHEHEHEHHEHE");

    // adding articles to cart
    $("[name='addToCart']").click(function (e) {
        e.preventDefault();
        var idArt = $(this).parent('form').attr('id');

        console.log("IDARTIKLA: " + idArt);
        var postData = 'idArtikla=' +  idArt;
        console.log("POSTDATA: " + postData);

        $.ajax({
            type: "POST",
            url: "cart.php",
            data: postData,
            success: function(){
                // Do what you want to do when the session has been updated
                console.log("SUCCESS ADDING");
                //$('#cartItem').load('../index.php' +  ' #cartItem');
                //$("#cartItem").hide().html(data).fadeIn('fast');
                location.reload();
            }
        });

        return false;
    });

    //deleting articles from cart
    $("[name='deleteFromCart']").click(function (e) {
        console.log("IN DELETING");
        e.preventDefault();
        var idArt = $(this).parent('form').attr('id');

        var postData = 'idArtikla=' + idArt;

        $.ajax({
            type: "POST",
            url: "deleteFromCart.php",
            data: postData,
            success: function () {
                location.reload();
            }
        })
    })
});