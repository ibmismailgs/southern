@extends('frontEnd.master')
@section('title', 'Home')
@section('content')
{{-- <marquee width="100%" direction="right" height="100%">
    This is a sample scrolling text that has scrolls texts to right.
</marquee> --}}

<section id="hero" class="hero">

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url('{{ asset('frontEnd/assets/img/hero-carousel/hero-carousel-1.jpg')}}')"></div>
      <div class="carousel-item" style="background-image: url('{{ asset('frontEnd/assets/img/hero-carousel/hero-carousel-2.jpg')}}')"></div>
      <div class="carousel-item" style="background-image: url('{{ asset('frontEnd/assets/img/hero-carousel/hero-carousel-3.jpg')}}')"></div>
      <div class="carousel-item" style="background-image: url('{{ asset('frontEnd/assets/img/hero-carousel/hero-carousel-4.jpg')}}')"></div>
      <div class="carousel-item" style="background-image: url('{{ asset('frontEnd/assets/img/hero-carousel/hero-carousel-5.jpg')}}')"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section>

{{-- <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          </div>
        </div>

      </div>

    </div>
</section> --}}
  <!-- End Featured Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><span>About Us</span></h2>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img style="height: 330px !important ; width:90%" src="{{ asset('frontEnd/assets/img/about.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 content justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <h3>Welcome to Southern Automobiles Ltd</h3>
          <p class="fst-italic">
            The Board of Directors of Southern Automobiles Ltd. conceived the idea for set-up of CNG Conversion Center and CNG Re-fueling Station in April, 2000. Accordingly the company <b>Southern Automobiles Ltd. </b>was registered with the Registrar of Joint Stock Companies, Bangladesh on 1st February 2001. After Incorporation with Joint Stock Company, Southern started the CNG business on 12 November, 2001 with the approval of Energy and Mineral Resource Division, Ministry of Power Energy and Mineral Resources, Govt. of the People’s Republic of Bangladesh, vide letter No. EN&MR (op-1) CNG/BPC-12/2001 dated 08 July 2001.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  {{-- <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Happy Clients</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>
        </div>

      </div>

    </div>
  </section> --}}
  <!-- End Counts Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="zoom-out">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset ('frontEnd/assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
        </div>
      </div>

    </div>
  </section>
  <!-- End Clients Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Services</h2>
          </div>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Nesciunt Mete</h3>
            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-box orange">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Eosle Commodi</h3>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-box green">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Ledo Markt</h3>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-box red">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Asperiores Commodi</h3>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-box purple">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Velit Doloremque.</h3>
            <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
          <div class="service-box pink">
            <i class="ri-discuss-line icon"><img style="max-height: 76px; max-width:80px" src="{{ asset('img/service.png')}}" alt=""></i>
            <h3>Dolori Architecto</h3>
            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- End Services Section -->

  <!-- ======= Testimonials Section ======= -->
  {{-- <section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{ asset('frontEnd/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{ asset('frontEnd/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{ asset('frontEnd/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{ asset('frontEnd/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{ asset('frontEnd/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section> --}}
  <!-- End Testimonials Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Gallery</h2>
          </div>

      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 portfolio-container">

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/product-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/product-1.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/branding-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/branding-1.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/books-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/books-1.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/app-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/app-2.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/product-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/product-2.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/branding-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/branding-2.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/books-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/books-2.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/app-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/app-3.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/product-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/product-3.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/branding-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/branding-3.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="{{ asset ('frontEnd/assets/img/portfolio/books-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset ('frontEnd/assets/img/portfolio/books-3.jpg') }}" class="img-fluid" alt=""></a>

            </div>
          </div><!-- End Portfolio Item -->

        </div><!-- End Portfolio Container -->

      </div>

    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Team</h2>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
              <img src="{{ asset('frontEnd/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="member-img">
              <img src="{{ asset('frontEnd/assets/img/team/team-2.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Sarah Jhonson</h4>
              <span>Product Manager</span>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="member-img">
              <img src="{{ asset('frontEnd/assets/img/team/team-3.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>William Anderson</h4>
              <span>CTO</span>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="member">
            <div class="member-img">
              <img src="{{ asset('frontEnd/assets/img/team/team-4.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Pricing Section ======= -->
  {{-- <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>Pricing</h3>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <h3>Free</h3>
            <h4><sup>$</sup>0<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li class="na">Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="box featured">
            <h3>Business</h3>
            <h4><sup>$</sup>19<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <h3>Developer</h3>
            <h4><sup>$</sup>29<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <span class="advanced">Advanced</span>
            <h3>Ultimate</h3>
            <h4><sup>$</sup>49<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section> --}}
  <!-- End Pricing Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->

  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>F.A.Q</h2>
          </div>

      <div class="row">
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  Non consectetur a erat nam at lectus urna duis?
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                </button>
              </h2>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                </button>
              </h2>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                  Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                </button>
              </h2>
              <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                  Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                </button>
              </h2>
              <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                  Varius vel pharetra vel turpis nunc eget lorem dolor?
                </button>
              </h2>
              <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </section>

  {{-- <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>F.A.Q</h2>
          </div>

      <div class="row justify-content-center">
        <div class="col-xl-10">
          <ul class="faq-list">

            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </p>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </section> --}}

  <!-- End Frequently Asked Questions Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact Us</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <p>Gulsan, Mohakhali, Dhaka</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>info@southern.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>+8801887414141
</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section>
@endsection
