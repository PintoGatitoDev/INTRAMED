<?php render("header"); ?>

<section class="apartado" id="Bienvenida">
    <h1>Bienvenido a Intramed</h1>
    <div id="carrusel">
        <img src="{{assets('img/app/1.png')}}" alt="Imagen 1" id="img1" class="img_carru" style="display: block;">
        <img src="{{assets('img/app/2.jpg')}}" alt="Imagen 2" id="img2" class="img_carru" style="display: none;">
        <img src="{{assets('img/app/3.jpg')}}" alt="Imagen 3" id="img3" class="img_carru" style="display: none;">
		<img src="{{assets('img/app/4.jpg')}}" alt="Imagen 4" id="img4" class="img_carru" style="display: none;">
		<img src="{{assets('img/app/5.png')}}" alt="Imagen 5" id="img5" class="img_carru" style="display: none;">
    </div>
</section>

<section class="apartado" id="Servicios">
    Servicios
</section>
<?php render("footer"); ?>