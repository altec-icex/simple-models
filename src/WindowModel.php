<?php namespace SimpleModels;

/**
 * Класс модели оконного изделия
 */
final class WindowModel extends Model {
	private $width;
	private $height;
	private $frame;

	public function __construct(float $width, float $height, string $itemTypeCode) {
		$this->width = $width;
		$this->height = $height;
		$this->frame = new WindowFrame($itemTypeCode);
	}

	/**
	 * Возвращает код типа изделия
	 */
	public function getFrame(): WindowFrame {
		return $this->frame;
	}

	/**
	 * Возвращает ширину рамы
	 */
	public function getWidth(): float {
		return $this->width;
	}

	/**
	 * Устанавливает ширину рамы
	 */
	public function setWidth(float $value): self {
		$this->width = $value;
		return $this;
	}

	/**
	 * Возвращает высоту рамы
	 */
	public function getHeight(): float {
		return $this->height;
	}

	/**
	 * Устанавливает высоту рамы
	 */
	public function setHeight(float $value): self {
		$this->height = $value;
		return $this;
	}
}