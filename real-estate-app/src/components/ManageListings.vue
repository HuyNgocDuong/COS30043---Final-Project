<template>
  <div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <div class="container py-5">
      <h2 class="fw-bold mb-4 text-center">Manage Property Listings</h2>

      <!-- Add New Button -->
      <div class="text-end mb-4">
        <a
          href="https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/create_property.php"
          class="btn btn-success rounded-pill px-4"
        >
          + Add New Listing
        </a>
      </div>

      <!-- Listings -->
      <div v-if="houses.length > 0" class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col" v-for="house in houses" :key="house.id">
          <div class="card h-100 shadow-sm d-flex flex-column">
            <!-- Image -->
            <img
              :src="`https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/images/${house.image}`"
              @error="handleImageError"
              class="card-img-top"
              :alt="house.title"
              style="height: 200px; object-fit: cover;"
            />

            <!-- Info -->
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ house.title }}</h5>
              <p class="card-text small text-muted">
                <strong>Type:</strong> {{ house.type }}<br />
                <strong>Location:</strong> {{ house.location }}<br />
                <strong>Price:</strong> ${{ house.price.toLocaleString() }}
              </p>

              <!-- Buttons -->
              <div class="mt-auto text-center d-flex flex-column gap-2">
                <router-link
                  :to="{ name: 'EditProperty', params: { id: house.id } }"
                  class="btn btn-warning btn-sm w-100"
                >
                </router-link>
                <button
                  class="btn btn-danger btn-sm w-100"
                  @click="deleteProperty(house.id)"
                >
                  🗑 Delete
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- No Listings Message -->
      <div v-else class="text-center text-muted">
        No property listings found.
      </div>
    </div>

    <!-- FOOTER SECTION -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue';
import SiteFooter from '@/components/SiteFooter.vue';

export default {
  name: 'ManageListings',
  components: {
    NavBar,
    SiteFooter
  },
  data() {
    return {
      houses: []
    };
  },
  mounted() {
    this.fetchListings();
  },
  methods: {
    fetchListings() {
      fetch('https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/houses.json?t=' + Date.now())
        .then(res => res.json())
        .then(data => {
          if (Array.isArray(data)) {
            this.houses = data;
          }
        })
        .catch(err => {
          console.error('Failed to fetch listings:', err);
        });
    },
    deleteProperty(id) {
  if (!confirm("Are you sure you want to delete this property?")) return;

  fetch('https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/delete_property.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      action: 'delete',
      id: id
    })
  })
  .then(async res => {
    const text = await res.text();
    try {
      const result = JSON.parse(text);
      console.log('Delete response:', result);
      if (result.success) {
        this.houses = this.houses.filter(h => h.id !== id);
      } else {
        alert('Delete failed: ' + (result.error || 'Unknown error'));
      }
    } catch (err) {
      console.error("Failed to parse JSON:", text);
      alert("Server returned invalid response.");
    }
  })
  .catch(err => {
    console.error("Network or server error:", err);
  });
}

  }
};
</script>

<style scoped>
.card-title {
  font-weight: bold;
}
</style>
