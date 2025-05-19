<template>
  <div class="about-page">
    <!-- NAVIGATION BAR -->
    <NavBar />

    <!-- LARGE HERO SECTION -->
    <section class="hero-large text-center d-flex flex-column justify-content-center align-items-center">
      <h1 class="hero-title">Urban Haven</h1>
      <h2 class="hero-subtitle">Your Trusted Partner in Real Estate</h2>
      <p class="hero-description">
        Since 2015, Urban Haven has redefined real estate by turning dream homes into reality 
        blending modern design with community centric living.
      </p>
    </section>

     <!-- BANNER IMAGE SECTION -->
    <section class="about-banner text-center my-5">
    <img src="@/assets/banner.png" alt="Urban Haven Showcase" class="img-fluid rounded shadow banner-image"/>
    </section>


    <!-- FOOTER SECTION -->
    <SiteFooter />
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue'
import SiteFooter from '@/components/SiteFooter.vue'

export default {
  name: 'AboutPage',
  components: {
    NavBar,
    SiteFooter
  }
}
</script>

<style scoped>
.hero-large {
  min-height: 80vh;
  padding: 5rem 2rem;
  background-color: #f8f9fa;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 700;
  color: #333;
}

.hero-subtitle {
  font-size: 2rem;
  font-weight: 500;
  color: #444;
  margin-top: 1rem;
}

.hero-description {
  max-width: 700px;
  font-size: 1.125rem;
  color: #555;
  margin-top: 1.5rem;
  line-height: 1.7;
}

.about-banner {
  margin-top: -2rem; 
  margin-bottom: 2rem;
}

.banner-image {
  max-width: 1100px;
  width: 100%;
  height: auto;
  display: block;
  margin: 0 auto;
}


</style>
