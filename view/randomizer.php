<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(function($){
		 var randomNum = Math.ceil(Math.random()*7);
		 $('body').addClass("bigpic"+randomNum);
	});
</script>