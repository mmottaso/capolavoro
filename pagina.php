<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hellas Verona FC</title>


    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel = "stylesheet"  type="text/css" href="stile.css">
</head>
<body>
    <header> 
            <a href="pagina.php" class="logo">Hellas <span>Verona FC</span></a>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
               </ul>

            <div class="h-right">
                <a href="#">Follow us</a>
                <a href="https://www.instagram.com/hellasveronafc/"><i class="ri-instagram-line"></i></a>
                <a href="https://www.facebook.com/hellasveronafc"><i class="ri-facebook-fill"></i></a>
                <a href="https://twitter.com/HellasVeronaFC"><i class="ri-twitter-line"></i></a>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>

        </header>
        
        <section class="home">
            <div class="home-text">
                <h1>Welcome to <span>Hellas Verona FC</span></h1>
            </div>
        </section>

        <section class="tour">
            <div class="center-text">
                <h2>Prossima Partita:</h2>
            </div>

            <div class = "tour-content">
                <div class="box">
                    <h5>Serie A</h5>
                    <p>Domenica 26 Maggio 2024</p>
                    <p>18:30</p>
                </div>

                <div class="box">
                    <img src="immaginiProva/partita.png">
                    
                    
                </div>

                <div class="box">
                <a href="biglietteria.php" class="btn"><i class='bx bxs-coupon'></i> Acquista</a>

                </div>
            </div>

        </section>
        <hr class="hr">
        <section class="stadio">
            <div class="stadio-text">
                <h5>STADIO BENTEGODI</h5>
                <h2>Stadio Marcantonio Bentegodi</h2>
                <p>situato in Piazzale Olimpia 2, 37138 Verona</p>
                <a href="#" class="btn">Leggi di più</a>
            </div>

            <div>
                <img src="immaginiProva/stadio3.jpeg">
            </div>
        </section>
        <hr class="hr">
        <section class="newsletter">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>Vuoi ricevere notifiche?</h2>
                    <p>Tieniti sempre aggiornato sul mondo gialloblu</p>
                </div>

                <form action="">
                    <input type="email" placeholder="inserisci la tua email" 
                    required>
                    <input type="submit" value="Invia" class="btn">
                </form>
            </div>
        </section>
        <hr class="hr">
        <section class="footer">
            <div class="footer-box">
                <h3>Servizi</h3>
                <a href="#">Email MArketing</a>
                <a href="#">Campaigns</a>
                <a href="#">Brandings</a>
                <a href="#">Offline</a>
            </div>

            <div class="footer-box">
                <h3>About</h3>
                <a href="#">Storia</a>
                <a href="#">team</a>
            </div>

            <div class="footer-box">
                <h3>Help</h3>
                <a href="#">FAQs</a>
                <a href="#">Contattaci</a>
            </div>

            <div class="footer-box">
                <h3>Social</h3>
                <div class="social">
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-twitter-line"></i></a>
            </div>
                
            </div>
        </section>
        <div class="copyright">
            <p>Copyright 2023 By Fante Tommaso</p>
        </div>
        <script src="script.js"></script>

</body>
</html>