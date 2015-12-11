/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#predictButton").click(function () {
    $.ajax({
        url: "/welcome/getPredict/" + $("#codeSelect").val(),
        success: function (result) {
        	var json = JSON.parse(result);
            $("#yourResults").html(json[0]);
            $("#opponentResults").html(json[1]);
        },
        error: function (xhr) {
            $("#meat").html("Oh no!! " + xhr.status + " " + xhr.statusText);
        }
    });
});