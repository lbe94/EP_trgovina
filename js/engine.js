/**
 * Created by Luka on 16. 12. 2016.
 */

$(document).ready(function () {
    console.log("HEHEHEHEHEHHEHE");

    $("input[type=submit]").click(function (e) {
        e.preventDefault();
        var idArt = $(this).parent('form').attr('id');

        console.log("IDARTIKLA: " + idArt);
    });
});