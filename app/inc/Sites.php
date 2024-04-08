<?php

class Sites
{
    public function getSites()
    {
        global $conn;
        $sql = "SELECT * FROM Lieux 
                JOIN LieuxVilles ON Lieux.idLieu = LieuxVilles.idLieu
                JOIN Villes ON LieuxVilles.idVille = Villes.idVille";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function displaySites()
    {
        $sites = $this->getSites();
        $html = '<h1>Liste des sites</h1><ul>';

        $html .= '<table>
                    <tr>
                        <th>Lieu</th>
                        <th>Ville</th>
                        <th>Coordonnées</th>
                        <th>Site Olympique</th>
                        <th>Site Paralympique</th>
                    </tr>';

        foreach ($sites as $site) {
            $html .= '<tr>';
                $html .= '<td>' . $site['lieu'] . '</td>';
                $html .= '<td>' . $site['ville'] . '</td>';
                $html .= '<td>' . $site['GeoPoint'] . '</td>';
                $html .= '<td>' . $site['Site Olympique'] . '</td>';
                $html .= '<td>' . $site['Site paralympique'] . '</td>';

            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }
}