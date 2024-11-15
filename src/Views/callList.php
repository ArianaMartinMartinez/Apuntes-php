<?php
    require_once("Components/layout.php");
?>
<body>
    <?php
        require_once("Components/header.php");
    ?>

    <main>
        <h1>Call problems</h1>

        <div>
            <a href="?action=create">
                <button type="button" class="btn btn-success">Add problem</button>
            </a>
        </div>

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
                                <td>{$call->getDateTime()}</td>
                                <td>{$call->getRoom()}</td>
                                <td>{$call->getIssue()}</td>
                                <td>{$call->getId()}</td>
                                <td>
                                    <a href='?action=delete&id={$call->getId()}'>
                                        <button type='button' class='btn btn-danger'>Delete</button>
                                    </a>
                                    <a href='?action=edit&id={$call->getId()}'>
                                        <button type='button' class='btn btn-info'>Edit</button>
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