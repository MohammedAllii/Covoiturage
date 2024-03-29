<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Covoiturage</title>
    <style>
#contact{
padding: 3px;
width: 100%;
margin-top:210px;
 
}
.navbar{
  background:#000000;
}
</style>
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top"  >
  <div class="container-fluid">
    <div class="navbar-header">
    <i class='fas fa-car-alt' style='font-size:50px;color:white'></i>
        </div>
   
    <ul class="nav navbar-nav">
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
      <li><a href="{{url('/')}}"><i class='fas fa-home' style='font-size:25px;color:white'></i>  ACCUEIL</a></li>
      <li><a href="{{url('/tous')}}"><i class='fas fa-list' style='font-size:25px;color:white'></i>  TOUS LES TRAJETS</a></li>
      <li class="active"><a href="{{url('/chercher')}}"><i class='fas fa-search' style='font-size:25px;color:white'></i>  CHERCHER UN TRAJET</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('inscrit')}}"><i class='fa fa-user' style='font-size:25px;color:white'></i>   INSCRIPTION</a></li>
      <li><a href="{{url('cnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   CONNEXION</a></li>
      <li><a href="{{url('/dashboard')}}"><i class='fas fa-chalkboard-teacher' class="open-button" style='font-size:25px;color:white'></i>   TABLEAU DE BOARD</a></li>
    </ul>
  </div>
</nav>


   


    <br>

        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:70px;">
                <h2><g>Où Voulez-vous aller?</g></h2>
                <hr>
        <form action="/chercher" method="get">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="villedep">Ville de depart</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Ville de depart" name="villedep" value="{{old('villedep')}}">
                        <span class="text-danger" >@error('villedep'){{$message}} @enderror</span>

                    </div>
                    
                    <div class="form-group">
                        <label for="villedes">Ville de destination</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Ville de destination" name="villedes" value="{{old('villedes')}}">
                        <span class="text-danger" >@error('villedes'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" value="{{old('date')}}">
                        <span class="text-danger" >@error('date'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Chercher</button>
                    </div>
                </form>
</div></div></div>
    </div>
    <br>
    <section class="gray-section">

@foreach($trajett as $trajets)
<div class="container p-5 my-5 text-white" style="background-image:url('/images/bg.jpg');background-repeat: no-repeat;background-position: right 20%;color:#000000;border-radius:5px;border:#000000 1px solid;">
<div class="text text-center">
<h3> <span class="glyphicon glyphicon-map-marker" style="color:red;"> {{$trajets->villedep}}</span> ----><span class="glyphicon glyphicon-map-marker" style="color:green;">  {{$trajets->villedes}}</span></h3>
</div>
@if(Session::has('success'))
                    <div class="text text-center">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="text text-center">

                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    </div>
                    @endif
<div class="text text-left">
<h3><div class="fa fa-money">  Prix:  <span style="color:red;">{{$trajets->prix}} Dt</span></div></h3>
    <h3><div class='fas fa-wheelchair'>  Places : <span style="color:red;">{{$trajets->nbp}} </span></div></h3>
    <h3><div class='fas fa-car'>  Marque  : <span style="color:red;"> {{$trajets->marque}}</span></div></h3>
    <h3><div class='fas fa-clock'>  Date  : <span style="color:red;"> {{$trajets->date}}&nbsp;&nbsp;{{$trajets->heure}}</span></div></h3>
      <div class="hidea">
        <h3><div class='fas fa-male'>  Publier par  : <span style="color:red;"> {{$trajets->name_user}}</span></div></h3>
        <h3><div class='fas fa-phone'>  Télephone  : <span style="color:red;"> {{$trajets->phone}}</span></div></h3>
        <h3><div class='fas fa-envelope'>  Email  : <span style="color:red;"> {{$trajets->email}}</span></div></h3>
      </div>
   </div>
<div class="text text-right">
<button class="btn btn-primary"><div class="showa">Plus Détails</div></button>
</div>
<br>
</div>
<br>
@endforeach
<br>


</section>


</section>

    <br>
<!--footer-->
<section id="contact" style="background-color:#000000;" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
              <br>
            <a href="https://www.facebook.com/med.ali.mejri4/" target="_blank"><i class="fab fa-facebook-square" style='font-size:25px;color:white'></i></a>
                <a href="https://www.linkedin.com/in/m%C3%A9jri-mohamed-ali-7137011ba/" target="_blank"><i class="fab fa-linkedin" style='font-size:25px;color:white'></i></a>
                <a href="https://www.instagram.com/hamouda_mejrii/?hl=fr" target="_blank"><i class="fab fa-instagram" style='font-size:25px;color:white'></i></a>
                <p style="color:#FFFFFF;"><strong>&copy; 2022 Mejri Mohamed Ali</strong><br/> </p>
                
            </div>
        </div>
    </div>
</section>
<script>
  $(".hidea").hide();
     $(document).ready(function(){
            $(".showa").click(function(){
            $(".hidea").toggle(500);
            });});
</script>
</body>
</html>