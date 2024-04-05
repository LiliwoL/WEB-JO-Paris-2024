<?php

class Sport
{
    public function getSports()
    {
        global $conn;
        $sql = "SELECT * FROM Sports";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function displaySports()
    {
        $sports = $this->getSports();
        $html = '<h1>Liste des sports</h1><ul>';
        foreach ($sports as $sport) {
            $html .= '<li>' . $sport['nom'] . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}