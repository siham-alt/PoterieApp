@extends('layouts.acceuil')

@section('content')

<style>
 /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #dbb69d;
    color: #5e4433;
    line-height: 1.6;
}

h1, h2, h3 {
    color: #5e4433;
}

.btn {
    background-color: #a3663c;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    transition: all 0.3s;
}

.btn.btn-dark {
    background-color: #a3663c; /* Custom background color */
    border-color: #a3663c; /* Optional: Set border color to match */
}

.btn:hover {
    background-color: #8c6a4b;
}

/* Hero Section */
.hero {
    color: #fff;
    text-align: center;
    padding: 100px 20px;
    margin-bottom: 50px;
    position: relative;
}

.hero h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.hero .btn {
    margin: 0 10px;
}

/* Général pour les sections */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}
.service-box {
    background-color: #fff;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}

.service-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.service-icon-container {
    width: 120px;
    height: 120px;
    background-color: #f5ece8;
    border-radius: 50%;
    margin: 0 auto 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s;
}

.service-icon {
    width: 70%;
    height: auto;
    transition: transform 0.3s ease;
}

.service-box:hover .service-icon {
    transform: scale(1.1);
}

.service-box h5 {
    font-size: 1.8rem;
    color: #5e4433;
    margin: 20px 0 10px;
}

.service-box p {
    font-size: 1.1rem;
    color: #7d5f4b;
    margin-bottom: 20px;
}

.service-box .btn {
    background-color: #a3663c;
    color: #fff;
    border-radius: 25px;
    padding: 10px 20px;
    transition: all 0.3s ease;
}

.service-box .btn:hover {
    background-color: #8c6a4b;
    color: #fff;
    transform: scale(1.1);
}

/* Refonte de la section À propos */
.about-section {
    background: linear-gradient(135deg, #ece1da, #dbb69d);
    padding: 60px 0;
    color: #5e4433;
    border-radius: 20px;
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
}

.about-section .section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #5e4433;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.about-section .about-text {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #7d5f4b;
}

.about-section .btn-custom {
    background-color: #a3663c;
    color: #fff;
    border-radius: 25px;
    padding: 12px 30px;
    transition: background-color 0.3s, transform 0.3s;
}

.about-section .btn-custom:hover {
    background-color: #8c6a4b;
    transform: translateY(-3px);
}

.about-section .about-image-wrapper {
    position: relative;
    width: 100%;
    height: auto;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.about-section .about-image {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease-in-out;
}

.about-section .about-image-wrapper:hover .about-image {
    transform: scale(1.1);
}

.about-section .about-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(163, 102, 60, 0.3);
    border-radius: 15px;
    transition: background-color 0.3s;
}

.about-section .about-image-wrapper:hover .about-overlay {
    background: rgba(163, 102, 60, 0.5);
}


#heroCarousel {
    position: relative;
    overflow: hidden;
    height: 550px; /* Hauteur du carrousel */
    width: 100%; /* Assurez-vous que le carrousel occupe toute la largeur */
}

.carousel-inner {
    display: flex;
    transition: transform 0.5s ease;
    width: 100%; /* Gardez la largeur à 100% pour le conteneur */
}

.carousel-item {
    min-width: 100%;
    transition: transform 0.5s ease;
    position: relative;
}

/* Pour assurer un bon affichage de l'image */
.carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Couvre l'espace sans déformer l'image */
    object-position: center; /* Centrer l'image si elle est recadrée */
    transition: opacity 0.5s ease;
}

/* Add text and button centered on each image */
.carousel-item .carousel-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    text-align: center;
}

.carousel-item .carousel-caption h5 {
    font-size: 2rem;
    font-weight: bold;
}

.carousel-item .carousel-caption p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.carousel-item .carousel-caption .btn {
    margin-top: 20px;
    padding: 12px 20px;
    font-size: 1.1rem;
}

/* Optional: Style the buttons */
.carousel-control-prev, .carousel-control-next {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    color: #fff;
    padding: 15px;
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    filter: invert(100%);
}



</style>

<!-- Hero Section with Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/p4.jpg" class="d-block w-100" alt="Poterie artisanale">
            <div class="carousel-caption">
                <h5>Découvrir notre art</h5>
                <p>Explorez des créations uniques faites à la main.</p>
                <a href="{{ route('produits.show')}}" class="btn btn-dark">Découvrir</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/img/p6.avif" class="d-block w-100" alt="Artisan céramique">
            <div class="carousel-caption">
                <h5>Artisanat de qualité</h5>
                <p>Des pièces qui racontent une histoire.</p>
                <a href="{{ route('produits.show')}}" class="btn btn-dark">Découvrir</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/img/p5.jpg" class="d-block w-100" alt="Création unique en céramique">
            <div class="carousel-caption">
                <h5>Création personnalisée</h5>
                <p>Des créations sur mesure, faites pour vous.</p>
                <a href="{{ route('produits.show')}}" class="btn btn-dark">Découvrir</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>

<br><br><br><br>
<!-- À propos Section -->
<div class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texte de présentation -->
            <div class="col-md-6">
                <h2 class="section-title mb-4">À propos de nous</h2>
                <p class="about-text">
                    Plongez dans un monde où l'art de la céramique prend vie. Chaque création que nous façonnons est un mélange
                    d'authenticité et de créativité, conçue avec passion par nos artisans talentueux. Découvrez des œuvres qui ajoutent
                    une touche d'élégance à votre quotidien.
                </p>
                <a href="#services" class="btn btn-custom mt-4">En savoir plus</a>
            </div>

            <!-- Image illustrative -->
            <div class="col-md-6">
                <div class="about-image-wrapper position-relative">
                    <img src="/img/p5.jpg" alt="Nos ateliers" class="about-image">
                    <div class="about-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section --><div class="container my-5">
    <h2 class="text-center my-4" style="font-size: 2.5rem; color: #5e4433; font-weight: bold;">Nos Services</h2>
    <div class="row gy-4">
        <!-- Service 1 -->
        <div class="col-md-4">
            <div class="service-box shadow-sm">
                <div class="service-icon-container">
                    <img src="/img/service1.png" alt="Consultation gratuite" class="service-icon">
                </div>
                <h5>Consultation gratuite</h5>
                <p>Obtenez une consultation personnalisée sans frais pour vos projets.</p>
                <a href="#contact" class="btn btn-primary">En savoir plus</a>
            </div>
        </div>
        <!-- Service 2 -->
        <div class="col-md-4">
            <div class="service-box shadow-sm">
                <div class="service-icon-container">
                    <img src="/img/hh.avif" alt="Ateliers de poterie" class="service-icon">
                </div>
                <h5>Ateliers de Poterie</h5>
                <p>Participez à des ateliers interactifs et apprenez l'art de la poterie.</p>
                <a href="#contact" class="btn btn-primary">Réserver un atelier</a>
            </div>
        </div>
        <!-- Service 3 -->
        <div class="col-md-4">
            <div class="service-box shadow-sm">
                <div class="service-icon-container">
                    <img src="/img/service3.jpg" alt="Réparation céramique" class="service-icon">
                </div>
                <h5>Réparation & Restauration</h5>
                <p>Réparez vos céramiques et redonnez-leur vie avec notre service spécialisé.</p>
                <a href="#contact" class="btn btn-primary">Contactez-nous</a>
            </div>
        </div>
    </div>
</div>

<br><br>
@include('sectionProducts')
<br><br>
@include('sectionreservation')
<br><br>
@include('sectionavis')

@endsection
