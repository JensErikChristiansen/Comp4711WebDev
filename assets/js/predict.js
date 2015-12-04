/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#Predict1').click(function () {
    $.ajax({
        url: "/welcome/getPredict",
        success: function (result) {
            $('#meat').html(result);
        },
        error: function (xhr) {
            $('#meat').html('Oh no!! ' + xhr.status + ' ' + xhr.statusText);
        }
    });
});