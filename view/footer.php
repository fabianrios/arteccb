	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/validator.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/util.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/button.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/ajax.requester.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/deletefile.ajax.requester.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.base.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/window.receive.message.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.form.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.xhr.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/uploader.basic.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/dnd.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/uploader.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/jquery-plugin.js"></script>
	<?php $name = explode("/", $path); ?>

	<!-- Included JS Files -->
	<script type="text/javascript">
		
	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "images/calendar.png",
			buttonImageOnly: true
		});
		
		$( "#datepicker2" ).datepicker({
			showOn: "button",
			buttonImage: "http://activemgmd.com/ccb/ccb-artista/images/calendar.png",
			buttonImageOnly: true
		});
		
		$( "#sortable" ).sortable();
		//$( "#sortable" ).disableSelection();  
		 
		$(".link_list").sortable({
			placeholder: "ui-state-highlight"
		});
		//$(".link_list").disableSelection();
		
		$( ".products-li" ).sortable(); 
		//$( ".products-li" ).disableSelection();
		 
	});
	
	
	
	 $(document).ready(function() {
	 	
	 	
	
		$('a[title$="url"]').click(function (){
			
		$(".url-m").slideToggle();
		console.log("enviado");
		}); 
		
	
		

		$("#link").click(function (){
			
		$(".link").slideToggle();	
			
		}); 
		
		$("#export-orders").click(function (){
			
		$(".e-order").slideToggle();	
			
		}); 
		
		$("#export-clients").click(function (){
			
		$(".e-client").slideToggle();	
			
		}); 
		
		$("#export-products").click(function (){
		
		//alert("tocado");	
		$(".e-product").slideToggle();	
			
		});
		
		
		$(".var-edit").click(function(){

			$(".var-edit-new").slideToggle();	
			
		});
		
		$("#var-cancel").click(function(){

		$(".var-edit-new").slideToggle();	

		});
		
		$(".edit-var").click(function(){

		$(".variant-edit").slideToggle();	

		});
		
		$(".edit-var-detalle").click(function(){

		$(".variant-edit").slideToggle();	
		
		});
		
		$(".admin").click(function(){

		$(".new-admin").slideToggle();	

		});
		
		// revelar reveal registro-artistas
		$("#checkbox3a").click(function(){

		$(".revelar-a").slideToggle();	
		 $('#artista').reveal();
		});
		
		$("#checkbox3b").click(function(){

		$(".revelar-b").slideToggle();	
		 $('#artista').reveal();
		});
		
		$("#checkbox3c").click(function(){

		$(".revelar-c").slideToggle();	
		 $('#artista').reveal();
		});
		// END revelar reveal registro-artistas
		
		// datos - galeria slide to 
		$("#galeria-next").click(function(){

		$(".contenido").hide().load("datos-artista.php").fadeIn(1000);
		
		});
		
		// datos - galeria slide to 
		
		// nuevo artista 
		$("#add-artist").click(function(){

		$(".link_list").hide().append('<li class="link_default"><div class="row"><div class="three columns"><img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"><label>Nombre</label><br /><input type="text" class="" /></div><div class="three columns"><label>Apellido</label><br /><input type="text" /></div><div class="six columns"><label>Nacionalidad</label><br /><input type="text" /><label for="checkbox3a"><input type="checkbox" id="checkbox3a"> Este artista participará en Artecamará</label><a href="#" class="revelar-a hidden" data-reveal-id="artista">Editar</a></div></div></li>').fadeIn(1000);
		
		});
		// end nuevo artista
		
		// nueva obra
		console.log('<?php echo $name[1]; ?>');
		
		switch ('<?php echo $name[1] ?>' ) {
			case 'registro-inicio-0400':$('#0').addClass('active');
			break;	
			case 'registro-proyecto-0430':$('#3').addClass('active');
			break;
			case 'registro-hoja-vida-0420':$('#2').addClass('active');
			break;
			case 'registro-portafolio-0440':$('#4').addClass('active');
			break;
			case 'registro-documentos-0450':$('#5').addClass('active');
			break;
			case 'registro-artista-0410':$('#1').addClass('active');
			break;			
			}
		
	 });
	</script>
	
	
		

</body>
<!-- End Body -->
</html>
