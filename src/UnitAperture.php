<?php namespace SimpleModels;

/**
 * Класс проёма изделия
 */
class UnitAperture implements ApertureInterface {
	private $inset;

	public function __construct($insetClassName) {
		$insetClass = new \ReflectionClass($insetClassName);
		if ($insetClass->isSubclassOf(Inset::class)) {
			$this->inset = $insetClass->newInstance($this);
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function getInset(): ?Inset {
		return $this->inset;
	}
}