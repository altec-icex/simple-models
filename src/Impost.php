<?php namespace SimpleModels;

/**
 * Класс импоста
 */
final class Impost extends Inset {
	private $isHorizontal = false;
	private $position;
	private $leftTopAperture;
	private $rightBottomAperture;

	public function __construct(Aperture $parentAperture, bool $isHorizontal, float $position) {
		parent::__construct($parentAperture);

		$this->isHorizontal = $isHorizontal;
		$this->position = $position;
		$this->leftTopAperture = new Aperture();
		$this->rightBottomAperture = new Aperture();
	}

	/**
	 * Ориентация импоста
	 *
	 * Возвращает true, если импост является горизонтальным, иначе false
	 */
	public function getIsHorizontal(): bool {
		return $this->isHorizontal;
	}

	/**
	 * Возвращает местоположение балки от левого или верхнего края изделия родительского проёма в зависимости от ориентации импоста
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
	 * Возвращает левый-верхний прилегающий проём
	 */
	public function getLeftTopAperture(): Aperture {
		return $this->leftTopAperture;
	}

	/**
	 * Возвращает правый-нижний прилегающий проём
	 */
	public function getRightBottomAperture(): Aperture {
		return $this->rightBottomAperture;
	}
}