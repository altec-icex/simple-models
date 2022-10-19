<?php namespace SimpleModels;

/**
 * Класс модели стеклопакета
 */
final class GlassModel extends Model {
	private $width;
	private $height;
	private $aperture;

	public function __construct(float $width, float $height, string $marking) {
		$this->width = $width;
		$this->height = $height;

		$this->aperture = new UnitAperture(GlassUnit::class);
		$inset = $this->aperture->getInset();
		if ($inset instanceof GlassUnit) {
			$inset->setMarking($marking);
		}
	}

	/**
	 * Возвращает стеклопакет
	 */
	public function getGlass(): GlassUnit {
		return $this->aperture->getInset();
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