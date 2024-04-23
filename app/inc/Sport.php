<?php

class Sport
{
    /**
     * Récupération de tous les sports dans la base
     *
     * @return mixed
     */
    public function getSports(): array
    {
        global $conn;
        $sql = "SELECT * FROM Sports";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Récupération d'un sport dans la base
     *
     * @param $id
     * @return mixed
     */
    public function getSportById($id): array
    {
        global $conn;
        $sql = "SELECT * FROM Sports WHERE idSport = :id";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Affichage de tous les sports au format liste UL
     *
     * @return string
     */
    public function displaySports(): string
    {
        $sports = $this->getSports();
        $html = '<h1>Liste des sports</h1>';

        $html .= '<ul>';
        foreach ($sports as $sport) {
            $html .= '<li>';
            $html .= '<a href="sport.php?id=' . $sport['idSport'] . '&action=show">'. $sport['nom'] . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    /**
     * Affichage de tous les sports au format tableau
     *
     * @return string
     */
    public function displaySportsAsTable(): string
    {
        $sports = $this->getSports();
        $html = '<h1>Liste des sports</h1>';

        $html .= '<table class="table-hover">';
        // Entête du tableau
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Nom</th>';
            $html .= '</tr>';
        $html .= '</thead>';

        // Corps du tableau
        $html .= '<tbody>';
            foreach ($sports as $sport)
            {
                // Ligne du tableau
                $html .= '<tr>';
                    $html .= '<td><a href="sport.php?id=' . $sport['idSport'] . '&action=show">'. $sport['nom'] . '</a></td>';
                $html .= '</tr>';
            }
        $html .= '<tbody>';
        $html .= '</table>';
        return $html;
    }

    public function displaySport(int $id): string
    {
        $sport = $this->getSportById($id);
        $html = '<p>' . $sport['nom'] . '</p>';
        return $html;
    }
}