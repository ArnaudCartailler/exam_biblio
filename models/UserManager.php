<?php
declare (strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Account
 */
class UserManager
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
     * Add users to the database
     *
     * @param users $user
     */
    public function add(User $user)
    {
        $query = $this->getDb()->prepare('INSERT INTO users(firstname, lastname, identifiant, borrowed, listing) VALUES ( :firstname, :lastname, :identifiant, :borrowed, :listing)');
        $query->bindValue("firstname", $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue("lastname", $user->getLastname(), PDO::PARAM_STR);
        $query->bindValue("identifiant", $user->getIdentifiant(), PDO::PARAM_STR);
        $query->bindValue("borrowed", $user->getBorrowed(), PDO::PARAM_INT);
        $query->bindValue("listing", $user->getListing(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * check if users exist
     *
     * @param string $identifiant
     * @return boolean
     */
    public function checkIfExist(string $user)
    {
        $query = $this->getDb()->prepare('SELECT * FROM users WHERE identifiant= :identifiant');
        $query->bindValue('identifiant', $identifiant, PDO::PARAM_STR);
        $query->execute();
        // If this identifiant exist we return true
        if ($query->rowCount() > 0) {
            return true;
        }
        
        // else it doesn't exist yet and we return false
        return false;
    }


    /**
     * Get all users
     *
     */
    public function getUsers()
    {

        $arrayOfUsers = [];
        $query = $this->getDb()->query('SELECT * FROM users');

		// On récupère un tableau contenant plusieurs tableaux associatifs
        $dataUsers = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
        foreach ($dataUsers as $dataUser) {
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
            $arrayOfUsers[] = new User($dataUser);
        }
        return $arrayOfUsers;
    }

    /**
     * Get a user by id
     *
     * @param integer $id
     * @return User
     */
    public function getUser($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();

        $userBook = $query->fetch(PDO::FETCH_ASSOC);
        return new User($userBook);
    }

    /**
     * Update users
     *
     * @param users $user
     */
    public function update(User $user)
    {
        $query = $this->getDb()->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname WHERE id = :id');
        $query->bindValue("firstname", $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue("lastname", $user->getLastname(), PDO::PARAM_STR);
        $query->bindValue("id", $user->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Delete users
     *
     * @param integer $user
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
}
