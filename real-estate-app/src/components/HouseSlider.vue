<template>
  <div class="projects-section container">
    <!-- Title Section -->
    <section class="text-center mb-5">
      <h2 class="section-title">
        <strong>Featured</strong> <span class="light-text">Houses</span>
      </h2>
      <p class="section-subtitle">Crafting Spaces, Building Legacies—Explore Our Portfolio</p>
    </section>

    <!-- Swiper Slider Section -->
    <swiper
      :modules="modules"
      :slides-per-view="4"
      :space-between="30"
      :navigation="true"
      :loop="true"
      :autoplay="{
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      }"
      :speed="800"
      class="project-swiper"
      :breakpoints="{
        320: { slidesPerView: 1 },
        576: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        992: { slidesPerView: 4 }
      }"
    >
      <swiper-slide v-for="house in houses" :key="house.id">
        <div class="project-card">
          <img :src="require(`@/assets/${house.image}`)" class="img-fluid" :alt="house.title" />
          <div class="project-info">
            <h5>{{ house.title }}</h5>
            <p>${{ house.price.toLocaleString() }} | {{ house.location }}</p>
          </div>
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/autoplay';

export default {
  name: 'HouseSlider',
  components: {
    Swiper,
    SwiperSlide
  },
  setup() {
    return {
      modules: [Navigation, Autoplay]
    };
  },
  data() {
    return {
      houses: [
        { id: 1, image: 'house 1.png', title: 'Skyline Haven', price: 2500000, location: 'California' },
        { id: 2, image: 'house 2.png', title: 'Vista Verde', price: 2500000, location: 'San Francisco' },
        { id: 3, image: 'house 3.png', title: 'Serenity Suites', price: 2500000, location: 'Chicago' },
        { id: 4, image: 'house 4.png', title: 'Central Square', price: 2500000, location: 'Los Angeles' },
        { id: 5, image: 'house 5.png', title: 'Ocean Pearl', price: 2700000, location: 'San Diego' },
        { id: 6, image: 'house 6.png', title: 'Golden Crest', price: 2600000, location: 'Austin' },
        { id: 7, image: 'house 7.png', title: 'Pinewood Estate', price: 2550000, location: 'Seattle' },
        { id: 8, image: 'house 8.png', title: 'Willow Grove', price: 2450000, location: 'Denver' },
        { id: 9, image: 'house 9.png', title: 'Sunset Ridge', price: 2800000, location: 'Phoenix' },
        { id: 10, image: 'house 10.png', title: 'Maple Manor', price: 2650000, location: 'Portland' }
      ]
    };
  }
};
</script>

<style scoped>
.projects-section {
  padding: 4rem 1rem;
}

.section-title {
  font-size: 2.2rem;
  font-weight: 700;
}

.section-title .light-text {
  font-weight: 400;
  text-decoration: underline;
}

.section-subtitle {
  font-size: 1rem;
  color: #666;
  margin-top: 0.5rem;
}

.project-swiper {
  padding: 1rem 0;
}

.project-card {
  border-radius: 12px;
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.project-card:hover {
  transform: translateY(-5px);
}

.project-card img {
  height: 320px;
  width: 100%;
  object-fit: cover;
  border-radius: 12px 12px 0 0;
  transition: transform 0.3s ease;
}

.project-card:hover img {
  transform: scale(1.02);
}

.project-info {
  padding: 1rem;
  text-align: center;
  background-color: #fff;
  border-radius: 0 0 12px 12px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.project-info h5 {
  font-size: 1.15rem;
  font-weight: 700;
  color: #111;
  margin-bottom: 0.25rem;
}

.project-info p {
  font-size: 0.95rem;
  color: #666;
  margin: 0;
}

::v-deep(.swiper-button-prev),
::v-deep(.swiper-button-next) {
  color: #333;
  width: 40px;
  height: 40px;
  background: white;
  border-radius: 50%;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
}

::v-deep(.swiper-button-prev) {
  left: -30px;
}

::v-deep(.swiper-button-next) {
  right: -30px;
}

::v-deep(.swiper-button-prev:hover),
::v-deep(.swiper-button-next:hover) {
  background-color: #0d6efd;
  color: white;
}
</style>