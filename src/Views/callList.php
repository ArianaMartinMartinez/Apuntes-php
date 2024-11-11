<?php
    require_once("Components/layout.php");
?>
<body>
    <?php
        require_once("Components/header.php");
    ?>

    <main>
        <?php
            foreach($data["call"] as $call) {
                echo "
                    <p>{$call->dateTime}, {$call->room}, {$call->issue}, {$call->id}</p>
                ";
            }
        ?>
    </main>

    <?php
        require_once("Components/footer.php");
    ?>
</body>