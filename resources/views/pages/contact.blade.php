@extends('layouts.branch')

@section('title', 'Contact Us')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
			<h2>Drop Us A Line</h2>
			<p>Feel free to inquire, ask or clarify any matter with us. We endeavour to provide prompt feedback.</p>
			<div class="formFeilds contact-form form-vertical">
				<form action="#" method="post"  id="contact_form" class="contact-form">	
				<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group">
					<input type="text" id="ContactFormName" name="name" placeholder="Name" value="" required="">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group">
					<input type="email" id="ContactFormEmail" name="email" placeholder="Email" value="" required="">                        	
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group">
					<input required="" type="tel" id="ContactFormPhone" name="phone" pattern="[0-9\-]*" placeholder="Phone Number" value="">
					</div>
					</div>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group">
					<input required="" type="text" id="ContactSubject" name="subject" placeholder="Subject" value="">
					</div>
					</div>
				</div>
				<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group">
					<textarea required="" rows="10" id="ContactFormMessage" name="message" placeholder="Your Message"></textarea>
					</div>
				</div>  
				</div>
				<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<input type="submit" class="btn" value="Send Message">
				</div>
				</div>
				</form>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4">
			<hr />
			<ul class="addressFooter">
					@foreach ($contacts as $contact)
						@if($contact)
						<li class="phone"><i class="icon anm anm-phone-s"></i><p>{{$contact->phone_1}}</p></li>
						<li class="phone"><i class="icon anm anm-phone-s"></i><p>{{$contact->phone_2}}</p></li>
						<li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$contact->email_1}}</p></li>
						<li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$contact->email_2}}</p></li>
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
</div>

@endsection