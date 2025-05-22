<template>
  <div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Add New Property Listing</h2>

    <!-- Back to Manage Listings Button -->
    <div class="text-start mb-3">
      <router-link to="/manage-listings" class="btn btn-outline-secondary rounded-pill px-4">
        ← Back to Manage Listings
      </router-link>
    </div>

    <div class="card p-4 shadow-sm mx-auto" style="max-width: 600px;">
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" v-model="form.title" class="form-control" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Location</label>
          <select v-model="form.location" class="form-select" required>
            <option value="">Select location</option>
            <option>Melbourne</option>
            <option>Sydney</option>
            <option>Brisbane</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Type</label>
          <select v-model="form.type" class="form-select" required>
            <option value="">Select type</option>
            <option>Villa</option>
            <option>Apartment</option>
            <option>House</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Price</label>
          <input type="number" v-model="form.price" class="form-control" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Image Filename</label>
          <input type="text" v-model="form.image" class="form-control" placeholder="e.g., house1.png" required />
        </div>

        <div v-if="error" class="alert alert-danger">{{ error }}</div>
        <div v-if="success" class="alert alert-success">Property added successfully!</div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary rounded-pill px-4">Add Property</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CreateProperty',
  data() {
    return {
      form: {
        title: '',
        location: '',
        type: '',
        price: '',
        image: ''
      },
      error: '',
      success: false
    };
  },
  methods: {
    submitForm() {
      this.error = '';
      this.success = false;

      const formData = new FormData();
      formData.append('title', this.form.title);
      formData.append('location', this.form.location);
      formData.append('type', this.form.type);
      formData.append('price', this.form.price);
      formData.append('image', this.form.image);

      fetch('https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/php/create_property.php', {
        method: 'POST',
        body: formData
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            this.success = true;
            setTimeout(() => {
              this.$router.push('/manage-listings');
            }, 1200);
          } else {
            this.error = data.error || 'Submission failed.';
          }
        })
        .catch((err) => {
          console.error(err);
          this.error = 'Server error. Please try again.';
        });
    }
  }
};
</script>

<style scoped>
form label {
  font-weight: 500;
}
</style>
