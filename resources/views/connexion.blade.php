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
#formul{
    margin-top:10%;
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
      <li><a href="{{url('voiture')}}"><i class='fas fa-car' style='font-size:25px;color:white'></i>  COVOITURAGE</a></li>
      <li><a href="{{url('bus')}}"><i class='fas fa-bus' style='font-size:25px;color:white'></i>  BUS</a></li>
      <li><a href="#"><i class='fas fa-marker' style='font-size:25px;color:white'></i>  PUBLIER UN TRAJET</a>
</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('inscrit')}}"><i class='fa fa-user' style='font-size:25px;color:white'></i>   INSCRIPTION</a></li>
      <li class="active"><a href="{{url('cnx')}}"><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:white'></i>   CONNEXION</a></li>
    </ul>
  </div>
</nav>
<!--header-->




    <br>
    <div class="text text-center">
        <h1 class="col-sm-offset-4 col-sm-3" id="formul">Connecter Vous !</h1>
        <form class="form-horizontal" action="#" >
        <div class="form-group">
           <div class="col-sm-offset-4 col-sm-3">
           <input type="text" class="form-control"  placeholder="Nom d'utilisateur">
           </div>
       </div>
       <div class="form-group">
           <div class="col-sm-offset-4 col-sm-3">
           <input type="password" class="form-control"  placeholder="Mot de passe">
           </div>
       </div>
       
       <div class="form-group">
                <div class="col-sm-offset-4 col-sm-3">
                <button type="submit" class="btn btn-info">Se connecter</button>
                </div>
            </div>
            <div class="form-group">
           <div class="col-sm-offset-4 col-sm-3">
             <a href="">Mot de Passe oublié?</a>
             <hr style="width:60%;">
             <button type="submit" class="btn btn-success">Créer compte</button>

        </div>
       </div>
       
        </form>
    </div>
    <br><br><br><br>
<!--footer-->
<section id="contact" class="bg-info" >
    <div class="container">
        <br><br><br><br>
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:mejrihamouda8@email.com" class="btn btn-info">Envoyer un e-mail</a>
                <p class="m-t-sm">        
                </p>    
            </div>
        </div>
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