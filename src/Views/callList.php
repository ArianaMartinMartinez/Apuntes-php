<?php
    require_once("Components/layout.php");
?>
<body>
    <?php
        require_once("Components/header.php");
    ?>

    <main>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Room</th>
                    <th>Issue</th>
                    <th>Id</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data["call"] as $call) {

                        echo "
                            <tr>
                                <td>{$call->dateTime}</td>
                                <td>{$call->room}</td>
                                <td>{$call->issue}</td>
                                <td>{$call->id}</td>
                                <td>
                                    <a href='?action=delete&id={$call->id}'>
                                        <button type='button' class='btn btn-danger'>Eliminar</button>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </main>

    <?php
        require_once("Components/footer.php");
    ?>
</body>