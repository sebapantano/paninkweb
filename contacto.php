<?php require_once("header.php"); ?>
<?php require_once("top.php"); ?>
<?php
  			
    if(isset($_POST['send'])){
		$nombre = $_POST['nombre'];
		$mail = $_POST['mail'];
		$referencia = $_POST['referencia'];
		$texto= $_POST['texto'];
		
        $errors = array(); // declaramos un array para almacenar los errores
        if($nombre == ''){
            $errors[1] = '<br><span class="error-contact">Ingrese su nombre</span>';
        }else if($mail == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$mail)){
            $errors[2] = '<br><span class="error-contact">Ingrese un email correcto</span>';
        }else if($referencia == ''){
            $errors[3] = '<br><span class="error-contact">Ingrese una referencia</span>';
        }else if(trim($texto)==''){
            $errors[4] = '<br><span class="error-contact">Ingrese un mensaje</span>';
        }else{
			$para = 'info@panink.com.ar';
			$miasunto='Formulario de Contacto Panink.com.ar';
			$mensaje =
			"Este mensaje fue enviado por: "  . $nombre . 
			"\nEmail: " . $mail . 
			"\nReferencia: ".$referencia.
			"\nComentario: ".$texto;
			mail($para,$miasunto,$mensaje);
			$_POST['nombre'] = '';
			$_POST['mail'] = '';
			$_POST['referencia'] = '';
			$_POST['texto'] = '';
			  
			  // si el envio fue exitoso reseteamos lo que el usuario escribio:
		}
      }  //si todo esta ok envia email
?>
<section class="container">	
	<img class="title" src="/img/contact.jpg" />
    <h2>CONTACTO</h2>
    <div class="row">
    	<div class="span6 pull-left"><img src="/img/sobres.jpg" /></div>
    	<div class="span1"></div>
	    <form name="contact" method="post"  action="" class="contact" >
		    <div class="contact pull-left" style="width: 300px"> 
		    	<div class="input-prepend">
		  			<span class="add-on"><i class="icon-user"></i></span>
		  			<input type="text" id="nombre" placeholder="Nombre"   name="nombre" value='<?php if(isset($_POST['nombre']))echo $_POST['nombre']; ?>' >
		        	<?php if( isset ($errors[1]))echo $errors[1]; ?>
				</div>
		    	<div class="input-prepend">
		  			<span class="add-on"><i class="icon-envelope"></i></span>
		  			<input type="email" id="mail"   name="mail" placeholder="Email" value='<?php if(isset($_POST['mail']))echo $_POST['mail']; ?>'>
					<?php if( isset ($errors[2]))echo $errors[2]; ?>
				</div>
				<div class="input-prepend">
		  			<span class="add-on"><i class="icon-question-sign"></i></span>
		  			<input type="text" id="referencia"  name="referencia" placeholder="Como nos conoci&oacute;?"value='<?php if(isset($_POST['referencia']))echo $_POST['referencia']; ?>'>
		        	<?php if( isset ($errors[3]))echo $errors[3]; ?>
				</div>
				<div class="input-prepend">
		  			<span class="add-on"><i class="icon-comment"></i></span>
		  			<textarea rows ="5" name="texto" id="texto" class="span3" name="texto" placeholder="Comentario"><?php if(isset($_POST['comentario']))echo $_POST['comentario']; ?></textarea>
					<?php if( isset ($errors[4]))echo $errors[4]; ?>
				</div>
		     	<div class="p-left m-left">
					<input class="btn btn-primary" type="submit" name="send" value="Enviar">
					<input class="btn" type="reset" value="Borrar">
				</div>
		     </div>
	    </form>
    </div>
    <div class="row-fluid">
    	<div class="span5 p-left">
		    <p>
		        PANINK Web Design<br>
		        info@panink.com.ar<br>
		        Argentina | &copy; 2012 
		    </p>
		</div>
	    <div id="nets" class="span7">
	        <a href="http://www.facebook.com/profile.php?id=100003309489706"  target="_blank"><img class="fb" src="/img/fb.jpg" /></a>
	        <a href="http://twitter.com/#!/PaninkWebDesign" target="_blank"> <img class="tw" src="/img/tw.jpg" /></a>
	        <a href="http://www.linkedin.com/company/panink-web-design/" target="_blank"><img class="lkin" src="/img/lkin.jpg" /></a>
	        <img class="gplus" src="/img/gplus.jpg" title="Proximamente" />
	    </div>
    </div>
</section>   
<div id="footer">
<?php require_once("footer.php");?>
</div>
<?php
	if (isset($para)){
	echo '<script type="text/javascript">alert("Su mensaje ha sido enviado. Muchas Gracias!")</script>';
	}
	?>
</body>
</html>



