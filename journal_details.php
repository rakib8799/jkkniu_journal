<?php require_once("database/connection.php") ?>

<?php include_once('linker.php') ?>

<body>
    <header>
        <?php include_once('header.php') ?>
    </header>

    <a style="cursor:pointer;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"><img style="width: 2vw;" class="to-top position-fixed bottom-0 end-0" src="./Images/arrow-up.jpg"></a>

    <section class="HomepageSection mt-5" id="AboutJournal">

        <div class="container-fluid">
            <!-- Cta Section -->
            <section id="cta" class="bg-light shadow-sm">
                <div class="container">
                    <div class="col-lg-12">
                        <p class="text-justify"> ASIAN STUDIES: Jahangirnagar University Journal of Government and Politics (ISSN-0253-3375) is published annually in June by the Department of Government and Politics, Jahangirngar University, Savar, Dhaka-1342, Bangladesh. </p>
                    </div>
                </div>
            </section><!-- End Cta Section -->
        </div>

        <div class="container">
            <div class="row">
                <!-- Main Content -->


                <div id="main-content" class="page_index_journal">


                    <!-- Announcements -->

                    <!-- Latest issue -->
                    <section class="current_issue">
                        <div class="page-header w-100 my-4">
                            <h2 class="d-flex align-items-center pb-2 border-bottom" style="font-family: 'Muli', sans-serif;">
                                <span class="me-3">
                                    <i class="bi bi-bookmark-heart-fill"></i>
                                </span>
                                <strong>Current Issue</strong>
                            </h2>
                        </div>

                        <p class="current_issue_title lead">
                            Vol. 41 (2022)
                        </p>
                        <div class="container issue-toc">


                            <!-- <div class="row">
                                <div class="col-md-4">
                                    <a class="cover" href="https://journals.juniv.edu/index.php/as/issue/view/43">
                                        <img class="img-fluid" src="https://journals.juniv.edu/public/journals/21/cover_issue_43_en.jpg" alt="issue NO. 41">
                                    </a>
                                </div>

                                <div class="issue-details col-md-8">

                                    <div class="description">
                                        Jahangirnagar University Journal of Government and Politics
                                    </div>


                                    <p class="published">
                                        <strong>
                                            Published:
                                        </strong>
                                        25-07-2023
                                    </p>
                                </div>
                            </div> -->
                            <!-- <section> -->
                            <!-- <div class="container mt-5" data-aos="fade-up"> -->
                            <div class="row">
                                <div class="card shadow-lg mb-5 p-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="col-md-4">
                                            <a class="cover" href="https://journals.juniv.edu/index.php/as/issue/view/43">
                                                <img class="card-img-top" src="./Images/journalThumbnail_en.jpg" alt="issue NO. 41" style="max-height: 60vh;">
                                            </a>
                                        </div>

                                        <div class="issue-details col-md-8 text-center card-body">

                                            <div class="description card-text">
                                                Jahangirnagar University Journal of Government and Politics
                                            </div>


                                            <p class="published card-text">
                                                <strong>
                                                    Published:
                                                </strong>
                                                25-07-2023
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- </section> -->


                            <div class="sections mt-4">
                                <section class="section">

                                    <div class="page-header w-100 my-4">
                                        <h2 class="d-flex align-items-center pb-2 border-bottom" style="font-family: 'Muli', sans-serif;">
                                            <span class="me-3">
                                                <i class="bi bi-bookmark-heart-fill"></i>
                                            </span>
                                            <strong>Articles</strong>
                                        </h2>
                                    </div>
                                    <div class="media-list">

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            The Status of Women in Book Five of Plato's Republic
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Tarana Begum (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        1-12
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php297/226">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            Content of Accord and Durability of Peace
                                                            <p>
                                                                <small>A Comparative Study of Nagaland and Chittagong Hill Tracts</small>
                                                            </p>
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Tareq Hossain Khan (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        13-37
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php307/232">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            Women Vice Chairman at the Upazila Parishad in Bangladesh
                                                            <p>
                                                                <small>A Ceremonial Adaptation</small>
                                                            </p>
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Tamalika Sultana, Md. Shohanur Rahman (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        39-53
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php310/235">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            Working of Public Accounts Committee (PAC) in the British House of Commons
                                                            <p>
                                                                <small>Lessons for Bangladesh Parliament</small>
                                                            </p>
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Md. Abu Saleh, Foisal Ahmed (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        55-66
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php314/238">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            Democracy and Elections in Bangladesh
                                                            <p>
                                                                <small>Understanding the Institutional Challenges</small>
                                                            </p>
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Moonmoon Mashrafy, Rakiba Sultana Ratna (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        67-77
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php316/240">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->

                                        <div class="container">
                                            <div class="article-summary media">


                                                <div class="media-body">
                                                    <h3 class="media-heading">
                                                        <a href="articles.php" class="text-decoration-none">
                                                            Economic Hardship of Refugee Hosting Country
                                                            <p>
                                                                <small>An Analysis of the Case of Turkey</small>
                                                            </p>
                                                        </a>
                                                    </h3>

                                                    <div class="meta">
                                                        <div class="authors">
                                                            Abdullah Al Masud, Sabbir Hasan (Author)
                                                        </div>
                                                    </div>

                                                    <p class="pages">
                                                        79-87
                                                    </p>

                                                    <div class="btn-group" role="group">




                                                        <a class="galley-link btn btn-primary pdf" role="button" href="articles.php317/241">


                                                            PDF

                                                        </a>
                                                    </div>
                                                </div>


                                            </div><!-- .article-summary -->
                                        </div><!-- .container -->
                                    </div>
                                </section>
                            </div><!-- .sections -->
                        </div> <!--.container.issue-toc -->
                        <a href="https://journals.juniv.edu/index.php/as/issue/archive" class="btn btn-primary read-more mt-5">
                            View All Issues
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </section>
                </div><!-- .page_index_journal -->
            </div><!-- .col-lg-9 -->
            <!-- Bottom Section with Gray Background -->

            <aside id="sidebar" class="pkp_structure_sidebar left col-xs-12 col-md-4 mt-5" role="complementary" aria-label="Sidebar">
                <div class="pkp_block block_information">
                    <h2 class="title">Information</h2>
                    <div class="content">
                        <ul>
                            <li>
                                <a href="https://journals.juniv.edu/index.php/as/information/readers" class="text-decoration-none">
                                    For Readers
                                </a>
                            </li>
                            <li>
                                <a href="https://journals.juniv.edu/index.php/as/information/authors" class="text-decoration-none">
                                    For Authors
                                </a>
                            </li>
                            <li>
                                <a href="https://journals.juniv.edu/index.php/as/information/librarians" class="text-decoration-none">
                                    For Librarians
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </aside> <!-- pkp_sidebar.left -->
        </div><!-- .row -->
        </div><!-- .container-fluid -->
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