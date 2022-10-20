<?php namespace SimpleModels;

/**
 * Класс модели москитной сетки
 */
final class MosquitoModel extends Model {
	private $width;
	private $height;
	private $mosquito;

	public function __construct(float $width, float $height, string $systemCode = '', string $clothTypeCode = '') {
		$this->width = $width;
		$this->height = $height;
		$this->mosquito = new Mosquito($systemCode, $clothTypeCode);
	}

	/**
	 * Возвращает москитную сетку
	 */
	public function getMosquito(): Mosquito {
		return $this->mosquito;
	}

	/**
	 * Возвращает ширину москитной сетки
	 */
	public function getWidth(): float {
		return $this->width;
	}

	/**
	 * Устанавливает ширину москитной сетки
	 */
	public function setWidth(float $value): self {
		$this->width = $value;
		return $this;
	}

	/**
	 * Возвращает высоту москитной сетки
	 */
	public function getHeight(): float {
		return $this->height;
	}

	/**
	 * Устанавливает высоту москитной сетки
	 */
	public function setHeight(float $value): self {
		$this->height = $value;
		return $this;
	}
}