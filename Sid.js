 /*
 * JavaScript component of Application implemented using JQuery
 * 
 * @author FSteffen
 */


// A $( document ).ready() block.
$(document).ready(function () {
    $("#searchForm").submit(function (event) {
        var sid = $("#ID").val();
        var title = $("#Titel").val();
        var numberOfPages = $("#Sammlungsumfang").val();
        var numberOfVolumes = $("#numberOfVolumes").val();
        var digitzationCost = 0;
        var numberOfTB = 0;
    
        $.post("SidJson.php", {sid}, {title}, {numberOfPages}, {numberOfVolumes})
                .done(function (data) {
                    var results = JSON.parse(data);
                    $("#contentarea").empty();
                    for (var result of results) {
                        var html =
                                `<table class="item">
                                    <tr><td>Title</td><td>${result._title}</td></tr>
                                    <tr><td>ID</td><td>${result._sid}</td></tr>
                                    <tr><td>Anzahl Seiten</td><td>${result._numberOfPages}</td></tr>
                                    <tr><td>Anzahl Bände</td><td>${numberOfVolumes._numberOfVolumes}</td></tr>
                                    <tr><td>Kosten Scanning</td><td>${digitzationCost._digitizationCost}</td></tr>
                                    <tr><td>Anzahl TB (Datengrösse)</td><td>${numberOfTB._numberOfTB}</td></tr>
                                </table>`;
                        $("#contentarea").append(html);
                    }
                })
                .fail(function (error) {
                    alert(error);
                });


        event.preventDefault();
    });
    $("#ID").keyup(function (target) {
        var sid = $("#ID").val();
        if(!findSid(sid)){
            $("#error").text("Dies ist keine korrekte ID");
        }else{
            $("#error").text("");
        }
        function findSid(str){
            regex = /^[a-zA-Z]{3,3}$/;

            if (str.search(regex)>-1) {
                return true;
            }
            return false; // No valid ID found
        }
    });
});

