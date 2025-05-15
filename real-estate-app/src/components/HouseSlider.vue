<template>
  <div class="projects-section container">
    <!-- Title Section -->
    <section class="text-center mb-5">
      <h2 class="section-title">
        <strong>Projects</strong> <span class="light-text">Completed</span>
      </h2>
      <p class="section-subtitle">Crafting Spaces, Building Legacies—Explore Our Portfolio</p>
    </section>

    <!-- Projects Grid -->
    <div class="row g-4 justify-content-center">
      <div class="col-12 col-sm-6 col-md-4 col-lg-3" v-for="house in houses" :key="house.id">
        <div class="project-card">
          <img :src="require(`@/assets/${house.image}`)" class="img-fluid rounded shadow-sm" :alt="house.title" />
          <div class="project-info shadow-sm">
            <h5 class="mb-1">{{ house.title }}</h5>
            <p class="text-muted mb-0">${{ house.price.toLocaleString() }} | {{ house.location }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HouseSlider',
  data() {
    return {
      houses: [
        { id: 1, image: 'house 1.png', title: 'Skyline Haven', price: 2500000, location: 'California' },
        { id: 2, image: 'house 2.png', title: 'Vista Verde', price: 2500000, location: 'San Francisco' },
        { id: 3, image: 'house 3.png', title: 'Serenity Suites', price: 2500000, location: 'Chicago' },
        { id: 4, image: 'house 4.png', title: 'Central Square', price: 2500000, location: 'Los Angeles' },
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
  height: 350px;
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

</style>
