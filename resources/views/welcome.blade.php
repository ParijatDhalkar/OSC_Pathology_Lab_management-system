<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pathology Lab</title>
    <!-- Meta -->
    <meta charset="utf-8"> 
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Global CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <!-- Theme CSS -->  
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">       
            <h1 class="logo">
                <a class="scrollto" href="#hero">
                    
                    <span class="text"><span class="highlight">Pathology</span> Lab</span></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-expand-md float-right navbar-inverse" role="navigation">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item"><a class="active nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>  
                                @endif                      
                            @endif
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->                     
        </div><!--//container-->
    </header><!--//header-->
    
    <div id="hero" class="hero-section">      
        <div id="hero-carousel" class="hero-carousel carousel carousel-fade slide" data-ride="carousel" data-interval="10000">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
    			
				<div class="carousel-item item-1 active" style="background-image: url('{{ asset('img/hero.jpg') }}');">
					<div class="item-content container">
    					<div class="item-content-inner">
    				        
				            <h2 class="heading">This is the landing page <br class="d-none d-md-block">for Pathology Lab Management</h2>
				            <p class="intro">It helps you to build a beautiful and effective landing page to promote your product or side project!</p>
				            <a class="btn btn-primary btn-cta" href="#" target="_blank">Register for the test now</a>
    				        
    					</div><!--//item-content-inner-->
					</div><!--//item-content-->
                </div><!--//item-->
			</div>	
		</div><!--//carousel-->
    </div><!--//hero-->
    
    
    <div id="about" class="about-section">
        <div class="container text-center">
            <h2 class="section-title">Pathology Lab Management</h2>
            <p class="intro">This website has has two types of users. This website is implemented using laravel. </p>
            
            <div class="items-wrapper row">
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-1.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Benefit Lorem Ipsum</h3>
                        <div class="item-desc mb-3">
                            List one of your product's benefits here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                        </div><!--//item-desc-->
                        <a class="btn btn-primary" href="#" target="_blank">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-2.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Benefit Corporis</h3>
                        <div class="item-desc mb-3">
                            List one of your product's benefits here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </div><!--//item-desc-->
                        <a class="btn btn-primary" href="#" target="_blank">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-3.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Benefit Imperdiet</h3>
                        <div class="item-desc mb-3">
                            List one of your product's benefits here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </div><!--//item-desc-->
                       <a class="btn btn-primary" href="#" target="_blank">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//items-wrapper-->
        </div><!--//container-->
    </div><!--//about-section-->
    
    <div id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title text-center">Many Happy Customers</h2>
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Testimonial goes here Donec felis odio, sagittis eu cursus ac, porttitor eu purus. In a bibendum dui. Nullam id est sed felis rutrum tincidunt eu nec nisi morbi euismod semper neque sed lobortis.</p>
                        <div class="quote-source">
                            <span class="name">@JohnK,</span>
                            <span class="meta">San Francisco</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Testimonial goes here fermentum sed pharetra in, aliquet sodales quam. Ut sed turpis quis orci viverra aliquet interdum ut ipsum. </p>
                        <div class="quote-source">
                            <span class="name">@LisaWhite,</span>
                            <span class="meta">London</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Testimonial goes here vestibulum non hendrerit lorem, luctus tincidunt erat. Sed pharetra aliquam posuere. Pellentesque sollicitudin.</p>
                        <div class="quote-source">
                            <span class="name">@MattH,</span>
                            <span class="meta">Berlin</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Testimonial goes here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis</p>
                         <div class="quote-source">
                            <span class="name">@RyanW,</span>
                            <span class="meta">Paris</span>
                        </div><!--//quote-source-->
                    </blockquote>
                    
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="text-center mt-4">
            <a class="btn btn-inverse btn-cta" href="#" target="_blank">Get it now</a>
            </div>
        </div><!--//container-->
    </div><!--//testimonials-->
    
    <div id="features" class="features-section ">
        <div class="container text-center ">
            <h2 class="section-title">Discover Features</h2>
            <p class="intro">You can use this section to list your product features. The screenshots used here were taken from <a href="https://www.uxfordev.com/appify/index.html" target="_blank">Bootstrap 4 admin theme Appify</a></p>
            
                
                <!-- Nav tabs -->
                <div class="feature-nav nav nav-pill flex-column col-lg-12 col-md-12 col-12 order-0 order-md-1 align-items-center" role="tablist" aria-orientation="vertical">
                     <a class="nav-link active mb-lg-3" href="#feature-1" aria-controls="feature-1" data-toggle="pill" role="tab" aria-selected="true"><i class="fas fa-magic mr-2"></i>20+ Use Case-based App Pages</a>
                     <a class="nav-link mb-lg-3" href="#feature-2" aria-controls="feature-2" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-cubes mr-2"></i>100+ Components and Widgets</a>
                     <a class="nav-link mb-lg-3" href="#feature-3" aria-controls="feature-3" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-chart-bar mr-2"></i>Useful Chart Libraries</a>
                     <a class="nav-link mb-lg-3" href="#feature-4" aria-controls="feature-4" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-code mr-2"></i>Valid HTML5 + CSS3</a>
                     <a class="nav-link mb-lg-3" href="#feature-5" aria-controls="feature-5" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-rocket mr-2"></i>Built on Bootstrap 4 &amp; SCSS</a>
                     <a class="nav-link mb-lg-3" href="#feature-6" aria-controls="feature-6" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-mobile-alt mr-2"></i>Fully Responsive</a>
                     <a class="nav-link mb-lg-3" href="#feature-7" aria-controls="feature-7" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-star mr-2"></i>Beautiful UI</a>
                     <a class="nav-link mb-lg-3" href="#feature-8" aria-controls="feature-8" data-toggle="pill" role="tab" aria-selected="false"><i class="fas fa-heart mr-2"></i>Free Updates &amp; Support</a>                   
                </div>


             
            
        </div><!--//container-->
    </div><!--//features-->
    
    <div class="team-section" id="team">
        <div class="container text-center">
            <h2 class="section-title">Our Team</h2>
            <div class="story">
                <p>Introduce your team here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue</p>
            </div>
            <div class="members-wrapper row">
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Xiaoying Riley" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Siddhesh Bandgar</h3>
                            <div class="member-title">Full-Stack Designer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                               <p>Siddhesh is the UX/UI designer behind AppKit Landing. He makes free Bootstrap themes for developers. You can find her sharing useful UX and webdev related content on Twitter and Facebook. Follow him if you like what she does!</p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Tom Najdek" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Parijat Dhalkar</h3>
                            <div class="member-title">Full-Stack Developer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                                <p>Parijat is a full-stack developer specialising in building large, scalable and user-friendly web apps. Follow him on Twitter for fresh developer tips and check out his Github for useful open-source tools.
                                </p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Tom Najdek" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Kush Dabade</h3>
                            <div class="member-title">Full-Stack Developer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                                <p>Kush is a full-stack developer specialising in building large, scalable and user-friendly web apps. Follow him on Twitter for fresh developer tips and check out his Github for useful open-source tools.
                                </p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//members-wrapper-->
            <div class="text-center mt-5">
	            <a class="btn btn-cta btn-primary" href="#" target="_blank">Contact Us</a>
            </div>
        </div>
    </div><!--//team-section-->
    
    <div id="contact" class="contact-section">
        <div class="container text-center">
            <h2 class="section-title">Contact Us</h2>
            <div class="contact-content">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis.</p>
                
            </div>
            <a class="btn btn-cta btn-primary" href="#">Get in Touch</a>
            
        </div><!--//container-->
    </div><!--//contact-section-->

     
    <!-- Javascript -->          
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
       
</body>
</html> 

