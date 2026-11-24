<style>
    /* Styles pour la section Témoignages */
.testimonials-section {
    background-color: #f8f3ee;
    padding: 60px 20px;
    text-align: center;
}

.testimonials-section .section-title {
    font-size: 2rem;
    color: #5e4433;
    margin-bottom: 10px;
}

.testimonials-section .section-description {
    font-size: 1.2rem;
    color: #5e4433;
    margin-bottom: 30px;
}

.testimonials-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.testimonial-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 280px;
    padding: 20px;
    text-align: left;
    transition: transform 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
}

.testimonial-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.testimonial-content {
    margin-left: 10px;
}

.testimonial-text {
    font-style: italic;
    color: #5e4433;
    margin-bottom: 15px;
}

.testimonial-name {
    font-weight: bold;
    color: #5e4433;
    font-size: 1.1rem;
}

.testimonial-job {
    color: #c46c00;
    font-size: 0.9rem;
}

</style>
<!-- Section Témoignages -->
<div class="testimonials-section">
    <h2 class="section-title">Avis Clients</h2>
    <p class="section-description">Découvrez ce que nos clients disent de nos produits et ateliers !</p>
    
    <div class="testimonials-container">
        <!-- Témoignage 1 -->
        <div class="testimonial-card">
            <img src="/img/pp3.jpg" alt="Client 1" class="testimonial-img">
            <div class="testimonial-content">
                <p class="testimonial-text">"L'atelier de poterie a été une expérience incroyable ! J'ai appris tant de choses et j'ai adoré créer mon propre vase. Très professionnel et chaleureux." </p>
                <p class="testimonial-name">Nermine eddahmani</p>
                <p class="testimonial-job">Client et participante à l'atelier</p>
            </div>
        </div>
        
        <!-- Témoignage 2 -->
        <div class="testimonial-card">
            <img src="/img/pp.avif" alt="Client 2" class="testimonial-img">
            <div class="testimonial-content">
                <p class="testimonial-text">"Les produits en argile sont magnifiques, et le service est impeccable. J'ai acheté un vase et il embellit vraiment mon salon !"</p>
                <p class="testimonial-name">Jamal talib</p>
                <p class="testimonial-job">Client fidèle</p>
            </div>
        </div>
        
        <!-- Témoignage 3 (facultatif) -->
        <div class="testimonial-card">
            <img src="img/pp2.jpeg" alt="Client 3" class="testimonial-img">
            <div class="testimonial-content">
                <p class="testimonial-text">"Un endroit parfait pour apprendre la poterie, même en tant que débutant ! Les ateliers sont bien expliqués, et l'ambiance est super." </p>
                <p class="testimonial-name">alae taibi</p>
                <p class="testimonial-job">Nouvelle cliente</p>
            </div>
        </div>
    </div>
</div>
