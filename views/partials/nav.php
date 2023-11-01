<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">St. Joseph Hospital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- First menu item -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mental Health
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Finding Help</a></li>
                        <li><a class="dropdown-item" href="#">Brochures</a></li>
                        <li><a class="dropdown-item" href="#">Your Mental Health Questionnaire</a></li>
                    </ul>
                </li>

                <!-- Second menu item -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Psychiatry &raquo;</a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <li><a class="dropdown-item" href="services-psychiatry-book-appointments.html">Book Appointments</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Third menu item -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        News
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Press Releases</a></li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                    </ul>
                </li>

                <!-- Forth menu item -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">About Us</a></li>
                        <li><a class="dropdown-item" href="#">Our Team</a></li>
                        <li><a class="dropdown-item" href="#">Contact Us</a></li>
                    </ul>
                </li>
            </ul>

            <div>

                
            <?php if (urlIs('/') || urlIs('/index') || urlIs('/login')): ?>
                <a type="button" class="btn btn-outline-primary log-btn" href="login">Employee Log In</a>
            <?php else: ?>
                <a type="button" class="btn btn-outline-primary log-btn" href="/">Log Out</a>
            <?php endif; ?>

            </div>


            <!-- Language Selector -->
            <div class="nav-item language-selector">
                <div class="fr-language-selector">
                    <span lang="en-CA">
                        <a>
                            <span class="text-primary fw-bold">English</span>
                        </a>
                        <span> | </span>
                    </span>

                    <span lang="fr-CA">
                        <a>
                            <span>Français</span>
                        </a>
                        <span></span>
                    </span>
                </div>


            </div>
        </div>
    </div>
</nav>