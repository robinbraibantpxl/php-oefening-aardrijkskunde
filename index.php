<!--Hieronder komt de logica-->
<?php

$capitals = ["Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels",
    "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland" => "Dublin",
    "The Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm",
    "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", "Czech Republic" => "Prague",
    "Estonia" => "Tallinn", "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valletta",
    "Austria" => "Vienna", "Poland" => "Warsaw"];

asort($capitals);

$userFeedback = '';

if ($_POST) {
    if (isset($_POST["selectedCapital"]) && isset($_POST["randomCountry"])) {
        $randomCountry = $_POST["randomCountry"];
        $correctCapital = $capitals[$randomCountry];
        $countryLinkedToSelectedCapital = array_search($_POST["selectedCapital"], $capitals);

        if (empty($_POST["selectedCapital"])) {
            $userFeedback = "Kies een stad!";
        } elseif(strtolower($randomCountry) == strtolower($countryLinkedToSelectedCapital)) {
            $userFeedback = "Correct";
        } else {
            $userFeedback = "Fout, het juiste antwoord is: $correctCapital";
        }
    }
}

?>

<!--Hieronder komt de code die de gebruiker gaat zien-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht PHP Aardrijkskunde</title>
</head>
<body>
<header>
    <h1>Opdracht PHP Aardrijkskunde</h1>
</header>
<main>
    <section>
        <h2>Selecteer uit de lijst de hoofdstad voor het gegeven land</h2>
        <?php
            $randomCountry = array_rand($capitals);
            echo "<p>Het gegeven land: $randomCountry </p>"
        ?>
    </section>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="capitals">Selecteer de juiste hoofdstad</label>
            <input type="hidden" name="randomCountry" value="<?php echo $randomCountry ?>">
            <select name="selectedCapital" id="capitals">
                <option value="">Kies een hoofdstad</option>

                <?php foreach ($capitals as $capital) { ?>
                    <option value="<?php echo $capital ?>"><?php echo $capital; ?></option>
                <?php } ?>
            </select>
            <button type="submit">Check mijn resultaat</button>
        </form>
    </section>

    <?php if (!empty($userFeedback)) { ?>
    <section>
        <h2>Jouw resultaat</h2>
        <p><?php echo $userFeedback ?></p>
    </section>
    <?php } ?>
</main>
</body>
</html>

