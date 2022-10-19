<?php namespace SimpleModels;

/**
 * Класс стеклопакета
 */
final class GlassUnit extends Filling implements UserParametersHolderInterface {
	/**
	 * Пользовательские параметры стеклопакета
	 */
	use UserParametersTrait;

	private $marking = '';

	public function __construct(ApertureInterface $parentAperture, string $marking = '') {
		parent::__construct($parentAperture);

		$this->marking = $marking;
	}

	/**
	 * Возвращает артикул стеклопакета
	 */
	public function getMarking(): string {
		return $this->marking;
	}

	/**
	 * Устанавливает артикул стеклопакета
	 */
	public function setMarking(string $value): self {
		$this->marking = $value;
		return $this;
	}
}