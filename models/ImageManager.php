<?php
declare (strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Account
 */
class ImageManager
{

    private $_db;

    /**
     * Constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Set the value of $_db
     *
     * @param PDO $db
     * return self
     */
    public function setDb(PDO $db)
    {
        $this->_db = $db;
        return $this;
    }

    /**
     * Get the value of $_db
     *
     * @return $_db
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Add Image to the database
     *
     * @param Image $image
     */
    public function add(Image $image)
    {
        $query = $this->getDb()->prepare('INSERT INTO images(source, alt) VALUES (:source, :alt)');
        $query->bindValue("source", $image->getSource(), PDO::PARAM_STR);
        $query->bindValue("alt", $image->getAlt(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Get all images
     *
     */
    public function getImages()
    {

        $arrayOfImages = [];
        $query = $this->getDb()->query('SELECT * FROM images');

		// On récupère un tableau contenant plusieurs tableaux associatifs
        $dataImages = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
        foreach ($dataImages as $dataImage) {
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
            $arrayOfImages[] = new Image($dataImage);
        }
        return $arrayOfImages;
    }

    /**
     * Get a Image by id
     *
     * @param integer $id
     * @return Image
     */
    public function getImage(int $id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('SELECT * FROM images WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();

        $dataImage = $query->fetch(PDO::FETCH_ASSOC);
        return new Image($dataImage);
    }

    /**
     * Update image
     *
     * @param Image $image
     */
    public function update(Image $image)
    {
        $query = $this->getDb()->prepare('UPDATE images SET source = :source, alt = :alt WHERE id = :id');
        $query->bindValue("source", $image->getSource(), PDO::PARAM_STR);
        $query->bindValue("alt", $image->getAlt(), PDO::PARAM_STR);
        $query->bindValue("id", $image->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Delete image
     *
     * @param integer $image
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE * FROM images WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
}
