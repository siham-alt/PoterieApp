<style>
.footer {
    background-color: #5e4433;
    color: #f8f3ee;
    padding: 40px 20px;
    text-align: center;
    font-family: 'Arial', sans-serif;
}

.footer .footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer .footer-section {
    flex: 1;
    margin: 15px;
    min-width: 200px;
}

.footer .footer-section h4 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #f8f3ee;
    text-transform: uppercase;
    border-bottom: 2px solid #c46c00;
    display: inline-block;
    padding-bottom: 5px;
}

.footer .footer-section p,
.footer .footer-section a {
    font-size: 1rem;
    margin-bottom: 10px;
    color: #f8f3ee;
    text-decoration: none;
}

.footer .footer-section a:hover {
    color: #c46c00;
    text-decoration: underline;
}

.footer .social-icons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.footer .social-icons a {
    width: 40px;
    height: 40px;
    margin: 0 10px;
    background-color: #c46c00;
    color: #f8f3ee;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1.2rem;
    transition: background-color 0.3s;
}

.footer .social-icons a:hover {
    background-color: #f8f3ee;
    color: #c46c00;
}

.footer .footer-bottom {
    margin-top: 20px;
    font-size: 0.9rem;
    border-top: 1px solid #c46c00;
    padding-top: 10px;
    color: #f8f3ee;
}
</style>

<div class="footer">
    <div class="footer-content">
        <!-- About Section -->
        <div class="footer-section">
            <h4>À Propos</h4>
            <p>Nous proposons une large gamme de produits en céramique de qualité, faits avec amour et souci du détail.</p>
        </div>
        <!-- Quick Links -->
        <div class="footer-section">
            <h4>Liens Rapides</h4>
            <a href="#">Accueil</a><br>
            <a href="{{ route('produits.show') }}">Produits</a><br>
            <a href="{{route ('contact')}}">Contactez-nous</a>
        </div>
        <!-- Contact Section -->
        <div class="footer-section">
            <h4>Contactez-nous</h4>
            <p>Email: support@ceramique.com</p>
            <p>Téléphone: +212 6 00 00 00 00</p>
            <p>Adresse: Salé, Maroc</p>
        </div>
    </div>
    <!-- Social Media Icons -->
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; 2024 Ceramics Website. Tous droits réservés.</p>
    </div>
</div>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
