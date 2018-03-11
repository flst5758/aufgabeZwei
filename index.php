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
        <title></title>
    </head>
    <body>
        
        <div class="container" style="max-width:800px">

 <form>
  <div class="form-row">
  
  <div class="form-group col-md-8">
    <label for="Title">Titel</label>
    <input type="text" class="form-control" id="Titel" placeholder="Schwezerische Lehrerzeitung">
  </div>
     <div class="form-group col-md-4">
    <label for="Title">ID</label>
    <input type="text" class="form-control" id="ID" placeholder="SLZ">
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
      <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputCity">Weitere Titel (Titelgeneration)</label>
      <input type="text" class="form-control" id="Titelgeneration" placeholder="Titel">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Startjahr</label>
      <input type="text" class="form-control" id="Startjahr" placeholder="1905">
    </div>
    <div class="form-group col-md-2">
      <label for="Endjahr">Endjahr</label>
      <input type="text" class="form-control" id="Endjahr" placeholder="1940">
    </div>
          <div class="form-group col-md-8">
      <label for="inputCity">Weitere Titel (Titelgeneration)</label>
      <input type="text" class="form-control" id="Titelgeneration" placeholder="Titel">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Startjahr</label>
      <input type="text" class="form-control" id="Startjahr" placeholder="1941">
    </div>
    <div class="form-group col-md-2">
      <label for="Endjahr">Endjahr</label>
      <input type="text" class="form-control" id="Endjahr" placeholder="1962">
    </div>
          <div class="form-group col-md-8">
      <label for="inputCity">Weitere Titel (Titelgeneration)</label>
      <input type="text" class="form-control" id="Titelgeneration" placeholder="Titel">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Startjahr</label>
      <input type="text" class="form-control" id="Startjahr" placeholder="1963">
    </div>
    <div class="form-group col-md-2">
      <label for="Endjahr">Endjahr</label>
      <input type="text" class="form-control" id="Endjahr" placeholder="1991">
    </div>
  </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Projektparameter errechnen</button>
</form>       </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
