<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include 'template-parts/header.php';

/** CSS child dépend du parent */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20 );


add_action( 'wp', function () {
    // Supprime toutes les callbacks déjà ajoutées au hook astra_footer
    remove_all_actions( 'astra_footer' );

    // Ajoute TON footer
    add_action( 'astra_footer', 'astra_child_footer_markup' );
} );

add_action( 'wp', function () {
    remove_all_actions( 'astra_header' );
    add_action( 'astra_header', 'astra_child_header_markup' );
} );

function astra_child_header_markup() { ?>
<header class="site-header">
    <div class="header-container">
        <div class="logo">
            <img src="./images/Vitality_2020.png" alt="Logo" class="logo-img">
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Randomness</a></li>
                <li><a href="#">And</a></li>
                <li><a href="#">Another</a></li>
                <li><a href="#">One</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="#" aria-label="Instagram">IG</a>
            <a href="#" aria-label="Facebook">FB</a>
            <a href="#" aria-label="Twitter">TW</a>
        </div>
    </div>
</header>
<?php }


function astra_child_footer_markup() { ?>
    <footer class="site-footer ast-container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4>À propos</h4>
                <p>Nous créons des sites rapides et accessibles.</p>
            </div>
            <div class="footer-col">
                <h4>Liens</h4>
                <ul>
                    <li><a href="/boutique">Boutique</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/mentions-legales">Mentions légales</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <p>
                    <a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a> •
                    <a href="https://facebook.com" target="_blank" rel="noopener">Facebook</a>
                </p>
                <p class="copy">© <?php echo date('Y'); ?> — Mon Entreprise</p>
            </div>
        </div>
    </footer>
<?php }