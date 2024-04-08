<?php

class City
{
    public function getCities()
    {
        global $conn;
        $sql = "SELECT * FROM Villes";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function displayCities()
    {
        $cities = $this->getCities();
        $html = '<h1>Liste des villes</h1><ul>';
        foreach ($cities as $city) {
            $html .= '<li>' . $city['ville'] . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}