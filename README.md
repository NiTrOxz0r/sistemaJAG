sistemaJAG
==========

Sistema de inscripcion adaptado para la institucion publica E.B.N.B "Jose Antonio Gonzales"

El prototipo de este sistema esta en linea en [sistemajag.esy.es/](http://sistemajag.esy.es/)
###Escuela Basica Nacional Bolivariana "Jose Antonio Gonzales"
Escuela ubicada en el paraiso, caracas, venezuela.

###Sistema 69.1% aprox completado, por ahora falta:
####FLUJO NORMAL DE FORMULARIOS
en progreso: 99?% aprox.
####FLUJO ALTERNATIVO DE FORMULARIOS
en progreso: 75?% aprox.
####moduloAlumno
en progreso: 75?% aprox.
####moduloCurso
en progreso: 99?%.
####moduloUsuario
en progreso: 80% aprox.
####CSS
en progreso: 50% aprox.
####ModuloValidacion
en progreso: 75?% aprox.
####ModuloReporte
en progreso: 0% aprox.

* versiones del sistema:
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.4a
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.3b
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.2b
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.1c
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4
* versiones del antiguas:
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.3
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.2.1m
  * https://github.com/slayerfat/sistemaJAG/releases/tag/v0.2.1f
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.2
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.1
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.0.9c

#Tesoros escondidos en el sistema:
esta es una tremenda gema:
```javascript
else if (verificar=true) {
  alert("Validando");
  document.getElementById("form").submit();
}
```

hermoso:
```php
  <select name="discapacidad" id="discapacidad">
    <option>Seleccionar</option>
    <? while($fila= mysqli_fetch_array($res)) : ?>
    <?php if ($reg['cod_discapacidad']==$fila['codigo']):?>
      <option selected="selected" value="<?=$fila['codigo'];?>"><?=$fila['descripcion'];?></option>
      <?php else:?>
      <? endif;?>
      <option value="<?=$fila['codigo'];?>"><?=$fila['descripcion'];?></option>
    <?php endwhile;?>
</select>
```
#estado mental:

[@slayerfat:](https://github.com/slayerfat)

![totalmente ok](http://mattburnscoventry.files.wordpress.com/2011/03/mental-breakdown.gif)

[@Phantom66:](https://github.com/Phantom66)

![totalmente ok](http://stream1.gifsoup.com/view4/4741900/concerned-spock-o.gif)

Joan:

![trabajando full](http://c1.thejournal.ie/media/2013/08/dudefriday.gif)

erick:

![envidosos van a envidiar...](http://i.imgur.com/lz7hOlC.gif)

bryan:

![im helping](http://i.imgur.com/0kjLR.jpg)
