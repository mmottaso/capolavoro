<?php
session_start();
include('connection.php');

if (!isset($_SESSION['settore'])) {
    die("Errore: settore non selezionato.");
}

$settore = $_SESSION['settore'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hellas Verona FC</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="biglietti.css">
</head>

<body>
    <header>
        <a href="#" class="logo">Hellas <span>Verona FC</span></a>
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
        <div class="center">
            <div class="tickets">
                <div class="ticket-selector">
                    <div class="head">
                        <div class="title">Seleziona i posti</div>
                    </div>
                    <div class="seats">
                        <div class="status">
                            <div class="item">Disponibili</div>
                            <div class="item">Occupati</div>
                            <div class="item">Selezionati</div>
                        </div>
                        <form action="datiBiglietto.php" method="post">
                            <div class="all-seats">
                                <?php
                                // Ciclo per generare le checkbox dei posti
                                for ($fila = 1; $fila <= 6; $fila++) {
                                    for ($posto = 1; $posto <= 10; $posto++) {
                                        $value = $fila . '-' . $posto; // Numero-Fila
                                        echo '<input type="checkbox" name="tickets[]" id="' . htmlspecialchars($value) . '" value="' . htmlspecialchars($value) . '" />';
                                        echo '<label for="' . htmlspecialchars($value) . '" class="seat"></label>';
                                    }
                                }
                                ?>
                            </div>
                    </div>

                </div>
                <div class="price">
                    <button type="submit">Acquista</button>
                </div>
                <input type="hidden" name="settore" value="<?php echo htmlspecialchars($settore); ?>">

                </form>
            </div>
        </div>
    </section>

    <?php
   $settore = $_SESSION['settore'];
   $email_utente = isset($_SESSION['email']) ? $_SESSION['email'] : null;
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $settore = $_POST['settore'];
   
       if (isset($_POST['tickets']) && $email_utente) {
           $bigliettiSelezionati = $_POST['tickets'];
   
           // Utilizzo di prepared statements per evitare SQL injection
           $stmt_utente = $conn->prepare("SELECT cf FROM utente WHERE email = ?");
           $stmt_utente->bind_param("s", $email_utente);
           $stmt_utente->execute();
           $result_utente = $stmt_utente->get_result();
   
           if ($result_utente->num_rows > 0) {
               $row_utente = $result_utente->fetch_assoc();
               $cf_utente = $row_utente['cf'];
               $dataPrenotazione = date('Y-m-d');
   
               foreach ($bigliettiSelezionati as $posto_fila) {
                   list($numero_posto, $fila) = explode('-', $posto_fila);
   
                   // Inserisci i posti selezionati nel database se non esistono già
                   $stmt_insert_posto = $conn->prepare("INSERT INTO posto (numero, fila) VALUES (?, ?) ON DUPLICATE KEY UPDATE idPosto=LAST_INSERT_ID(idPosto)");
                   $stmt_insert_posto->bind_param("ii", $numero_posto, $fila);
                   $stmt_insert_posto->execute();
   
                   $idPosto = $conn->insert_id;
   
                   // Inserisci i biglietti selezionati nella tabella prenotazioni
                   $stmt_insert_prenotazione = $conn->prepare("INSERT INTO prenotazioni (dataPrenotazione, cf, idPartita, idPosto, idSettore) VALUES (?, ?, 38, ?, ?)");
                   $stmt_insert_prenotazione->bind_param("ssii", $dataPrenotazione, $cf_utente, $idPosto, $settore);
   
                   if ($stmt_insert_prenotazione->execute()) {
                       // Prenotazione inserita correttamente
                   } else {
                       echo "Errore nell'inserimento dei dati: " . $stmt_insert_prenotazione->error;
                   }
               }
           } else {
               echo "Errore: utente non trovato.";
           }
       } else {
           echo "Errore: nessun biglietto selezionato o email utente non disponibile.";
       }
   }
?>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                    if (checkedCheckboxes.length >= 5) {
                        checkboxes.forEach(cb => {
                            if (!cb.checked) {
                                cb.disabled = true;
                                cb.nextElementSibling.classList.add('disabled');
                            }
                        });
                    } else {
                        checkboxes.forEach(cb => {
                            cb.disabled = false;
                            if (!cb.checked) {
                                cb.nextElementSibling.classList.remove('disabled');
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
