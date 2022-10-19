<?php namespace SimpleModels;

/**
 * Интерфейс створки
 */
interface SashFrameInterface {
	/**
	 * Без открывания
	 */
	const None = 0;
	/**
	 * Поворотная влево
	 */
	const LeftTurn = 1;
	/**
	 * Поворотно-откидная влево
	 */
	const LeftTurnAndTilt = 2;
	/**
	 * Поворотная вправо
	 */
	const RightTurn = 3;
	/**
	 * Поворотно-откидная вправо
	 */
	const RightTurnAndTilt = 4;
	/**
	 * Откидная
	 */
	const Tilt = 5;
	/**
	 * Верхнеподвесная
	 */
	const TopHung = 6;

	/**
	 * Возвращает тип открывания
	 */
	public function getOpenType(): int;

	/**
	 * Возвращает признак наличия цоколя
	 */
	public function getUseSocle(): bool;
	/**
	 * Возвращает проём, образованный створкой
	 */
	public function getAperture(): Aperture;

}