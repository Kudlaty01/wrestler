<?php

namespace Qdt01\Wrestler\Models;

/**
 * Class Producer
 *
 * @package \Qdt01\Wrestler\Models
 */
class Producer implements ModelInterface
{
	//region Fields
	/**
	 * @var integer
	 */
	protected $id;
	/**
	 * @var string
	 */
	protected $name;
	/**
	 * @var string
	 */
	protected $site_url;
	/**
	 * @var string
	 */
	protected $logo_filename;
	/**
	 * @var integer
	 */
	protected $ordering;
	/**
	 * @var string
	 */
	protected $source_id;
	//endregion

	//region Methods
	//region Getters and setters
	public function getId(): ?int
	{
		return $this->id;
	}

	public function setId(?int $id): Producer
	{
		$this->id = $id;
		return $this;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name): Producer
	{
		$this->name = $name;
		return $this;
	}

	public function getSiteUrl(): ?string
	{
		return $this->site_url;
	}

	public function setSiteUrl(?string $site_url): Producer
	{
		$this->site_url = $site_url;
		return $this;
	}

	public function getLogoFilename(): ?string
	{
		return $this->logo_filename;
	}

	public function setLogoFilename(?string $logo_filename): Producer
	{
		$this->logo_filename = $logo_filename;
		return $this;
	}

	public function getOrdering(): ?int
	{
		return $this->ordering;
	}

	public function setOrdering(?int $ordering): Producer
	{
		$this->ordering = $ordering;
		return $this;
	}

	public function getSourceId(): ?string
	{
		return $this->source_id;
	}

	public function setSourceId(?string $source_id): Producer
	{
		$this->source_id = $source_id;
		return $this;
	}

	//endregion
	//endregion
}