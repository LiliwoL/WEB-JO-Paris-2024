<?php

class Sport
{
    /**
     * Récupération de la liste de TOUS les sports en base
     *
     * @return mixed
     */
    public function getSports()
    {
        global $conn;
        $sql = "SELECT * FROM Sports";
        $stmt = $conn->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Affichage de la liste des sports sous forme de UL
     *
     * @return string
     */
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