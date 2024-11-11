<?php

namespace App\Controllers;

use App\Models\Call;
use App\Core\View;

class CallController {

    public function __construct() {
        $this->index();
    }

    public function index() {
        $call = new Call;
        $calls = $call->all();

        new View("callList", ["call" => $calls]);
    }
}