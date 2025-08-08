<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.parts.head')
  </head>
  <body>
    <header class="header">
      @include('frontend.parts.header')
    </header>

    <section class="hero-section">
      <div class="container hero-container">
        <div class="hero-text">
          <h1>
            iDuongShop Men’s Fashion Shoes – Style & Smart Savings
          </h1>
          <p>
            <em>
              iDuongShop helps small accommodations cut costs through smart group buying. Our modern, affordable men’s shoes are ideal for the tourism and hospitality sector. Together, we build a sustainable ecosystem for Vietnam
            </em>
          </p>
          <a href="#" class="btn btn-primary">EXPLORE NOW!</a>
        </div>
        <div class="hero-image">
          <img
            src="{{asset('fontend/asset/img/ShopiDuong.jpg')}}"
            alt="Fine Foods Image"
          />
        </div>
      </div>
    </section>

    <section class="who-we-are-section">
      <div class="container who-we-are-container">
        <div class="who-we-are-gallery">
          <div class="column column-left">
            <img
              src="{{asset('fontend/asset/img/home1.jpg')}}"
              alt="Image 1"
            />
            <img
              src="{{asset('fontend/asset/img/home2.jpg')}}"
              alt="Image 2"
            />
          </div>

          <div class="column column-center">
            <div class="logo-wrapper">
              <img src="{{asset('fontend/asset/img/logo.png')}}" alt="Logo" />
            </div>
          </div>

          <div class="column column-right">
            <img
              src="{{asset('fontend/asset/img/home3.jpg')}}"
              alt="Image 3"
            />
            <img
              src="{{asset('fontend/asset/img/home4.jpg')}}"
              alt="Image 4"
            />
          </div>
        </div>

        <div class="who-we-are-content">
          <h2 class="section-heading">WHO WE ARE</h2>
          <div class="content">
            iDuongShop is a smart group-buying platform tailored for small and medium-sized accommodations in Vietnam, including hotels, homestays, and villas. We specialize in providing essential supplies such as amenities, housekeeping products, and now — stylish, functional footwear for hospitality staff
            <br />
            <br />Our mission goes beyond supplying products. iDuongShop leverages technology and community power to offer high-quality men’s shoes at optimized prices, with streamlined ordering, inventory management, and delivery. By partnering with trusted manufacturers, we ensure consistent quality, transparent pricing, and reliable supply — even during peak seasons
          </div>
          <a href="#" class="btn btn btn-primary">LEARN MORE</a>
        </div>
      </div>
    </section>

    <section class="solution-section">
      <div class="container">
        <h2 class="section-heading">OUR SOLUTION</h2>
        <div class="solution-grid">
          <div class="solution-card">
            <div class="icon-circle">
              <img
                src="https://cdn.prod.website-files.com/678e354bda67496650b3d256/678e354bda67496650b3d278_50.svg"
                alt=""
              />
            </div>
            <h3><em>Comprehensive Product Range</em></h3>
            <p>
              iDuongShop uses a Group Buying model to help even small buyers get the best prices, reduce costs, and boost profits — all while offering a wide selection of quality shoes.
            </p>
          </div>
          <div class="solution-card">
            <div class="icon-circle">
              <img
                src="https://cdn.prod.website-files.com/678e354bda67496650b3d256/678e354bda67496650b3d278_50.svg"
                alt=""
              />
            </div>
            <h3><em>Reliable Supply Chain</em></h3>
            <p>
              Our smart ordering system supports inventory alerts, suggests reorder timing, and tracks costs — helping customers place group orders on time and maximize savings.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="values-section">
      <div class="container">
        <h2 class="section-heading">OUR CORE VALUES</h2>
        <div class="values-grid">
          <div class="value-card">
            <div class="icon-circle">
              <img
                src="https://cdn.prod.website-files.com/678e354bda67496650b3d256/678e354bda67496650b3d284_1.svg"
                alt=""
              />
            </div>
            <h4>Cost Efficiency – Empowering Small Businesses</h4>
            <p>
              iDuongShop enables small accommodations to access big-chain pricing through the power of group buying
            </p>
          </div>
          <div class="value-card">
            <div class="icon-circle">
              <img
                src="https://cdn.prod.website-files.com/678e354bda67496650b3d256/678e354bda67496650b3d267_2.svg"
                alt=""
              />
            </div>
            <h4>Lean Operations – Technology-Driven</h4>
            <p>
              We simplify inventory, ordering, and delivery processes with smart technology, ensuring smooth operations even in peak seasons
            </p>
          </div>
          <div class="value-card">
            <div class="icon-circle">
              <img
                src="https://cdn.prod.website-files.com/678e354bda67496650b3d256/678e354bda67496650b3d263_3.svg"
                alt=""
              />
            </div>
            <h4>Community Connection – Sustainable Growth</h4>
            <p>
              Beyond commerce, iDuongShop builds a collaborative network of small businesses to promote sharing, resource efficiency, and green consumption
            </p>
          </div>
        </div>
      </div>
      <div class="background-text">iDuong Shop</div>
    </section>

    <section id="contact-section">
      <div class="container">
        <h2 class="contact-heading">DISCOVER QUALITY FOOTWEAR WITH IDUONGSHOP</h2>

        <div class="contact-cards-grid">
          <!-- Hanoi -->
          <div class="contact-card">
            <h3><strong>VIETNAM</strong> | <em>Da Nang office</em></h3>
            <p>
              <i class="fa-solid fa-location-dot"></i> 01 Nguyen Chon, Lien Chieu, Da Nang
            </p>
            <p><i class="fa-solid fa-mobile-vibrate"></i> +84 702374978</p>
            <p><i class="fa-solid fa-envelope-circle-check"></i> bd00535fpt@gmail.com</p>
          </div>

          <div class="map-google">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8811858313475!2d108.16293139999999!3d16.071654199999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218df0356120d%3A0x47653129d38a5066!2zMSBOZ3V54buFbiBDaMahbiwgSG_DoCBNaW5oLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDA!5e0!3m2!1svi!2s!4v1754618951476!5m2!1svi!2s" width="670" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </section>
    <footer class="footer">
      @include('frontend.parts.footer')
    </footer>
  </body>
</html>
