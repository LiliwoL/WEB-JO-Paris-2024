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

    public function getSports(int $id): array
    {
        global $conn;

        $sql = "SELECT DISTINCT Sports.idSport, Sports.nom FROM Sports
                JOIN Calendrier ON Calendrier.idSport = Sports.idSport
                JOIN Lieux ON Lieux.idLieu = Calendrier.idLieu
                JOIN LieuxVilles ON LieuxVilles.idLieu = Lieux.idLieu
                JOIN Villes ON Villes.idVille = LieuxVilles.idVille
                WHERE Villes.idVille = :id
              ";

        $stmt = $conn->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
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



    public function displaySports(int $id): string
    {
        $sports = $this->getSports($id);
        $html = '<h2>Sports</h2>';

        $html .= '<ul>';
        foreach ($sports as $sport) {
            $html .= '<li>';
            $html .= '<a href="sport.php?id=' . $sport['idSport'] . '&action=show">'. $sport['nom'] . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}