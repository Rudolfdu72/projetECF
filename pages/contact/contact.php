<?php 
  include "../../components/header.php";
?>
<P id="commercial-text">Une question, des renseignements sur nos service? Merci de nous contacter via le formulaire de contact</P>
<h1 id="title">Contact</h1>
<form method="POST" class="contact-container">
  <div>
    <label for="">Votre nom:</label>
    <input type="text" id="lastname" placeholder="Votre nom" class="input-form">
  </div>
  <div>
    <label for="">Votre mail:</label>
    <input type="email" id="email" placeholder="Votre mail" class="input-form">
  </div>
  <div>
    <label for="">Votre téléphone:</label>
    <input type="tel" id="phonenumber" placeholder="Votre numéro de téléphone" class="input-form">
  </div>
  <div>
    <label for="">Votre message ici:</label>
    <textarea name="message" id="message" placeholder="Votre message" class="input-form"></textarea>
  </div>
  <div>
    <input type="button" value="envoyer" id="submit-button">
  </div>
</form>
  <?php 
    include "../../components/footer.php";
  ?>