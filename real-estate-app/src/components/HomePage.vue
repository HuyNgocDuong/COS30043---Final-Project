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
  position: relative;
}

.logo-img {
  height: auto;
  width: 270px;
  max-width: 100%;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}

/* Hero section */
.hero-section {
  background-size: cover;
  background-position: center;
  height: 60vh;
  width: 100vw;
  margin: 0;
  padding: 0;
  position: relative;
  overflow: hidden;
}

.hero-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(255, 255, 255, 0.6);
  backdrop-filter: blur(5px);
  z-index: 0;
}

.hero-text {
  position: relative;
  z-index: 1;
  max-width: 900px;
  padding: 2rem;
}

.hero-title {
  font-family: 'Georgia', serif;
  font-size: 3rem;
  font-weight: 500;
  color: #111;
  letter-spacing: 1px;
}

.hero-divider {
  width: 400px;
  height: 1px;
  background-color: #111;
  margin: 0 auto 1rem auto;
}

.hero-subtext {
  font-size: 1.1rem;
  color: #111;
  font-family: 'Georgia', serif;
}

/* About top text section */
.about-section {
  background-color: #f9f4f1;
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

/* Split About Section */
.split-about-section {
  background-color: #cba78f;
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
  min-height: 500px; /* Increase the height of the card */
}

.split-text {
  flex: 1;
  padding: 4rem 3rem; /* Increased padding for taller text area */
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

.split-wrapper {
  border: 1px solid white;
  padding: 0px;
  display: inline-block;
}

</style>
