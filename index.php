<?php

require_once './Elements/AbstractElement.php';
require_once './Elements/ElementInterface.php';
require_once './Elements/Paper.php';
require_once './Elements/Rock.php';
require_once './Elements/Scissors.php';
require_once './Elements/Lizard.php';
require_once './Elements/Spock.php';

/*
foreach (glob('./Elements/*.php') as $filename) {
    require_once ($filename);
}
*/

require_once './Results/Result.php';
require_once './Results/LoseResult.php';
require_once './Results/WinResult.php';
require_once './Results/TieResult.php';

/*
foreach (glob('./Results/*.php') as $filename) {
    require_once ($filename);
}
*/

require_once './Elements/ElementCollection.php';

$elements = new ElementCollection();
$elements->addElement(new Rock('Rock'));
$elements->addElement(new Paper('Paper'));
$elements->addElement(new Scissors('Scissors'));
$elements->addElement(new Lizard('Lizard'));
$elements->addElement(new Spock('Spock'));

if ($_GET) {
    $pc = $elements->getAllElements()[array_rand($elements->getAllElements())];

    $result = $elements->getElement($_GET['player'])->beats($pc);
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Rock, Paper, Scissors, Lizard, Spock</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
<form action="/" method="get">
    <div class="title"><h1>Let's play Rock, Paper, Scissors, Lizard, Spock</h1></div>
    <?php if ($_GET): ?>
        <div class="result"><h2><?= $result->getMessage(); ?></h2></div>
        <div class="parent">
            <div class="child" style="text-align: right">
                <img src="./Pictures/Elements/<?= $_GET['player'] ?>.svg" alt="<?= $_GET['player'] ?>" height="120px">
            </div>
            <div class="vs" style="text-align: center">
                <h2 style="margin-top: 50px">VS</h2>
            </div>
            <div class="child">
                <img src="./Pictures/Elements/<?= get_class($pc) ?>.svg" alt="<?= get_class($pc) ?>" height="120px">
            </div>
        </div>
    <?php endif; ?>
    <div class="elements">
        <?php foreach ($elements->getAllElements() as $element): ?>
            <button type="submit" value="<?= get_class($element); ?>" name="player"><img
                        src="Pictures/Elements/<?= get_class($element); ?>.svg" alt="<?= get_class($element); ?>">
            </button>
        <?php endforeach; ?>
    </div>
    <div style="text-align: center">
        <h2>FAQ</h2>
        <img src="Pictures/RPSLS.png" alt="FAQ" height="400px">
    </div>
</form>
</body>

</html>