<template>
  <div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Latest News</h2>

    <div v-if="loading" class="text-center text-muted">Loading news...</div>
    <div v-if="error" class="text-danger text-center">{{ error }}</div>

    <div class="row g-4" v-if="articles.length > 0">
      <div class="col-md-4" v-for="(article, index) in articles" :key="index">
        <div class="card h-100 shadow">
          <img
            :src="article.urlToImage || fallbackImage"
            class="card-img-top"
            :alt="article.title"
            style="height: 200px; object-fit: cover;"
          />
          <div class="card-body">
            <h5 class="card-title">{{ article.title }}</h5>
            <p class="card-text">{{ article.description || 'No description available.' }}</p>
          </div>
          <div class="card-footer bg-white border-0 text-end">
            <a :href="article.url" target="_blank" class="btn btn-sm btn-outline-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NewsPage',
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
      try {
        const response = await fetch(
          `https://newsapi.org/v2/top-headlines?country=au&pageSize=9&apiKey=fa459d88617643ed931e9340451cfcee`
        );
        const data = await response.json();
        if (data.status === 'ok') {
          this.articles = data.articles;
        } else {
          this.error = data.message || 'Failed to load news';
        }
      } catch (err) {
        this.error = 'Network error';
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>
