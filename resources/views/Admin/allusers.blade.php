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
    <li><a href="{{url('/alltrajets')}}"><i class='fas fa-list' style='font-size:25px;color:white'></i>  TOUS LES TRAJETS</a></li>
      <li><a href="{{url('/allusers')}}"><i class='fas fa-list' style='font-size:25px;color:white'></i>  TOUS LES UTILISATEURS</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="{{url('board')}}"><img src="/images/{{$data->photo}}" width="35px" height="35px" style="border-radius:50px;"><span style='font-size:20px;color:white'> {{$data ->nom}}</span></a></li>
      <li><a href="{{url('decocnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   DECONNEXION</a></li>

    </ul>
  </div>
</nav>
    <br>
    </div>
    <br><br><br>
    <section class="gray-section">
    <div class="text text-center">
    <h1>Tous Les Utilisateurs</h1>
    <br><br>
</div>
@foreach($users as $user)
<div class="container p-5 my-5 text-center" style="color:#000000;border-radius:5px;border:#000000 1px solid;">
<div class="text text-center">
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
    <br>
    <h3><img src="/images/{{$user->photo}}" width="100px" height="100px" style="border-radius:20px;align:center;"></h3>
<br>
<h3><div class="fa fa-id-card">  Nom Complet:  <span style="color:black;">{{$user->nom}} </span></div></h3>
    <h3><div class='fas fa-envelope'>  Email : <span style="color:black;">{{$user->email}} </span></div></h3>
    <h3><div class='fas fa-phone'>  Téléphone  : <span style="color:black;"> {{$user->phone}}</span></div></h3>
    <h3><div class='fas fa-birthday-cake'>  Age  : <span style="color:black;"> {{$user->age}}&nbsp;&nbsp;</span></div></h3>
    <input type="hidden" value="{{$user->id}}" name="ids">
      
   </div>
<div class="text text-right">
<a href="updateuser{{$user->id}}"><button class="btn btn-primary" ><div>Modifier</div></button>
<a href="deleteuser{{$user->id}}"><button class="btn btn-danger">Supprimer</button></a>
</div>
<br>
</div>
<br>
@endforeach
<br>


</section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier user</h4>
        </div>
        <div class="modal-body">
          
        <form action="{{Route('update')}}" method="post" id="non" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" placeholder="Entrer votre nom complet" name="nom" value="{{$user->nom}}">
                        <span class="text-danger" >@error('nom'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Entrer votre Email" name="email" value="{{$user->email}}">
                        <span class="text-danger" >@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" placeholder="Entrer votre age" name="age" value="{{$user->age}}">
                        <span class="text-danger" >@error('age'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Numéro Télephone</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Télephone" name="phone" value="{{$user->phone}}">
                        <span class="text-danger" >@error('phone'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="password" >
                        <span class="text-danger" >@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo de profile</label>
                        <input type="file" class="form-control"  name="photo">
                        <span class="text-danger" >@error('photo'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>
                </form>
      </div>
      
    </div>
  </div>

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