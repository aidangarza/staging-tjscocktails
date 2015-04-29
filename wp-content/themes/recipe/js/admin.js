jQuery(document).ready(function($){
	$('.recipe-menu-icon').change(function(){
		var $parent = $(this).parents('label');
		$parent.find('.preview-icon').attr( 'class', 'preview-icon fa fa-'+$(this).val() );
	});

	$('.recipe-cat-icon').change(function(){
		$('.category-icon-prev').html( '<span class="icon '+$(this).val()+'"></span>' );
	});
});