window.awe = window.awe || {};
awe.init = function () {
	awe.showPopup();
	awe.hidePopup();	
};
$(document).ready(function ($) {
	"use strict";
	awe_backtotop();
	awe_category();
});

$(window).on('load resize', function () {
	resizeImage();
});

function resizeImage() {
	setTimeout(function(){
		$('.item_product_main:not(.viewed)').each(function(){
			var thumbset = $(this).find('.image_thumb');
			thumbset.css({'height':thumbset.width()+'px'});
		})
	},200);
}


$(document).on('click','.overlay, .close-popup, .btn-continue, .fancybox-close', function() {   
	hidePopup('.awe-popup'); 	
	setTimeout(function(){
		$('.loading').removeClass('loaded-content');
	},500);
	return false;
})
function awe_showLoading(selector) {
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading); 
}  window.awe_showLoading=awe_showLoading;
function awe_hideLoading(selector) {
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}  window.awe_hideLoading=awe_hideLoading;
function awe_showPopup(selector) {
	$(selector).addClass('active');
}  window.awe_showPopup=awe_showPopup;
function awe_hidePopup(selector) {
	$(selector).removeClass('active');
}  window.awe_hidePopup=awe_hidePopup;
awe.hidePopup = function (selector) {
	$(selector).removeClass('active');
}
$(document).on('click','.overlay, .close-window, .btn-continue, .fancybox-close', function() {   
	awe.hidePopup('.awe-popup'); 
	setTimeout(function(){
		$('.loading').removeClass('loaded-content');
	},500);
	return false;
})
var wDWs = $(window).width();
if (wDWs < 1199) {
	/*Remove html mobile*/
	$('.quickview-product').remove();
}
function awe_convertVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
	str= str.replace(/đ/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str; 
} window.awe_convertVietnamese=awe_convertVietnamese;
function awe_category(){
	$('.nav-category .fa-plus').click(function(e){
		$(this).toggleClass('fa-minus fa-plus');
		$(this).parent().toggleClass('active');
	});
	$('.nav-category .fa-minus').click(function(e){
		$(this).toggleClass('fa-plus');
		$(this).parent().toggleClass('active');
	});
} window.awe_category=awe_category;


function awe_backtotop() { 
	$(window).scroll(function() {
		$(this).scrollTop() > 200 ? $('.backtop').addClass('show') : $('.backtop').removeClass('show')
	});
	$('.backtop').click(function() {
		return $("body,html").animate({
			scrollTop: 0
		}, 800), !1
	});
} window.awe_backtotop=awe_backtotop;

$('.dropdown-toggle').click(function() {
	$(this).parent().toggleClass('open'); 	
}); 
$('.btn-close').click(function() {
	$(this).parents('.dropdown').toggleClass('open');
}); 
$(document).on('keydown','#qty, .number-sidebar',function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
$(document).on('click','.qtyplus',function(e){
	e.preventDefault();   
	fieldName = $(this).attr('data-field'); 
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal)) { 
		$('input[data-field='+fieldName+']').val(currentVal + 1);
	} else {
		$('input[data-field='+fieldName+']').val(0);
	}
});
$(document).on('click','.qtyminus',function(e){
	e.preventDefault(); 
	fieldName = $(this).attr('data-field');
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal) && currentVal > 1) {          
		$('input[data-field='+fieldName+']').val(currentVal - 1);
	} else {
		$('input[data-field='+fieldName+']').val(1);
	}
});
$('.open-filters').click(function(e){
	e.stopPropagation();
	$(this).toggleClass('openf');
	$('.dqdt-sidebar').toggleClass('openf');
	$(this).closest('.header_nav_main').removeClass('current');
	$('.opacity_menu').removeClass('current');
});

$('.ul_collections li > .icon').click(function(){
	$(this).parent().toggleClass('current');
	$(this).toggleClass('icon-plus icon-minus');
	$(this).next('ul').slideToggle("fast");
	$(this).next('div').slideToggle("fast");
});

$('.quenmk').on('click', function() {
	$('.h_recover').slideToggle();
});
$('a[data-toggle="collapse"]').click(function(e){
	if ($(window).width() >= 767) { 
		// Should prevent the collapsible and default anchor linking 
		// behavior for screen sizes equal or larger than 768px.
		e.preventDefault();
		e.stopPropagation();
	}    
});
var wDWs = $(window).width();
if (wDWs < 1199) {
	$('.item_big li:has(ul)' ).one("click", function(e)     {
		e.preventDefault();
		return false;    
	});

	$('.ul_menu li:has(ul)' ).one("click", function(e)     {
		e.preventDefault();
		return false;    
	});
}

/********************************************************
# MENU MOBILE
********************************************************/


