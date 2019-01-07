<?php

declare(strict_types = 1);

class Book
{

	protected $id,
			  $title,
			  $author,
			  $date,
			  $summary,
			  $available,
			  $id_user;

	const available = [
		0 => 'No',
		1 => 'Yes'
	];

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
	 * Set the value of $title
	 *
	 * @param string $title
	 * @return self
	 */
	public function setTitle(string $title)
	{
		if (in_array($title))
		{
			$this->title = $title;
		}
		return $this;
	}

	/**
	 * Set the value of $author
	 *
	 * @param string $author
	 * @return self
	 */
	public function setAuthor(string $author)
	{
		if (in_array($author)) {
			$this->author = $author;
		}
		return $this;
	}

	/**
	 * Set the value of $date
	 *
	 * @param \DateTimeInterface $date
	 * @return self
	 */
	public function setDate(\DateTimeInterface $date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Set the value of $summary
	 *
	 * @param string $summary
	 * @return self
	 */
	public function setSummary(string $summary)
	{
		if (in_array($summary)) {
			$this->summary = $summary;
		}
		return $this;
	}

	/**
	 * Set available
	 *
	 * @param int $available
	 * @return self
	 */
	public function setAvailable(int $available)
	{
		$this->available = $available;

		return $this;
	}

	/**
	 * Set the value of $id_user
	 *
	 * @param integer $id_user
	 * @return self
	 */
	public function setIduser($id_user)
	{
		$id_user = (int)$id_user;
		if ($id_user > 0) {
			$this->id_user = $id_user;
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
	 * Get the value of $title
	 *
	 * @return $title
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the value of $author
	 *
	 * @return $author
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Get the value of $date
	 *
	 * @return \DateTimeInterface|null
	 */
	public function getDate() : ? \DateTimeInterface
	{
		return $this->date;
	}

	/**
	 * Get the value of $summary
	 *
	 * @return $summary
	 */
	public function getSummary()
	{
		return $this->summary;
	}

	/**
	 * Get the value of $available
	 *
	 * @return $available
	 */
	public function getAvailable()
	{

		return $this->available;

	}

	/**
	 * Get the value of $id_user
	 *
	 * @return $id_user
	 */
	public function getIduser()
	{

		return $this->id_user;

	}

}
