
      <?php 
      include "../../components/header.php";
      ?>
    <p id="commercial-text">Une question, des renseignements sur un de nos véhicules? <br> Le formulaire de contact est à votre dispositions. Nous vous apporterons une réponse dans le plus bref délai</p>
    <h2 id="contacter-us" id="title">Contactez-nous</h2>
    <form method="POST" id="seller-contact-form">
      <div>
        <label for="">Votre nom:</label>
        <input type="text" id="user-lastname" placeholder="Votre nom">
      </div>
      <div>
        <label for="">Votre mail:</label>
        <input type="email" id="user-email" placeholder="Votre mail">
      </div>
      <div>
        <label for="">Votre téléphone:</label>
        <input type="number" id="user-phonenumber" placeholder="Votre numéro de téléphone">
      </div>
      <div>
        <label for="">Votre message:</label>
        <textarea name="message" id="user-message" placeholder="Votre message"></textarea>
      </div>
      <div>
        <input type="button" value="Envoyer" id="seller-button">
      </div>
    </form>
    <?php 
      include "../../components/footer.php";
      ?>