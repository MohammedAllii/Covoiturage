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
      <li class="active"><a href="{{url('/accueil')}}"><i class='fas fa-home' style='font-size:25px;color:white'></i>  ACCUEIL</a></li>
      <li><a href="{{url('/voiture')}}"><i class='fas fa-car' style='font-size:25px;color:white'></i>  COVOITURAGE</a></li>
      <li><a href="{{url('trajet')}}"><i class='fas fa-marker' style='font-size:25px;color:white'></i>  PUBLIER UN TRAJET</a>
</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li style="color:white";>WELCOME <a href="{{url('profile')}}"><div style="color:yellow;">{{$data ->nom}}</div></a></li>
      <li><a href="{{url('decocnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   DECONNEXION</a></li>
    </ul>
  </div>
</nav>
<!--header-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/images/bg4.jpg"  style="width:100%;height:80%;">
      </div>

      <div class="item">
        <img src="/images/bg3.jpg"  style="width:100%;height:80%;">
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


    <br>
    <section class="gray-section">
<div class="text text-center">
    <h1>Statistiques</h1>
</div>

    <table class="table" style="background-color:#000000;height:10%;">
  <thead>
    <tr>
      <th scope="col" class="text text-center" style="color:#FFFFFF;font-size:20px;">{{ $users->count() }}  Personne Inscrit</th>
      <th scope="col" class="text text-center" style="color:#FFFFFF;font-size:20px;">{{ $trajets->count() }}  Trajet Publié</th>
      <th scope="col" class="text text-center" style="color:#FFFFFF;font-size:20px;">{{$trajetaujordhui }}  Trajet d'aujord'hui</th>
      
    </tr>
  </thead>
</table>
</section>
    <br>
<section class="gray-section">
<div class="text text-center">
    <h1>Les Dérniéres Annonces</h1>
</div>
@foreach($trajet as $trajets)
<div class="container p-5 my-5 text-white" style="background-image:url('/images/bg.jpg');background-size:cover;color:#000000;border-radius:5px;border:#000000 1px solid;">
<div class="text text-left">
<h3> <span class="glyphicon glyphicon-map-marker" style="color:red;"> {{$trajets->villedep}}</span> ----><span class="glyphicon glyphicon-map-marker" style="color:green;">  {{$trajets->villedes}}</span></h3>
</div>
<div class="text text-right">
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
<button class="btn btn-success">Réserver</button>
</div>
<br>
</div>
<br>
@endforeach
<br>


</section>
    <br>
<!--footer-->
<section id="contact" class="bg-info" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
              <br>
            <a href="https://www.facebook.com/med.ali.mejri4/" target="_blank"><i class="fab fa-facebook-square" style='font-size:25px;color:black'></i></a>
                <a href="https://www.linkedin.com/in/m%C3%A9jri-mohamed-ali-7137011ba/" target="_blank"><i class="fab fa-linkedin" style='font-size:25px;color:black'></i></a>
                <a href="https://www.instagram.com/hamouda_mejrii/?hl=fr" target="_blank"><i class="fab fa-instagram" style='font-size:25px;color:black'></i></a>
                <p><strong>&copy; 2022 Mejri Mohamed Ali</strong><br/> </p>
                
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  $(".hidea").hide();
     $(document).ready(function(){
            $(".showa").click(function(){
            $(".hidea").toggle(1000);
            });});
</script>
</body>
</html>