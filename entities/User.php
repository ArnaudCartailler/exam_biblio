<?php

declare (strict_types = 1);

class User
{

    protected $id,
              $firstname,
              $lastname,
              $identifiant,
              $borrowed,
              $listing; 


    /**
     * Constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $array
     *
     */
    public function hydrate(array $array)
    {
        foreach ($array as $key => $value) {
			// On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);

			// Si le setter correspondant existe.
            if (method_exists($this, $method)) {
				// On appelle le setter.
                $this->$method($value);
            }
        }
    }

	//////////////////    SETTERS    //////////////////

    /**
     * Set the value of $id
     *
     * @param integer $id
     * @return self
     */
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
        return $this;
    }

    /**
     * Set the value of $firstname
     *
     * @param string $firstname
     * @return self
     */
    public function setFirstname(string $firstname)
    {
        if (is_string($firstname)) {
            $this->firstname = $firstname;
        }
        return $this;
    }


    /**
     * Set the value of $lastname
     *
     * @param string $lastname
     * @return self
     */
    public function setLastname(string $lastname)
    {
        if (is_string($lastname)) {
            $this->lastname = $lastname;
        }
        return $this;
    }

    /**
     * Set the value of $identifiant
     *
     * @param string $identifiant
     * @return self
     */
    public function setIdentifiant(string $identifiant)
    {
        if (is_string($identifiant)) {
            $this->identifiant = $identifiant;
        }
        return $this;
    }

    /**
     * Set numbers of borrowed books
     *
     * @param int $borrowed
     * @return void
     */
    public function setBorrowed($borrowed)
    {
        $borrowed = (int)$borrowed;
        $this->borrowed = $borrowed;
        return $this->borrowed;
    }

    /**
     * Set the value of $listing
     *
     * @param string $listing
     * @return self
     */
    public function setListing(string $listing)
    {
        if (is_string($listing)) {
            $this->listing = $listing;
        }
        return $this;
    }

	//////////////////    GETTERS    //////////////////

    /**
     * Get the value of $id
     *
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of $firstname
     *
     * @return $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the value of $lastname
     *
     * @return $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the value of $identifiant
     *
     * @return $identifiant
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Get the value of $borrowed
     *
     * @return $borrowed
     */
    public function getBorrowed()
    {
        return $this->borrowed;
    }

    /**
     * Get the value of $listing
     *
     * @return $listing
     */
    public function getListing()
    {
        return $this->listing;
    }




}
