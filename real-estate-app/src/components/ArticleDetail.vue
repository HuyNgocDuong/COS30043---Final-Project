<template>
  <div>
    <!-- Back Button -->
    <div class="container pt-4">
      <router-link to="/news" class="text-decoration-none text-secondary mb-3 d-inline-block">
        ← Back to News
      </router-link>
    </div>

    <!-- Main Content -->
    <div class="container py-4 d-flex justify-content-center">
      <div class="w-100" style="max-width: 100%;">
        <div v-if="article">
          <!-- Title + Favorite -->
          <div class="d-flex justify-content-between align-items-start mb-3">
            <h2 class="fw-bold">{{ article.title }}</h2>
            
          </div>

          <!-- Image -->
          <img
            :src="article.urlToImage || fallbackImage"
            class="img-fluid mx-auto d-block mb-4 shadow rounded"
            style="max-height: 400px; width: 100%; max-width: 100%; object-fit: cover;"
          />

          <!-- Published Date -->
          <p class="text-muted mb-2"><strong>Published:</strong> {{ article.publishedAt }}</p>

         <!-- Rating Stars -->
          <div class="mb-4">
            <span class="me-2"><strong>Rate this article:</strong></span>
            <i
              v-for="star in 5"
              :key="star"
              :class="star <= rating ? 'bi bi-star-fill text-warning' : 'bi bi-star text-secondary'"
              style="cursor: pointer; font-size: 1.5rem;"
              @click="setRating(star)"
            ></i>
          </div>


          <!-- Content -->
          <div v-html="article.content || article.description" class="mb-4"></div>

          <!-- Read Original Button -->
          <a :href="article.url" target="_blank" class="btn btn-primary">Read Original</a>
        </div>

        <div v-else>
          <p class="text-muted">Article not found.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ArticleDetail',
  data() {
    return {
      article: null,
      fallbackImage: 'https://via.placeholder.com/850x400?text=No+Image',
      rating: 0,
      userEmail: localStorage.getItem('user_email') || null
    };
  },
  mounted() {
    const allArticles = JSON.parse(localStorage.getItem('articles')) || [];
    const encodedUrl = this.$route.params.url;
    const decodedUrl = decodeURIComponent(encodedUrl);

    this.article = allArticles.find((a) => a.url === decodedUrl);
    if (!this.article || !this.userEmail) return;

    const userRatingsKey = `ratings_${this.userEmail}`;
    const userRatings = JSON.parse(localStorage.getItem(userRatingsKey)) || {};
    this.rating = userRatings[this.article.url] || 0;
  },
  methods: {
    setRating(value) {
      this.rating = value;

      if (!this.userEmail || !this.article) return;

      const userRatingsKey = `ratings_${this.userEmail}`;
      const userRatings = JSON.parse(localStorage.getItem(userRatingsKey)) || {};
      userRatings[this.article.url] = value;
      localStorage.setItem(userRatingsKey, JSON.stringify(userRatings));
    }
  }
};
</script>

<style scoped>
.bi-star,
.bi-star-fill {
  transition: color 0.3s;
}
</style>  