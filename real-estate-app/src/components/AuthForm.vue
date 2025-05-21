<template>
  <div : class="auth-container { 'sign-up-mode': isSignUp }">
    <div class="form-wrapper shadow p-5 rounded">
      <h2 class="text-center mb-4">{{ isSignUp ? 'Sign Up' : 'Login' }}</h2>

      <!-- LOGIN FORM -->
      <form v-if="!isSignUp" @submit.prevent="handleLogin" class="login-form" autocomplete="off">
        <div class="mb-3">
          <label for="loginEmail" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="loginEmail"
            name="login_email"
            v-model="login.email"
            required
            autocomplete="off"
            placeholder="Enter your email"
          />
        </div>
        <div class="mb-3">
          <label for="loginPassword" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="loginPassword"
            name="login_pass"
            v-model="login.password"
            required
            autocomplete="new-password"
            placeholder="Enter your password"
          />
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <p class="mt-3 text-center">
          Don't have an account?
          <a href="#" @click.prevent="toggleForm" class="toggle-link">Sign up</a>
        </p>
      </form>

      <!-- SIGN UP FORM -->
      <form v-else @submit.prevent="handleSignup" class="signup-form">
        <div class="mb-3">
          <label for="signupName" class="form-label">Full Name</label>
          <input
            type="text"
            class="form-control"
            id="signupName"
            v-model="signup.name"
            required
            autocomplete="name"
            placeholder="Enter your full name"
          />
        </div>
        <div class="mb-3">
          <label for="signupEmail" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="signupEmail"
            v-model="signup.email"
            required
            autocomplete="email"
            placeholder="Enter your email"
          />
        </div>
        <div class="mb-3">
          <label for="signupPassword" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="signupPassword"
            v-model="signup.password"
            required
            autocomplete="new-password"
            placeholder="Create a password"
          />
          <small class="form-text text-muted">Use at least 8 characters</small>
        </div>
        <button type="submit" class="btn btn-success w-100">Sign Up</button>
        <p class="mt-3 text-center">
          Already have an account?
          <a href="#" @click.prevent="toggleForm" class="toggle-link">Login</a>
        </p>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthForm",
  data() {
    return {
      isSignUp: false,
      login: {
        email: '',
        password: ''
      },
      signup: {
        name: '',
        email: '',
        password: ''
      },
      isLoading: false,
      errorMessage: ''
    };
  },
  methods: {
    toggleForm() {
      this.isSignUp = !this.isSignUp;
      this.errorMessage = '';
    },
    async handleLogin() {
      this.isLoading = true;
      this.errorMessage = '';
      
      try {
        console.log("Login submitted:", this.login);
        // Replace with your actual login API call
        // await authService.login(this.login.email, this.login.password);
        this.isLoading = false;
      } catch (error) {
        this.errorMessage = error.message || 'Login failed. Please try again.';
        this.isLoading = false;
      }
    },
    async handleSignup() {
      this.isLoading = true;
      this.errorMessage = '';

      try {
        const response = await fetch('http://localhost/your-folder/signup.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.signup)
        });

        const result = await response.json();

        if (response.ok && result.success) {
          alert('Signup successful!');
          this.signup.name = '';
          this.signup.email = '';
          this.signup.password = '';
          this.toggleForm(); // ✅ Switch to Login view
        } else {
          this.errorMessage = result.error || 'Signup failed';
        }
      } catch (err) {
        this.errorMessage = 'Unable to connect to server';
      }

      this.isLoading = false;
    }
  }
};
</script>

<style scoped>
.auth-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #f0f2f5;
  transition: background-color 0.3s ease;
}

.form-wrapper {
  background: white;
  width: 100%;
  max-width: 400px;
  transition: transform 0.4s ease;
}

.sign-up-mode .form-wrapper {
  transform: translateY(-20px);
}

.toggle-link {
  color: #0d6efd;
  text-decoration: none;
  font-weight: 500;
}

.toggle-link:hover {
  text-decoration: underline;
}

.form-control {
  padding: 10px 15px;
  border-radius: 5px;
  border: 1px solid #ced4da;
}

.btn {
  padding: 10px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #0d6efd;
  border-color: #0d6efd;
}

.btn-success {
  background-color: #198754;
  border-color: #198754;
}

.error-message {
  color: #dc3545;
  font-size: 0.875rem;
  margin-top: 5px;
}
</style>
<style scoped>
@media (max-width: 576px) {
  .form-wrapper {
    padding: 1rem !important;
  }
  .auth-container {
    padding: 1rem;
    min-height: auto;
  }
}
</style>
