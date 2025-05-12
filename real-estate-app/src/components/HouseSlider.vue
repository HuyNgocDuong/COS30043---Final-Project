<template>
  <div class="house-carousel-container">
    <!-- Title Section -->
    <section class="slider-title-section text-center py-5">
      <p class="slider-subheading">FEATURED HOMES</p>
      <h2 class="slider-heading">Modern, Affordable, Comfortable</h2>
      <div class="slider-divider mx-auto mt-3"></div>
    </section>

    <!-- Carousel -->
    <div id="houseCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button v-for="(house, index) in houses" :key="house.id"
                type="button"
                data-bs-target="#houseCarousel"
                :data-bs-slide-to="index"
                :class="{ active: index === 0 }"
                :aria-label="'Slide ' + (index + 1)">
        </button>
      </div>

      <div class="carousel-inner rounded shadow">
        <div v-for="(house, index) in houses"
             :key="house.id"
             :class="['carousel-item', { active: index === 0 }]">
          <img :src="require(`@/assets/${house.image}`)" class="d-block w-100 house-img" :alt="house.title">
          <div class="carousel-caption d-none d-md-block">
            <router-link :to="`/house/${house.id}`" class="btn btn-dark px-4 py-2">
              Learn More
            </router-link>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#houseCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#houseCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HouseSlider',
  data() {
    return {
      houses: [
        { id: 1, image: 'house 1.png', title: 'House 1' },
        { id: 2, image: 'house 2.png', title: 'House 2' },
        { id: 3, image: 'house 3.png', title: 'House 3' },
        { id: 4, image: 'house 4.png', title: 'House 4' },
        { id: 5, image: 'house 5.png', title: 'House 5' },
      ]
    };
  }
}
</script>

<style scoped>
.house-carousel-container {
  margin: 4rem auto;
  max-width: 1000px;
  padding: 0 1rem;
}

/* Title section */
.slider-title-section {
  background-color: white;
  border-radius: 12px;
  margin-bottom: 0;
}

.slider-subheading {
  font-size: 0.75rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #111;
  font-weight: 600;
  margin-bottom: 1rem;
}

.slider-heading {
  font-family: 'Georgia', serif;
  font-size: 2rem;
  color: #987c5e;
  font-weight: 400;
}

.slider-divider {
  width: 50px;
  height: 2px;
  background-color: #333;
}

/* Carousel section */
.carousel-inner {
  overflow: hidden;
  border-radius: 12px;
}

.house-img {
  max-height: 500px;
  width: 100%;
  object-fit: cover;
}

.carousel-caption {
  bottom: 20px;
}

.carousel-caption .btn {
  font-weight: bold;
  letter-spacing: 1px;
}
</style>
