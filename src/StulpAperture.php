<?php namespace SimpleModels;

/**
 * Класс проёма штульпа
 */
class StulpAperture implements ApertureInterface {
	private $stulp;
	private $isLeft = false;
	private $inset;

	public function __construct(Stulp $stulp, $isLeft) {
		$this->stulp = $stulp;
		$this->isLeft = $isLeft;
		$this->inset = new StulpSashFrame($this);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getInset(): ?Inset {
		return $this->inset;
	}

	/**
	 * Возвращает родителький штульп
	 */
	public function getStulp(): Stulp {
		return $this->stulp;
	}

	/**
	 * Сторона прилегания проёма к штульпу
	 */
	public function getIsLeft(): bool {
		return $this->isLeft;
	}
}