<?php

namespace App\Models;

use App\Database;

class Call {

    private ?int $id;
    private string $room;
    private string $issue;
    private ?string $dateTime;

    private $database;
    private $table = "problems";

    public function __construct($id=null, $room="", $issue="", $dateTime=null) {
        $this->id = $id;
        $this->room = $room;
        $this->issue = $issue;
        $this->dateTime = $dateTime;

        if(!$this->database) {
            $this->database = new Database();
        }
    }

    public function all() {
        $query = $this->database->mysql->query("SELECT * FROM {$this->table}");
        $callArray = $query->fetchAll();

        $callList = [];

        foreach ($callArray as $call) {
            $callItem = new Call($call["id"], $call["room"], $call["issue"], $call["dateTime"]);
            array_push($callList, $callItem);
        }

        return $callList;
    }

    public function findById($id) {
        $query = $this->database->mysql->query("SELECT * FROM {$this->table} WHERE id={$id}");
        $result = $query->fetchAll();

        return new Call($result[0]["id"], $result[0]["room"], $result[0]["issue"], $result[0]["dateTime"]);
    }

    public function destroy() {
        $query = $this->database->mysql->query("DELETE FROM {$this->table} WHERE id={$this->id}");
    }

    public function save() {
        $query = $this->database->mysql->query("INSERT INTO {$this->table} (room, issue, dateTime) VALUES ('{$this->room}', '{$this->issue}', '{$this->dateTime}')");
    }

    
    public function rename($roomUpdate, $issueUpdate, $dateTimeUpdate) {
        $this->room = $roomUpdate;
        $this->issue = $issueUpdate;
        $this->dateTime = $dateTimeUpdate;
    }
    
    public function update() {
        $query = $this->database->mysql->query("UPDATE {$this->table} SET room='{$this->room}', issue='{$this->issue}', dateTime='{$this->dateTime}' WHERE id={$this->id}");
    }


    public function getId() {
        return $this->id;
    }

    public function getRoom() {
        return $this->room;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function getDateTime() {
        return $this->dateTime;
    }
}