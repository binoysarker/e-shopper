/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){

    $(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});

    });

//    code to load data using jQuery
    $('#displayCategory').hide();
    /*$('#displayProductByBrand').hide();
    $('#displaySubCategory').hide();*/


    //jQuery code for Category section

	$('#CategorySection li').on('click',function (e) {
	    $('#displayCategory').show();
	    e.preventDefault();
		$(this).each(function () {
			var getCategoryName = $(this).text();
			var url = $(this).find('a').attr('href');
            $.get(url, getCategoryName, function(data){
                event.stopPropagation();
                var body = $(data).find('#displayCategory').html();
                $('#displayCategory').html(body);
            });

        })
    });

	//jQuery code for Brand section

	$('#BrandSection li').on('click',function (e) {
	    $('#displayProductByBrand').show();
	    e.preventDefault();
		$(this).each(function () {
			var getBrandName = $(this).text();
			var url = $(this).find('a').attr('href');
            $.get(url, getBrandName, function(data){
                event.stopPropagation();
                var body = $(data).find('#displayProductByBrand').html();
                $('#displayProductByBrand').html(body);
            });

        })
    });

	//jQuery code for SubCategory section

	$('#SubCategorySection li').on('click',function (e) {
	    $('#displaySubCategory').show();
	    e.preventDefault();
		$(this).each(function () {
			var getBrandName = $(this).text();
			var url = $(this).find('a').attr('href');
            $.get(url, getBrandName, function(data){
                event.stopPropagation();
                var body = $(data).find('#displaySubCategory').html();
                $('#displaySubCategory').html(body);
            });

        })
    });





});



