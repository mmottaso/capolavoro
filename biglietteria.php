<?php
session_start();
include('connection.php');
?>
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
    <link rel = "stylesheet"  type="text/css" href="mappa.css">
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
      
        <section class="mappa">

    <div class="testo-biglietti">
        <h2>Seleziona il settore</h2>
    </div>
        <div class="stadium-map">
            <img src="immaginiProva/piantaDef.jpg" alt="Stadium Map" usemap="#stadiumMap">
            <map name="stadiumMap">
                <?php
                // Array di settori con le relative informazioni
                $settori = array(
                    array("idSettore" => 65, "nomeSettore" => "TribunaSuperioreOvest-settoreR", "coords" => "718,747,661,770,646,728,694,706"),
                    array("idSettore" => 1, "nomeSettore" => "TribunaSuperioreOvest-settoreS", "coords" => "579,750,637,731,649,775,587,792"),
                    array("idSettore" => 2, "nomeSettore" => "TribunaSuperioreOvest-settoreX", "coords" => "514,759,566,749,577,793,514,801"),
                    array("idSettore" => 3, "nomeSettore" => "TribunaSuperioreOvest-settoreY", "coords" => "439,757,501,760,502,801,433,801"),
                    array("idSettore" => 4, "nomeSettore" => "TribunaSuperioreOvest-settoreJ", "coords" => "369,746,429,759,422,798,364,790"),
                    array("idSettore" => 5, "nomeSettore" => "TribunaSuperioreOvest-settoreT", "coords" => "303,729,365,748,350,787,289,770"),
                    array("idSettore" => 6, "nomeSettore" => "TribunaSuperioreOvest-settoreU", "coords" => "238,695,297,723,280,764,224,737"),
                    array("idSettore" => 7, "nomeSettore" => "settoreOspiti", "coords" => "32,507,202,452,224,513,274,567,203,710,146,687,94,624,57,566"),
                    array("idSettore" => 8, "nomeSettore" => "PoltroneOvest-settore4", "coords" => "667,647,688,690,616,719,606,679"),
                    array("idSettore" => 9, "nomeSettore" => "PoltroneOvest-settore2", "coords" => "518,696,593,684,603,722,561,734,522,735"),
                    array("idSettore" => 10, "nomeSettore" => "PoltroneOvest-settore1", "coords" => "430,694,508,694,511,716,426,713"),
                    array("idSettore" => 11, "nomeSettore" => "PoltroneOvest-settore3", "coords" => "342,675,418,694,414,735,367,733,329,718"),
                    array("idSettore" => 12, "nomeSettore" => "PoltroneOvest-settore5", "coords" => "246,680,313,713,332,670,272,639"),
                    array("idSettore" => 13, "nomeSettore" => "PoltronissimeOvest-settoreR", "coords" => "597,623,644,602,662,636,638,648,611,660"),
                    array("idSettore" => 14, "nomeSettore" => "PoltronissimeOvest-settoreS", "coords" => "532,640,592,625,601,664,574,673,540,680"),
                    array("idSettore" => 15, "nomeSettore" => "PoltronissimeOvest-settoreT", "coords" => "352,622,401,639,392,671,339,659"),
                    array("idSettore" => 16, "nomeSettore" => "PoltronissimeOvest-settoreU", "coords" => "278,629,324,652,340,618,296,593"),
                    array("idSettore" => 17, "nomeSettore" => "CurvaEstSuperiore-settoreN", "coords" => "36,342,48,311,67,280,112,307,96,334,87,360"),
                    array("idSettore" => 18, "nomeSettore" => "CurvaEstSuperiore-settoreM", "coords" => "68,273,95,232,130,196,161,231,137,262,113,297"),
                    array("idSettore" => 19, "nomeSettore" => "CurvaEstSuperiore-settoreL", "coords" => "135,191,167,161,212,132,230,174,198,199,169,226"),
                    array("idSettore" => 20, "nomeSettore" => "CurvaEstInferiore-settore0", "coords" => "98,366,104,341,121,315,165,336,155,358,147,385"),
                    array("idSettore" => 21, "nomeSettore" => "CurvaEstInferiore-settore6", "coords" => "125,304,144,271,169,245,204,281,182,303,167,329"),
                    array("idSettore" => 22, "nomeSettore" => "CurvaEstInferiore-settore8", "coords" => "178,235,207,207,242,188,262,226,236,245,209,268"),
                    array("idSettore" => 23, "nomeSettore" => "PoltronissimeCurvaEst-settoreN", "coords" => "161,386,178,345,221,362,206,399"),
                    array("idSettore" => 24, "nomeSettore" => "PoltronissimeCurvaEst-settoreM", "coords" => "182,337,197,311,213,289,246,318,234,331,221,353"),
                    array("idSettore" => 25, "nomeSettore" => "PoltronissimeCurvaEst-settoreL", "coords" => "223,278,246,257,269,242,287,278,268,292,251,310"),
                    array("idSettore" => 26, "nomeSettore" => "TribunaSuperioreEst-settoreI", "coords" => "229,123,289,95,302,138,250,160"),
                    array("idSettore" => 27, "nomeSettore" => "TribunaSuperioreEst-settoreH", "coords" => "297,89,358,76,370,114,313,131"),
                    array("idSettore" => 28, "nomeSettore" => "TribunaSuperioreEst-settoreG", "coords" => "368,71,432,65,434,104,377,113"),
                    array("idSettore" => 29, "nomeSettore" => "TribunaSuperioreEst-settoreK", "coords" => "446,62,508,63,503,101,449,104"),
                    array("idSettore" => 30, "nomeSettore" => "TribunaSuperioreEst-settoreF", "coords" => "519,65,583,72,573,114,519,107"),
                    array("idSettore" => 31, "nomeSettore" => "TribunaSuperioreEst-settoreE", "coords" => "597,76,627,84,656,94,645,136,616,124,587,116,589,98"),
                    array("idSettore" => 32, "nomeSettore" => "TribunaSuperioreEst-settoreD", "coords" => "666,99,730,129,704,165,678,147,654,139"),
                    array("idSettore" => 33, "nomeSettore" => "PoltroneEst-settore9", "coords" => "259,177,291,161,332,145,346,190,310,201,276,220"),
                    array("idSettore" => 34, "nomeSettore" => "PoltroneEst-settore7", "coords" => "345,142,384,133,427,128,429,167,397,174,354,181"),
                    array("idSettore" => 35, "nomeSettore" => "PoltroneEst-settore0", "coords" => "437,126,524,127,517,167,438,167"),
                    array("idSettore" => 36, "nomeSettore" => "PoltroneEst-settore6", "coords" => "531,127,585,134,613,144,601,186,563,173,527,167"),
                    array("idSettore" => 37, "nomeSettore" => "PoltroneEst-settore8", "coords" => "624,146,700,179,675,221,644,203,610,188"),
                    array("idSettore" => 38, "nomeSettore" => "PoltronissimeEst-settoreI", "coords" => "280,232,305,218,332,207,344,240,320,252,297,269"),
                    array("idSettore" => 39, "nomeSettore" => "PoltronissimeEst-settoreG", "coords" => "411,183,467,178,471,215,440,216,415,217"),
                    array("idSettore" => 40, "nomeSettore" => "PoltronissimeEst-settoreF", "coords" => "480,179,518,180,539,185,536,220,509,217,478,215"),

                    array("idSettore" => 42, "nomeSettore" => "PoltronissimeEst-settoreD", "coords" => "623,209,670,231,648,265,620,248,609,243"),
                    array("idSettore" => 43, "nomeSettore" => "LoungeEst-settoreH", "coords" => "339,201,397,184,408,223,355,238"),
                    array("idSettore" => 44, "nomeSettore" => "LoungeEst-settoreF", "coords" => "552,184,615,203,601,238,544,220"),
                    array("idSettore" => 45, "nomeSettore" => "CurvaSudSuperiore-settoreC", "coords" => "725,178,751,140,828,199,795,238"),
                    array("idSettore" => 46, "nomeSettore" => "CurvaSudSuperiore-settoreB", "coords" => "807,253,841,216,872,250,897,304,852,323"),
                    array("idSettore" => 47, "nomeSettore" => "CurvaSudSuperiore-settoreA", "coords" => "856,334,903,313,920,362,925,424,875,427"),
                    array("idSettore" => 48, "nomeSettore" => "CurvaSudSuperiore-settore0", "coords" => "875,441,924,439,923,490,903,549,858,528"),
                    array("idSettore" => 49, "nomeSettore" => "CurvaSudSuperiore-settoreP", "coords" => "850,545,896,563,872,612,830,661,801,624"),
                    array("idSettore" => 50, "nomeSettore" => "CurvaSudSuperiore-settoreQ", "coords" => "713,696,791,637,821,669,781,706,735,736"),
                    array("idSettore" => 51, "nomeSettore" => "CurvaSudInferiore-settore4", "coords" => "696,230,713,193,758,220,790,256,755,288"),
                    array("idSettore" => 52, "nomeSettore" => "CurvaSudInferiore-settore2", "coords" => "760,295,799,266,833,319,853,372,804,386"),
                    array("idSettore" => 53, "nomeSettore" => "CurvaSudInferiore-settore1", "coords" => "807,393,857,385,861,444,854,496,806,484"),
                    array("idSettore" => 54, "nomeSettore" => "CurvaSudInferiore-settore3", "coords" => "801,497,848,510,832,562,800,604,765,571"),
                    array("idSettore" => 55, "nomeSettore" => "CurvaSudInferiore-settore5", "coords" => "754,584,786,620,745,658,702,681,684,642"),
                    array("idSettore" => 56, "nomeSettore" => "CurvaSudInferiore-settoreC", "coords" => "667,275,684,241,733,283,705,314"),
                    array("idSettore" => 57, "nomeSettore" => "CurvaSudInferiore-settoreB", "coords" => "712,328,742,295,763,326,777,354,738,371"),
                    array("idSettore" => 58, "nomeSettore" => "CurvaSudInferiore-settoreA", "coords" => "741,385,784,366,791,392,792,430,747,430"),
                    array("idSettore" => 59, "nomeSettore" => "CurvaSudInferiore-settore0", "coords" => "747,440,793,443,790,469,782,502,739,491"),
                    array("idSettore" => 60, "nomeSettore" => "CurvaSudInferiore-settoreP", "coords" => "736,495,778,510,767,538,741,571,712,541"),
                    array("idSettore" => 61, "nomeSettore" => "CurvaSudInferiore-settoreQ", "coords" => "656,591,702,553,730,581,705,605,677,625"),
                    array("idSettore" => 62, "nomeSettore" => "parterreNord", "coords" => "315,529,289,565,249,520,223,462,227,398,245,352,289,296,312,336,288,383,278,425,282,478"),
                    array("idSettore" => 63, "nomeSettore" => "parterreSud", "coords" => "635,333,658,291,697,333,720,385,727,442,718,496,687,540,652,575,619,538,670,475,674,416,657,367"),
                    array("idSettore" => 64, "nomeSettore" => "parterreEst", "coords" => "302,285,400,238,510,234,514,253,577,272,627,299,613,320,562,287,472,272,395,286,328,324")

                );
                // Connessione al database e recupero delle informazioni dei settori
                foreach ($settori as $settore) {
                    $idSettore = $settore["idSettore"];
                    $query = "SELECT * FROM settore WHERE idSettore = '$idSettore'";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $nome_settore = $row['nomeSettore'];
                            echo '<area shape="poly" coords="' . htmlspecialchars($settore["coords"]) . '" href="selezione.php?idSettore=' . htmlspecialchars($settore["idSettore"]) . '" alt="' . htmlspecialchars($nome_settore) . '" title="' . htmlspecialchars($nome_settore) . '">';
                        }
                    }
                }
                $_SESSION['settore'] = $idSettore; 

                ?>
            </map>
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