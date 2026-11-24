<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .heading {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }

        .para {
            text-align: center;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .contactForm {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .contactForm .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1rem;
        }

        .contactForm .submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .contactForm .submit:hover {
            background-color: #0056b3;
        }

        .alert {
            max-width: 600px;
            margin: 0 auto 20px;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .contactMethod {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
        }

        .method {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contactIcon {
            font-size: 2rem;
            color: #007bff;
        }

        .sub-heading {
            font-weight: bold;
            color: #343a40;
        }

        .para {
            margin: 0;
            color: #6c757d;
        }

        /* Layout Section */
        .contact-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 15px;
        }

        .form-container, .map-container {
            flex: 1;
            min-width: 45%;
            margin: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container, .map-container {
                min-width: 100%;
                margin: 0;
            }
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    
@include('layouts/header')

<section class="contact-form" id="contact">
    <div class="heading">Nous Contacter</div>
    <div class="para">Pour toute question ou information supplémentaire, veuillez remplir le formulaire ci-dessous.</div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<br><br>
    <!-- Contact Section with Form and Map -->
    <div class="contact-section">
        <!-- Form Container -->
        <div class="form-container">
            <div class="contactForm">
                <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <input type="text" class="input" name="name" placeholder="Nom" required>
                    <input type="email" class="input" name="email" placeholder="Email" required>
                    <textarea class="input" name="message" rows="4" placeholder="Message" required></textarea>
                    <input type="submit" class="input submit" value="Envoyer">
                </form>
            </div>
        </div>

        <!-- Map Container -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.1659852574617!2d-6.858738424420779!3d33.98827007318113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76d6b99660137%3A0x2e8e7d79b04b2d11!2sDSI%20MEN!5e0!3m2!1sfr!2sma!4v1719617724392!5m2!1sfr!2sma" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
<br><br>
    <!-- Contact Methods -->
    <div class="contactMethod">
        <div class="method">
            <i class="fas fa-phone contactIcon"></i>
            <div>
                <div class="sub-heading">Téléphone</div>
                <div class="para">+212 123-456-789</div>
            </div>
        </div>
        <div class="method">
            <i class="fas fa-envelope contactIcon"></i>
            <div>
                <div class="sub-heading">Email</div>
                <div class="para">contact@dsi.ma</div>
            </div>
        </div>
        <div class="method">
            <i class="fas fa-map-marker-alt contactIcon"></i>
            <div>
                <div class="sub-heading">Adresse</div>
                <div class="para">123 Rue Example, Salé, Maroc</div>
            </div>
        </div>
    </div>
</section>
<br><br><br><br>
@include('layouts/footer')

</body>
</html>
