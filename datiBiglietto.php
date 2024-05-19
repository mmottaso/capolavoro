<?php
session_start();
include('connection.php'); // Assicurati di avere un file 'connection.php' per la connessione al database

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="biglietto.css">
    <title>Genera Form</title>
</head>

<body>

<?php
// Email dell'utente dalla sessione
if (isset($_SESSION['email'])) {
    $email_utente = $_SESSION['email'];
} else {
    echo "Errore: l'email dell'utente non è impostata nella sessione.";
    exit();
}
if ($conn) {
    $sql = "SELECT utente.cf, utente.nome, utente.cognome, utente.email, utente.numeroTelefono, posto.numero, posto.fila, settore.nomeSettore, settore.costo, partita.data
            FROM utente
            INNER JOIN prenotazioni ON utente.cf = prenotazioni.cf
            INNER JOIN posto ON prenotazioni.IdPosto = posto.idPosto
            INNER JOIN settore ON prenotazioni.IdSettore = settore.idSettore
            INNER JOIN partita ON prenotazioni.idPartita = partita.idPartita
            WHERE utente.email = '$email_utente'";

    $result = $conn->query($sql);

  
    $total_cost = 0; // Inizializza il totale a 0

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            echo "<hr>";
            echo "<div class='box'>";
            echo "<ul class='left'>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>"; 
            echo "</ul>";
            echo "<ul class='right'>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";
            echo "<li></li>";             
            echo "</ul>";
            echo "<div class='ticket'>";
            // Inserisci qui le informazioni del biglietto, sostituendo i campi vuoti con i dati del database
            echo "<span class='match'>". "Hellas Verona FC". "<img src='immaginiProva/stemma1.png' class='stemma'>"."</span>";
            echo "<span class='match matchShift'>". "Hellas Verona FC". "</span>";
            echo "<span class='boarding'>Ingresso</span>";
            echo "<div class='content'>";
            echo "<span class='jfk'>Hellas Verona FC vs Internazionale</span>";

            echo "<span class='jfk jfkslip'>VER vs INT</span>";
            echo "<div class='sub-content'>";
            echo "<span class='space'>" . "</span>";
            echo "<span class='name'>Nominativo<br><span>" . htmlspecialchars($row["nome"]) . " " . htmlspecialchars($row["cognome"]) . "</span></span>";
            echo "<span class='flight'>Codice Fiscale<br><span>" . htmlspecialchars($row["cf"]) . "</span></span>";
            echo "<span class='gate'>Cellulare<br><span>" . htmlspecialchars($row["numeroTelefono"]) . "</span></span>";
            echo "<span class='seat'>Posto<br><span>" . htmlspecialchars($row["numero"]) ."-". htmlspecialchars($row["fila"]) ."</span></span>";
            echo "<span class='boardingtime'>Data<br><span>" . htmlspecialchars($row["data"]) . "</span></span>";
            echo "<span class='orarioPartita'>Orario CET<br><span>" . "18:00" . "</span></span>";
            echo "<span class='codiceFiscale'>Settore<br><span>". htmlspecialchars($row["nomeSettore"]) .  "</span></span>";

            echo "<span class='flight flightslip'>Nominativo<br><span>". htmlspecialchars($row["nome"]) . " " . htmlspecialchars($row["cognome"]) ." </span></span> ";
            echo "<span class='seat seatslip'>Posto<br><span>". htmlspecialchars($row["numero"]) ."-". htmlspecialchars($row["fila"]) ."</span></span>";
            echo "<span class='name nameslip'>Codice Fiscale<br><span>". htmlspecialchars($row["cf"]) ."</span></span>";
            echo "</div>";
            echo "</div>";
            echo "<div class='barcode'></div>";
            echo "<div class='barcode slip'></div>";
            echo "</div>";
            echo "</div>";


         // Aggiungi il costo di questo elemento al totale
         $total_cost += $row["costo"];
        }

        echo "</table>";

        // Mostra il totale dopo il ciclo
        //echo "<p>Totale: €" . htmlspecialchars($total_cost) . "</p>";
    } else {
        echo $email_utente;
        echo "Nessun risultato trovato.";
    }

    $conn->close();
} else {
    echo "Errore di connessione al database: " . $conn->connect_error;

}
   
?>

</body>
</html>
