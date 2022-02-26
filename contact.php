<?php
session_start();
if (!empty($_POST)) {
    $_SESSION['post'] = $_POST;

    if (
        isset($_POST['nom'], $_POST['mail'], $_POST['sujet'], $_POST['message'], $_POST['rgpd']) &&
        !empty($_POST['nom']) &&
        !empty($_POST['mail']) &&
        !empty($_POST['sujet']) &&
        !empty($_POST['message']) &&
        !empty($_POST['rgpd'])
    ) {
        $nom = strip_tags($_POST['nom']);
        $message = htmlentities($_POST['message']);
        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'][] = 'L\'email n\'est pas valide';
        }
        if (isset($_SESSION['message'])) {
            header('Location: contact.php');
            exit;
        }
        require_once 'includes/connect.php';


        $sql = "INSERT INTO `contacts`(`name`, `mail`, `message`, `subject_id`) VALUES (:nom, :email, :message, :sujet);";




        $requete = $db->prepare($sql);
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':email', $_POST['mail']);
        $requete->bindValue(':message', $message);
        $requete->bindValue(':sujet', $_POST['sujet']);
        $requete->execute();

        $sql1 = "SELECT * FROM `subjects` WHERE `id` = :id;";
        $result = $db->prepare($sql1);
        $result->bindValue(':id', $_POST['sujet'], PDO::PARAM_INT);
        $result->execute();



        $sujet = $result->fetch();
        $to = "anisbeny@gmx.fr";

        $subject = "{$sujet['value']}";

        $msg = wordwrap($message, 70, "\r\n");
        $headers = [
            "From" => $_POST['mail'],
            "Content-Type" => "text/html; charset=utf8"
        ];
        mail($to, $subject, $msg, $headers);
        $_SESSION['message'][] = 'Le formulaire a été envoyé';
        header('Location: contact.php');
    } else {
        $_SESSION['message'][] = 'Il faut remplir tous les champs obligatoires';
        header('Location: contact.php');
        exit;
    }
}
?>
<?php require_once 'includes/header.php'; ?>
<script src="js/form.js" defer></script>
    <title>Portfolio| Contact</title>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>  
    <main id="contact_page">
<h1>Me contacter</h1>
<section id="contact">

    <figure>
        <img src="images/contact.png" alt="contact et devis">
    </figure>
    <form method="post">
        <div class="champ">
            <label for="nom">nom<span>*</span></label>
            <input type="text" name="nom" id="nom" value="<?php
                                                                        echo $_SESSION['post']['nom'] ?? "";
                                                                        ?>">
            <span class="missname"></span>
        </div>
        <div class="champ">
            <label for="mail">e-mail<span>*</span></label>
            <input type="text" name="mail" id="mail" value="<?php
                                                                        echo $_SESSION['post']['mail'] ?? "";
                                                                        ?>">
            <span class="missmail"></span>
        </div>

        <div class="champ">
            <label for="sujet">sujet<span>*</span></label>

            <select name="sujet" id="sujet">
               
            <option value=""></option>
           
                            <?php 
                             require_once 'includes/connect.php';
                            $reponse = $db->query('SELECT * FROM `subjects`');
                            while ($donnees = $reponse->fetch()) {
                            ?>
                                <option value="<?php echo $donnees['id']; ?>"><?php echo $donnees['value']; ?></option>
                            <?php } ?>
            </select>
        </div>
        <div class="champ">
            <label for="message"> message<span>*</span></label>
            <textarea name="message" rows="5" id="message"></textarea>
            <span class="misstext"></span>
        </div>
        <div class="champ">
            <input type="checkbox" class="check" name="rgpd" id="rgpd">
            <span class="misscheck"></span>
            <label for="rgpd" class="text">J'accepte la collecte de mes données personnelles dans le cadre de cette
                demande de contact. Les données concernées seront utilisées exclusivement pour traiter ma
                demande.</label>
        </div>
        <div class="alertes">
                        <?php
                        if (isset($_SESSION['message'])) {
                            foreach ($_SESSION['message'] as $message) {
                                echo "<p>$message</p>";
                            }
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
        <div class="btn_form">
        <button type="submit" id="send">Envoyer</button>
        </div>
        
    </form>
</section>
    </main>
    <?php require_once 'includes/footer.php'; ?>
    <?php unset($_SESSION['post']); ?>
      
    </body>
    </html>