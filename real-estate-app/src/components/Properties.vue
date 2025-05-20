<template>
  <div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <!-- Banner with Title and Subtext -->
    <div class="position-relative w-100 mb-5 mt-5">
      <img
        src="@/assets/house 5.png"
        alt="Featured Banner"
        class="img-fluid w-100 shadow"
        style="max-height: 500px; object-fit: cover;"
      />
      <div
        class="position-absolute top-50 start-50 translate-middle text-center text-white"
        style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);"
      >
        <h2 class="fw-bold display-4">Explore Properties</h2>
        <p class="lead">Find your dream home from our curated listings</p>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
      <!-- Modern Framed Filters Section -->
      <div class="card shadow-sm border-0 rounded-4 p-4 mb-5 bg-light">
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

      <!-- Property Cards -->
      <div class="row g-4">
        <!-- v-if to show when no results -->
        <div v-if="filteredHouses.length === 0" class="text-center text-muted">
          No matching properties found.
        </div>

        <!-- v-for with v-on (click), v-bind (:src and :alt) -->
        <div class="col-md-4" v-for="house in filteredHouses" :key="house.id">
          <div class="card shadow h-100" @click="handleCardClick(house.title)">
            <img
              :src="require(`@/assets/${house.image}`)"
              :alt="house.title"
              class="card-img-top"
              style="height: 300px; object-fit: cover;"
            />
            <div class="card-body">
              <h5 class="card-title">{{ house.title }}</h5>
              <p class="card-text">
                <strong>Location:</strong> {{ house.location }}<br />
                <strong>Type:</strong> {{ house.type }}<br />
                <strong>Price:</strong> ${{ house.price.toLocaleString() }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER SECTION -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</template>

<script>
import houses from '@/assets/houses.json'
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
      houses,
      filters: {
        title: '',
        type: '',
        location: ''
      }
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
  methods: {
    handleCardClick(title) {
      alert(`You clicked on "${title}"`);
    }
  }
}
</script>

<style scoped>
.form-control:focus,
.form-select:focus {
  border-color: #6c63ff;
  box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
}
</style>
