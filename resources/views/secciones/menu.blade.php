<div class="navbar navbar-light bg-light justify-content-between" >
    <!-- Brand/logo -->
  <div ><a class="navbar-brand" href="/b">
      <img src="{{ asset("archivos/h3.png") }}"  alt="logo" style="width:150px;">
    </a>
  </div>

  <div  style="margin:0px;" >
<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #FFD700">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="text-align:center;font-family:Sulphur Point;color:black;">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="text-align:center;font-family:Sulphur Point;color:black;">Servicios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="/homenosotros" role="tab" aria-controls="contact" aria-selected="false" style="text-align:center;font-family:Sulphur Point;color:black;">Nosotros</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div> 
  </div>

  
  </div>




<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(241, 196, 15,0.5);">
 
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background: rgb(241, 196, 15);">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
        <a class="nav-link" href="/b" style="text-align:center;font-family:Sulphur Point;color:black;">HOME<span class="sr-only">(current)</span></a>
      </li>

                <?php
                $lenguajes = App\Lenguajes::all();
                foreach ($lenguajes as $lenguaje):
                ?>

      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align:center;font-family:Sulphur Point;color:black;"><?=$lenguaje['nombre']?></a>
        <div class="dropdown-menu" >
          <?php
                 $val =$lenguaje['id'];
                  $capitulo= App\Capitulos::where('idlenguajes',$val)->get();
                 for($i=0;$i<count($capitulo);$i++) {
                   $id = $capitulo[$i]['id'];
                 ?>
                   
                      
          <a class="dropdown-item" href="#" style="text-align:center;font-family:Sulphur Point;color:black;"><?=$capitulo[$i]['nombre'] ?></a>
          <?php } ?>
        </div>
      </li>
                    <?php endforeach ?>

        <li class="nav-item active"  style="text-align:center;font-family:Sulphur Point;color:black;">
        <a class="nav-link" href="/homeejemplos" >Ejemplos<span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
