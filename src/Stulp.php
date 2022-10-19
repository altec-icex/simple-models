<?php namespace SimpleModels;

/**
 * Класс вертикального штульпа
 */
final class Stulp extends Inset {
	private $isLeft = false;
	private $position;
	private $leftAperture;
	private $rightAperture;
	private $isTiltSash = false;
	private $mosquito;
	private $isWorkSashMosquito = false;

	public function __construct(Aperture $parentAperture, bool $isLeft, float $position) {
		parent::__construct($parentAperture);

		$this->isLeft = $isLeft;
		$this->position = $position;
		$this->leftAperture = new StulpAperture($this, true);
		$this->rightAperture = new StulpAperture($this, false);
		$this->isTiltSash = false;
	}

	/**
	 * Сторона штульпа
	 */
	public function getIsLeft(): bool {
		return $this->isLeft;
	}

	/**
	 * Устанавливает сторону штульпа
	 */
	public function setIsLeft(bool $value): self {
		$this->isLeft = $value;
		return $this;
	}

	/**
	 * Активная створка откидная
	 */
	public function getIsTiltSash(): bool {
		return $this->isTiltSash;
	}

	/**
	 * Устанавливает откид для рабочей створки
	 */
	public function setIsTiltSash(bool $value): self {
		$this->isTiltSash = $value;
		return $this;
	}

	/**
	 * Возвращает местоположение балки от левого края изделия родительского проёма
	 */
	public function getPosition(): float {
		return $this->position;
	}

	/**
	 * Устанавливает местоположение балки
	 */
	public function setPosition(float $value): self {
		$this->position = $value;
		return $this;
	}

	/**
	 * Возвращает левую створку
	 */
	public function getLeftSash(): ?StulpSashFrame{
		$inset = $this->leftAperture->getInset();
		if ($inset instanceof StulpSashFrame) {
			return $inset;
		}
		return null;
	}

	/**
	 * Возвращает правую створку
	 */
	public function getRightSash(): ?StulpSashFrame{
		$inset = $this->rightAperture->getInset();
		if ($inset instanceof StulpSashFrame) {
			return $inset;
		}
		return null;
	}

	/**
	 * Возвращает москитную сетку
	 */
	public function getMosquito(): ?Mosquito {
		return $this->mosquito;
	}

	/**
	 * Вставка москитной сетки
	 *
	 * Добавляет москитную сетку и возвращает её
	 */
	public function addMosquito(string $systemCode): Mosquito {
		$this->mosquito = new Mosquito($systemCode);
		return $this->mosquito;
	}

	/**
	 * Удаление москитной сетки
	 */
	public function removeMosquito(): self {
		$this->mosquito = null;
		return $this;
	}

	public function getIsWorkSashMosquito(): bool {
		return $this->isWorkSashMosquito;
	}

	public function setIsWorkSashMosquito(bool $value): self {
		$this->isWorkSashMosquito = $value;
		return $this;
	}
}