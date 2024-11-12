<?php
    require_once("Components/layout.php");
?>

<body>
    <?php
        require_once("Components/header.php");
    ?>

    <main>
        <h2>New Call</h2>

        <a href="./index.php">
            <button type="button" id="button-cancel" class="btn btn-outline-danger button-cancel">Cancel</button>
        </a>

        <form class="justify-content-center" action="?action=store" method="post">
            <div class="input-group" style="margin-bottom: 2rem; width: 90%; margin-left: 5%">
                <span class="input-group-text">Issue Room</span>
                <input type="text" name="room" required placeholder="Write here the room">
            </div>

            <div class="input-group" style="margin-bottom: 2rem; width: 90%; margin-left: 5%">
                <span class="input-group-text">Issue description</span>
                <textarea class="form-control" area-label="Width textarea" type="text" name="issue" required placeholder="Issue description"></textarea>
            </div>

            <div class="input-group" style="margin-bottom: 2rem; width: 90%; margin-left: 5%">
                <span class="input-group-text">Issue Date</span>
                <input type="date" name="dateTime" required>
            </div>

            <div class="botones" style="margin-bottom: 2rem;">
                <input type="submit" value="Create" class="btn-lg btn-outline-success go-add-task float">
                <input type="reset" value="Reset" class="btn-lg btn-outline-warning go-add-task float">
            </div>
        </form>
    </main>

    <?php
        require_once("Components/footer.php");
    ?>
</body>