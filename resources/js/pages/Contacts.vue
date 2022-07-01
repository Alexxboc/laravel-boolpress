<template>
  <div class="single-page">
    <div class="p-5 bg-light">
      <div class="container">
        <h1 class="display-3">Contacts</h1>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate,
          voluptatibus!
        </p>
        <hr class="my-2" />
      </div>
    </div>
    <div class="content container">
      <vue-form method="post" action="/contact-form">
        <div class="mb-3 d-flex flex-column">
          <label for="" class="form-label">Full Name</label>
          <input
            type="text"
            name="full_name"
            id="full_name"
            class="Your Name"
            placeholder="Mario Rossi"
            aria-describedby="FullNameHelper"
          />
          <small id="FullNameHelper" class="text-muted">type your name</small>
        </div>

        <div class="mb-3 d-flex flex-column">
          <label for="" class="form-label">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            class="Your email"
            placeholder="mariorossi@email.it"
            aria-describedby="EmailHelper"
          />
          <small id="EmailHelper" class="text-muted">type your email</small>
        </div>

        <div class="mb-3 d-flex flex-column">
          <label for="" class="form-label">Subject</label>
          <input
            type="text"
            name="subject"
            id="subject"
            class="Your subject"
            placeholder="Subject"
            aria-describedby="SubjectHelper"
          />
          <small id="SubjectHelper" class="text-muted">type subject</small>
        </div>

        <div class="mb-3 d-flex flex-column">
          <label for="message" class="form-label">Message</label>
          <textarea
            class="form-control"
            name="message"
            id="message"
            rows="3"
          ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </vue-form>
    </div>
  </div>
</template>

<script>
import VueForm from '../components/VueForm.vue'
export default {
    name: "Contacts",
    components: {
        VueForm
    }
};
</script>