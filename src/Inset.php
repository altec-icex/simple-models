<?php namespace SimpleModels;

/**
 * Класс вставки проёма
 */
abstract class Inset {
	private $parentAperture;

	public function __construct(ApertureInterface $parentAperture) {
		$this->parentAperture = $parentAperture;
	}

	/**
	 * Возвращает родителький проём
	 */
	public function getParentAperture(): ApertureInterface {
		return $this->parentAperture;
	}
}
