<template>
<div>
<!-- NAVIGATION BAR -->
    <section class="navbar-section">
        <NavBar />
    </section>
  <div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Compare Properties</h2>

    <div v-if="selectedProperties.length >= 2" class="row g-4 justify-content-center">
      <div
        v-for="property in selectedProperties"
        :key="property.id"
        class="col-md-4"
      >
        <div class="card h-100 shadow-sm">
          <img
            :src="require(`@/assets/${property.image}`)"
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

    <!-- Return Button -->
    <div class="text-center mt-5">
      <router-link to="/properties" class="btn btn-secondary rounded-pill px-4">
        <i class="bi bi-arrow-left-circle me-2"></i>Return to Listings
      </router-link>
    </div>

     <!-- FOOTER SECTION -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</div>
</template>

<script>
import properties from '@/assets/houses.json'
import NavBar from '@/components/NavBar.vue'
import SiteFooter from '@/components/SiteFooter.vue'

export default {
  name: 'ComparePage',
  components:{
    NavBar,
    SiteFooter
  },
  computed: {
    selectedProperties() {
      const params = new URLSearchParams(this.$route.query)
      const ids = params.get('ids')
      if (!ids) return []

      const idList = ids.split(',').map(id => parseInt(id))
      return properties.filter(p => idList.includes(p.id))
    }
  }
}
</script>
