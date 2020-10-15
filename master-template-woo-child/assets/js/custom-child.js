console.log('El custom js funciona');

jQuery(function ($) {
	$('.page-template-master-page .sub-heading-section').removeClass('opacity-layer');
	$('.slick-projects').slick({
		arrows: true,
		dots: true,
		draggable: false,
		prevArrow: '<button class="custom-slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button class="custom-slick-next slick-arrow"><i class="fas fa-chevron-right"></i></button>',
		lazyLoad: "progressive"
	});

	//Handle carousel
	$('.button-project').first().addClass('active');

	$('.button-project').click(function() {
		$('.button-project').removeClass('active');
		$(this).addClass('active');
	});
	
	//Carousel Testimonials
	$('.slick-testimonials').slick({
		arrows: true,
		slidesToShow: 3,
		centerMode: true,
		prevArrow: '<button class="custom-slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button class="custom-slick-next slick-arrow"><i class="fas fa-chevron-right"></i></button>',
		responsive: [
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1
				}
			},

			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			}
		]
	});
});

const itemsCant = document.querySelectorAll('.cont-projects .project');
const buttons = document.querySelectorAll('.button-project');
const itemsContainer = document.querySelector('.slide-projects');

for(const button of buttons){
  button.addEventListener('click', function(e){
      e.preventDefault();
      const percent = this.dataset.pos;
      itemsContainer.style.transform = `translateY(-${percent}%)`;
  });
  
}

$counter = 0
for(const item of itemsCant){
  $counter = $counter + 100
  itemsContainer.style.height = $counter + "%";
  
}
