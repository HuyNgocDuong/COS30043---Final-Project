<template>
  <div>
    <!-- NavBar Section -->
    <section class="navbar-section">
      <NavBar />
    </section>

    <!-- Hero Banner -->
    <div class="news-hero-section d-flex justify-content-center align-items-center text-center position-relative mb-5 mt-5">
      <div class="news-hero-text text-white px-3">
        <h2 class="fw-bold display-4">Latest News</h2>
        <p class="lead">Stay updated with real estate insights and headlines</p>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
      <!-- Search Filters -->
      <div class="card p-3 mb-4 shadow-sm">
        <div class="row g-3">
          <div class="col-md-3">
            <input v-model="filters.title" class="form-control" placeholder="Search by title" />
          </div>
          <div class="col-md-3">
            <input v-model="filters.content" class="form-control" placeholder="Search by content" />
          </div>
          <div class="col-md-3">
            <select v-model="filters.category" class="form-select">
              <option value="">All Categories</option>
              <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
            </select>
          </div>
          <div class="col-md-3">
            <input v-model="filters.date" class="form-control" type="date" />
          </div>
        </div>
      </div>

      <!-- Toggle Favorites Button -->
      <div class="text-end mb-3">
        <button class="btn btn-outline-danger" @click="showFavoritesOnly = !showFavoritesOnly">
          {{ showFavoritesOnly ? 'Show All Articles' : 'Show Favorites Only' }}
        </button>
      </div>

      <!-- Loading / Error States -->
      <div v-if="loading" class="text-center text-muted">Loading news...</div>
      <div v-if="error" class="alert alert-danger text-center">{{ error }}</div>

      <!-- News Cards -->
      <div class="row g-4" v-if="filteredArticles.length > 0">
        <div class="col-md-4" v-for="article in filteredArticles" :key="article.url">
          <div class="card h-100 shadow-sm position-relative">
            <img
              :src="article.urlToImage || fallbackImage"
              class="card-img-top"
              :alt="article.title"
              style="height: 200px; object-fit: cover;"
            />
            <div class="card-body">
              <router-link
                v-if="article.url"
                :to="{ name: 'ArticleDetail', params: { url: encodeURIComponent(article.url) } }"
                class="text-decoration-none text-dark"
              >
                <h5 class="card-title">{{ article.title }}</h5>
              </router-link>
              <p class="card-text mb-1"><strong>Date:</strong> {{ article.publishedAt.slice(0, 10) }}</p>
              <p class="card-text"><strong>Category:</strong> {{ article.category }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-white border-0">
              <button class="btn btn-sm btn-outline-danger" @click="toggleFavorite(article)">
                <i :class="isFavorite(article) ? 'bi bi-heart-fill text-danger' : 'bi bi-heart'"></i>
              </button>
              <router-link
                :to="{ name: 'ArticleDetail', params: { url: encodeURIComponent(article.url) } }"
                class="btn btn-sm btn-outline-primary"
              >
                View Details
              </router-link>
            </div>
          </div>
        </div>
      </div>

      <div v-else-if="!loading" class="text-center text-muted">No articles match your search.</div>
    </div>

    <!-- Footer -->
    <section class="footer-section">
      <SiteFooter />
    </section>
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue';
import SiteFooter from '@/components/SiteFooter.vue';
import articles from '@/assets/articles.json';

export default {
  name: 'NewsPage',
  components: {
    NavBar,
    SiteFooter
  },
  data() {
    return {
      articles: [],
      loading: false,
      error: null,
      favorites: JSON.parse(localStorage.getItem('favorites')) || [],
      showFavoritesOnly: false,
      fallbackImage: 'https://via.placeholder.com/400x200?text=No+Image',
      filters: {
        title: '',
        content: '',
        category: '',
        date: ''
      },
      categories: ['Housing', 'Finance', 'Technology', 'Policy', 'Infrastructure']
    };
  },
  computed: {
    filteredArticles() {
      let result = this.articles.filter(a =>
        (!this.filters.title || a.title?.toLowerCase().includes(this.filters.title.toLowerCase())) &&
        (!this.filters.content || a.content?.toLowerCase().includes(this.filters.content.toLowerCase())) &&
        (!this.filters.category || a.category === this.filters.category) &&
        (!this.filters.date || a.publishedAt?.startsWith(this.filters.date))
      );

      if (this.showFavoritesOnly) {
        result = result.filter(a => this.favorites.includes(a.url));
      }
      return result;
    }
  },
  mounted() {
    this.fetchNews();
  },
  methods: {
    fetchNews() {
      this.loading = true;
      this.error = null;

      try {
        this.articles = articles.map((a, i) => ({
          ...a,
          urlToImage: require(`@/assets/${a.urlToImage}`),
          category: a.category || this.categories[i % this.categories.length]
        }));

        localStorage.setItem('articles', JSON.stringify(this.articles));
      } catch (err) {
        console.error('Local import error:', err);
        this.error = 'Unable to load local article data.';
      } finally {
        this.loading = false;
      }
    },
    toggleFavorite(article) {
      const articleId = article.url;
      if (this.favorites.includes(articleId)) {
        this.favorites = this.favorites.filter(f => f !== articleId);
      } else {
        this.favorites.push(articleId);
      }
      localStorage.setItem('favorites', JSON.stringify(this.favorites));
    },
    isFavorite(article) {
      return this.favorites.includes(article.url);
    }
  }
};
</script>


<style scoped>
.news-hero-section {
  background-image: url('@/assets/house 8.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 70vh;
  width: 100%;
  position: relative;
}

.news-hero-text {
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

/* Responsive */
@media (max-width: 576px) {
  .news-hero-section {
    height: 50vh;
  }

  .news-hero-text h2 {
    font-size: 1.75rem;
  }

  .news-hero-text p {
    font-size: 1rem;
  }
}
</style>
