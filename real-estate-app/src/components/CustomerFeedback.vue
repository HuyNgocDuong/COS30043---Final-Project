<template>
  <div class="container py-5 text-center">
    <!-- Section Title -->
    <h2 class="fw-bold mb-1">
      Customer <span class="fw-light text-decoration-underline">Testimonials</span>
    </h2>
    <p class="text-muted mb-5">Real Stories from Those Who Found Home with Us</p>

    <!-- Testimonial Cards -->
    <div class="row justify-content-center">
      <div class="col-md-4 mb-4" v-for="(testimonial, index) in testimonials" :key="index">
        <div class="card shadow-sm p-4">
          <!-- Top: Circular Image -->
          <img
            :src="require(`@/assets/${testimonial.image}`)"
            class="testimonial-img rounded-circle mx-auto"
            alt="User image"
          />

          <!-- Name and Title -->
          <h5 class="fw-semibold mt-3 mb-1">{{ testimonial.name }}</h5>
          <small class="text-muted">{{ testimonial.title }}</small>

          <!-- Star Rating -->
          <div class="text-danger my-2">
            <span v-for="n in 5" :key="n">
              <i : class="fas n <= testimonial.rating ? 'fa-star' : 'fa-star text-muted'"></i>
            </span>
          </div>

          <!-- Feedback -->
          <p class="text-muted small mt-5">
            {{ testimonial.feedback }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CustomerTestimonials",
  data() {
    return {
      testimonials: [
        {
          name: "Donald Jackman",
          title: "Marketing Manager",
          image: "human 1.png",
          rating: 5,
          feedback:
            "From the very first meeting, they understood my vision and helped me find the perfect property. Their attention to detail and commitment to client satisfaction is unmatched."
        },
        {
          name: "Richard Nelson",
          title: "UI/UX Designer",
          image: "human 2.png",
          rating: 4,
          feedback:
            "From the very first meeting, they understood my vision and helped me find the perfect property. Their attention to detail and commitment to client satisfaction is unmatched."
        },
        {
          name: "James Washington",
          title: "Co-Founder",
          image: "human 3.png",
          rating: 5,
          feedback:
            "From the very first meeting, they understood my vision and helped me find the perfect property. Their attention to detail and commitment to client satisfaction is unmatched."
        }
      ]
    };
  }
};
</script>

<style scoped>
.card {
  border: none;
  border-radius: 12px;
  transition: transform 0.3s ease;
  height: 500px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 2rem 1.5rem;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
  background-color: #fff;
}

.card:hover {
  transform: translateY(-5px);
}

.testimonial-img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
}

.card h5 {
  font-size: 1.2rem;
  font-weight: 600;
  margin-top: 1rem;
  margin-bottom: 0.25rem;
}

.card small {
  font-size: 0.95rem;
  color: #777;
  margin-bottom: 0.75rem;
}

.card .text-danger {
  font-size: 1.1rem;
  margin-bottom: 0.75rem;
}

.card p {
  font-size: 0.95rem;
  line-height: 1.5;
  color: #444;
  margin: 0; 
}

h2.fw-bold {
  font-size: 2.8rem;
}

h2.fw-bold .fw-light {
  font-weight: 400;
  text-decoration: underline;
}

p.text-muted.mb-5 {
  font-size: 1rem;
  margin-bottom: 2rem;
}
</style>
