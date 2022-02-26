<?php require_once 'includes/header.php'; ?>
    <title>Portfolio| Réalisations</title>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>  
    <main id="portfolio_page">
        <h1>Mon Portfolio</h1>
        <section id="works">
                <?php require_once 'includes/connect.php';
                $sql = 'SELECT * FROM `projects`;';
                $requete = $db->query($sql);
                $projects = $requete->fetchAll();
                foreach ($projects as $project) {
                ?>
            <article>
                <div class="réalisation">
                    <h2> <?php echo "{$project['title']}"; ?></h2>
                    <p><?php echo "{$project['description']}"; ?></p>
                    <h3>Technologies Utilsées </h3>
                    <p> <?php echo "{$project['used_techno']}"; ?></p>
                </div>
                <div class="lien">
                    <a href='<?php echo "{$project['link']}"; ?>'>git</a>
                </div>
                <figure class="screen-shot">
                    <img src="images/<?php echo "{$project['picture']}"; ?>" alt="le projet de <?php echo "{$project['title']}"; ?>">
                 
                </figure>
            </article>
            <hr>
            <?php } ?>
           
        </section>
    </main>
    <?php require_once 'includes/footer.php'; ?>

</body>

</html>