<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="Sid.js"></script>
        <link rel="stylesheet" href="errorStyle.css"></links>
        <title>Zeitschriftendatenübermittlung</title>
    </head>
    <body>

        <div class="container" style="max-width:800px">

            <form id="searchForm" method="post" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="form-group col-md-8">
                        <label for="Title">Titel</label>
                        <input type="text" class="form-control" id="Titel" placeholder="Schwezerische Lehrerzeitung">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ID">ID (3 Buchstaben)</label>
                        <input type="text" class="form-control" id="ID" placeholder="SLZ">
                        <div id="error"></div>
                    </div>


                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="SizeOfCollection">Sammlungsumfang</label>
                        <input type="number" class="form-control" id="Sammlungsumfang">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="unit">Masseinheit</label>
                        <select id="Masseinheit" class="form-control">
                            <option selected>Seiten</option>
                            <option>cm</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="numberOfVolumes">Anzahl Bände</label>
                        <input type="number" class="form-control" id="numberOfVolumes">
                    </div>


                </div>

                <button type="submit" class="btn btn-primary">Projektparameter errechnen</button>
            </form>
            <div id="contentarea">
            </div>
        </div>
        
    </body>
</html>
