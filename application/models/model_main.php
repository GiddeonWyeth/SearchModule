<?php

class Model_Main extends Model
{
    public function set_data($type, $url, $result, $count)
    {

        $query = $this->db->prepare("INSERT INTO results(type, url, result, count) VALUES(?, ?, ?, ?)");
        $query->execute([$type, $url, $result, $count]);
    }
}

