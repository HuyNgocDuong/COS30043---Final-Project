<template>
  <div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm w-100 px-5 py-4 nav-tall">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Left Menu -->
        <ul class="navbar-nav flex-row">
          <li class="nav-item me-4">
            <router-link to="/home" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item me-4">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item me-4">
            <router-link to="/news" class="nav-link">News</router-link>
          </li>
        </ul>

        <!-- Centered Logo -->
        <div class="navbar-logo text-center position-absolute top-50 start-50 translate-middle">
          <img src="@/assets/logo.png" alt="Logo" class="logo-img" />
        </div>

        <!-- Right Icons + Button -->
        <div class="d-flex align-items-center">
          <i class="bi bi-instagram fs-5 me-3"></i>
          <i class="bi bi-facebook fs-5 me-3"></i>
          <i class="bi bi-linkedin fs-5 me-4"></i>
          <router-link to="/contact" class="btn btn-outline-dark">Contact Us</router-link>
        </div>
      </div>
    </nav>

    <!-- HERO SECTION -->
    <header
      class="hero-section d-flex justify-content-center align-items-center text-center"
      :style="{ backgroundImage: `url(${require('@/assets/home.png')})` }"
    >
      <div class="hero-text">
        <h1 class="hero-title mb-3">Planning with Heart</h1>
        <div class="hero-divider mb-3"></div>
        <p class="hero-subtext">
          Woman-Owned Event Planning Company Serving Kansas City and Beyond
        </p>
      </div>
    </header>

    <!-- INFO SECTION -->
    <section class="about-section text-center">
      <div class="container py-5">
        <p class="about-subheading mb-3">BASED IN CHARLESTON BUT TRAVEL WORLDWIDE</p>
        <h2 class="about-title mb-3">Wedding & Event Planning,</h2>
        <div class="about-divider mb-4"></div>
        <p class="about-description mx-auto">
          From made-to-measure weddings to elaborate corporate events that nurture company connections,
          Fox Events has a flair for transforming bespoke spaces into unforgettable experiences.
        </p>
      </div>
    </section>

    <!-- ABOUT LINK SECTION -->
    <section class="split-about-section">
      <div class="split-box">
        <!-- Left Text -->
        <div class="split-text">
          <p class="split-label">ABOUT</p>
          <h2 class="split-title">We Create Meaningful Experiences</h2>
          <p class="split-description">
            With years of experience, our team is passionate about turning your dreams into reality.
            We believe every event should reflect your story and values — that’s why we plan with heart,
            care, and creativity.
          </p>
          <router-link to="/about" class="split-button">Learn More</router-link>
        </div>

        <!-- Image -->
        <div class="split-image">
          <img :src="require('@/assets/people.png')" alt="Team People" />
        </div>
      </div>
    </section>

    <!-- HOUSE SLIDER SECTION -->
    <section class="house-slider-section">
      <HouseSlider />
    </section>

    <!-- CONNECT SECTION -->
    <section class="split-connect-section">
      <div class="split-box">
        <!-- Left Text -->
        <div class="split-text">
          <p class="split-label">CONNECT</p>
          <h2 class="split-title1">Let’s Start the Conversation</h2>
          <p class="split-description">
            Whether you're planning your dream home or just exploring ideas, our team is ready to help you take the next step. Reach out and let’s build something great together.
          </p>
          <router-link to="/contact" class="split-button">Get in Touch</router-link>
        </div>

        <!-- Right Image -->
        <div class="split-image">
          <img :src="require('@/assets/contact.png')" alt="Get in Touch" />
        </div>
      </div>
    </section>

    <!-- FOOTER SECTION (modern layout like screenshot) -->
    <footer class="footer-modern py-5">
      <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <!-- Left: Footer Links -->
        <div class="footer-left mb-4 mb-lg-0">
          <router-link to="/about" class="footer-link-modern">About</router-link>
          <router-link to="/services" class="footer-link-modern">Services</router-link>
          <router-link to="/news" class="footer-link-modern">Portfolio</router-link>
        </div>

        <!-- Center: Logo Text and tagline -->
        <div class="footer-center text-center mb-4 mb-lg-0">
          <div class="logo-text">
            <span class="logo-name">URBAN HAVEN</span>
          </div>
          <div class="footer-tagline">planning with heart</div>
        </div>

        <!-- Right: Book Button and Icons -->
        <div class="footer-right d-flex align-items-center gap-3">
          <router-link to="/contact" class="btn btn-book-consultation">Book a Consultation</router-link>
          <i class="bi bi-instagram icon-social"></i>
          <i class="bi bi-facebook icon-social"></i>
          <i class="bi bi-linkedin icon-social"></i>
        </div>
      </div>
    </footer>

  </div>
</template>

<script>
import HouseSlider from '@/components/HouseSlider.vue';

export default {
  name: 'HomePage',
  components: {
    HouseSlider
  }
}
</script>

