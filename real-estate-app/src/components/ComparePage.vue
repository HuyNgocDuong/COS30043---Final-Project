<template>
  <div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <div class="container py-5">
      <h2 class="text-center fw-bold mb-5">Compare Properties</h2>

      <!-- Comparison Section -->
      <div v-if="compared.length >= 2" class="row g-4 justify-content-center">
        <div
          v-for="property in compared"
          :key="property.id"
          class="col-md-4"
        >
          <div class="card h-100 shadow-sm">
            <img
              :src="getImageUrl(property.image)"
              class="card-img-top"
              :alt="property.title"
              style="height: 250px; object-fit: cover;"
            />
            <div class="card-body">
              <h5 class="card-title">{{ property.title }}</h5>
              <p class="card-text">
                <strong><i class="fa-solid fa-location-dot me-1"></i> Address:</strong> {{ property.address }}<br />
                <strong><i class="fa-solid fa-tag me-1"></i> Type:</strong> {{ property.houseType }}<br />
                <strong><i class="fa-solid fa-bed me-1"></i> Bedrooms:</strong> {{ property.bedrooms }}<br />
                <strong><i class="fa-solid fa-bath me-1"></i> Bathrooms:</strong> {{ property.bathrooms }}<br />
                <strong><i class="fa-solid fa-school me-1"></i> Schools Nearby:</strong> {{ property.schoolsNearby }}<br />
                <strong><i class="fa-solid fa-landmark me-1"></i> Council:</strong> {{ property.councilArea }}<br />
                <strong><i class="fa-solid fa-envelope me-1"></i> Postcode:</strong> {{ property.postcode }}<br />
                <strong><i class="fa-solid fa-map-marker-alt me-1"></i> Distance:</strong> {{ property.distance }}<br />
                <strong><i class="fa-solid fa-dollar-sign me-1"></i> Price:</strong> ${{ property.price.toLocaleString() }}
              </p>

              <router-link :to="`/property/${property.id}`" class="btn btn-outline-primary btn-sm w-100">
                View Details
              </router-link>
            </div>
          </div>
        </div>
      </div>

      <!-- Message if fewer than 2 properties -->
      <div v-else class="alert alert-warning text-center">
        Please select at least two properties to compare.
      </div>

      <!-- Return Button -->
      <div class="text-center mt-5">
        <router-link to="/properties" class="btn btn-secondary rounded-pill px-4">
          <i class="bi bi-arrow-left-circle me-2"></i>Return to Listings
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
  name: 'ComparePage',
  components: {
    NavBar,
    SiteFooter
  },
  data() {
    return {
      allHouses: [],
      compared: []
    }
  },
  mounted() {
    const params = new URLSearchParams(this.$route.query);
    const ids = params.get('ids')?.split(',').map(id => parseInt(id)) || [];

    fetch('https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/houses.json')
      .then(res => res.json())
      .then(data => {
        this.allHouses = data;
        this.compared = data.filter(h => ids.includes(h.id));
      })
      .catch(err => {
        console.error('Failed to load comparison data:', err);
      });
  },
  methods: {
    getImageUrl(imageName) {
      // Properly encode the image name to handle spaces and special characters
      const encoded = encodeURIComponent(imageName);
      return `https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/images/${encoded}`;
    }
  }
}
</script>
