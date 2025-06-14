<template>
  <div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <!-- Hero Banner Section -->
    <div class="properties-hero-section d-flex justify-content-center align-items-center text-center position-relative mb-5 mt-5">
      <div class="properties-hero-text text-white px-3">
        <h2 class="fw-bold display-4">Explore Properties</h2>
        <p class="lead">Find your dream home from our curated listings</p>
      </div>
    </div>

    <!-- Filters -->
    <div class="container pb-5">
      <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 bg-light">
        <h5 class="fw-semibold mb-4">Filter Listings</h5>
        <div class="row gy-3 gx-4">
          <div class="col-md-4">
            <label class="form-label text-muted small">Search by Title</label>
            <input
              type="text"
              class="form-control rounded-pill px-3 py-2"
              placeholder="e.g. Modern Villa"
              v-model="filters.title"
            />
          </div>
          <div class="col-md-4">
            <label class="form-label text-muted small">Property Type</label>
            <select class="form-select rounded-pill px-3 py-2" v-model="filters.type">
              <option value="">All Types</option>
              <option value="Villa">Villa</option>
              <option value="Apartment">Apartment</option>
              <option value="House">House</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label text-muted small">Location</label>
            <select class="form-select rounded-pill px-3 py-2" v-model="filters.location">
              <option value="">All Locations</option>
              <option value="Melbourne">Melbourne</option>
              <option value="Sydney">Sydney</option>
              <option value="Brisbane">Brisbane</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Manage Listings Button (Only for Admin) -->
      <div class="text-end mb-4" v-if="isAdmin">
        <router-link to="/manage-listings" class="btn btn-dark rounded-pill px-4">
          Manage Listings
        </router-link>
      </div>

      <!-- Property Cards -->
      <div class="row g-4">
        <div v-if="filteredHouses.length === 0" class="text-center text-muted">
          No matching properties found.
        </div>

        <div class="col-md-4" v-for="house in filteredHouses" :key="house.id">
          <div class="card shadow h-100 d-flex flex-column">
            <img
              :src="require(`@/assets/${house.image}`)"
              :alt="house.title"
              class="card-img-top"
              style="height: 300px; object-fit: cover;"
            />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ house.title }}</h5>
              <p class="card-text">
                <strong>Location:</strong> {{ house.location }}<br />
                <strong>Type:</strong> {{ house.type }}<br />
                <strong>Price:</strong> ${{ house.price.toLocaleString() }}
              </p>
              <div class="mt-auto">
                <router-link
                  :to="`/property/${house.id}`"
                  class="btn btn-outline-primary w-100 mb-2"
                >
                  View Details
                </router-link>
                <div class="form-check text-start">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    :value="house.id"
                    v-model="compareList"
                  />
                  <label class="form-check-label small">Compare</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Compare Button -->
      <div class="text-center mt-4" v-if="compareList.length >= 2">
        <router-link
          :to="`/compare?ids=${compareList.join(',')}`"
          class="btn btn-primary rounded-pill px-4"
        >
          Compare Selected ({{ compareList.length }})
        </router-link>
      </div>
    </div>

    <!-- FOOTER SECTION -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue'
import SiteFooter from '@/components/SiteFooter.vue'

export default {
  name: 'PropertiesPage',
  components: {
    NavBar,
    SiteFooter
  },
  data() {
    return {
      houses: [],
      filters: {
        title: '',
        type: '',
        location: ''
      },
      compareList: [],
      isAdmin: localStorage.getItem('userRole') === 'admin'
    }
  },
  computed: {
    filteredHouses() {
      return this.houses.filter(house => {
        return (
          (!this.filters.title || house.title.toLowerCase().includes(this.filters.title.toLowerCase())) &&
          (!this.filters.type || house.type === this.filters.type) &&
          (!this.filters.location || house.location === this.filters.location)
        )
      })
    }
  },
  mounted() {
    fetch('https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/houses.json?t=' + Date.now())
      .then(res => res.json())
      .then(data => {
        this.houses = data
      })
      .catch(err => {
        console.error('Failed to load property data:', err);
      });
  }
}
</script>

<style scoped>
/* Hero Banner */
.properties-hero-section {
  background-image: url('@/assets/house 5.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 70vh;
  width: 100%;
  position: relative;
}

.properties-hero-text {
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

/* Responsive adjustments */
@media (max-width: 576px) {
  .properties-hero-section {
    height: 50vh;
  }

  .properties-hero-text h2 {
    font-size: 1.75rem;
  }

  .properties-hero-text p {
    font-size: 1rem;
  }
}

/* Filter controls */
.form-control:focus,
.form-select:focus {
  border-color: #6c63ff;
  box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
}
</style>
