<?php namespace SimpleModels;

/**
 * Класс москитной сетки
 */
class Mosquito implements UserParametersHolderInterface {
	/**
	 * Пользовательские параметры москитной	сетки
	 */
	use UserParametersTrait;

	/**
	 * Сторона петель не указана
	 */
	const UnspecifiedSide = 0;
	/**
	 * Петли на левой стороне
	 */
	const LeftSide = 1;
	/**
	 * Петли на правой стороне
	 */
	const RightSide = 2;

	private $systemCode = '';
	private $baseColorCode = '';
	private $clothTypeCode = '';
	private $autoFrameCoating = true;
	private $frameCoatingCode = '';
	private $autoHingeSide = true;
	private $hingeSide = Mosquito::UnspecifiedSide;

	public function __construct(string $systemCode, string $clothTypeCode = '') {
		$this->systemCode = $systemCode;
		$this->clothTypeCode = $clothTypeCode;
	}

	/**
	 * Возвращает код системы москитной сетки
	 */
	public function getSystemCode(): string {
		return $this->systemCode;
	}

	/**
	 * Устанавливает код системы москитной сетки
	 */
	public function setSystemCode(string $value): self {
		$this->systemCode = $value;
		return $this;
	}

	/**
	 * Возвращает код базового цвета москитной сетки
	 */
	public function getBaseColorCode(): string {
		return $this->baseColorCode;
	}

	/**
	 * Устанавливает код базового цвета москитной сетки
	 */
	public function setBaseColorCode(string $value): self {
		$this->baseColorCode = $value;
		return $this;
	}

	/**
	 * Возвращает код типа полотна москитной сетки
	 */
	public function getClothTypeCode(): string {
		return $this->clothTypeCode;
	}

	/**
	 * Устанавливает код типа полотна москитной сетки
	 */
	public function setClothTypeCode(string $value): self {
		$this->clothTypeCode = $value;
		return $this;
	}

	/**
	 * Возвращает признак автоматического подбора цвета покрытия рамки
	 */
	public function getAutoFrameCoating(): bool {
		return $this->autoFrameCoating;
	}

	/**
	 * Устанавливает признак автоматического подбора цвета покрытия рамки
	 */
	public function setAutoFrameCoating(bool $value): self {
		$this->autoFrameCoating = $value;
		return $this;
	}

	/**
	 * Возвращает код цвета покрытия рамки москитной сетки
	 */
	public function getFrameCoatingCode(): string {
		return $this->frameCoatingCode;
	}

	/**
	 * Устанавливает код цвета покрытия рамки москитной сетки
	 */
	public function setFrameCoatingCode(string $value): self {
		$this->frameCoatingCode = $value;
		return $this;
	}

	/**
	 * Возвращает признак автоматического выбора стороны петель
	 */
	public function getAutoHingeSide(): bool {
		return $this->autoHingeSide;
	}

	/**
	 * Устанавливает признак автоматического выбора стороны петель
	 */
	public function setAutoHingeSide(bool $value): self {
		$this->autoHingeSide = $value;
		return $this;
	}

	/**
	 * Возвращает сторону петель москитной сетки
	 */
	public function getHingeSide(): int {
		return $this->hingeSide;
	}

	/**
	 * Устанавливает сторону петель москитной сетки
	 */
	public function setHingeSide(int $value): self {
		$this->hingeSide = $value;
		return $this;
	}
}