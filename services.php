<?php require_once 'includes/header.php'; ?>

    <title>Portfolio| Services</title>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>  
    <main id="services_page">
        <h1>Mes prestations</h1>
        <section class=services>
        <?php require_once 'includes/connect.php';
                $sql = 'SELECT * FROM `services`;';
                $requete = $db->query($sql);
                $services = $requete->fetchAll();
                foreach ($services as $service) {
                ?>
            <article id="<?php echo "{$service['anchor']}"; ?>">
                <div class="info">
                <h2><?php echo "{$service['title']}"; ?></h2>
                <p><?php echo "{$service['description']}"; ?></p>
            </div>
                <img src="images/séparation.png" alt="particule">
                <img src="images/<?php echo "{$service['picture']}"; ?>" alt="<?php echo "{$service['alt_text']}"; ?>">
            </article>
            <?php } ?>
        </section>

    </main>
    <?php require_once 'includes/footer.php'; ?>

</body>

</html>