<?php 

    function get_connection() {
        $config = require 'config.php';

        $pdo = new PDO(
            $config['database_dsn'],
            $config['database_user'],
            $config['database_pass']
        );

        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    function get_pets($limit = null) {
        $pdo = get_connection();

        $query = 'SELECT * FROM pet';
        if ($limit) {
            $query = $query .' LIMIT :resultLimit';
        }

        $stmt = $pdo->prepare($query);

        if ($limit) {
            $stmt->bindParam('resultLimit', $limit);
        }
        
        $stmt->execute();
        $pets = $stmt->fetchAll();
    
        return $pets;
    }

    function get_pet($id) {

        $pdo = get_connection();

        $query = 'SELECT * FROM PET WHERE ID = :idVal';
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam('idVal', $id);
        $stmt -> execute();

        return $stmt -> fetch();
    }

    function save_pets($petsToSave) {
        $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
        file_put_contents('data/pets.json', $json);
    }

?>