//=================init=================\\

$(document).ready(function ()
{
	AOS.init({
		duration: 1200,
	});
})
//=================Replace To SVG=================\\

$(document).ready(function ()
{
	$(window).on('load', function ()
	{
		$('.svg').svgToInline()
	});
})
//=================loading pages=================\\
$(window).on("load", function ()
{
	$(".loading-screen").fadeOut(1000);
});

//=================menu=================\\

$(document).ready(function ()
{
	$('.hamburger').click(function ()
	{
		$(this).toggleClass('open');
		$('.menu-mobile').slideToggle(300);
	});

	// accordion
	$('.btn-sub').on('click', function (event)
	{
		event.preventDefault()
		$(this).toggleClass('active')
		$('.btn-sub').not($(this)).removeClass('active')
		$(this).next().slideToggle()
		$('.menu-mobile .sub-menu').not($(this).next()).slideUp()
	})

});

// menu fixed
function menuFixed()
{
	const menu = document.querySelector('.header-desktop')
	const menuTablet = document.querySelector('.header-tablet')
	window.addEventListener('scroll', () =>
	{
		if (window.pageYOffset >= 330) {
			menu.classList.add('active')
			menuTablet.classList.add('active')
		} else {
			menu.classList.remove('active')
			menuTablet.classList.remove('active')
		}
	})
}
menuFixed()

//=================back to top=================\\
function backToTop()
{
	let btnScrollTop = document.querySelector('.back-to-top')
	window.addEventListener('scroll', () =>
	{
		if (window.pageYOffset >= 700 || window.scrollTo >= 700) {
			btnScrollTop.classList.add('active')
		} else {
			btnScrollTop.classList.remove('active')
		}
	})
	btnScrollTop.addEventListener('click', () =>
	{
		window.scroll({
			'top': 0,
			behavior: 'smooth'
		})
	})
}
backToTop()

//=================modal =================\\
function showModal()
{
	const button = document.querySelectorAll('.action .buy')
	const modal = document.querySelector('.modal')
	const overlay = document.querySelectorAll('.overlay')
	const closed = document.querySelectorAll('.modal-product .modal-container .close')
	button.forEach((e, index) =>
	{
		e.addEventListener('click', (element) =>
		{
			element.preventDefault()
			modal.classList.add('active')
			document.querySelector('body').classList.add('overflow')
		})
	})

	overlay.forEach((element)=> {
		element.addEventListener('click', ()=> {
			close()
		})
	})
	closed.forEach((closed) => {
		closed.addEventListener('click', () =>
	{
		close()
	})
	})
	window.addEventListener('keyup', (e) =>
	{
		if (e.keyCode === 27) {
			close()
		}
	})
	function close()
	{
		modal.classList.remove('active')
		document.querySelector('body').classList.remove('overflow')
	}
}
showModal()
// button hover 
const buttons = document.querySelectorAll(".btn-hover");

buttons.forEach((button) =>
{
	const div = button.querySelector("span");
	["mouseenter", "mouseleave"].forEach((event) =>
	{
		button.addEventListener(event, (e) =>
		{
			div.style.left = `${e.offsetX}px`;
			div.style.top = `${e.offsetY}px`;
		});
	});
});
// tab
$(document).ready(function ()
{
	$('.tab ul li').on('click', function ()
	{
		let attr = $(this).attr('data-toggle');
		$('#' + attr).fadeIn(800).siblings().hide();
	})
	$('.shirt-section .tab ul li').on('click', function () {
		$(this).addClass('active');
		$('.shirt-section .tab ul li').not($(this)).removeClass('active');
	})
	$('.trousers-section .tab ul li').on('click', function () {
		$(this).addClass('active');
		$('.trousers-section .tab ul li').not($(this)).removeClass('active');
	})
	$('.accessories-section  .tab ul li').on('click', function () {
		$(this).addClass('active');
		$('.accessories-section  .tab ul li').not($(this)).removeClass('active');
	})
})

// cart 
function cart() {
	let btnCart = document.querySelector('.header-top .header-top__menu ul li a.cart')
	let cart = document.querySelector('.cart-section')
	let close = document.querySelector('.cart-section .cart-title .close')
	let overlay = document.querySelector('.cart-section .overlay')
	btnCart.addEventListener('click' , (e) => {
		e.preventDefault()
		cart.classList.add('active')
		document.body.style.overflow= "hidden";
	})
	close.addEventListener('click' , () => {
		cart.classList.remove('active')
		document.body.style.overflow= "inherit";
	})
	overlay.addEventListener('click' , () => {
		cart.classList.remove('active')
		document.body.style.overflow= "inherit";
	})
}
cart()
function search() {
	let btn = document.querySelectorAll('header ul li.search')
	let search = document.querySelector('.search-mobile')
	let close = document.querySelector('.search-mobile .close')
	let overlay = document.querySelector('.search-mobile .overlay')
	btn.forEach((e) => {
		e.addEventListener('click' , (element) => {
			element.preventDefault()
			search.classList.add('active')
			document.body.style.overflow= "hidden";
		})
	})

	close.addEventListener('click' , () => {
		search.classList.remove('active')
		document.body.style.overflow= "inherit";
	})
	overlay.addEventListener('click' , () => {
		search.classList.remove('active')
		document.body.style.overflow= "inherit";
	})
}
search()

