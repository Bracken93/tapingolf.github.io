<?php
require "header.php";

?>

<div class="card mx-auto" style="max-width: 540px;">

  <div class="card-body">

    <h3 class="card-title">Contact Us</h3>
    <h6 class="card-text mb-2">Send us a message here, we'll get back to you soon.</h6>

    <form  method="post" action="formaction.php" novalidate="novalidate">

      <div class="form-group">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" placeholder="Your Name">

      </div>

      <div class="form-group">

        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" placeholder="yourname@example.com">

      </div>

      <div class="form-group">

        <label for="phone">Phone</label>
        <input class="form-control" type="tel" name="phone" placeholder="+353 87 123 4567">

      </div>

      <div class="form-group">

        <label for="queries">Message</label>
        <textarea class="form-control" rows="5" name="queries" placeholder="Write your message here..."></textarea>

      </div>

      <button class="btn btn-primary" type="submit" name="submit" id="submit">Send message</button>

    </form>

  </div>

</div