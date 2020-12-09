<div class="container">
	<h2 style="text-align:center;font-family:Pacifico;color:black;" >Tu Lenguaje</h2>
<h2 style="text-align:center;font-family:Sacramento;color:black;" >Escoge tu leunguaje favorito y comienza a programar, Suerte:)</h2>




<div class="main-footer widgets-dark typo-light">
<div class="container">
<div class="row">
  <?php
                $lenguajes = App\Lenguajes::all();
                foreach ($lenguajes as $lenguaje):
                ?>
<div class="col-xs-12 col-sm-6 col-md-4" >
<div class="widget subscribe no-box" style="background: rgb(163, 228, 215);border-radius: 20px">
  <br>
<h1 class="card-title" style="text-align:center;font-family:Sulphur Point;color:rgb(0, 0, 128);"><?=$lenguaje['nombre']?><span></span></h1>
<p style="text-align:center;font-family:Sulphur Point;color:rgb(0, 0, 128)"><?=$lenguaje['descripcion']?></p>
<center><a href="#" class="btn btn-info">Button</a></center>
<br>
</div>
</div>
 <?php endforeach ?>
</div>
</div>
</div>

</div>


    
