// modal product 
$(document).ready(function() {
	$('.accordion .accordion-items .title').on('click', function() {
		$(this).next().slideToggle(250);
		$(this).toggleClass('active');
		$(' .accordion .accordion-items .title').not($(this)).removeClass('active')
	})
	$('.add-to-cart').on('click', function() {
		$('.cart-section').addClass('active')
	})

	$('.size .size-items p').on('click', function(){
		$(this).addClass('active');
		$('.size .size-items p').not($(this)).removeClass('active')
	})
	$('.product-color .img').on('click', function() {
		$(this).addClass('active');
		$('.product-color .img').not($(this)).removeClass('active')
		let attr = $(this).attr('data-color');
		$('h4.color span').text(attr)
	})

})
function User() {
	const buttons = document.querySelectorAll('.user .user-nav p')
	const content = document.querySelectorAll('.user-items')
	buttons.forEach(button => {
		button.addEventListener('click', ()=> {
			let attr = button.getAttribute('data-toggle')
			document.querySelector(`#${attr}`).classList.add('active')
			button.classList.add('active')
			buttons.forEach((e) => {
				e.classList.remove('active')
			})
			content.forEach((es) => {
				es.classList.remove('active')
			})
			button.classList.add('active')
			document.querySelector(`#${attr}`).classList.add('active')
		})
	})
}
User()


// select 
$(document).ready(function() {
	$('.filter-select .select-box .default').on('click', function() {
		$(this).next().slideToggle(250)
	})
	$('.filter-select .select-box ul li').on('click', function() {
		$(this).parent().slideUp(250)
		$('.filter-select .select-box .default span').html($(this).text())
	})
})


//=========================================\\
//=================carousel=================\\
//===========================================\\

$(document).ready(function ()
{
	let $carousel = $('.main-carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: false,
		friction: 0.6,
		wrapAround: true,
		fullscreen: true,
		autoPlay: 5000
	});
		$('button.btn-prev').on('click', function ()
		{
			$carousel.flickity('previous');
		})
		$('button.btn-next').on('click', function ()
		{
			$carousel.flickity('next');
		})
})

$(document).ready(function ()
{
	let $carousel = $('.product-carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: true,
		wrapAround: true,
	});
})
$(document).ready(function ()
{
	let $carousel = $('.banner-mobile .banner-mobile__carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: true,
		friction: 0.3,
		wrapAround: true,
		fullscreen: true,
		autoPlay: 4000
	});
})
$(document).ready(function ()
{
	let $carousel = $('.product-mobile__carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: true,
		wrapAround: true,
		fullscreen: true,
		autoPlay: 4000
	});
})
$(document).ready(function ()
{
	let $carousel = $('.modal-carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: true,
		wrapAround: true,
		fullscreen: true,
		autoPlay: false
	});
	$('.product-color').on( 'click', '.img', function() {
		var index = $(this).index();
		$carousel.flickity( 'select', index );
	});
	$('.carousel-thumb').on( 'click', '.thumb-item', function() {
		var index = $(this).index();
		$carousel.flickity( 'select', index );
	});
})
$(document).ready(function ()
{
	let $carousel = $('.img-carousel');
	$carousel.flickity({
		// options
		cellAlign: 'left',
		contain: false,
		pageDots: false,
		prevNextButtons: true,
		wrapAround: true,
		fullscreen: true,
		autoPlay: false
	});
})


$(document).ready(function() {
	let total = 0 ;
	$('div.quantity button.decrease').on('click', function() {
		if (total == 0) {
			total = 0;
		}else {
			total -= 1;
		}
		$('#quantity').html(total);
	})
	$('div.quantity button.increase').on('click', function() {
		total++;
		$('#quantity').html(total);
	})
})

$(document).ready(function() {
	function ValidateEmail(mail) 
	{
	 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
		{
			return (true)
		}
			alert("Vui Lòng nhập đúng email !!")
			return (false)
	}
	$('#contact-btn').on('click', function() {
		let email = $("input[name='email']").val();
		let name = $("input[name='name']").val();
		let add = $("input[name='address']").val();
		let phone = $("input[name='phone']").val();
		let formOk = true;
		if (name == "") {
			formOK = false;
		}
		if (add == "") {
			formOK = false;
		}
		if ( email == "") {
			formOK = false;
		}
		if (phone == "") {
			formOK = false;
		}
		if (formOK == false ) {
			alert('Xin vui lòng nhập đầy đủ thông tin!')
		}
	})
})

// lấy tỉnh thành việt nam

// $(document).ready(function() {
// 	let ajax_get_regions = $.ajax({
// 		method : 'get',
// 		url: 'http://zuzo.xyz/api/v1/regions',
// 		success: function (response) {
// 			if (response.data) {
// 				let data = response.data;
// 				data.forEach(function(value, index) {
// 					let html_option = '<option value="'+value.id+'" class ="ajax">'+value.name+'<option>';
// 					$('#province').append(html_option)
// 				})
// 			}
// 		}
// 	})
// 	$('#province').on('change', function() {
// 		let id = $(this).val();
// 		console.log(id);
// 		$.ajax({
// 			method: 'get',
// 			url: 'http://zuzo.xyz/api/v1/regions/'+ id +'/citys' ,
// 			success: function (response) {
// 				if (response.data) {
// 					let data = response.data;
// 					data.forEach(function(value, index) {
// 						let html_option = '<option value="'+value.id+'" class ="ajax">'+value.name+'<option>';
// 						$('#citys').append(html_option)
// 					})
// 				}
// 			}
// 		})
// 	})
// })
