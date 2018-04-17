// jQuery(document).ready(function($){
// 	// Custom jQuery goes here
// 	$("#masthead nav.navbar").addClass("navbar-dark");
// 	$('#productURL').val(window.document.location.href);
// 	if ($('.product-model .value').length > 0) {
// 		$("#ProductModel").val($('.product-model .value').html());
// 	}

// 	$(document).on("click", ".product a.woocommerce-LoopProduct-link,.product-inquiry", function (e) {
// 		if ($(e.target).hasClass("product-model")) {
// 			e.preventDefault();
// 		} else if ($(e.target).hasClass("product-cat-inquiry")) {
// 			e.preventDefault();
// 			var productModel = $(this).find(".product-model").html();
// 			$("#ProductModel").val(productModel);
// 			jQuery("html,body").animate({
// 				scrollTop: jQuery("#text-6").offset().top
// 			}, 800, function () {
// 				$("input[name='Quantity']").focus();
// 			});
// 			// $("#contactUs").modal();
// 		} else if ($(e.target).hasClass("product-inquiry")) {
// 			$("#ProductModel").val($('.product-model .value').html());
			
// 			jQuery("html,body").animate({
// 				scrollTop: jQuery("#text-6").offset().top
// 			}, 800,function () {
// 				$("input[name='Quantity']").focus();
// 			});
// 			// $("#contactUs").modal();
// 		}
// 	})
// });

jQuery(function($){
	$(document).on("click",".product a.woocommerce-LoopProduct-link,.product-inquiry", function(e){
		if($(e.target).hasClass("product-model")){
			e.preventDefault();
		}else if($(e.target).hasClass("product-cat-inquiry")){
			e.preventDefault();
			var productModel = $(this).find(".product-model").html();
			$("#ProductModel").val(productModel);
			$("#contactUs").modal();
		}else if($(e.target).hasClass("product-inquiry")){
			$("#ProductModel").val($('.product-model .value').html());
			$("#contactUs").modal();
		}
	})
	$("#contactUs").off().on('show.bs.modal', function () {
        var url = window.document.location.href;
        $('#productURL').val(url);
    });

})