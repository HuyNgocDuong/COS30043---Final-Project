<template>
  <div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm w-100 px-5 py-4 nav-tall">
      <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Left Menu -->
        <ul class="navbar-nav flex-row">
          <li class="nav-item me-4">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item me-4">
            <router-link to="/services" class="nav-link">Services</router-link>
          </li>
          <li class="nav-item me-4">
            <router-link to="/portfolio" class="nav-link">Portfolio</router-link>
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
  </div>
</template>

<script>
export default {
  name: 'HomePage'
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
  height: 90vh;
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
</style>
