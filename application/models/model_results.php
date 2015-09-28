<?php

class Model_Results extends Model
{
    public function get_data()
    {
        $query = $this->db->query("SELECT id, url, count, type FROM results ORDER BY id DESC");
        return $query->fetchAll();
    }

    public function get_results($id)
    {
        $query = $this->db->prepare("SELECT result FROM results WHERE id=?");
        $query->execute([$id]);
        return $query->fetchAll();
    }
}

