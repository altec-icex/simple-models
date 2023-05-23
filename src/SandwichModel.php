<?php namespace SimpleModels;

/**
 * Класс модели сэндвича
 */
final class SandwichModel extends Model {
	private $width;
	private $height;
	private $aperture;

	public function __construct(float $width, float $height, string $marking = '') {
		$this->width = $width;
		$this->height = $height;

		$this->aperture = new UnitAperture(SandwichPanel::class);
		$inset = $this->aperture->getInset();
		if ($inset instanceof SandwichPanel) {
			$inset->setMarking($marking);
		}
	}

	/**
	 * Возвращает сэндвич
	 */
	public function getSandwich(): SandwichPanel {
		return $this->aperture->getInset();
	}

	/**
	 * Возвращает ширину сэндвича
	 */
	public function getWidth(): float {
		return $this->width;
	}

	/**
	 * Устанавливает ширину сэндвича
	 */
	public function setWidth(float $value): self {
		$this->width = $value;
		return $this;
	}

	/**
	 * Возвращает высоту сэндвича
	 */
	public function getHeight(): float {
		return $this->height;
	}

	/**
	 * Устанавливает высоту сэндвича
	 */
	public function setHeight(float $value): self {
		$this->height = $value;
		return $this;
	}
}