<?php

declare(strict_types = 1);

class Category
{

	protected $id,
			  $name,
			  $id_book;


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
	 * Set the value of $name
	 *
	 * @param string $name
	 * @return self
	 */
	public function setName(string $name)
	{
		if (in_array($name))
		{
			$this->name = $name;
		}
		return $this;
	}

	/**
	 * Set the value of $id_book
	 *
	 * @param integer $id_book
	 * @return self
	 */
	public function setIdbook($id_book)
	{
		$id_book = (int)$id_book;
		if ($id_book > 0) {
			$this->id_book = $id_book;
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
	 * Get the value of $name
	 *
	 * @return $name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the value of $id_book
	 *
	 * @return $id_book
	 */
	public function getIdbook()
	{
		return $this->id_book;
	}


}
