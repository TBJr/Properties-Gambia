<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Properties Gambia </title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="css/styles.css" type="text/css" rel="Stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <style>
        .top-right {
            position: absolute;
            right: 64px;
            top: 29px;
        }

        .links > a {
            color: #636b6f;
            /* padding: 0 25px; */
            padding: 0 10px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .tbj {
            font-family: "Roboto", "Helvetica", "Sans-serif";
            font-size: 1.7rem;
            font-weight: 800;
            color: #fff;
            text-decoration: none;
            position: absolute;
            padding: 10px;
            top: 19px;
        }

        .text-muted {
        color: #6c757d !important;
        font-family: 'Lucida Sans';
        font-weight: 500;
        font-size: 1.3rem;
        }
    </style>
</head>

<body>
    <div id="header-hero-container">
        <header>
            <div class="flex container">
                <a href="#" class="navbar-brand">
                    <img src="{{ asset('images/logoo.ico') }}" width="60" alt="PGRE">
                </a>
                <a id="logo" href="{{ route('home') }}">PROPERTIES GAMBIA</a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>

                    <ul id="nav-menu">
                        <li><a href="{{ route('home') }}" class="active">Home</a></li>
                        <li><a href="#properties">Properties</a></li>
                        <li><a href="#agents">The Team</a></li>
                        <li><a href="#the-best">About</a></li>
                        <li><a href="#testimonials">Reviews</a></li>
                        {{-- <li><a href="#faq">FAQ<a></li> --}}
                        <li><a href="#contact">Contact</a></li>
                        @if (Route::has('login'))
                        <li>
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif --}}
                            @endauth
                        </li>
                        @endif
                        <li id="close-flyout"><span class="fas fa-times"></span></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <section id="hero">
            <div class="fade"></div>
            <div class="hero-text">
                <h1>Buy & Build <br>
                    Real Estate Properties</h1>
                    <p>Providing quality land procurement services to those in the Gambia and the dispora abroad.</p>
            </div>
        </section>
    </div>

    <section id="how-it-works">
        <div class="container">
            <h2>Process Overview</h2>
            <div class="flex">
                <div>
                    <span class="fas fa-home"></span>
                    <h4>Choose Property</h4>
                    <p>Conduct physical or virtual site visit. Select Property.</p>
                </div>

                <div>
                    <span class="fas fa-wallet"></span>
                    <h4>Make Payment</h4>
                    <p>Wire transfer or Cash Payment.</p>
                </div>

                <div>
                    <span class="fas fa-chart-line"></span>
                    <h4>Initiate Land Transfer</h4>
                    <p>Processing documents.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="properties">
        <div class="container"> 
            <h2>
                Properties
                    <a><small class="text-muted">AVAILABLE PLOTS</small></a>
            </h2>
            <div id="properties-slider" class="slick">
                @foreach($plots as $land)
                <div>
                    <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}">
                    <div class="property-details">
                        <p>GMD {{$land->plot_price}}</p> 
                        <a href="{{ route('plot.view', [$land->id]) }}" title="View">test</a>
                        <span>Coordinate: {{$land->plot_coordinate}}</span> <br>
                        {{-- <span class="beds">{{$land->plot_number}}</span> --}}
                        {{-- <span class="baths">4 baths</span> --}}
                        <span class="sqft">Size: {{$land->plot_size}}</span>
                        <address>
                            {{$land->plot_address}}
                        </address>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <button class="rounded">View All Property Listings</button> --}}
        </div>
    </section>

    <section id="agents">
        <div class="container">
            <h2>The Team</h2>
            <p class="large-paragraph">Meet the Team</p>

            <div class="flex">
                <div class="card">
                    <img src="{{ asset('images/daniel_11.jpeg')}}" alt="Daniel Samba" />
                    <h3>Daniel Samba</h3>
                    <p>C.E.O</p>
                </div>

                <div class="card">
                    <img src="{{ asset('images/cherno-1.jpg') }}" alt="Realtor 1" />
                    <h3>Cherno Jallow</h3>
                    <p>Land Manager</p>
                </div>

                <div class="card">
                    <img src="{{ asset('images/Gibril 1.jpeg') }}" alt="Realtor 1" />
                    <h3>Gibril Bah</h3>
                    <p>Office Manager</p>
                </div>

                <div class="card">
                    <img src="{{ asset('images/omar_01.jpeg')}}" alt="Omar Jobe" />
                    <h3>Omar Jobe</h3>
                    <p>Office Land Assistant</p>
                </div>

            </div>
        </div>
    </section>

    {{-- <section id="the-best">
        <div class="flex container">
            <img src="https://onclickwebdesign.com/wp-content/uploads/property_1.jpg" alt="Property 1" />
            <img src="images/pexels-david-mcbee-1546168.jpg" alt="Property 1" />
            <div>
                <h2>We Are One of The Best Real Estate Company</h2>
                <p class="large-paragraph">Properties Gambia Real Estate is a new company in The Gambia, we opened in 2020. 
                <br>
                    Our aim is to give the best service to our customers, from the dispora and from THe Gambia. We don't only sell lands,
                    we like to have a one to one with our clients and making sure we meet there needs, from picking you up from the Airport
                    in The Gambia to providing you a rental property. <br>
                    We will also provide you a top class building service for your homes, with provinding the best materals and builders. When
                    you buy from us we will also join you to our company's whatsapp group, where you will meet and talk to your neighbour's who have
                    invested with us. That why we our different from the rest, where in the world do you talk to your neighbours before you have
                    started to build your community. <br>
                    I Daniel Yusuf Samba (CEO), of Properties Gambia Real Estate. I am constantly striving to deliver a service that is unparalleled by
                    are competitors. But also working together, and developing Africa at the same time. 
                    You are safe with us. <br>

                    Samba’s mission is to is to help the diaspora and Gambians purchase land, buy properties, and build homes. As Co-Director 
                    of Investment in The Gambia Samba’s goal is offer services to the diaspora and local local Gambians to build their future with solid housing, and 
                    to help Gambia move forward.
                </p> <br>
                
                <button class="rounded">Learn More</button>
            </div>
        </div>
    </section> --}}

    <section id="the-best">
        <div class="container">
            <h2>We Are One of The Best Real Estate Company</h2>
                <div class="flex">
                <p class="large-paragraph">Properties Gambia Real Estate is a new company in The Gambia, we opened in 2020. 
                <br>
                    Our aim is to give the best service to our customers, from the dispora and from THe Gambia. We don't only sell lands,
                    we like to have a one to one with our clients and making sure we meet there needs, from picking you up from the Airport
                    in The Gambia to providing you a rental property. <br>
                    We will also provide you a top class building service for your homes, with provinding the best materals and builders. When
                    you buy from us we will also join you to our company's whatsapp group, where you will meet and talk to your neighbour's who have
                    invested with us. That why we our different from the rest, where in the world do you talk to your neighbours before you have
                    started to build your community. <br>
                    I Daniel Yusuf Samba (CEO), of Properties Gambia Real Estate. I am constantly striving to deliver a service that is unparalleled by
                    are competitors. But also working together, and developing Africa at the same time. 
                    You are safe with us. <br>

                    Samba’s mission is to is to help the diaspora and Gambians purchase land, buy properties, and build homes. As Co-Director 
                    of Investment in The Gambia Samba’s goal is offer services to the diaspora and local local Gambians to build their future with solid housing, and 
                    to help Gambia move forward.
                </p> <br>
                
                <button class="rounded">Learn More</button>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2>Services</h2>
            <div class="flex">
                <div>
                    <div class="fas fa-home"></div>
                    <div class="services-card-right">
                        <h3>Land Procurement</h3>
                        <p>Are you interested in buying land in The Gambia? Let us help you! Our team of professionals are reliable and work on your behalf to ensure all land trust documents are approved and signed. We work with trusted people to ensure all owners paper work is valid. Professional associates walk you through the entire process to put your mind at ease to know your investment is secure.</p>
                        {{-- <a href="#">Learn More</a> --}}
                    </div>
                </div>

                <div>
                    <div class="fas fa-route"></div>
                    <div class="services-card-right">
                        <h3>Land Tours</h3>
                        <p>If you are in The Gambia we can arrange a land tour for you to view land plots for sale in different areas of the country, this will allow you to see the land plots up close and personal. Our experts will guide you as you begin the process of purchasing land.</p>
                        {{-- <a href="#">Learn More</a> --}}
                    </div>
                </div>


                <div>
                    <div class="fas fa-chart-line"></div>
                    <div class="services-card-right">
                        <h3>City Tours</h3>
                        <p>If you are visiting The Gambia for the first time we can arrange a city tour with a local guide to see the beauty of The Gambia. Please contact us for more information about pricing.</p>
                        {{-- <a href="#">Learn More</a> --}}
                    </div>
                </div>

                <div>
                    <div class="fas fa-mobile-alt"></div>
                    <div class="services-card-right">
                        <h3>Phone Consultation</h3>
                        <p>Book a one on one consultation with Daniel Samba, the director of Investment in The Gambia to gain a better insight on how to move 
                            forward in buying land plots to build your dream home.</p>
                        {{-- <a href="#">Learn More</a> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <h2>What Our Clients Are Saying</h2>
            <div id="testimonials-slider">
                <div>
                    <blockquote>
                        <p>
                            "Properties Gambia Real Estate are a very professional company. I found it easy buying my land from Daniel 
                            and his team and currently working with them to complete my build. A trustworthy company and I'm happy to 
                            do business with them."
                        </p>
                    </blockquote>
                    <div class="testimonials-caption">
                        <img src="{{ asset('images/mavis.jpg') }}" alt="Client 7" />
                        <p>Mavis Shakespeare</p>
                    </div>
                </div>

                <div>
                    <blockquote>
                        <p>"Daniel and his team are true gems. Purchasing land didn't come easy for me. I was met with many obstacles. 
                            But the patience that Daniel had given me was 100% appreciated! Properties of the gambia are the REAL DEAL!!."
                        </p>
                    </blockquote>
                    <div class="testimonials-caption">
                        {{-- <img src="https://onclickwebdesign.com/wp-content/uploads/person_5.jpg" alt="Client 7" /> --}}
                        <p>Yoland Thomas</p>
                    </div>
                </div>

                <div>
                    <blockquote>
                        <p>"Properties Gambia Real Estate 
                            From the very beginning we have experienced open lines of communication, answers to all of our questions and concerns. 
                            Daniel and his team are knowledgeable and good at what they do. They treat you like family. We recommend them highly. 
                            If you are looking to purchase land. Look no further."
                        </p>
                    </blockquote>
                    <div class="testimonials-caption">
                        {{-- <img src="https://onclickwebdesign.com/wp-content/uploads/person_8.jpg" alt="Client 7" /> --}}
                        <p>Ken and Terri</p>
                    </div>
                </div>

                <div>
                    <blockquote>
                        <p>
                            "When we think of The Smiling Coast we think of Properties Gambia Real Estate and service with a smile.
                            The quality of service and professionalism that comes from this company is impeccable.
                            Doing business with  Properties Gambia Real Estate we knew we were in good hands based upon their reputation, trust and integrity. 
                            When buying our land we were able to send money internationally to this credible and reputable company and know and trust it was used as intended.
                            Their tag line states " You Are Safe With Us" believe it! And because of this we can rest at night.  
                            So we are more than happy to recommend Properties Gambia Real Estate for your real estate needs."
                        </p>
                    </blockquote>
                    <div class="testimonials-caption">
                        <img src="{{ asset('images/robert.terry.jpg') }}" alt="Client" />
                        <p> Robert & Cheryl </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- <section id="faq">
        <div class="container">
            <h2>FREQUENTLY ASKED QUESTIONS</h2>
            <div id="faq-slider">
                <div>
                    <blockquote>
                        <strong>How do I buy land in The Gambia?</strong>
                        <p> Establish Title Deeds. Once you have decided on a piece of land that you are interested in buying you should try to get written verification of ownership of the plot from the Alkalo. You can have a Gambian lawyer to examine the ownership documents in detail. (this is optional)</p>
                    </blockquote>
                </div>

                <div>
                    <blockquote>
                        <strong>What is the process for buying land?</strong>
                        <p>   
                            Customary Tenure - Preparatory Work <br>
                      
                            1. Check with neighbors next to and near the land you want to acquire if they know who owns the property. <br>                            
                            2. Go to the Alkalo of the village to determine from him or her who currently owns the land. <br>                            
                            3. Ask the owner for photocopies of the papers for the plot, especially the receipts relating to "rates payment" for the previous and current year.<br>                            
                            4. Check with the relevant area council who owns the property, and also show them copies of "receipts for payments of the rates" (this would show who is the current owner of the land in a direct way since the name of the rate payer is the name of the person who is stated to be the owner of the property.)<br>
                            5. After determining who the owner is check their "original ID card" or passport against the name of the "Transfer of Ownership Form."<br>
                        </p>
                    </blockquote>
                </div>

                <div>
                    <blockquote>
                        <strong>How do I view the land before I buy it?</strong>
                        <p> Our team will provide photos and videos of the land plots for sale so that you can see what is available. You can visit our Youtube Channel to see examples.</p>
                    </blockquote>
                </div>
                
                <div>
                    <blockquote>
                        <strong>What can I build on my land?</strong>
                        <p> Most people buy land to build a house or use it for farming. More details can be provided through a one on on phone consultation.</p>
                    </blockquote>
                </div>

                <div>
                    <blockquote>
                        <strong>How much does the land cost?</strong>
                        <p>The price range varies depending on the size of the land plot as well as the location. Land that is closer to the beach has a higher value than an area that is not close to the beach. </p>
                    </blockquote>
                </div>

                <iframe width="1232" height="693" src="https://www.youtube.com/embed/cMYUnxqvmxE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section> --}}
        
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>

            <div class="flex">
                <div id="form-container">
                    {{-- <h3>Contact Form</h3> --}}
                    <h3> Drop us a line! </h3>
                    <form method="post" action="{{ route('contactus.store') }}">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your Name" required/>

                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="eg: tjaybrowne@gmail.com" required/>

                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject" required/>

                        {{-- <label for="message">Message</label>
                        <textarea id="message">Write your message here..</textarea> --}}
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Write your message here..."></textarea>

                        {{-- <button class="rounded">Send Message</button> --}}
                        <div class="col-md-6">
                        {{-- <input type="submit" name="btnSubmit" class="btn btn-primary btn-round btn-sm" value="Send Message" /> --}}
                        <button type="submit" name="btnSubmit" class="rounded" value="Send Message">Send Message</button>
                        </div>
                    </form>
                </div>

                <div id="address-container">
                    <label>Address</label>
                    <address>
                        Mouhammed Jah Junction <br>
                        Bijilo, The Gambia
                    </address>

                    <label>Phone</label>
                    <a href="#">+44 7939-614434</a>

                    <label>Email Address</label>
                    <a href="#">info@propertiesgambia.co.uk</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="flex container">
            {{-- <div class="footer-about">
                <h5>About Stated</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
            </div> --}}

            <div class="footer-quick-links">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="#the-best">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-subscribe">
                <h5>Subscribe to our Newsletter</h5>
                <div id="subscribe-container">
                    <input type="text" placeholder="Enter Email" />
                    <button class="right-rounded">Send</button>
                </div>

                <h5 class="follow-us">Follow Us</h5>
                <ul>
                    {{-- <li><a href="#"><span class="fab fa-youtube"></span></a></li> --}}
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>
        </div>

        <small>
            Copyright &copy; 2020 - 2021 All rights reserved | Made with <span class="fa fa-heart"></span> by <a href="https://backend-backboners.github.io/portfolio/">TBJ</a>
        </small>
    </footer>

    <script>
        $(function () {
            let headerElem = $('header');
            let logo = $('#logo');
            let navMenu = $('#nav-menu');
            let navToggle = $('#nav-toggle');

           $('#properties-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: '<a href="#" class="slick-arrow slick-prev">previous</a>',
                nextArrow: '<a href="#" class="slick-arrow slick-next">next</a>',
                responsive: [
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 530,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    }
                ]
           });

           $('#testimonials-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<a href="#" class="slick-arrow slick-prev"><</a>',
                nextArrow: '<a href="#" class="slick-arrow slick-next">></a>'
           });

           navToggle.on('click', () => {
               navMenu.css('right', '0');
           });

           $('#close-flyout').on('click', () => {
                navMenu.css('right', '-100%');
           });

           $(document).on('click', (e) => {
               let target = $(e.target);
               if (!(target.closest('#nav-toggle').length > 0 || target.closest('#nav-menu').length > 0)) {
                   navMenu.css('right', '-100%');
               }
           });

           $(document).scroll(() => {
               let scrollTop = $(document).scrollTop();

               if (scrollTop > 0) {
                   navMenu.addClass('is-sticky');
                   logo.css('color', '#000');
                   headerElem.css('background', '#fff');
                   navToggle.css('border-color', '#000');
                   navToggle.find('.strip').css('background-color', '#000');
               } else {
                   navMenu.removeClass('is-sticky');
                   logo.css('color', '#fff');
                   headerElem.css('background', 'transparent');
                   navToggle.css('bordre-color', '#fff');
                   navToggle.find('.strip').css('background-color', '#fff');
               }

               headerElem.css(scrollTop >= 200 ? {'padding': '0.5rem', 'box-shadow': '0 -4px 10px 1px #999'} : {'padding': '1rem 0', 'box-shadow': 'none' });
           });

           $(document).trigger('scroll');
        });
    </script>

</body>
</html>