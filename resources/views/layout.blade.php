<?php
session_start();    
?>
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



    <div class="jumbotron text-center ">

  <h1>Zadatak</h1>
 

</div>

<div class="container">

    
<div class="limiter">

@if((Session::get('korisnik')==null))

		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="{{route('login')}}">
    
					@csrf()
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                   
                        <input class="input100" type="text" name="korisnickoIme" id="korisnickoIme" placeholder="Korisnicko ime">
						<span class="focus-input100"></span>
						
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
                 
						<input class="input100" type="password" id="sifra" name="sifra" placeholder="sifra">
						<span class="focus-input100"></span>
						
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
					

					
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					
					

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
        @else

        <div class="container-login100-form-btn">
					<a href="{{route('logout')}}">Logout</a>
					</div>

        @endif
	</div>
	
	

<div class="row">
@foreach($clanci as $c)
<div class="col-sm-4">
      <h3>{{ $c->id }}</h3>
      <p>
            {{$c->naslov}}</p>
            <p>
            {{$c->tekst}}</p>
      <p>
            {{date('Y.m.d',strtotime($c->datumObjavljivanja))}}</p>

           
    </div>
  
    @endforeach

 
</div>


</div>
@if((Session::get('korisnik')!=null))
         
         <button type="button" onclick="window.location='{{ url("/kreirajClanak") }}'" class="btn">Kreiraj novi</button>

         @endif
         <a href="{{route('exportCsv')}}">Export u csv</a>
         

</div>



</body>

</html>