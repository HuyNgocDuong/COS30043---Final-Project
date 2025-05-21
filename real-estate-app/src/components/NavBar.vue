<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top nav-tall px-3 px-lg-5 py-3 py-lg-4">
    <div class="container-fluid">
      <!-- Logo (Mobile view) -->
      <router-link to="/" class="navbar-brand d-lg-none">
        <img class="img-fluid" src="@/assets/logo.png" alt="Urban Haven Logo" class="logo-img-small" />
      </router-link>

      <!-- Toggler (hamburger) -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarContent"
        aria-controls="navbarContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
        <!-- Left Navigation -->
        <ul class="navbar-nav gap-lg-4 text-center text-lg-start">
          <li class="nav-item">
            <router-link to="/home" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/properties" class="nav-link">Properties</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/news" class="nav-link">News</router-link>
          </li>
        </ul>

        <!-- Centered Logo (Large screens only) -->
        <div class="navbar-logo d-none d-lg-block position-absolute top-50 start-50 translate-middle">
          <img class="img-fluid" src="@/assets/logo.png" alt="Urban Haven Logo" class="logo-img" />
        </div>

        <!-- Right Buttons -->
        <div class="d-flex flex-column flex-lg-row align-items-center gap-2 mt-3 mt-lg-0">
          <router-link to="/auth?mode=signup" class="btn btn-outline-dark w-100 w-lg-auto">Sign Up</router-link>
          <router-link to="/auth?mode=login" class="btn btn-outline-dark w-100 w-lg-auto">Login</router-link>
          <router-link to="/contact" class="btn btn-outline-dark w-100 w-lg-auto">Contact Us</router-link>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.nav-tall {
  min-height: 100px;
  z-index: 1050;
}

.logo-img {
  width: 260px;
  object-fit: contain;
  display: block;
}

.logo-img-small {
  width: 160px;
  object-fit: contain;
  display: block;
}
</style>
