<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo e(config('app.client_company_name')); ?></title>
        <meta name="keywords" content="Properties Gambia, real estate, buy land, invest in Gambia, homes, diaspora" />
        <meta name="description" content="Discover premium real estate services in The Gambia. Helping you buy, invest, and build your dream property securely." />
        <meta property="og:title" content="Properties Gambia - Secure Your Dream Property" />
        <meta property="og:description" content="Providing quality land procurement services to The Gambia and abroad." />
        <meta property="og:image" content="<?php echo e(asset('images/home.jpg')); ?>" />

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"/>
        <link href="<?php echo e(asset('css/frontend.css')); ?>" type="text/css" rel="Stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </head>

    <body>
        <div id="header-hero-container">
            <!-- Navbar Session -->
            <header>
                <div class="flex container">
                    <!-- Logo Image and Text -->
                    <a id="logo" href="<?php echo e(route('root')); ?>" class="navbar-brand">
                        <img src="<?php echo e(asset('logoo.ico')); ?>" width="50" alt="PGRE" class="d-inline-block align-middle mr-2"> &nbsp; PROPERTIES GAMBIA
                    </a>
                    <nav>
                        <button id="nav-toggle" class="hamburger-menu" aria-label="Toggle navigation menu">
                            <span class="strip"></span>
                            <span class="strip"></span>
                            <span class="strip"></span>
                        </button>

                        <ul id="nav-menu">
                            <li><a href="<?php echo e(route('root')); ?>" class="active">Home</a></li>
                            <li><a href="#properties">Properties</a></li>
                            <li><a href="#agents">The Team</a></li>
                            <li><a href="#the-best">About</a></li>
                            <li><a href="#testimonials">Reviews</a></li>
                             <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <?php if(Route::has('login')): ?>
                                <li>
                                    <div class="top-right links">
                                        <?php if(auth()->guard()->check()): ?>
                                            <a href="<?php echo e(url('/index')); ?>">Dashboard</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" aria-label="Login to your account">Login</a> |
                                             <?php if(Route::has('register')): ?>
                                                <a href="<?php echo e(route('register')); ?>" aria-label="Register for an account">Register</a>
                                             <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li id="close-flyout"><span class="fas fa-times"></span></li>
                        </ul>
                    </nav>
                </div>
            </header>

            <!-- Hero Session -->
            <section id="hero">
                <div class="fade"></div>
                <div class="hero-text">
                    <h1>
                        Buy & Build <br>
                        Real Estate Properties
                    </h1>
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
                        <p>Conduct physical or virtual site visit. Select property. </p>
                    </div>

                    <div>
                        
                        
                        <span class="fas fa-wallet"></span>
                        <h4>Make Payment</h4>
                        <p>Wire transfer or Cash Payment</p>
                    </div>

                    <div>
                        <span class="fas fa-chart-line"></span>
                        <h4>Initiate Land Transfer</h4>
                        <p>This is to be completed.</p>
                    </div>
                </div>
            </div>
        </section>

        <!--
        <section id="properties">
            <div class="container">
                <h2>Properties</h2>
                <div id="properties-slider" class="slick">

                    <div>
                        <img src="https://onclickwebdesign.com/wp-content/uploads/property_1.jpg" alt="Property 1" />
                        <div class="property-details">
                            <p class="price">GMD 150,000</p>
                            <span class="beds">6 beds</span>
                            <span class="baths">4 baths</span>
                            <span class="sqft">4,250 m2w.</span>
                            <address>
                                Sayamg Sea View
                            </address>
                        </div>
                    </div>

                    <div>
                        <img src="https://onclickwebdesign.com/wp-content/uploads/property_2.jpg" alt="Property 1" />
                        <div class="property-details">
                            <p class="price">GMD 150,000</p>
                            <span class="beds">6 beds</span>
                            <span class="baths">4 baths</span>
                            <span class="sqft">4,250 m2w.</span>
                            <address>
                                Sayamg Sea View
                            </address>
                        </div>
                    </div>

                    <div>
                        <img src="https://onclickwebdesign.com/wp-content/uploads/property_3.jpg" alt="Property 1" />
                        <div class="property-details">
                            <p class="price">GMD 150,000</p>
                            <span class="beds">6 beds</span>
                            <span class="baths">4 baths</span>
                            <span class="sqft">4,250 m2w.</span>
                            <address>
                                Sayamg Sea View
                            </address>
                        </div>
                    </div>

                    <div>
                        <img src="https://onclickwebdesign.com/wp-content/uploads/property_4.jpg" alt="Property 1" />
                        <div class="property-details">
                            <p class="price">GMD 150,000</p>
                            <span class="beds">6 beds</span>
                            <span class="baths">4 baths</span>
                            <span class="sqft">4,250 m2w.</span>
                            <address>
                                Sayamg Sea View
                            </address>
                        </div>
                    </div>

                    <div>
                        <img src="https://onclickwebdesign.com/wp-content/uploads/property_1.jpg" alt="Property 1" />
                        <div class="property-details">
                            <p class="price">GMD 150,000</p>
                            <span class="beds">6 beds</span>
                            <span class="baths">4 baths</span>
                            <span class="sqft">4,250 m2w.</span>
                            <address>
                                Sayamg Sea View
                            </address>
                        </div>
                    </div>
                </div>

                <button class="rounded">View All Property Listings</button>
            </div>
        </section>
        -->

        <section id="agents">
            <div class="container">
                <h2>The Team</h2>
                <p class="large-paragraph">Meet the Team</p>

                <div class="flex">
                    <div class="card">
                        <img src="<?php echo e(asset('images/daniel-new1.jpeg')); ?>" alt="Daniel Samba - C.E.O" />
                        <h3>Daniel Samba</h3>
                        <p>C.E.O</p>
                    </div>

                    <div class="card">
                        <img src="<?php echo e(asset('images/cherno-1.jpg')); ?>" alt="Cherno Jallow" />
                        <h3>Cherno Jallow</h3>
                        <p>Land Manager</p>
                    </div>

                    <div class="card">
                        <img src="<?php echo e(asset('images/Gibril 1.jpeg')); ?>" alt="Gibril Bah" />
                        <h3>Gibril Bah</h3>
                        <p>Office Manager</p>
                    </div>

                    <div class="card">
                        <img src="<?php echo e(asset('images/omar_01.jpeg')); ?>" alt="Omar Jobe" />
                        <h3>Omar Jobe</h3>
                        <p>Office Land Assistant</p>
                    </div>

                    <div class="card">
                        <img src="<?php echo e(asset('images/kanny.JPG')); ?>" alt="Kanny Khan" />
                        <h3>Kanny Khan</h3>
                        <p>Secretary</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="the-best">
            <div class="container">
                <h2>We Are One of The Best Real Estate Company</h2>
                <div class="flex">
                    <p class="large-paragraph">Properties Gambia is a new company in The Gambiap, we opened in 2020.
                        <br>
                        We aim to give the best service to our customers, from the diaspora, and The Gambia. We don't only sell lands, we like to have a one-to-one with our clients and making sure we meet their needs,
                        from picking you up from the Airport in The Gambia to providing you a rental property. We will also provide you a top-class building service for your homes, providing the best materials and
                        builders. When you buy from us we will also join you to our company's WhatsApp group, where you will meet and talk to your neighbors who have invested with us. That's why we are different from
                        the rest, where in the world do you talk to your neighbors before you have started to build your community. I, Daniel Yusuf Samba (CEO), of Properties Gambia. I am constantly striving to deliver
                        a service that is unparalleled by our competitors. But also working together, and developing Africa at the same time. You are safe with us.
                        The mission is to help the diaspora and Gambians purchase land, buy properties, build homes, and help the Gambia move forward.
                    </p>
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
                            
                        </div>
                    </div>
                    <div>
                        <div class="fas fa-route"></div>
                        <div class="services-card-right">
                            <h3>Land Tours</h3>
                            <p>If you are in The Gambia we can arrange a land tour for you to view land plots for sale in different areas of the country, this will allow you to see the land plots up close and personal. Our experts will guide you as you begin the process of purchasing land.</p>
                            
                        </div>
                    </div>
                    <div>
                        <div class="fas fa-chart-line"></div>
                        <div class="services-card-right">
                            <h3>City Tours</h3>
                            <p>If you are visiting The Gambia for the first time we can arrange a city tour with a local guide to see the beauty of The Gambia. Please contact us for more information about pricing.</p>
                            
                        </div>
                    </div>
                    <div>
                        <div class="fas fa-mobile-alt"></div>
                        <div class="services-card-right">
                            <h3>Phone Consultation</h3>
                            <p>Book a one on one consultation with Daniel Samba, the director of Investment in The Gambia to gain a better insight on how to move
                                forward in buying land plots to build your dream home.</p>
                            
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
                            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nostrum vitae explicabo dolore ratione. Quia iure quod ipsa blanditiis sint nulla a nam veritatis ex eos. Dicta molestiae dolorum laudantium."</p>
                        </blockquote>
                        <div class="testimonials-caption">
                            <img src="https://onclickwebdesign.com/wp-content/uploads/person_7.jpg" alt="Client 7" />
                            <p>Nick Andros</p>
                        </div>
                    </div>

                    <div>
                        <blockquote>
                            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nostrum vitae explicabo dolore ratione. Quia iure quod ipsa blanditiis sint nulla a nam veritatis ex eos. Dicta molestiae dolorum laudantium."</p>
                        </blockquote>
                        <div class="testimonials-caption">
                            <img src="https://onclickwebdesign.com/wp-content/uploads/person_5.jpg" alt="Client 7" />
                            <p>Larry Underwood</p>
                        </div>
                    </div>

                    <div>
                        <blockquote>
                            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nostrum vitae explicabo dolore ratione. Quia iure quod ipsa blanditiis sint nulla a nam veritatis ex eos. Dicta molestiae dolorum laudantium."</p>
                        </blockquote>
                        <div class="testimonials-caption">
                            <img src="https://onclickwebdesign.com/wp-content/uploads/person_8.jpg" alt="Client 7" />
                            <p>Fran Goldsmith</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq">
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
        </section>

        <section id="contact">
            <div class="container">
                <h2>Contact Us</h2>

                <div class="flex">
                    <div id="form-container">
                        <h3>Contact Form</h3>

                        <form>
                            <?php echo csrf_field(); ?>

                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required/>

                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="<?php echo e(old('email')); ?>" required />

                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" required />

                            <label for="message">Message</label>
                            <textarea id="message" name="message" required><?php echo e(old('message')); ?></textarea>

                            <button class="rounded" aria-label="Submit Contact Form">Send Message</button>
                        </form>
                    </div>

                    <div id="address-container">
                        <label>Address</label>
                        <address>
                            Brusubi, Banjul - The Gambia
                        </address>

                        <label>Phone</label>
                        <a href="#">232-232-2323</a>

                        <label>Email Address</label>
                        <a href="#">thomass.brown@wfp.org</a>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="flex container">
                <div class="footer-about">
                    <h5>About Stated</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                </div>

                <div class="footer-quick-links">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Contact Us</a></li>
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
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                    </ul>
                </div>
            </div>

            <small>
                Copyright &copy; 2021 All rights reserved | Made with <span class="fa fa-heart"></span> by <a href="<?php echo e(config('app.developer_company_website')); ?>"><?php echo e(config('app.developer_username')); ?></a>
            </small>
        </footer>

        <script>
            // Responsive utilities
            $(document).ready(function() {
                function handleResponsive() {
                    if ($(window).width() < 768) {
                        $('.flex.container').css({'flex-direction': 'column'});
                    } else {
                        $('.flex.container').css({'flex-direction': 'row'});
                    }
                }
                $(window).resize(handleResponsive);
                handleResponsive();
            });

            $(function () {
                let headerElem = $('header');
                let bodyElem = $('body');
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
                                arrows: false,
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
                    let windowWidth = $(window).width();
                    if (windowWidth >= 768) return;
                    let target = $(e.target);
                    if (!(target.closest('#nav-toggle').length > 0 || target.closest('#nav-menu').length > 0)) {
                        navMenu.css('right', '-100%');
                    }
                });

                $(document).scroll(() => {
                    let windowWidth = $(window).width();
                    if (windowWidth < 768) return;
                    let scrollTop = $(document).scrollTop();

                    if (scrollTop > 0) {
                        navMenu.addClass('is-sticky');
                        bodyElem.addClass('sticky-header');
                        logo.css('color', '#000');
                        headerElem.css('background', '#fff');
                        navToggle.css('border-color', '#000');
                        navToggle.find('.strip').css('background-color', '#000');
                    } else {
                        navMenu.removeClass('is-sticky');
                        bodyElem.removeClass('sticky-header');
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
<?php /**PATH /Users/thomasbrown/Documents/GitHub/Properties-Gambia/resources/views/welcome.blade.php ENDPATH**/ ?>