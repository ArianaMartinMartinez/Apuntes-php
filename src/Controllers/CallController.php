<?php

namespace App\Controllers;

use App\Models\Call;
use App\Core\View;

class CallController {

    public function __construct() {
        if(isset($_GET["action"]) && ($_GET["action"] == "delete")) {
            $this->delete($_GET["id"]);
            return;
        }

        if(isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }

        if(isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $this->store($_POST);
            return;
        }

        if(isset($_GET["action"]) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }

        if(isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }

        $this->index();
    }

    public function index() {
        $call = new Call;
        $calls = $call->all();

        new View("callList", ["call" => $calls]);
    }

    public function delete($id) {
        $callDelete = new Call;
        $call = $callDelete->findById($id);

        $call->destroy();
        $this->index();
    }

    public function create() {
        new View("createCall");
    }

    public function store(array $request) {
        $newCall = new Call(null, $request["room"], $request["issue"], $request["dateTime"]);
        $newCall->save();

        $this->index();
    }

    public function edit($id) {
        $callEdit = new Call;
        $call = $callEdit->findById($id);

        new View("editCall", ["call" => $call]);
    }

    public function update(array $request, $id) {
        /*
        Si el usuario puede cambiar todos los datos (excepto el id)
        $updatedCall = new Call($id, $request["room"], $request["issue"], $request["dateTime"]);
        $updatedCall->update();
        */

        /*
        Si queremos que el usuario en el formulario no pueda modificar todos los datos
        (por ejemplo podemos quitar el dateTime del formulario y que no se pueda modificar)
        */
        $callUpdate = new Call;
        $call = $callUpdate->findById($id);
        $call->rename($request["room"], $request["issue"], $request["dateTime"]);
        $call->update();

        $this->index();
    }
}