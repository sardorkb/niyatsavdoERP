<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Savdo bo'limi
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{ route('customers.index') }}" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="shopping-cart"></span></span><span
                                    class="nav-link-text-wrapper"><span class="nav-link-text">Muddatli
                                        to'lov</span></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Undiruv bo'limi
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="arrow-down"></span></span><span
                                    class="nav-link-text-wrapper"><span class="nav-link-text">Undiruv bo'yicha
                                        tushumlar</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="alert-triangle"></span></span><span
                                    class="nav-link-text-wrapper"><span class="nav-link-text">Kechikkan to'lovlar
                                        </span></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Moliya va kassa bo'limi
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="file-text"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Umumiy hisobot</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="plus-square"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Investitsiya kiritish</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="minus-square"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Foyda yechib olish</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="repeat"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">O'tkazmalar</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="chevrons-down"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Kassa kirim</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="chevrons-up"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Kassa chiqim</span></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Sozlamalar
                    </p>
                    <hr class="navbar-vertical-line" />
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="#" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="users"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Foydalanuvchilar</span></span>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span
                class="navbar-vertical-footer-text ms-2">Yigʻilgan koʻrinish</span></button>
    </div>
</nav>
