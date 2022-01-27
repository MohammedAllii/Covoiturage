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
      <li><a href="{{url('bus')}}"><i class='fas fa-bus' style='font-size:25px;color:white'></i>  BUS</a></li>
      <li><a href="#"><i class='fas fa-marker' style='font-size:25px;color:white'></i>  PUBLIER UN TRAJET</a>
</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="#"><div style="color:yellow;"> {{$data ->nom}}</div></a></li>
      <li><a href="{{url('decocnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   DECONNEXION</a></li>
    </ul>
  </div>
</nav>
<!--header-->

<section class="gray-section" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:70px;">
                <h2><g>Publier un trajet</g></h2>
                <hr>
                <form action="{{Route('AddTrajets')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="villedep">Ville Depart</label>
                        <input type="text" class="form-control" placeholder="Votre ville de depart" name="villedep" value="{{old('villedep')}}">
                        <span class="text-danger" >@error('villedep'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="villedes">Ville destination</label>
                        <input type="text" class="form-control" placeholder="Votre ville de destination" name="villedes" value="{{old('villedes')}}">
                        <span class="text-danger" >@error('villedes'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="nbp">Nombre de place</label>
                        <input type="number" class="form-control" placeholder="Nombre de place" name="nbp" value="{{old('nbp')}}">
                        <span class="text-danger" >@error('nbp'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="marque">Marque voiture</label>
                        <input type="text" class="form-control" placeholder="Marque du voiture" name="marque" value="{{old('marque')}}">
                        <span class="text-danger" >@error('marque'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" placeholder="Prix pour chaque place" name="prix" value="{{old('prix')}}">
                        <span class="text-danger" >@error('prix'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" value="{{old('date')}}">
                        <span class="text-danger" >@error('date'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Publier</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</section>
    <br><br><br><br>
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
</body>
</html>