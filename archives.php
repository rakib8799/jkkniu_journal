<?php include_once('linker.php') ?>

<body>
    <header>
        <?php include_once('header.php') ?>
    </header>

    <a style="cursor:pointer;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"><img style="width: 2vw;" class="to-top position-fixed bottom-0 end-0" src="./Images/arrow-up.jpg"></a>

    <section class="HomepageSection mt-5" id="AboutArticle">


        <div class="page page_article">
            <div class="container">
                <div id="main-content" class="page page_issue_archive">
                    <nav class="cmp_breadcrumbs" role="navigation" aria-label="You are here:">
                        <ol class="breadcrumb bg-light mb-0 py-1">
                            <li class="breadcrumb-item">
                                <a href="https://journals.juniv.edu/index.php/as/index" class="text-dark text-decoration-none">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Archives

                            </li>
                        </ol>
                    </nav>


                    <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center mt-2" style="min-height: 50vh;" data-aos="fade-right">
                        <div class="col-md-3">
                            <div class="card h-100 committee_hover shadow-lg mb-5 p-3 package-item">
                                <div class="card-img-top">
                                    <img class="img-thumbnail" src="https://journals.juniv.edu/public/journals/21/cover_issue_43_en.jpg" alt="issue NO. 41" style="height:40vh;width:100%;">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title primary_color text-center">
                                        <a class="text-decoration-none" href="individual_archieve.php" rel="bookmark" style="font-size: 1.3rem;">
                                            Vol. 41 (2022)
                                        </a>
                                    </h3>
                                    <p class="card-text text-align-justify">
                                        Jahangirnagar University Journal of Government and Politics
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <a class="btn btn-light text-shadow" href="individual_archieve.php">
                                        View Archive
                                    </a>
                                    <!-- <a class="btn btn-light text-shadow" href="journal_details.php">
                                        Current Issue
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card h-100 committee_hover shadow-lg mb-5 p-3 package-item">
                                <div class="card-img-top">
                                    <img class="img-thumbnail" src="https://journals.juniv.edu/public/journals/21/cover_issue_43_en.jpg" alt="issue NO. 41" style="height:40vh;width:100%;">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title primary_color text-center">
                                        <a class="text-decoration-none" href="individual_archieve.php" rel="bookmark" style="font-size: 1.3rem;">
                                            Vol. 41 (2022)
                                        </a>
                                    </h3>
                                    <p class="card-text text-align-justify">
                                        Jahangirnagar University Journal of Government and Politics
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <a class="btn btn-light text-shadow" href="individual_archieve.php">
                                        View Archive
                                    </a>
                                    <!-- <a class="btn btn-light text-shadow" href="journal_details.php">
                                        Current Issue
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card h-100 committee_hover shadow-lg mb-5 p-3 package-item">
                                <div class="card-img-top">
                                    <img class="img-thumbnail" src="https://journals.juniv.edu/public/journals/21/cover_issue_43_en.jpg" alt="issue NO. 41" style="height:40vh;width:100%;">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title primary_color text-center">
                                        <a class="text-decoration-none" href="individual_archieve.php" rel="bookmark" style="font-size: 1.3rem;">
                                            Vol. 41 (2022)
                                        </a>
                                    </h3>
                                    <p class="card-text text-align-justify">
                                        Jahangirnagar University Journal of Government and Politics
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <a class="btn btn-light text-shadow" href="individual_archieve.php">
                                        View Archive
                                    </a>
                                    <!-- <a class="btn btn-light text-shadow" href="journal_details.php">
                                        Current Issue
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card h-100 committee_hover shadow-lg mb-5 p-3 package-item">
                                <div class="card-img-top">
                                    <img class="img-thumbnail" src="https://journals.juniv.edu/public/journals/21/cover_issue_43_en.jpg" alt="issue NO. 41" style="height:40vh;width:100%;">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title primary_color text-center">
                                        <a class="text-decoration-none" href="individual_archieve.php" rel="bookmark" style="font-size: 1.3rem;">
                                            Vol. 41 (2022)
                                        </a>
                                    </h3>
                                    <p class="card-text text-align-justify">
                                        Jahangirnagar University Journal of Government and Politics
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <a class="btn btn-light text-shadow" href="individual_archieve.php">
                                        View Archive
                                    </a>
                                    <!-- <a class="btn btn-light text-shadow" href="journal_details.php">
                                        Current Issue
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div><!-- .container -->


        </div><!-- .page -->
    </section>



    <footer data-aos="fade-up">
        <?php include_once('footer.php') ?>
    </footer>
    <!-- Here we hook our AOS JS file  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script>
        var app = document.getElementById('app');

        var typewriter = new Typewriter(app, {
            loop: true,
            delay: 75,
        });

        typewriter
            // .pauseFor(2500)
            // .typeString('<strong>Our Objectives are: </strong>')
            // .pauseFor(300)
            // .deleteChars(10)
            .typeString('<strong><span class="secondary_color">Promoting Human Values</span>, </strong> ')
            .typeString('<strong><span class="secondary_color">Creativity</span>, </strong>')
            .typeString('<strong><span class="secondary_color">Innovations</span> and </strong>')
            .typeString('<strong><span class="secondary_color">Prosperity to build Smart Generation for Smart Bangladesh</span></strong>')
            .pauseFor(1000)
            .start();
    </script>
    <!-- Activate AOS Library -->
    <script>
        AOS.init();
    </script>
</body>
</body>

</html>