<!DOCTYPE html>
<html lang="en">
<head>
<title>Zadatak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div class="jumbotron text-center">
  <h1>Zadatak</h1>

</div>
<div class="container">


<div class="row">



  <div class="col-md-7 col-md-push-3">
  <h2>Kreiraj clanak</h2>
  <form method="post" action="{{ route('kreiraj') }}">
    <div class="form-group">
      <label for="naslov">Naslov</label>
      <input type="text" class="form-control" id="naslov" name="naslov">
    </div>
    <div class="form-group">
    <label for="opis">Opis</label>
    <textarea id="opis" class="md-textarea form-control" name="opis" rows="3"></textarea>
  
    </div>
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <button type="submit" class="btn">Kreiraj</button>
  </form>
  </div>


</div>



</body>

</html>