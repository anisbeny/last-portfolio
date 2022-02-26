<?php require_once 'includes/header.php'; ?>

    <title>Portfolio Anis Ben Youssef</title>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>  

    <main id="home_page">
        <section id="presentation">
            <article class="about">
                <h1> Présentation</h1>
                <p>Après 7 ans d'expérience professionnelle dans la restauration. Je me suis reconverti vers le développement web via une formation de web designer. Au cours de ma formation chez <a href="https://www.onlineformapro.com/">ONLINE FORMAPRO </a>j'ai acquis des nouvelles compétences à travers différents projets réalisés au cours de ma formation.</p>
            </article>
            <div class="cta">
                <a href="contact.php"> Me contacter</a>
            </div>
            
            <div class="links">
                <a href="https://github.com/anisbeny"><img src="images/github.png" alt="git"></a>
                <a href="https://www.linkedin.com/in/anis-ben-youssef-151081201/"><img src="images/linkedin1.png" alt="linkedin"></a>
                <a href="mailto:aby4155@outlook.fr"><img src="images/courrier.png" alt="mail"></a>
            </div>
            <div class="drawing">
                <img class="forme" src="images/forme.png" alt="forme">
                <img class="colab" src="images/ux colaboration2.png" alt="colaboration">
            </div>
        </section>
        <section id="services">
            <h1>mes prestations</h1>
            <div class="container">
            <?php require_once 'includes/connect.php';
                $sql = 'SELECT * FROM `services`;';
                $requete = $db->query($sql);
                $services = $requete->fetchAll();
                foreach ($services as $service) {
                ?>
            <article>
               <h2><a href="services.php/#<?php echo "{$service['anchor']}"; ?>">
                <?php echo "{$service['title']}"; ?></a></h2>
                <p><?php echo "{$service['abstract']}"; ?></p>
            </article>
            <?php } ?>
        </div>
        </section>
        
        <section id="skills">
            <h1>Mes compétences</h1>
            <div class="logos">
            <?php require_once 'includes/connect.php';
                $sql = 'SELECT * FROM `skills`;';
                $requete = $db->query($sql);
                $skills = $requete->fetchAll();
                foreach ($skills as $skill) {
                ?>
                <img src="images/<?php echo "{$skill['logo']}"; ?>" alt="<?php echo "{$skill['al_text']}"; ?>">
                <?php } ?>
            </div>
    
        </section>
    </main>
    <?php require_once 'includes/footer.php'; ?>
</body>

</html>