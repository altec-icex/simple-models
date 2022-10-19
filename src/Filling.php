<?php namespace SimpleModels;

/**
 * Класс заполнения
 */
class Filling extends Inset {

	public function __construct(ApertureInterface $parentAperture) {
		parent::__construct($parentAperture);
	}
}