sistemaJAG
==========

Sistema de inscripcion adaptado para la institucion publica E.B.N.B "Jose Antonio Gonzales"

El prototipo de este sistema esta en linea en [sistemajag.esy.es/](http://sistemajag.esy.es/)
###Escuela Basica Nacional Bolivariana "Jose Antonio Gonzales"
Escuela ubicada en el paraiso, caracas, venezuela.
##version 0.5.0
###Sistema 81% aprox completado, por ahora falta:
####FLUJO NORMAL DE FORMULARIOS
en progreso: 99?% aprox.
####FLUJO ALTERNATIVO DE FORMULARIOS
en progreso: 85?% aprox.
####moduloAlumno
en progreso: 75?% aprox.
####moduloCurso
en progreso: 100%.
####moduloUsuario
en progreso: 90?% aprox.
####CSS
en progreso: 100% aprox.
####ModuloValidacion
en progreso: 99?% aprox.
####ModuloReporte
en progreso: 0% aprox.

* versiones del sistema:
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.5
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.4a
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.3b
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.2b
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4.1c
  * https://github.com/slayerfat/sistemaJAG/releases/tag/ver0.4
* versiones del antiguas: [ver aqui](https://github.com/slayerfat/sistemaJAG/releases)

#Tesoros escondidos del sistema:
**esta es una tremenda gema!**

creo que la mejor:

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
exquisito:
```php
if[...]{
    [...]
if ($fila = mysql_fetch_array($registros)) {
        if ($fila["cod_tpa"]==1) {
        header("Location: admin.html");
        }else{
                header("Location: user.html");
        }
        }
        }
```
totalmente sublime:
```php
[...]
<br><br>
            <b>&nbsp;T&iacutetulo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <input type="text" id="titn" name="titn" size="80" maxlength="80" value="<?php echo $reg["tit"]; ?>"/><br>
[...]
```

exotico:
```php
<fieldset>
  <legend><i>Datos personales.</i></legend>
  <b>&nbsp;Codigo:&nbsp;</b>  <input type="text" readonly name="cod" size="4" maxlength="4" value="<?php echo $reg["cod_prof"]; ?>">
  <b>&nbsp;&nbsp;&nbsp;&nbsp;Status:&nbsp;</b>&nbsp;&nbsp;</b>
<select name="status" readonly>
<option value="<?php echo "" .$reg['cod_sta']?>"><?php echo "" .$reg['des_sta']?></option>
</select><br>
```
maravilloso:

```php
<div id="contenido">
  <div id="blancoAjax">

    <div align="center">
      <form>
        [...]
        </form>
         <!-- validacion -->
    <script type="text/javascript">
      [...]
    </script>
</div>
<!-- fin de archivo -->
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
