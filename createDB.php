<?php

require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function execute($sqlFile) {
    $bdd = get_bdd();
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!file_exists($sqlFile)) {
        echo "❌ Fichier SQL introuvable : $sqlFile<br>";
        return false;
    }

    $sql = file_get_contents($sqlFile);

    if (!$sql || trim($sql) === "") {
        echo "❌ Le fichier SQL est vide : $sqlFile<br>";
        return false;
    }

    try {
        $bdd->exec($sql);
        echo "✔️ Script exécuté : $sqlFile<br>";
        return true;
    } catch (PDOException $e) {
        echo "❌ Erreur SQL dans $sqlFile : " . $e->getMessage() . "<br>";
        return false;
    }
}

function createUser($fname, $mail, $id_role, $id_depser) {
    if(insertUser("test", $fname, $mail, "test", $id_role, $id_depser)) {
        echo "✔️ Utilisateur $fname créer avec succès<br>";
    } else {
        echo "❌ L'tilisateur $fname n'as pu être créer<br>";
    }
}

function setHashedPassword() {
    $bdd = get_bdd();
    $query = $bdd->query("SELECT id_utilisateur, mdp_utilisateur FROM UTILISATEUR");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $bdd->prepare("UPDATE UTILISATEUR SET mdp_utilisateur = :mdp WHERE id_utilisateur = :id");

    foreach ($users as $user) {
        $mdp_hash = password_hash($user["mdp_utilisateur"], PASSWORD_DEFAULT);

        $stmt->execute([
            ':mdp' => $mdp_hash,
            ':id' => $user["id_utilisateur"]
        ]);
    }
}

function create_database() {
    // if (!execute('assets/sql/script_creation.sql')) return;

    // if (!execute('assets/sql/script_insertion.sql')) return;
    // setHashedPassword();
    
    // createUser("etudiant", "test.etudiant.etu@univ-lemans.fr", 1, 1);
    // createUser("enseignant", "test.enseignant@univ-lemans.fr", 2, 1);
    // createUser("presidence", "test.presidence@univ-lemans.fr", 3, 3);

    // execute('assets/sql/script_enseignant.sql');
    // execute('assets/sql/script_etudiant.sql');
    // execute('assets/sql/script_presidence.sql');
}

create_database();