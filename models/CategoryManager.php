<?php
declare (strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Account
 */
class CategoryManager
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
     * Add Category to the database
     *
     * @param Category $category
     */
    public function add(Category $category)
    {
        $query = $this->getDb()->prepare('INSERT INTO categories (name) VALUES (:name)');
        $query->bindValue("name", $category->getName(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Get all Category
     *
     */
    public function getCategories()
    {

        $arrayOfCategories = [];
        $query = $this->getDb()->query('SELECT * FROM categories');

		// On récupère un tableau contenant plusieurs tableaux associatifs
        $dataCategories = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
        foreach ($dataCategories as $dataCategory) {
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
            $arrayOfCategories[] = new Category($dataCategory);
        }
        return $arrayOfCategories;
    }

    /**
     * Get a Category by id
     *
     * @param integer $id
     * @return Category
     */
    public function getCategory(int $id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('SELECT * FROM categories WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();

        $dataCategory = $query->fetch(PDO::FETCH_ASSOC);
        return new Category($dataCategory);
    }

    /**
     * Update Category
     *
     * @param Category $category
     */
    public function update(Category $category)
    {
        $query = $this->getDb()->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $query->bindValue("name", $category->getName(), PDO::PARAM_STR);
        $query->bindValue("id", $category->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Delete Category
     *
     * @param integer $category
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE * FROM categories WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
}
