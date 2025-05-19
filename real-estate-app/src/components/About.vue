<template>
  <div class="about-page">
    <!-- NAVIGATION BAR -->
    <NavBar />

    <!-- BANNER IMAGE SECTION (moved to top) -->
    <section class="about-banner text-center my-5">
      <img src="@/assets/banner.png" alt="Urban Haven Showcase" class="img-fluid rounded shadow banner-image" />
    </section>

   <!-- OUR STORY SECTION -->
    <section class="our-story-section py-5">
      <div class="container">
        <h2 class="text-center fw-bold mb-4">Our Story</h2>
        <div class="row align-items-center">
          <div class="col-md-6 mb-4 mb-md-0">
            <img src="@/assets/house 4.png" alt="Our Story" class="img-fluid rounded shadow" />
          </div>
          <div class="col-md-6">
            <p>
              Founded in 2015, Urban Haven began with a passion to create more than just houses, we set out to build homes, communities, and lasting relationships.
            </p>
            <p>
              Our dedicated team combines modern design principles with deep market insight, offering clients tailored solutions whether buying, selling, or investing. 
              With every project, we aim to deliver warmth, trust, and architectural excellence.
            </p>
            <p>
              Join us in shaping your next chapter where comfort meets style, and your vision finds a home.
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- OUR SERVICES SECTION -->
    <section class="services-section text-white py-5">
      <div class="container">
        <h2 class="text-center mb-5 fw-bold text-black">Our Services</h2>
        <div class="row justify-content-center g-4">
          <div class="col-md-4">
            <div class="service-card p-4 text-center">
              <i class="bi bi-house-door-fill fs-2 mb-3"></i>
              <h4 class="fw-bold">Property Sales</h4>
              <p>Helping clients buy and sell properties with trusted advice and smooth transactions.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-card p-4 text-center">
              <i class="bi bi-building fs-2 mb-3"></i>
              <h4 class="fw-bold">Project Development</h4>
              <p>Partnering with developers to create stylish, modern residential and commercial spaces.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-card p-4 text-center">
              <i class="bi bi-gear-fill fs-2 mb-3"></i>
              <h4 class="fw-bold">Property Management</h4>
              <p>Comprehensive management solutions for owners and investors—from tenants to upkeep.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MEET OUR TEAM SECTION -->
    <section class="team-section py-5 ">
      <div class="container">
        <h2 class="text-center fw-bold mb-5">Meet Our Team</h2>
        <div class="row justify-content-center g-4">
          <div class="col-6 col-md-4 col-lg-2 text-center" v-for="i in 5" :key="i">
            <img :src="require(`@/assets/agent ${i}.png`)" :alt="`Agent ${i}`" class="team-img mb-3" />
            <h6 class="fw-bold">Agent {{ i }}</h6>
            <p class="text-muted small">Real Estate Specialist</p>
          </div>
        </div>
      </div>
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
.our-story-section {
  background-color: #ffffff;
  color: #333;
}

.our-story-section h2 {
  font-size: 2.5rem;
  color: #222;
}

.our-story-section p {
  font-size: 1.1rem;
  line-height: 1.8;
}

.about-banner {
   margin: 0;
  padding: 0;
  width: 100vw; /* full viewport width */
  overflow: hidden;
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
}

.banner-image {
    width: 100%;
  height: auto;
  display: block; 
}


.services-section {
  background-color: #f8f9fa;
  color: #fff;
}

.service-card {
  background-color: #0b1c3b;
  border-radius: 12px;
  transition: transform 0.3s ease;
}

.service-card:hover {
  transform: translateY(-5px);
}

.service-card i {
  color: #fff;
}

.team-section {
  background-color: #fff;
}

.team-img {
  width: 100%;
  max-width: 130px;
  height: 130px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.team-img:hover {
  transform: scale(1.05);
}

</style>
