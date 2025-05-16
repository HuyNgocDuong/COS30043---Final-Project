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
        <div class="card shadow-sm p-4 h-100">
          <img
            :src="require(`@/assets/${testimonial.image}`)"
            class="rounded-circle mx-auto mb-3"
            style="width: 80px; height: 80px;"
            alt="User image"
          />
          <h5 class="fw-semibold mb-0">{{ testimonial.name }}</h5>
          <small class="text-muted">{{ testimonial.title }}</small>
          <div class="text-danger my-2">
            <span v-for="n in 5" :key="n">
              <i class="fas" :class="n <= testimonial.rating ? 'fa-star' : 'fa-star text-muted'"></i>
            </span>
          </div>
          <p class="text-muted small">
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
          rating: 3,
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
  border-radius: 10px;
  transition: transform 0.3s;
}
.card:hover {
  transform: translateY(-5px);
}
</style>
