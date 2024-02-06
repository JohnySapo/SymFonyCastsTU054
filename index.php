<?php
require 'lib/functions.php';

$pets = get_pets();

$pets = array_reverse($pets);

$strUnkown = 'Unknown';

$cleverWelcomeMessage = 'All the love, none of the crap!';
$pupCount = count($pets);
?>

<?php require 'layout/header.php'; ?>

<div class="jumbotron">
    <div class="container">
        <h1><?php echo $cleverWelcomeMessage; ?></h1>

        <p>With over <?php echo $pupCount ?> pet friends!</p>

        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($pets as $cutePet) { ?>
            <div class="col-md-4 pet-list-item">
                <h2><?php echo $cutePet['name']; ?></h2>

                <img src="/images/<?php echo $cutePet['image']; ?>" class="img-rounded">

                <blockquote class="pet-details">
                    <span class="label label-info"><?php echo $cutePet['breed']; ?></span>
                    <?php

                    if (!array_key_exists('age', $cutePet) || $cutePet['age'] == '') {
                        echo $strUnkown;
                    } elseif ($cutePet['age'] == 'hidden') {
                        echo '(contact owner for age)';
                    } else {
                        echo $cutePet['age'];
                    }

                    ?>
                    <?php echo $cutePet['weight']; ?> lbs
                </blockquote>

                <p><?php echo $cutePet['bio']; ?></p>
            </div>
        <?php } ?>

        <?php
        foreach ($pets as $cutePet) {
            echo '<div class="col-lg-4">';
            echo '<h2>';
            echo $cutePet['name'];
            echo '</h2>';
            echo '<p>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                            condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                            euismod. Donec sed odio dui. 
                    </p>';
            echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
            echo '</div>';
        }
        ?>
    </div>

    <hr>
    <?php 
        require 'layout/footer.php';
    ?>