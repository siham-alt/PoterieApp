<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation d'ateliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .reservation-section {
            background-color: #ece1da;
            padding: 50px 20px;
            text-align: center;
            color: #5e4433;
        }

        .reservation-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #5e4433;
        }

        .reservation-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .reservation-section .workshop-dates {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .reservation-section .date-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .reservation-section .date-card:hover {
            transform: translateY(-5px);
        }

        .reservation-section .date-card h5 {
            margin-bottom: 10px;
            color: #c46c00;
            font-size: 1.2rem;
        }

        .reservation-section .date-card p {
            font-size: 1rem;
            color: #5e4433;
        }

        .reservation-section .btn-reserve {
            background-color: #a3663c;
            color: #ffffff;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .reservation-section .btn-reserve:hover {
            background-color: #c46c00;
        }
    </style>
</head>
<body>
    <!-- Section Réservation d'ateliers -->
    <div class="reservation-section">
        <h2>Réservation d'ateliers</h2>
        <p>Découvrez l'art de la poterie lors de nos ateliers pour débutants et experts. Rejoignez-nous pour une expérience unique et créative !</p>

        <!-- Prochaines dates -->
        <div class="workshop-dates">
            <div class="date-card">
                <h5>Samedi, 2 Décembre</h5>
                <p>10:00 - 12:00</p>
            </div>
            <div class="date-card">
                <h5>Dimanche, 10 Décembre</h5>
                <p>14:00 - 16:00</p>
            </div>
            <div class="date-card">
                <h5>Mercredi, 20 Décembre</h5>
                <p>16:00 - 18:00</p>
            </div>
        </div>

        <!-- Bouton Réservation -->
        <a href="reservation.html" class="btn-reserve">Réservez votre place maintenant</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
