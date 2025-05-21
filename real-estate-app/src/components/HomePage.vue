<template>
  <div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <!-- HERO SECTION -->
    <header
      class="hero-section d-flex justify-content-center align-items-center text-center"
      :style="{ backgroundImage: `url(${require('@/assets/home.png')})` }"
    >
      <div : class="hero-text { 'hero-visible': heroVisible }" v-show="heroVisible">
        <h1 class="hero-title mb-3">Find Your Dream House</h1>
        <div class="hero-divider mb-3"></div>
        <p class="hero-subtext">
          Trusted Real Estate Experts in Australia - Modern Living Starts Here
        </p>
      </div>
    </header>

    <!-- ABOUT SECTION -->
    <section :class="['brand-about-section', { visible: isVisible }]" ref="aboutSection">
      <div class="container about-container">
        <div class="about-image-wrapper">
          <img src="@/assets/house 1.png" alt="Modern House" class="img-fluid about-image" />
        </div>

        <div class="about-content">
          <h2 class="about-heading"><strong>About</strong> Our Brand</h2>
          <p class="about-subtext">Passionate About Properties, Dedicated to Your Vision</p>

          <div class="about-stats">
            <div class="stat-box">
              <h4>{{ isVisible ? animatedStats.years : 0 }}+</h4>
              <p>Years of Excellence</p>
            </div>
            <div class="stat-box">
              <h4>{{ isVisible ? animatedStats.projects : 0 }}+</h4>
              <p>Projects Completed</p>
            </div>
            <div class="stat-box">
              <h4>{{ isVisible ? animatedStats.area : 0 }}+</h4>
              <p>Mn. Sq. Ft. Delivered</p>
            </div>
            <div class="stat-box">
              <h4>{{ isVisible ? animatedStats.ongoing : 0 }}+</h4>
              <p>Ongoing Projects</p>
            </div>
          </div>

          <p class="about-description">
            At Urban Haven, we specialize in connecting individuals and families with properties that perfectly match their lifestyle and goals.
            With a decade of industry experience, our dedicated team offers personalized guidance, market insights, and a wide selection of premium homes across Australia.
            Whether you're buying your first home, upgrading, or investing,
          </p>

          <router-link to="/about" class="btn-learn-more">Learn more</router-link>
        </div>
      </div>
    </section>

    <!-- HOUSE SLIDER SECTION -->
    <section class="house-slider-section">
      <HouseSlider />
    </section>

    <!-- CUSTOMER TESTIMONIAL SECTION -->
    <section class="customer-section">
      <CustomerFeedback />
    </section>

    <!-- FOOTER SECTION -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</template>

<script>
import HouseSlider from '@/components/HouseSlider.vue';
import CustomerFeedback from '@/components/CustomerFeedback.vue';
import NavBar from '@/components/NavBar.vue';
import SiteFooter from '@/components/SiteFooter.vue';

export default {
  name: 'HomePage',
  components: {
    NavBar,
    SiteFooter,
    HouseSlider,
    CustomerFeedback
  },
  data() {
    return {
      isVisible: false,
      heroVisible: false,
      animatedStats: {
        years: 0,
        projects: 0,
        area: 0,
        ongoing: 0
      }
    };
  },
  mounted() {
    setTimeout(() => {
      this.heroVisible = true;
    }, 100);
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      const section = this.$refs.aboutSection;
      const sectionTop = section.getBoundingClientRect().top;
      const triggerPoint = window.innerHeight * 0.75;

      if (sectionTop < triggerPoint && !this.isVisible) {
        this.isVisible = true;
        this.animateNumbers();
      }
    },
    animateNumbers() {
      const duration = 1500;
      const frameRate = 30;
      const steps = duration / frameRate;

      const finalValues = {
        years: 10,
        projects: 12,
        area: 20,
        ongoing: 25
      };

      const counters = {
        years: 0,
        projects: 0,
        area: 0,
        ongoing: 0
      };

      const increment = {};
      for (let key in finalValues) {
        increment[key] = finalValues[key] / steps;
      }

      let currentStep = 0;
      const interval = setInterval(() => {
        for (let key in counters) {
          counters[key] += increment[key];
          this.animatedStats[key] = Math.floor(counters[key]);
        }

        currentStep++;
        if (currentStep >= steps) {
          for (let key in finalValues) {
            this.animatedStats[key] = finalValues[key];
          }
          clearInterval(interval);
        }
      }, frameRate);
    }
  }
};
</script>

