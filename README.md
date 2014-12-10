sistemaJAG
==========

Sistema de inscripcion adaptado para la institucion publica U.E.N.B "José Antonio Gonzáles"

El prototipo de este sistema (version 0.6.1) esta en linea en [sistemajag.esy.es/](http://sistemajag.esy.es/)
###Unidad Educativa Nacional Bolivariana "José Antonio Gonzáles"
Escuela ubicada en el paraiso, caracas, venezuela.
##version 0.6.1
###Sistema 91% aprox completado, por ahora falta:
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
en progreso: 80?% aprox.
(a espera de analisis y comentarios)

* versiones del sistema: [ver aqui](https://github.com/slayerfat/sistemaJAG/releases)
* version master: [(ultima version considerada estable)](https://github.com/slayerfat/sistemaJAG/archive/master.zip)
* version de desarrollo: [(version en desarrollo)](https://github.com/slayerfat/sistemaJAG/archive/desarrollo.zip)

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

![trabajando en grandes cantidades](https://38.media.tumblr.com/ad317d02a7b30679130173591754fd09/tumblr_nb21abAizP1tjsogwo1_500.gif)

Joan:

![trabajando full](http://c1.thejournal.ie/media/2013/08/dudefriday.gif)

erick:

![envidosos van a envidiar...](http://i.imgur.com/lz7hOlC.gif)

bryan:

![im helping](http://i.imgur.com/0kjLR.jpg)