<style scoped>
/* Navbar */
.nav-tall {
  min-height: 120px;
  position: fixed; /* Keeps the navbar fixed on top */
  top: 0;
  left: 0;
  right: 0;
  z-index: 10; /* Ensures navbar is always on top */
  background-color: #fff; /* Optional: Adds a background color to the navbar */
}

.logo-img {
  height: auto;
  width: 270px;
  max-width: 100%;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}

/* Hero Section */
.hero-section {
  background-image: url('@/assets/home.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100%;
  margin-top: -120px;
  position: relative;
  z-index: 0;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: flex-start; /* Aligns text to the top of the container */
  padding-top: 20vh; /* Moves text down by 20% of the viewport height */
}

.hero-text {
  position: relative;
  z-index: 1;
  text-align: center;
  color: #fff; 
  padding: 0 2rem; 
}

.hero-title {
  font-family: 'Georgia', serif;
  font-size: 3rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-bottom: 20px;
}

.hero-divider {
  width: 100px;
  height: 2px;
  background-color: #fff;
  margin: 0 auto 20px auto;
}

.hero-subtext {
  font-size: 1.1rem;
  letter-spacing: 1px;
  font-family: 'Georgia', serif;
  max-width: 700px;
}

/* About top text section */
.about-section {
  background-color: white;
  padding-top: 4rem;
  padding-bottom: 4rem;
}

.about-subheading {
  font-size: 0.85rem;
  letter-spacing: 2px;
  color: #111;
  font-weight: 600;
}

.about-title {
  font-family: 'Georgia', serif;
  font-size: 2rem;
  font-weight: 400;
  color: #999167;
}

.about-divider {
  width: 40px;
  height: 2px;
  background-color: #111;
  margin: 0 auto;
}

.about-description {
  max-width: 700px;
  font-size: 1rem;
  line-height: 1.8;
  color: #111;
}

/* Shared Split Section Style */
.split-about-section {
  background-color: #cba78f;
  padding: 5rem 0;
  display: flex;
  justify-content: center;
  box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
}

.split-connect-section {
  background-color: #a6a176;
  padding: 5rem 0;
  display: flex;
  justify-content: center;
  box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
}

.split-box {
  background-color: white;
  display: flex;
  flex-wrap: wrap;
  max-width: 1000px;
  width: 100%;
  overflow: hidden;
  min-height: 500px;
}

.split-text {
  flex: 1;
  padding: 4rem 3rem;
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.split-label {
  text-transform: uppercase;
  font-size: 0.8rem;
  letter-spacing: 2px;
  color: #000;
  margin-bottom: 1rem;
}

.split-title {
  font-family: 'Georgia', serif;
  font-size: 1.8rem;
  color: #987c5e;
  margin-bottom: 1.5rem;
}

.split-title1 {
  font-family: 'Georgia', serif;
  font-size: 1.8rem;
  color: #a6a176;
  margin-bottom: 1.5rem;
}

.split-description {
  font-size: 1rem;
  color: #333;
  margin-bottom: 2rem;
}

.split-button {
  padding: 0.6rem 1.5rem;
  background-color: #000;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  letter-spacing: 1px;
}

.split-image {
  flex: 1;
  overflow: hidden;
}

.split-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Footer Styles */
.footer-modern {
  background-color: #f8f5f1;
  border-top: 1px solid #ddd;
  padding-top: 3rem;
  padding-bottom: 3rem;
}

.footer-left,
.footer-right {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.footer-link-modern {
  font-size: 1rem;
  color: #111;
  text-decoration: underline;
  font-family: 'Georgia', serif;
}

/* Footer text-based logo styles */
.logo-text {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'Georgia', serif;
  text-align: center;
  width: 100%;
}

.logo-name {
  font-size: 2.5rem; 
  color: #333;
  letter-spacing: 2px; 
  text-transform: uppercase;
}

.footer-tagline {
  font-size: 0.75rem;
  color: #777;
  letter-spacing: 1px;
  margin-top: 0.4rem;
  font-style: italic;
  text-transform: capitalize;
  font-family: 'Georgia', serif;
  color: #888;
}

/* Book a Consultation Button */
.btn-book-consultation {
  background-color: #a6b8b8;
  color: white;
  padding: 0.5rem 1.2rem;
  border-radius: 5px;
  text-decoration: none;
  font-weight: 600;
  letter-spacing: 1px;
  font-family: 'Georgia', serif;
}

.btn-book-consultation:hover {
  background-color: #8a9999;
}

/* Social Icon styles */
.icon-social {
  font-size: 1.5rem;
  color: #333;
  margin-left: 1rem;
}




@media (max-width: 768px) {
  .footer-left,
  .footer-right {
    justify-content: center;
    width: 100%;
    margin-bottom: 1rem;
  }

  .footer-center {
    width: 100%;
  }
}
</style>
