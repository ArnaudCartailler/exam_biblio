<?php
declare (strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Account
 */
class BookManager
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
     * Add book to the database
     *
     * @param Book $book
     */
    public function add(Book $book)
    {
        $query = $this->getDb()->prepare('INSERT INTO books(title, author, date, summary, available, id_categories, image) VALUES (:title, :author, :date, :summary, :available, :id_categories, :image)');
        $query->bindValue("title", $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue("author", $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue("date", $book->getDate(), PDO::PARAM_STR);
        $query->bindValue("summary", $book->getSummary(), PDO::PARAM_STR);
        $query->bindValue("available", $book->getAvailable(), PDO::PARAM_INT);
        $query->bindValue("id_categories", $book->getIdCategories(), PDO::PARAM_INT);
        $query->bindValue("image", $book->getImage(), PDO::PARAM_STR);

        $query->execute();
    }

    /**
     * Get all accounts
     *
     */
    public function getBooks()
    {

        $arrayOfBooks = [];
        $query = $this->getDb()->query('SELECT * FROM books');

		// On récupère un tableau contenant plusieurs tableaux associatifs
        $dataBooks = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
        foreach ($dataBooks as $dataBook) {
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
            $arrayOfBooks[] = new Book($dataBook);
        }
        return $arrayOfBooks;
    }

    /**
     * Get a book by id
     *
     * @param integer $id
     * @return Book
     */
    public function getBook($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('SELECT * FROM books WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();

        $dataBook = $query->fetch(PDO::FETCH_ASSOC);
        return new Book($dataBook);
    }

    /**
     * Update book
     *
     * @param Book $book
     */
    public function update(Book $book)
    {
        $query = $this->getDb()->prepare('UPDATE books SET title = :title, author = :author, date = :date, summary = :summary, id_categories = :id_categories, available = :available, image = :image WHERE id = :id');
        $query->bindValue("title", $book->getTitle(), PDO::PARAM_STR);
        $query->bindValue("author", $book->getAuthor(), PDO::PARAM_STR);
        $query->bindValue("date", $book->getDate(), PDO::PARAM_STR);
        $query->bindValue("summary", $book->getSummary(), PDO::PARAM_STR);
        $query->bindValue("available", $book->getAvailable(), PDO::PARAM_INT);
        $query->bindValue("id_categories", $book->getIdCategories(), PDO::PARAM_INT);
        $query->bindValue("image", $book->getImage(), PDO::PARAM_STR);
        $query->bindValue("id", $book->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Delete book
     *
     * @param integer $book
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE FROM books WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
}
