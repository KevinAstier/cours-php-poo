<?php

require_once('libraries/models/Model.php');

class Article extends Model {

    /**
     * Retourne la liste des articles classés par date de création
     *
     * @return array
     */
    public function findAll(): array {

        // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }

    /**
     * Retourne un article grâce à son identifiant
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        // On exécute la requête en précisant le paramètre :article_id
        $query->execute(['article_id' => $id]);
        // On fouille le résultat pour en extraire les données réelles de l'article
        $article = $query->fetch();

        return $article;
    }

    /**
     * Supprime un article dans la base grâce à son identifiant
     * @param int $id
     * @return void
     */
    public function delete(int $id): void {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}