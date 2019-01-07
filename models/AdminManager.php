<?php
declare (strict_types = 1);

/**
 *  Classe permettant de gérer les opérations en base de données concernant les objets Account
 */
class AdminManager
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
     * Add admin to the database
     *
     * @param admin $admin
     */
    public function addAdmin(Admin $admin)
    {
        $query = $this->getDb()->prepare('INSERT INTO admin(password, username, email) VALUES ( :password, :username, :email)');
        $query->bindValue("password", $admin->getPassword(), PDO::PARAM_STR);
        $query->bindValue("username", $admin->getUsername(), PDO::PARAM_STR);
        $query->bindValue("email", $admin->getEmail(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * check if admin exist
     *
     * @param string $email
     * @return boolean
     */
    public function checkIfExist(string $username)
    {
        $query = $this->getDb()->prepare('SELECT * FROM admin WHERE username = :username');
        $query->bindValue('username', $username, PDO::PARAM_STR);
        $query->execute();
        // If this email exist we return true
        if ($query->rowCount() > 0) {
            return true;
        }
        
        // else it doesn't exist yet and we return false
        return false;
    }


    /**
     * Get all admins
     *
     */
    public function getAdmins()
    {

        $arrayOfAdmins = [];
        $query = $this->getDb()->query('SELECT * FROM admin');

		// On récupère un tableau contenant plusieurs tableaux associatifs
        $dataAdmins = $query->fetchAll(PDO::FETCH_ASSOC);

		// A chaque tour de boucle, on récupère un tableau associatif concernant un seul compte
        foreach ($dataAdmins as $dataAdmin) {
			// On crée un nouvel objet grâce au tableau associatif, qu'on stocke dans $arrayOfAccounts
            $arrayOfAdmins[] = new Admin($dataAdmin);
        }
        return $arrayOfAdmins;
    }

    /**
     * Get a admin by id
     *
     * @param integer $id
     * @return admin
     */
    public function getAdmin(string $username)
    {
        $query = $this->getDb()->prepare('SELECT * FROM admin WHERE username = :username');
        $query->bindValue("username", $username, PDO::PARAM_STR);
        $query->execute();

        $dataAdmin = $query->fetch(PDO::FETCH_ASSOC);
        return new Admin($dataAdmin);
    }

    /**
     * Update admin
     *
     * @param admin $admin
     */
    public function update(Admin $admin)
    {
        $query = $this->getDb()->prepare('UPDATE admin SET identification = :identification, password = :password, username = :username, email = :email WHERE id = :id');
        $query->bindValue("identification", $admin->getIdentification(), PDO::PARAM_STR);
        $query->bindValue("password", $admin->getPassword(), PDO::PARAM_STR);
        $query->bindValue("username", $admin->getUsername(), PDO::PARAM_STR);
        $query->bindValue("email", $admin->getEmail(), PDO::PARAM_STR);
        $query->bindValue("id", $admin->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Delete admin
     *
     * @param integer $admin
     */
    public function delete(int $id)
    {
        $query = $this->getDb()->prepare('DELETE * FROM admin WHERE id = :id');
        $query->bindValue("id", $id, PDO::PARAM_INT);
        $query->execute();
    }
}
