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
  </div>
  <div class="form-group">
    <label for="Title">Titel</label>
    <input type="text" class="form-control" id="Title" placeholder="Schwezerische Lehrerzeitung">
  </div>
  <div class="form-group">
    <label for="numberOfVolumes">Anzahl Bände</label>
    <input type="number" class="form-control" id="numberOfVolumes" placeholder="12">
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="SizeOfCollection">Sammlungsumfang</label>
      <input type="number" class="form-control" id="SizeOfCollection">
    </div>
    <div class="form-group col-md-4">
      <label for="unit">Masseinheit</label>
      <select id="unit" class="form-control">
        <option selected>Seiten</option>
        <option>cm</option>
      </select>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Projektparameter errechnen</button>
</form>       </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
