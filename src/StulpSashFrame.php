<?php namespace SimpleModels;

/**
 * Класс створки
 */
final class StulpSashFrame extends Inset implements SashFrameInterface, UserParametersHolderInterface {
	/**
	 * Пользовательские параметры створки
	 */
	use UserParametersTrait;

	private $stulpAperture;
	private $aperture;
	private $useSocle = false;

	public function __construct(StulpAperture $stulpAperture) {
		parent::__construct($stulpAperture);
		$this->stulpAperture = $stulpAperture;
		$this->aperture = new Aperture();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getOpenType(): int {
		$stulp = $this->stulpAperture->getStulp();

		if ($this->stulpAperture->getIsLeft()) {
			if ($stulp->getIsLeft()) {
				return self::LeftTurn;
			} else {
				if ($stulp->getIsTiltSash()) {
					return self::RightTurnAndTilt;
				} else {
					return self::RightTurn;
				}
			}
		} else {
			if (!$stulp->getIsLeft()) {
				return self::RightTurn;
			} else {
				if ($stulp->getIsTiltSash()) {
					return self::LeftTurnAndTilt;
				} else {
					return self::LeftTurn;
				}
			}
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function getAperture(): Aperture {
		return $this->aperture;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getUseSocle(): bool {
		return $this->useSocle;
	}

	/**
	 * Устанавливает признак наличия цоколя
	 */
	public function setUseSocle(bool $value): self {
		$this->useSocle = $value;
		return $this;
	}

	/**
	 * Возвращает родителький штульп
	 */
	public function getStulp(): Stulp {
		return $this->stulpAperture->getStulp();
	}

	/**
	 * Возращает true, если это левая створка, иначе false
	 */
	public function getIsLeft(): bool {
		return $this->stulpAperture->getIsLeft();
	}
}