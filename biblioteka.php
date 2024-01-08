<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="banner">
        <h1>Biblioteka w Książkowicach Małych</h1>
    </section>
<section id="flexy">
    <section id="lewy">
    <h4>Dodaj czytelnika</h4>
        <form action="" method="post">
            imie: <input type="text" name="imie" id=""> <br>
            nazwisko: <input type="text" name="nazwisko"> <br>
            symbol: <input type="number" name="symbol"> <br>
            <input type="submit" value="AKCEPTUJ">
        </form>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka");
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $kod = $_POST['symbol'];

        if(!empty($imie) && !empty($nazwisko) && !empty($kod)){
            echo "Dodano czytelnika ";
            echo "$imie";
            echo " ";
            echo "$nazwisko";
            $zapytanie = "INSERT INTO czytelnicy SET imie='$imie', nazwisko='$nazwisko', kod='$kod';";

            mysqli_query($polaczenie, $zapytanie);
        }

        mysqli_close($polaczenie);
        //skrypt 1
        ?>
    </section>

    <section id="srodek">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
        <p>
            <a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a>
        </p>
    </section>

    <section id="prawy">
        <h4>Nasi czytelnicy:</h4>
        <ol>
            <?php
            $polaczenie2 = mysqli_connect("localhost", "root", "", "biblioteka");

            //$zapytanie2 = "SELECT imie, nazwisko FROM `czytelnicy` GROUP BY nazwisko ASC;";
            $zapytanie2 = mysqli_query($polaczenie2, "SELECT imie, nazwisko FROM `czytelnicy` GROUP BY nazwisko ASC;");
            while($row = mysqli_fetch_row($zapytanie2)){
                echo "<li>";
                echo $row[0];
                echo " ";
                echo $row[1];
                echo "</li>";
            }
            mysqli_close($polaczenie2);
            //skrypt 2
            ?>
        </ol>
    </section>
    </section>
    <section id="stopka">
        <p>Projekt witryny: 000000000000</p>
    </section>
    
</body>
</html>