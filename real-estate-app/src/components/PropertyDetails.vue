<template>
  <div class="container py-5">
    <!-- Page Title -->
    <h2 class="text-center fw-bold mb-4 text-purple">Property Details</h2>

    <!-- Info Badges -->
    <div class="bg-light rounded-4 p-4 mb-4 d-flex flex-wrap justify-content-center gap-3 shadow-sm text-center">
      <span class="badge bg-warning text-dark fs-6 px-3 py-2">
        <i class="bi bi-geo-alt-fill me-1"></i>{{ property.address }}
      </span>
      <span class="badge bg-success text-white fs-6 px-3 py-2">
        <i class="bi bi-house-fill me-1"></i>Type: {{ property.houseType }}
      </span>
      <span class="badge bg-danger text-white fs-6 px-3 py-2">
        <i class="bi bi-mortarboard-fill me-1"></i>Schools Nearby: {{ property.schoolsNearby }}
      </span>
      <span class="badge bg-info text-white fs-6 px-3 py-2">
        <i class="bi bi-building me-1"></i>Council Area: {{ property.councilArea }}
      </span>
    </div>

    <!-- Image -->
    <div class="property-image-wrapper mb-4">
      <img
        :src="require(`@/assets/${property.image}`)"
        alt="Property Image"
        class="img-fluid rounded shadow"
        style="max-height: 600px; object-fit: cover;"
      />
    </div>

    <!-- Key Details -->
    <div class="text-center border-top pt-3 fs-6 d-flex flex-wrap justify-content-center gap-4 mb-5">
      <span><i class="bi bi-bed-fill me-1"></i><strong>Bedrooms:</strong> {{ property.bedrooms }}</span>
      <span><i class="bi bi-badge-wc-fill me-1"></i><strong>Bathrooms:</strong> {{ property.bathrooms }}</span>
      <span><i class="bi bi-geo me-1"></i><strong>Postcode:</strong> {{ property.postcode }}</span>
      <span><i class="bi bi-signpost-2-fill me-1"></i><strong>Distance:</strong> {{ property.distance }}</span>
    </div>

    <!-- Back Button -->
    <div class="text-center">
      <router-link to="/properties" class="btn btn-outline-secondary rounded-pill px-4 py-2">
        <i class="bi bi-arrow-left-circle me-2"></i>Back to Listings
      </router-link>
    </div>
  </div>
</template>

<script>
import properties from '@/assets/houses.json'

export default {
  props: ['id'],
  computed: {
    property() {
      return properties.find(p => p.id === parseInt(this.id))
    }
  }
}
</script>

<style scoped>
.text-purple {
  color: #a259ff;
}

.property-image-wrapper {
  width: 100%;
  overflow: hidden;
  border-radius: 16px;
}

.property-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  max-height: 600px;
}

</style>
