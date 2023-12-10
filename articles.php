<?php require_once("database/connection.php") ?>

<?php include_once('linker.php') ?>

<body>
    <header>
        <?php include_once('header.php') ?>
    </header>

    <a style="cursor:pointer;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"><img style="width: 2vw;" class="to-top position-fixed bottom-0 end-0" src="./Images/arrow-up.jpg"></a>

    <section class="HomepageSection mt-5" id="AboutArticle">


        <div class="page page_article">
            <nav class="cmp_breadcrumbs bg-light container" role="navigation" aria-label="You are here:">
                <ol class="breadcrumb mb-0 py-1">
                    <li class="breadcrumb-item">
                        <a href="https://journals.juniv.edu/index.php/as/index" class="text-dark text-decoration-none">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="https://journals.juniv.edu/index.php/as/issue/archive" class="text-dark text-decoration-none">
                            Archives
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="https://journals.juniv.edu/index.php/as/issue/view/43" class="text-dark text-decoration-none">
                            Vol. 41 (2022)
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Articles
                    </li>
                </ol>
            </nav>


            <div class="container">
                <article class="article-details">


                    <header>
                        <h1 class="page-header">
                            Content of Accord and Durability of Peace
                            <small>
                                A Comparative Study of Nagaland and Chittagong Hill Tracts
                            </small>
                        </h1>
                    </header>

                    <div class="row">

                        <section class="article-sidebar col-md-4">

                            <h2 class="sr-only">Article Sidebar</h2>

                            <div class="cover-image">
                                <a href="https://journals.juniv.edu/index.php/as/issue/view/43">
                                    <img class="img-fluid" src="./Images/journalThumbnail_en.jpg" alt="issue NO. 41">
                                </a>
                            </div>

                            <div class="download">




                                <a class="galley-link btn btn-primary pdf" role="button" href="https://journals.juniv.edu/index.php/as/article/view/307/232">


                                    PDF

                                </a>
                            </div>

                            <div class="list-group">

                                <div class="list-group-item date-published">
                                    <strong>Published:</strong>
                                    Jul 25, 2023
                                </div>


                                <div class="list-group-item keywords">
                                    <strong> Keywords:</strong>
                                    <div class="">
                                        <span class="value">
                                            Civil war, insurgency, peace-pact, Nagaland, Chittagong Hill Tracts </span>
                                    </div>
                                </div>
                            </div>

                        </section><!-- .article-sidebar -->

                        <div class="col-md-8">
                            <section class="article-main">

                                <h2 class="sr-only">Main Article Content</h2>

                                <div class="authors">
                                    <div class="author">
                                        <strong>Tareq Hossain Khan</strong>
                                        <div class="article-author-affilitation">
                                            Associate Professor, Department of Political Science, Jagannath University, Dhaka
                                        </div>
                                    </div>
                                </div>

                                <div class="article-summary" id="summary">
                                    <h2>Abstract</h2>
                                    <div class="article-abstract">
                                        <p>Signing a peace agreement is a daunting job for the belligerents since they have to compromise many demands in a negotiated settlement; it is even more problematic to hold the rebel groups under the banner of a peace accord. Scholars have emphasized the importance of third party presence, peacekeeping of the United Nations, restructuring of security services, economic development, etc., in maintaining the stability of the settlement. However, we do not have a clear idea about how the content and quality of the peace treaty contribute to the durability of the peace. This article examines how the peace accord's content, provisions, and incentives hold the disputing parties within the agreed framework. This article uses the Nagaland and Chittagong Hill Tracts (CHT) agreement as cases to investigate the research aim through a structured-focused comparison with content analysis of official documents. The findings suggest that the Naga rebels returned to the battlefield within five years after signing the Nagaland accord because it did not provide any incentive to the insurgents and the Naga community. On the contrary, despite some tensions and controversy, the CHT agreement has survived because of its liberal content that incorporated power-sharing with rebel leaders.</p>
                                    </div>
                                </div>




                            </section><!-- .article-main -->

                            <section class="article-more-details">

                                <h2 class="sr-only">Article Details</h2>



                                <div class="panel panel-default issue">
                                    <div class="panel-heading">
                                        Issue
                                    </div>
                                    <div class="panel-body">
                                        <a class="title text-decoration-none" href="https://journals.juniv.edu/index.php/as/issue/view/43">
                                            Vol. 41 (2022)
                                        </a>

                                    </div>
                                </div>

                                <div class="panel panel-default section">
                                    <div class="panel-heading">
                                        Section
                                    </div>
                                    <div class="panel-body">
                                        Articles
                                    </div>
                                </div>






                            </section><!-- .article-details -->
                        </div><!-- .col-md-8 -->
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

                </article>

            </div>


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