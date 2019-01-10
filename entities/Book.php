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
			  $idCategories,
			  $image;

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
		$id = (int)$id;
		if ($id > 0) {
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
		if (is_string($title))
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
		if (is_string($author)) {
			$this->author = $author;
		}
		return $this;
	}

	/**
	 * set value of adate
	 *
	 * @param string $apparution
	 * @return self
	 */
	public function setDate(string $date)
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
		if (is_string($summary)) {
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
	public function setAvailable($available)
	{
		$available= (int)$available;
		if ($available > 0) {
			$this->available = $available;
		}
		return $this;
	}

	/**
	 * Set the value of $idCategories
	 *
	 * @param integer $idCategories
	 * @return self
	 */
	public function setIdCategories($idCategories)
	{
		$idCategories = (int)$idCategories;
		if ($idCategories > 0) {
			$this->idCategories = $idCategories;
		}
		return $this;
	}

	/**
	 * Set the value of $image
	 *
	 * @param string $image
	 * @return self
	 */
	public function setImage(string $image)
	{
		if (is_string($image)) {
			$this->image = $image;
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
	 * @return date
	 */
	public function getDate()
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
	 * Get the value of $idCategories
	 *
	 * @return $idCategories
	 */
	public function getIdCategories()
	{

		return $this->idCategories;

	}

	/**
	 * Get the value of $image
	 *
	 * @return $image
	 */
	public function getImage()
	{

		return $this->image;

	}
}
