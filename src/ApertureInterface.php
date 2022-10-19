<?php namespace SimpleModels;

/**
 * Интерфейс проёма
 */
interface ApertureInterface {
	/**
	 * Возвращает вставку в проём
	 */
	public function getInset(): ?Inset;
}