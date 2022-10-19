<?php namespace SimpleModels;

/**
 * Класс рамы изделия
 */
final class WindowFrame implements UserParametersHolderInterface {
	/**
	 * Пользовательские параметры изделия
	 */
	use UserParametersTrait;

	private $itemTypeCode = '';
	private $profileSystemCode = '';
	private $profileBaseCode = '';
	private $hardwareSystemCode = '';
	private $innerCoatingCode = '';
	private $outerCoatingCode = '';
	private $foldCoatingCode = '';

	private $aperture;
	private $useDoorSill = false;

	public function __construct(string $itemTypeCode) {
		$this->itemTypeCode = $itemTypeCode;
		$this->aperture = new Aperture();
	}

	/**
	 * Возвращает код типа изделия
	 */
	public function getItemTypeCode(): string {
		return $this->itemTypeCode;
	}

	/**
	 * Устанавливает код типа изделия
	 */
	public function setItemTypeCode(string $value): self {
		$this->itemTypeCode = $value;
		return $this;
	}

	/**
	 * Возвращает код системы профиля
	 */
	public function getProfileSystemCode(): string {
		return $this->profileSystemCode;
	}

	/**
	 * Устанавливает код системы профиля
	 */
	public function setProfileSystemCode(string $value): self {
		$this->profileSystemCode = $value;
		return $this;
	}

	/**
	 * Возвращает код основы профиля
	 */
	public function getProfileBaseCode(): string {
		return $this->profileBaseCode;
	}

	/**
	 * Устанавливает код основы профиля
	 */
	public function setProfileBaseCode(string $value): self {
		$this->profileBaseCode = $value;
		return $this;
	}

	/**
	 * Возвращает код системы фурнитуры
	 */
	public function getHardwareSystemCode(): string {
		return $this->hardwareSystemCode;
	}

	/**
	 * Устанавливает код системы фурнитуры
	 */
	public function setHardwareSystemCode(string $value): self {
		$this->hardwareSystemCode = $value;
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

	/**
	 * Возвращает код цвета покрытия фальца
	 */
	public function getFoldCoatingCode(): string {
		return $this->foldCoatingCode;
	}

	/**
	 * Устанавливает код цвета покрытия фальца
	 */
	public function setFoldCoatingCode(string $value): self {
		$this->foldCoatingCode = $value;
		return $this;
	}

	/**
	 * Возвращает признак наличия порога
	 */
	public function getUseDoorSill(): bool {
		return $this->useDoorSill;
	}

	/**
	 * Устанавливает признак наличия порога
	 */
	public function setUseDoorSill(bool $value): self {
		$this->useDoorSill = $value;
		return $this;
	}

	/**
	 * Возвращает проём, образованный рамой
	 */
	public function getAperture(): Aperture {
		return $this->aperture;
	}
}