<style scoped>
/* Hero Section */
.hero-section {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100vw;
  position: relative;
  z-index: 0;
  overflow: hidden;
  padding-top: 20vh;
}

.hero-text {
  color: #fff;
  padding: 0 1rem;
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease, transform 0.8s ease;
}

.hero-visible {
  opacity: 1;
  transform: translateY(0);
}

.hero-title {
  font-family: 'Georgia', serif;
  font-size: 3rem;
  font-weight: 500;
  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
}

.hero-divider {
  width: 100px;
  height: 2px;
  background-color: #fff;
  margin: 0 auto 20px auto;
}

.hero-subtext {
  font-family: 'Georgia', serif;
  font-size: 1.2rem;
  font-weight: 400;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
}

/* About Section */
.brand-about-section {
  padding: 6rem 1rem;
  background-color: #fff;
  transition: all 0.5s ease-out;
}

.about-container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row; 
  gap: 2rem;
  justify-content: center;
}

.about-image-wrapper {
  flex: 1;
  max-width: 500px;
  height: 450px;
  border-radius: 300px 300px 0 0;
  overflow: hidden;
}

.about-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
}

.about-content {
  flex: 1;
  max-width: 600px;
  padding: 0 1rem;
}

.about-heading {
  font-size: 2.5rem;
  font-weight: 700;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 1rem;
}

.about-subtext {
  font-size: 1rem;
  color: #666;
  margin-bottom: 2rem;
}

.about-stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem 3rem;
  margin-bottom: 2rem;
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.brand-about-section.visible .about-stats {
  opacity: 1;
  transform: translateY(0);
}

.stat-box h4 {
  font-size: 2rem;
  font-weight: bold;
  color: #000;
  margin: 0 0 0.2rem 0;
}

.stat-box p {
  font-size: 1rem;
  color: #333;
  margin: 0;
}

.about-description {
  font-size: 1rem;
  line-height: 1.8;
  color: #333;
  margin-bottom: 2rem;
}

.btn-learn-more {
  background-color: #0d6efd;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  padding: 0.6rem 1.4rem;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.btn-learn-more:hover {
  background-color: #0b5ed7;
}

/* Section Spacing */
.house-slider-section,
.customer-section {
  padding: 4rem 1rem;
}

.house-slider-section {
  background-color: #f8f9fa;
}

.customer-section {
  background-color: #fff;
}

/* Adjust about section layout on smaller screens */
@media (max-width: 992px) {
  .about-container {
    flex-direction: column;
    padding: 2rem 1rem;
  }

  .about-image-wrapper {
    width: 100%;
    max-width: 100%;
    height: auto;
    border-radius: 20px;
  }

  .about-image {
    width: 100%;
    height: auto;
    object-fit: cover;
  }

  .about-content {
    max-width: 100%;
    padding: 2rem 0 0;
    text-align: center;
  }

  .about-heading {
    font-size: 2rem;
  }

  .about-subtext {
    font-size: 1rem;
  }

  .about-stats {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    justify-items: center;
  }

  .btn-learn-more {
    width: 100%;
    max-width: 280px;
    margin: auto;
  }
}

/* Fix hero text and padding on smaller screens */
@media (max-width: 576px) {
  .hero-section {
    height: auto;
    padding-top: 30vh;
    padding-bottom: 4rem;
  }

  .hero-title {
    font-size: 2rem;
    padding: 0 1rem;
  }

  .hero-subtext {
    font-size: 1rem;
    padding: 0 1rem;
  }
}

</style>
