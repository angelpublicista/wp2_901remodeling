console.log('El custom js funciona');

jQuery(function ($) {
	$('.page-template-master-page .sub-heading-section').removeClass('opacity-layer');
	$('.slick-projects').slick({
		arrows: true,
		dots: true,
		draggable: false,
		prevArrow: '<button class="custom-slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button class="custom-slick-next slick-arrow"><i class="fas fa-chevron-right"></i></button>'
	});

	//Handle carousel
	$('.slick-projects').slideUp();
	$('.slick-projects').first().slideDown();
	$('.button-project').first().addClass('active');
	$('.button-project').click(function(e) {
		e.preventDefault();
		$('.button-project').removeClass('active');
		$(this).addClass('active');
		$itemShow = $(this).attr('data-item');
		$('.slick-projects').slideUp();
		$($itemShow).slideDown();
	})	
});
