@extends('layouts.branch')

@section('title', 'About Us')

@section('content')
        
        <div class="container">
			@foreach($abouts as $about)
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="text-center mb-4">
                        <h2 class="h2">{{config('app.name')}}</h2>
                        <div class="rte-setting">
                            <p><strong>An e-commerce platform that allows for sellers and buyers to sell and buy items respectively.</strong></p>
							<p>{{$about->short_description}}</p>
	                        </div>
                    </div>
               	</div>
            </div>
            <!-- <div class="row">
            	<div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about1.jpg" src="assets/images/about1.jpg" alt="About Us" /></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about2.jpg" src="assets/images/about2.jpg" alt="About Us" /></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about3.jpg" src="assets/images/about3.jpg" alt="About Us" /></div>
            </div> -->
            <!-- <div class="row">
            	<div class="col-12">
                    <h2>Sed ut perspiciatis unde omnis iste natus error</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain.</p>
                    <p>simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p>
                    <p></p>
                </div>
            </div> -->
            
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
                	<h2 class="h2">About {{config('app.name')}} Web</h2>
                    <div class="rte-setting"><p><strong>{{$about->quote}}</strong></p>
                    <p>{{$about->long_description}}</p>
                    <p></p>
                 </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                	<h2 class="h2">Contact Us</h2>
                    <ul class="addressFooter">
						@foreach ($contacts as $contact)
							@if($contact)
							<li class="phone"><i class="icon anm anm-phone-s"></i><p>{{$contact->phone_1}}</p></li>
							<li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$contact->email_1}}</p></li>
							<li><i class="icon anm anm-map-marker-al"></i><p>{{$contact->address}}</p></li>
							@endif
						@endforeach  
					</ul>
                    <hr />
                    <!-- <ul class="list--inline site-footer__social-icons social-icons">
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                    </ul> -->
                </div>
            </div>
            
            @endforeach
        </div>

@endsection