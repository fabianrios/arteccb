<?php
$dir		= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$default	= 'http://cambelt.co/icon/camera/480x360?color=b71632,fefefe';
?>
<!-- panel 2 -->
<h4>Proyecto</h4>
<h5>Descripción del proyecto a presentar* (Max. 250 palabras)</h5>
<textarea class="expand" name="user_proyect_description" rows="10"><?php echo $user->__get('user_proyect_description');?></textarea>

	<!-- <div class="intitle">
		<ul class="resume">
			<li>
				<span class="asterix">*</span><strong>Nombre de la obra</strong>
			</li>
			<li>
				<span class="asterix">*</span><strong>Dimensiones (mts)</strong>
			</li>
			<li>
				<span class="asterix">*</span><strong>Formato o técnica</strong>
			</li>
			<li>
				<span class="asterix">*</span><strong>Año</strong>
			</li>
			<li>
				<span class="asterix">*</span><strong>Url de la obra</strong>
			</li>
		</ul>
	</div> -->

	<ul class="no-bullet project">
		<li>
			<span class="asterix">*</span><strong>Nombre de la obra</strong>
  			<input title="Digite nombre de la obra" class="expand input-text" type="text" name="user_proyect_name" value="<?php echo $user->__get('user_proyect_name');?>"  />
  		</li>
		<li>
			<span class="asterix">*</span><strong>Dimensiones (mts)</strong>
  			<input title="Digite dimensiones de la obra" class="expand input-text" name="user_proyect_dimensions" value="<?php echo $user->__get('user_proyect_dimensions');?>" type="text" />
  		</li>
	  	<li>
	  		<span class="asterix">*</span><strong>Formato o técnica</strong>
  			<input title="Digite formato o técnica de la obra" class="expand input-text" type="text" name="user_proyect_format" value="<?php echo $user->__get('user_proyect_format');?>" />
  		</li>
	  	<li>
	  		<span class="asterix">*</span><strong>Año</strong>
    		<select title="Digite año de la obra" name="user_proyect_year">
    			<option <?php if ($user->__get('user_proyect_year') == 2012) echo 'selected="selected"';?>>2012</option>
    			<option <?php if ($user->__get('user_proyect_year') == 2011) echo 'selected="selected"';?>>2011</option>
    			<!--<option <?php if ($user->__get('user_proyect_year') == 2010) echo 'selected="selected"';?>>2010</option>
    			<option <?php if ($user->__get('user_proyect_year') == 2009) echo 'selected="selected"';?>>2009</option>
    			<option <?php if ($user->__get('user_proyect_year') == 2008) echo 'selected="selected"';?>>2008</option>
    			<option <?php if ($user->__get('user_proyect_year') == 2007) echo 'selected="selected"';?>>2007</option>-->
    		</select>
  		</li>
		<li>
			<span class="asterix">*</span><strong>Url de la obra</strong>
  			<input title="Digite Url de la obra" class="expand input-text" type="text"  name="user_proyect_url"  value="<?php echo $user->__get('user_proyect_url');?>" />
	    </li>
	</ul>
  	    
		<h4>Imágenes</h4>
		<h5>Incluya tres imágenes del proyecto a presentar en Artecámara</h5>
		

	    <ul class="no-bullet uploadimages">
		  	
		  			  	
		  	
		  	
		  	<li>
		  	<img src="http://cambelt.co/icon/document/230x170?color=b71632,fefefe" class="images right" title="Imagen de la obra">
		  		<?php
                    $image	= ($user->__get('user_proyect_image_1') != '') ? APPLICATION_URL.$dir.$user->__get('user_proyect_image_1') : $default;
                        
                    ?>           
                    <div id="user_proyect_image_1"></div>     <?php if($user->__get('user_proyect_image_1') != '') { ?><img width="50" src="<?php echo $image?>"><?php }?>
                    
		  	</li>
		  	<li>
		  	<img src="http://cambelt.co/icon/document/230x170?color=b71632,fefefe" class="images right" title="Imagen de la obra">
		  	    		  		<?php
                    $image	= ($user->__get('user_proyect_image_2') != '') ? APPLICATION_URL.$dir.$user->__get('user_proyect_image_2') : $default;
                        
                    ?>           
                    <div id="user_proyect_image_2"></div>     <?php if($user->__get('user_proyect_image_2') != '') { ?><img width="50" src="<?php echo $image?>"><?php }?>
		  	</li>
		  	<li>
		  	<img src="http://cambelt.co/icon/document/230x170?color=b71632,fefefe" class="images right" title="Imagen de la obra">
		  	   		  		<?php
                    $image	= ($user->__get('user_proyect_image_3') != '') ? APPLICATION_URL.$dir.$user->__get('user_proyect_image_3') : $default;
                        
                    ?>           
                    <div id="user_proyect_image_3"></div>     <?php if($user->__get('user_proyect_image_3') != '') { ?><img width="50" src="<?php echo $image?>"><?php }?>
		    </li>
	  	</ul>
	  
	<span class="caption">Puede cargar imágenes en .JPG o .PNG. El archivo no debe superar los 1000 KB.</span>

	<script>
      $(document).ready(function() {
        var manualuploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_proyect_image_1')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_proyect_image_1.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });
        var seconduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_proyect_image_2')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_proyect_image_2.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });		
        var thirduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_proyect_image_3')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_proyect_image_3.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });	
      });
   </script>  

<!-- END formulario -->
