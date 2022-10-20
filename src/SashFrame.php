<?php namespace SimpleModels;

/**
 * Класс створки
 */
final class SashFrame extends Inset implements SashFrameInterface, UserParametersHolderInterface {
	/**
	 * Пользовательские параметры створки
	 */
	use UserParametersTrait;

	private $openType = SashFrameInterface::None;
	private $aperture;
	private $useSocle = false;
	private $mosquito;

	public function __construct(Aperture $parentAperture, int $openType = 0) {
		parent::__construct($parentAperture);

		$this->openType = $openType;
		$this->aperture = new Aperture();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getOpenType(): int {
		return $this->openType;
	}

	/**
	 * Устанавливает тип открывания
	 */
	public function setOpenType(int $value): self {
		$this->openType = $value;
		return $this;
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
	 * {@inheritdoc}
	 */
	public function getAperture(): Aperture {
		return $this->aperture;
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
	public function addMosquito(string $systemCode = ''): Mosquito {
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
}