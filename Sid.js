 /*
 * JavaScript component of Application implemented using JQuery
 * 
 * @author FSteffen
 */


// A $( document ).ready() block.
$(document).ready(function () {
    $("#searchForm").submit(function (event) {
        event.preventDefault();

        var sid = $("#ID").val();
        var title = $("#Titel").val();
        var numberOfPages = $("#Sammlungsumfang").val();
        var numberOfVolumes = $("#numberOfVolumes").val();
        var digitzationCost = 0;
        var numberOfTB = 0;
        var measure = $("#Masseinheit").val();
        $.post("SidJson.php", {sid: sid, title: title, measure: measure, numberOfPages: numberOfPages, numberOfVolumes: numberOfVolumes})
                .done(function (data) {
                    var results = JSON.parse(data);
                    $("#contentarea").empty();
                    for (var result of results) {
                        var html =
                                `<table class="item">
                                    <tr><td>Title</td><td>${result._Title}</td></tr>
                                    <tr><td>ID</td><td>${result._SID}</td></tr>
                                    <tr><td>Anzahl Seiten</td><td>${result._numberOfPages}</td></tr>
                                    <tr><td>Anzahl Bände</td><td>${result._numberOfVolumes}</td></tr>
                                    <tr><td>Kosten Scanning</td><td>${result._digitizationCost}</td></tr>
                                    <tr><td>Anzahl TB (Datengrösse)</td><td>${result._numberOfTB}</td></tr>
                                </table>`;
                        $("#contentarea").append(html);
                    }
                })
                .fail(function (error) {
                    alert(error.responseText);
                });


    });
    $("#ID").keyup(function (target) {
        var sid = $("#ID").val();
        if(!findSid(sid)){
            $("#error").text("Dies ist keine korrekte ID");
        }else{
            $("#error").text("");
        }
        
         $.post("CheckDb.php", {sid: sid})
        .done(function (data) {
            var result = JSON.parse(data);
            if(result){
                //set error
                var results = JSON.parse(data);
                    for (var result of results) {       
                        $("#error").text("Es git bereits einen Eintrag mit dem Titel '" + result._Title +"' und der ID '"+ result._SID+"'");
                    }
            }
        });
        
        
        function findSid(str){
            regex = /^[a-zA-Z]{3,3}$/;

            if (str.search(regex)>-1) {
                return true;
            }
            return false; // No valid ID found
        }
    });
    
    // title keyup
    $("#Titel").keyup(function (target) {
        var title = $("#Titel").val();
        $.post("CheckDb.php", {title: title})
        .done(function (data) {
            var result = JSON.parse(data);
            if(result){
                //set error
                var results = JSON.parse(data);
                    $("#contentarea").empty();
                    for (var result of results) {
                        var html =
                                `<table class="item">
                                    <tr><td>Title</td><td>${result._Title}</td></tr>
                                    <tr><td>ID</td><td>${result._SID}</td></tr>
                                </table>`;
                        $("#contentarea").append(html);
                    }
            }
        });
    });
});