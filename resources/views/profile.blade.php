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
margin-top:100px;
}
#formul{
    margin-top:7%;
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
    <i class='fas fa-car-alt' style='font-size:40px;color:white'></i>
        </div>
   
    <ul class="nav navbar-nav">
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
      <li><a href="{{url('/accueil')}}"><i class='fas fa-home' style='font-size:25px;color:white'></i>  ACCUEIL</a></li>
      <li><a href="{{url('voiture')}}"><i class='fas fa-car' style='font-size:25px;color:white'></i>  COVOITURAGE</a></li>
      <li><a href="{{url('trajet')}}"><i class='fas fa-marker' style='font-size:25px;color:white'></i>  PUBLIER UN TRAJET</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a href="{{url('profile')}}"><i class='fas fa-user-edit' class="open-button" style='font-size:25px;color:white'></i> {{$data ->nom}}</a></li>
      <li><a href="{{url('decocnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   DECONNEXION</a></li>
    </ul>
  </div>
</nav>
<!--header-->

<section class="gray-section" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-offset-4" style="margin-top:70px;">
                <h2 class='fas fa-list'><g> Mon Profile</g></h2>
                <hr>
                <h3><span style="font-size:30;color:#0097FF;" class='fas fa-id-card'> Nom Complet </span> <br>{{$data->nom}}</h3><hr>
                <h3><span style="font-size:30;color:#0097FF;" class="fa fa-envelope"> Email  </span><br> {{$data->email}}</h3><hr>
                <h3><span style="font-size:30;color:#0097FF;" class="fas fa-birthday-cake"> Age : </span> {{$data->age}}</h3><hr>
                <h3><span style="font-size:30;color:#0097FF;" class="fas fa-phone"> Télephone :</span> {{$data->phone}}</h3><hr>
                <h3><span style="font-size:30;color:#0097FF;" class="fas fa-check-square"> Annonces publiée : </span> {{$trajett}}</h3>
                <h2 class='fas fa-edit' id="oui" data-toggle="modal" data-target="#myModal"><g>Edit Profile</g></h2>



    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier profile</h4>
        </div>
        <div class="modal-body">
          
        <form action="{{Route('update')}}" method="post" id="non">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control"  name="id" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nom Complet : </label>
                        <input type="text" class="form-control" placeholder="Entrer votre nom complet" name="nom" value="{{$data->nom}}">
                        <span class="text-danger" >@error('nom'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Entrer votre Email" name="email" value="{{$data->email}}">
                        <span class="text-danger" >@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" placeholder="Entrer votre age" name="age" value="{{$data->age}}">
                        <span class="text-danger" >@error('age'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Numéro Télephone</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Télephone" name="phone" value="{{$data->phone}}">
                        <span class="text-danger" >@error('phone'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="password" value="{{$data->password}}">
                        <span class="text-danger" >@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>
                </form>
      </div>
      
    </div>
  </div>




                
            </div>  
        </div>
    </div>
</section>
    <br><br>
    <section class="gray-section">
<div class="text text-center">
    <h1 class="ouii">Mes Annonces</h1>
</div>
<div class="nonn">
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
    <input type="hidden" value="{{$trajets->id}}" name="ids">
    
   </div>
<div class="text text-right">
<a href="deletes{{$trajets->id}}" class="btn btn-danger">Supprimer</a>
    <button class="btn btn-warning">Modifier</button>
</div>
<br>
</div>
<br>
@endforeach
<br>
</div>


</section>
<!--footer-->
<section id="contact" class="bg-info" >
    <div class="container">
       <br>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2022 Mejri Mohamed Ali</strong><br/> </p>
                <a href="https://www.facebook.com/med.ali.mejri4/" target="_blank"><i class="fab fa-facebook-square" style='font-size:25px;color:black'></i></a>
                <a href="https://www.linkedin.com/in/m%C3%A9jri-mohamed-ali-7137011ba/" target="_blank"><i class="fab fa-linkedin" style='font-size:25px;color:black'></i></a>
                <a href="https://www.instagram.com/hamouda_mejrii/?hl=fr" target="_blank"><i class="fab fa-instagram" style='font-size:25px;color:black'></i></a>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    
    $("#nonn").hide();
$(document).ready(function(){
  $(".ouii").click(function(){
    $(".nonn").toggle(1000);});});
    </script>
</body>
</html>