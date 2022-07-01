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

      <form action="/contact-form" method="post">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full name</label>
          <input
            type="text"
            name="full_name"
            id="full_name"
            class="form-control"
            placeholder="mario rossi"
            aria-describedby="helpId"
          />
          <small id="helpId" class="text-muted">Type your name</small>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Full name</label>
          <input
            type="text"
            name="email"
            id="email"
            class="form-control"
            placeholder="info@"
            aria-describedby="helpId"
          />
          <small id="helpId" class="text-muted">Type your email</small>
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input
            type="text"
            name="subject"
            id="subject"
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
          />
          <small id="helpId" class="text-muted">Type your subject</small>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
         <div class="mb-3">
           <label for="message" class="form-label"></label>
           <textarea class="form-control" name="message" id="message" rows="3"></textarea>
         </div>
          <small id="helpId" class="text-muted">Type your message</small>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "About",
};
</script>