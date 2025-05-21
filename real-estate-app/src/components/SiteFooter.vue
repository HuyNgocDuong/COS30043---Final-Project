<template>
  <footer class="footer-section text-center text-white py-4">
    <div class="footer-links mb-3">
      <router-link to="/home" class="footer-link">Home</router-link>
      <router-link to="/about" class="footer-link">About</router-link>
      <router-link to="/properties" class="footer-link">Properties</router-link>
      <router-link to="/news" class="footer-link">News</router-link>
      <router-link to="/contact" class="footer-link">Contact</router-link>
    </div>

    <div class="social-icons mb-4">
      <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-tiktok"></i></a>
    </div>

    <hr class="footer-divider mb-3" />

    <div class="footer-bottom small">
      <a href="#" class="footer-link">Privacy Policy</a> ·
      <a href="#" class="footer-link">Legal</a> ·
      © 2025 Urban Haven. All rights reserved.
    </div>
  </footer>
</template>

<style scoped>
.footer-section {
  background-color: #333;
  color: #ccc;
  padding-top: 3rem;
  padding-bottom: 2rem;
}

.footer-link {
  margin: 0 1rem;
  color: #ccc;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 500;
}

.footer-link:hover {
  text-decoration: underline;
}

.social-icons {
  display: flex;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 42px;
  height: 42px;
  border: 1px solid #fff;
  border-radius: 50%;
  color: #fff;
  font-size: 1.2rem;
  transition: all 0.3s ease;
}

.social-icon:hover {
  background-color: #fff;
  color: #333;
}

.footer-divider {
  border: none;
  border-top: 1px solid #555;
  max-width: 90%;
  margin: 0 auto 1rem auto;
}

.footer-bottom {
  font-size: 0.85rem;
  color: #fff;
  padding: 0 1rem;
  word-wrap: break-word;
  text-align: center;
}

@media (max-width: 576px) {
  .footer-link {
    display: block;
    margin: 0.5rem 0;
    font-size: 0.9rem;
  }

  .footer-links {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .social-icon {
    width: 36px;
    height: 36px;
    font-size: 1rem;
  }

  .footer-bottom {
    font-size: 0.8rem;
    line-height: 1.5;
  }
}

</style>
