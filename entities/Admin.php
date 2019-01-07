<?php

declare(strict_types = 1);

class Admin
{

	protected $id,
			  $password,
			  $username,
			  $email;


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
		foreach ($array as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
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
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
		return $this;
	}




	/**
	 * Set the value of $password
	 *
	 * @param string $password
	 * @return self
	 */
	public function setPassword(string $password)
	{
		if (is_string($password)) {
			$this->password = $password;
		}
		return $this;
	}


	/**
	 * Set the value of $username
	 *
	 * @param string $username
	 * @return self
	 */
	public function setUsername(string $username)
	{
		if (is_string($username)) {
			$this->username = $username;
		}
		return $this;
	}

	/**
	 * Set the value of $email
	 *
	 * @param string $email
	 * @return self
	 */
	public function setEmail(string $email)
	{
		if (is_string($email)) {
			$this->email = $email;
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
	 * Get the value of $password
	 *
	 * @return $password
	 */
	public function getPassword()
	{
		return $this->password;
	}


	/**
	 * Get the value of $username
	 *
	 * @return $username
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the value of $email
	 *
	 * @return $email
	 */
	public function getEmail()
	{
		return $this->email;
	}



}