$(document).ready(function(){



	var wDW = $(window).width();
	/*Footer*/
	if(wDW > 767){
		$('.toggle-mn').show();
	}else {
		$('.footer-click > .clicked').click(function(){
			$(this).toggleClass('open_');
			$(this).next('ul').slideToggle("fast");
			$(this).next('div').slideToggle("fast");
		});
	}
});


$(document).ready(function() {
	$('.btn-wrap').click(function(e){
		$(this).parent().slideToggle('fast');
	});

	/*fix menu sub*/
	jQuery("#nav li.level0 li").mouseover(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul').css({top:0,left:"158px"});
			var offset = jQuery(this).offset();
			if(offset && (jQuery(window).width() < offset.left+300)){
				jQuery(this).children('ul').removeClass("right-sub");
				jQuery(this).children('ul').addClass("left-sub");
				jQuery(this).children('ul').css({top:0,left:"-158px"});
			} else {
				jQuery(this).children('ul').removeClass("left-sub");
				jQuery(this).children('ul').addClass("right-sub");
			}
			jQuery(this).children('ul').fadeIn(100);
		}
	}).mouseleave(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul').fadeOut(100);
		}
	});
});



var SuccessNoti = function(SuccessText){
	$.notify({
		// options
		title: '<strong>Tuyệt vời</strong><br>',
		message: SuccessText,
		icon: 'glyphicon glyphicon-ok'
	},{
		// settings
		element: 'body',
		//position: null,
		type: "success",
		//allow_dismiss: true,
		//newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutRight'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}
var InfoNoti = function(InfoText){
	$.notify({
		// options
		title: '<strong>Thông báo</strong><br>',
		message: InfoText,
		icon: 'glyphicon glyphicon-info-sign',
	},{
		// settings
		element: 'body',
		position: null,
		type: "info",
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}
var ErrorNoti = function(ErrorText){
	$.notify({
		// options
		title: '<strong>Thông báo</strong><br',
		message: ErrorText,
		icon: 'glyphicon glyphicon-info-sign',
	},{
		// settings
		element: 'body',
		position: null,
		type: "warning",
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}

//Menu mega vertical

var wDWs = $(window).width();
if (wDWs < 1199 && wDWs > 992) {
	$('.ul_menu li:has(ul)' ).one("click", function(e) {
		e.preventDefault();
		return false;    
	});
}
$('.ul_menu li .fa').click(function(e){
	if($(this).hasClass('current')) {
		$(this).closest('.ul_menu').find('li, .fa').removeClass('current');
	} else {
		$(this).closest('.ul_menu').find('li, .fa').removeClass('current');
		$(this).closest('li').addClass('current');
		$(this).addClass('current');
	}
});
$('.item_big li .fa').click(function(e){
	if($(this).hasClass('current')) {
		$(this).closest('ul').find('li, .fa').removeClass('current');
	} else {
		$(this).closest('ul').find('li, .fa').removeClass('current');
		$(this).closest('li').addClass('current');
		$(this).addClass('current');
	}
});
if (wDWs < 991) {
	$('.title_menu').on('click', function(){
		$(this).closest('.header_nav_main').removeClass('current');
		$('.opacity_menu').removeClass('current');
		$('.dqdt-sidebar, .open-filters').removeClass('openf');
	})
	$('.category-action').on('click', function(){
		$('.header_nav_main').addClass('current');
		$('.opacity_menu').addClass('current');
		$('.dqdt-sidebar, .open-filters').removeClass('openf');
	})
}


// show more less menu
$('.xemthem').click(function(e){
	e.preventDefault();
	$('ul.ul_menu>li').css('display','block');
	$(this).hide();
	$('.thugon').show();
})
$('.thugon').click(function(e){
	e.preventDefault();
	$('ul.ul_menu>li').css('display','none');
	$(this).hide();
	$('.xemthem').show();
})
$('.ul_menu .lev-1').click(function(e){
	var lil = $('.ul_menu .lev-1').length;
	var divHeight = $('.list_menu_header').height();
	if(lil = 2){
		$('.ul_menu .ul_content_right_1').css('min-height', divHeight);
	}
});
var vw = $(window).width();
window.onload = function(e){ 
	var lil = $('.ul_menu .lev-1').length;
	if(lil < 10 && vw < 1500 && vw > 1200){
		$('li.hidden-lgg').remove();
	}
}

$(window).on('load resize', function () {
	resizemain();
});

function resizemain() {
	if (vw >= 992) {
		$('.header_nav_main').addClass('d-none d-lg-block');
	}else {
		setTimeout(function(){
			$('.header_nav_main').removeClass('d-none d-lg-block');
		},1000)
	}
}window.resizemain=resizemain;