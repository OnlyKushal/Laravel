<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
	@include('common/header')


	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			@include('common/menu')
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>women</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url({{asset('assets/images/cover-img-1.jpg')}});">
							<h2>Women's</h2>
						</div>
						<div class="menu text-center">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-featured">
			<div class="container">
				<div class="row">
					@foreach ($catagory as $item)
						<div class="col-sm-4 text-center">
							<div class="featured">
								<div class="featured-img featured-img-2" style="background-image: url({{asset('catagoriesimage/'.$item->image)}});">
									<h2>{{$item->name}}</h2>
									<p><a href="{{route('defult',$item->name)}}" class="btn btn-primary btn-lg">Shop now</a></p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2> All Products</h2>
					</div>
				</div>
				
					<div class="row row-pb-md">
						@foreach ($product as $item)
						<div class="col-md-3 col-lg-3 mb-4 text-center">
							<div class="product-entry border">
								@foreach (explode(',',$item->images) as $item1)
									<a href="#" class="prod-img">
										<img src="{{asset('product_image/'.$item1)}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
											@break
									</a>
								@endforeach
								<div class="desc">
									<h2><a href="#">{{$item->name}}</a></h2>
									<span class="price">{{$item->price}} &#x20B9</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
			</div>
		</div>

		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="{{asset('assets/images/brand-1.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('assets/images/brand-2.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('assets/images/brand-3.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('assets/images/brand-4.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('assets/images/brand-5.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	@include('common/footer')


	</body>
</html>
