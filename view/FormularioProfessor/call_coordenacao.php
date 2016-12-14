<?php

if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest") {
    include 'conn.php';
    $codCoord = filter_input(INPUT_POST, 'codCoord', FILTER_SANITIZE_NUMBER_INT);
    if ($codCoord) {
        $query = $pdo->prepare('SELECT codCoord, nome FROM COORDENACAO where codCentro=? ORDER BY nome');
        $query->bindParam(1, $codCoord, PDO::PARAM_INT);
        $query->execute();
        echo json_encode($query->fetchAll());
        return;
    }
}
echo NULL;
