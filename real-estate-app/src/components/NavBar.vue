<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm w-100 px-5 py-4 nav-tall">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-4">
          <router-link to="/home" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item me-4">
          <router-link to="/about" class="nav-link">About</router-link>
        </li>
        <li class="nav-item me-4">
          <router-link to="/properties" class="nav-link">Properties</router-link>
        </li>
        <li class="nav-item me-4">
          <router-link to="/news" class="nav-link">News</router-link>
        </li>
      </ul>

      <div class="navbar-logo text-center position-absolute top-50 start-50 translate-middle">
        <img src="@/assets/logo.png" alt="Logo" class="logo-img" />
      </div>

      <div class="d-flex align-items-center gap-3">
        <router-link to="/signup" class="btn btn-outline-dark">Sign Up</router-link>
        <router-link to="/login" class="btn btn-outline-dark">Login</router-link>
        <router-link to="/contact" class="btn btn-outline-dark">Contact Us</router-link>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.nav-tall {
  min-height: 120px;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 10;
  background-color: #fff;
}

.logo-img {
  height: auto;
  width: 270px;
  max-width: 100%;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}
</style>
