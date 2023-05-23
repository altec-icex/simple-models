<?php namespace SimpleModels;

/**
 * Интерфейс "держателя" пользовательских параметров
 */
interface UserParametersHolderInterface {
	/**
	 * Возвращает true, если значение пользовательского параметра по имени $name было задано, иначе false
	 */
	public function hasUserParameterValue(string $name): bool;

	/**
	 * Возвращает заданное значение пользовательского параметра по имени $name, если оно было задано, иначе $defautValue
	 */
	public function getUserParameterValue(string $name, $defaultValue = null);

	/**
	 * Устанавливает значение пользовательского параметра по имени $name
	 */
	public function setUserParameterValue(string $name, $value): self;

	/**
	 * Возвращает ассоциативный массив установленных значений пользовательских параметров
	 */
	public function getUserParameters(): array;
}