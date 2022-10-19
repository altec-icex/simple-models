<?php namespace SimpleModels;

/**
 * Класс сэндвича
 */
final class SandwichPanel extends Filling implements UserParametersHolderInterface {
	/**
	 * Пользовательские параметры сэндвича
	 */
	use UserParametersTrait;

	private $marking = '';
	private $autoCoatings = true;
	private $innerCoatingCode = '';
	private $outerCoatingCode = '';

	public function __construct(ApertureInterface $parentAperture, string $marking = '') {
		parent::__construct($parentAperture);

		$this->marking = $marking;
	}

	/**
	 * Возвращает артикул сэндвича
	 */
	public function getMarking(): string {
		return $this->marking;
	}

	/**
	 * Устанавливает артикул сэндвича
	 */
	public function setMarking(string $value): self {
		$this->marking = $value;
		return $this;
	}

	/**
	 * Возвращает признак автоматического подбора цветов покрытий
	 */
	public function getAutoCoatings(): bool {
		return $this->autoCoatings;
	}

	/**
	 * Устанавливает признак автоматического подбора цветов покрытий
	 */
	public function setAutoCoatings(bool $value): self {
		$this->autoCoatings = $value;
		return $this;
	}

	/**
	 * Возвращает код цвета внутреннего покрытия
	 */
	public function getInnerCoatingCode(): string {
		return $this->innerCoatingCode;
	}

	/**
	 * Устанавливает код цвета внутреннего покрытия
	 */
	public function setInnerCoatingCode(string $value): self {
		$this->innerCoatingCode = $value;
		return $this;
	}

	/**
	 * Возвращает код цвета внешнего покрытия
	 */
	public function getOuterCoatingCode(): string {
		return $this->outerCoatingCode;
	}

	/**
	 * Устанавливает код цвета внешнего покрытия
	 */
	public function setOuterCoatingCode(string $value): self {
		$this->outerCoatingCode = $value;
		return $this;
	}
}