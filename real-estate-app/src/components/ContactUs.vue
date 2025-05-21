<template>
<div>
    <!-- NAVIGATION BAR -->
    <section class="navbar-section">
        <NavBar />
    </section>

  <div class="contact-section d-flex align-items-center justify-content-center">
    <div class="container-fluid container-md">
      <div class="row align-items-center">
        <!-- LEFT: Contact Form -->
        <div class="col-lg-6">
          <h2 class="section-title">Get in touch</h2>
          <form @submit.prevent="submitForm" novalidate>
            <!-- Name & Email -->
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <input
                  type="text"
                  class="form-control custom-input"
                  v-model="form.name"
                  :class="{ 'is-invalid': errors.name }"
                  required
                  placeholder="Your Name"
                />
                <div class="invalid-feedback">Letters only</div>
              </div>
              <div class="col-md-6">
                <input
                  type="email"
                  class="form-control custom-input"
                  v-model="form.email"
                  :class="{ 'is-invalid': errors.email }"
                  required
                  placeholder="Your Email"
                />
                <div class="invalid-feedback">Valid email required</div>
              </div>
            </div>

            <!-- Phone & Property -->
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <input
                  type="text"
                  class="form-control custom-input"
                  v-model="form.phone"
                  :class="{ 'is-invalid': errors.phone }"
                  required
                  placeholder="Phone Number"
                />
                <div class="invalid-feedback">Numbers only</div>
              </div>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control custom-input"
                  v-model="form.property"
                  :class="{ 'is-invalid': errors.property }"
                  required
                  placeholder="Interested Property"
                />
                <div class="invalid-feedback">Required</div>
              </div>
            </div>

            <!-- Message -->
            <div class="mb-3">
              <textarea
                class="form-control custom-input"
                rows="4"
                v-model="form.message"
                :class="{ 'is-invalid': errors.message }"
                required
                placeholder="Your Message"
              ></textarea>
              <div class="invalid-feedback">At least 10 characters</div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
              Submit <i class="fa-solid fa-arrow-right ms-2"></i>
            </button>
          </form>
        </div>

        <!-- RIGHT: Illustration -->
        <div class="col-lg-6 text-center mt-5 mt-lg-0">
          <img class="img-fluid" src="@/assets/right_img.png" alt="Illustration" class="img-fluid" style="max-width: 400px;" />
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
import NavBar from '@/components/NavBar.vue'
import SiteFooter from '@/components/SiteFooter.vue'

export default {
  name: 'ContactUs',
  components: {
    NavBar,
    SiteFooter
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        phone: '',
        property: '',
        message: ''
      },
      errors: {}
    };
  },
  methods: {
    validateForm() {
      this.errors = {};
      if (!this.form.name.match(/^[A-Za-z ]+$/)) this.errors.name = true;
      if (!this.form.email.match(/^\S+@\S+\.\S+$/)) this.errors.email = true;
      if (!this.form.phone || !this.form.phone.match(/^[0-9]+$/)) this.errors.phone = true;
      if (!this.form.property.trim()) this.errors.property = true;
      if (!this.form.message || this.form.message.length < 10) this.errors.message = true;
      return Object.keys(this.errors).length === 0;
    },
    submitForm() {
      if (!this.validateForm()) return;
      alert(`Thanks ${this.form.name}, your message has been submitted!`);
      this.form = {
        name: '',
        email: '',
        phone: '',
        property: '',
        message: ''
      };
      this.errors = {};
    }
  }
};
</script>


<style scoped>
.contact-section {
  min-height: 100vh;
  background: linear-gradient(120deg, #fce3ec, #ffe8d1);
  padding: 4rem 1rem;
}

.section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #7e44b8;
  margin-bottom: 2rem;
  position: relative;
}
.section-title::after {
  content: '';
  display: block;
  width: 50px;
  height: 3px;
  background: #7e44b8;
  margin-top: 5px;
}

.custom-input {
  background: #fff;
  border: none;
  border-radius: 30px;
  padding: 0.75rem 1.25rem;
  font-size: 1rem;
  box-shadow: 0 0 0 2px transparent;
  transition: 0.3s ease;
}
.custom-input:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(126, 68, 184, 0.2);
}

.submit-btn {
  background: linear-gradient(to right, #f27121, #e94057, #8a2387);
  border: none;
  color: white;
  font-weight: 600;
  padding: 0.65rem 1.8rem;
  border-radius: 30px;
  transition: all 0.3s ease;
}
.submit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}
</style>
