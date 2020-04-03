<div id="utdallas-branding-bar" class="utdallas-branding-bar topbar">
    <div class="wrapper">

        <div class="utd-wordmark">
            <a href="https://www.utdallas.edu/">The University of Texas at Dallas</a>
        </div>

        <div class="branding-bar-right">
            <ul class="link-set">
                <?php if (get_theme_mod('utd_branding_bar_apply_link', true)) : ?>
                    <li><a href="https://www.utdallas.edu/apply">Apply</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('utd_branding_bar_give_link', true)) : ?>
                    <li><a href="https://www.utdallas.edu/development/giving-methods/">Give</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('utd_branding_bar_galaxy_link', true)) : ?>
                    <li><a href="https://galaxy.utdallas.edu">Galaxy</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('utd_branding_bar_elearning_link', true)) : ?>
                    <li><a href="https://elearning.utdallas.edu">eLearning</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('utd_branding_bar_directory_link', true)) : ?>
                    <li><a href="https://www.utdallas.edu/directory/">Directory</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('utd_branding_bar_maps_link', true)) : ?>
                    <li><a href="https://www.utdallas.edu/maps/">Maps</a></li>
                <?php endif; ?>
            </ul>
            <?php if (get_theme_mod('utd_branding_bar_search_box', true)) : ?>
                <div class="searchbox">
                    <form role='search' action="https://www.utdallas.edu/search/">
                        <label class="sr-only" for="search">Search UT Dallas</label>
                        <input type="hidden" value="main" name="s">
                        <input type="text" placeholder="Search UT Dallas" name="q">
                        <button type="submit" class="search-button">
                            <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                <defs><style>.cls-1 {fill: #fff;}</style></defs>
                                <title>magnifying-glass-icon</title>
                                <path class="cls-1" d="M9.68,10.56a24.25,24.25,0,1,0,34.3,0A24.2,24.2,0,0,0,9.68,10.56Zm29.7,29.7a17.68,17.68,0,1,1,0-25A17.68,17.68,0,0,1,39.38,40.26Z" />
                                <rect class="cls-1" x="46.8" y="38.46" width="6.6" height="25" transform="translate(-21.36 50.35) rotate(-45)" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>