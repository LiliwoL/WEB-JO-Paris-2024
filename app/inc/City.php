<?php

class City
{
    public function getCities(): array
    {
        global $conn;

        $sql = "SELECT * FROM Villes";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCityById(int $id): array
    {
        global $conn;

        $sql = "SELECT * FROM Villes WHERE idVille = :id";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function displayCities(): string
    {
        $cities = $this->getCities();
        $html = '<h1>Liste des villes</h1>';

        $html .= '<ul>';
        foreach ($cities as $city) {
            $html .= '<li>';
            $html .= '<a href="city.php?id=' . $city['idVille'] . '&action=show">'. $city['ville'] . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public function displayCitiesAsTable(): string
    {
        $cities = $this->getCities();
        $html = '<h1>Liste des villes</h1>';

        $html .= '<table class="table">';
            $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th scope="col">Nom</th>';
                $html .= '</tr>';
            $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($cities as $city) {
            $html .= '<tr>';
            $html .= '<td><a href="city.php?id=' . $city['idVille'] . '&action=show">'. $city['ville'] . '</a></td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }

    public function displayCity(int $id): string
    {
        $city = $this->getCityById($id);
        $html = '<p>' . $city['ville'] . '</p>';
        return $html;
    }
}