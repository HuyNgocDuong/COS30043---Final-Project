<template>
  <div>
    <!--NavBar Section-->
    <section class="navbar-section">
      <NavBar/>
    </section>
    <div class="container py-5 mt-">
      <h2 class="text-center fw-bold mb-4">Latest News</h2>

      <!-- Error or loading state -->
      <div v-if="loading" class="text-center text-muted">Loading news...</div>
      <div v-if="error" class="alert alert-danger text-center">{{ error }}</div>

      <!-- News articles -->
      <div class="row g-4" v-if="articles.length > 0">
        <div class="col-md-4" v-for="(article, index) in articles" :key="index">
          <div class="card h-100 shadow-sm">
            <img
              :src="article.urlToImage || fallbackImage"
              class="card-img-top"
              :alt="article.title"
              style="height: 200px; object-fit: cover;"
            />
            <div class="card-body">
              <h5 class="card-title">{{ article.title }}</h5>
              <p class="card-text">
                {{ article.description || 'No description available.' }}
              </p>
            </div>
            <div class="card-footer bg-white border-0 text-end">
              <a :href="article.url" target="_blank" class="btn btn-sm btn-outline-primary">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer Section-->
    <section class="footer-section">
      <SiteFooter/>
    </section>
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue'
import SiteFooter from '@/components/SiteFooter.vue'
export default {
  name: 'NewsPage',
  components:{
    NavBar,
    SiteFooter
  },
  data() {
    return {
      articles: [],
      loading: false,
      error: null,
      fallbackImage: 'https://via.placeholder.com/400x200?text=No+Image'
    };
  },
  mounted() {
    this.fetchNews();
  },
  methods: {
    async fetchNews() {
      this.loading = true;
      this.error = null;
      try {
        const response = await fetch(
          'https://newsapi.org/v2/everything?q=real+estate+australia&language=en&sortBy=publishedAt&apiKey=fa459d88617643ed931e9340451cfcee'
        );
        const data = await response.json();
        console.log('NewsAPI Response:', data); // For debugging

        if (data.status === 'ok') {
          this.articles = data.articles;
        } else {
          this.error = data.message || 'Failed to load news';
        }
      } catch (err) {
        console.error('Fetch error:', err); // For debugging
        this.error = 'Network error. Please check your internet connection or API key.';
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>
