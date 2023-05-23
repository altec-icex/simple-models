<?php namespace SimpleModels;

/**
 * Класс проёма
 */
class Aperture implements ApertureInterface {
	private $inset;

	/**
	 * {@inheritdoc}
	 */
	public function getInset(): ?Inset {
		return $this->inset;
	}

	/**
	 * Вставка стеклопакета
	 *
	 * Замещает текущую вставку стеклопакетом и возвращает его
	 */
	public function insertGlass(string $marking = ''): GlassUnit {
		$filling = new GlassUnit($this, $marking);
		$this->inset = $filling;
		return $filling;
	}

	/**
	 * Вставка сэндвича
	 *
	 * Замещает текущую вставку сэндвичем и возвращает его
	 */
	public function insertSandwich(string $marking = ''): SandwichPanel {
		$filling = new SandwichPanel($this, $marking);
		$this->inset = $filling;
		return $filling;
	}

	/**
	 * Вставка створки
	 *
	 * Замещает текущую вставку створкой и возвращает её
	 */
	public function insertSash(int $openType = SashFrameInterface::None): SashFrame {
		$sash = new SashFrame($this, $openType);
		$this->inset = $sash;
		return $sash;
	}

	/**
	 * Вставка импоста
	 *
	 * Замещает текущую вставку импостом и возвращает его
	 */
	public function insertImpost(bool $isHorizontal, float $position): Impost {
		$impost = new Impost($this, $isHorizontal, $position);
		$this->inset = $impost;
		return $impost;
	}

	/**
	 * Вставка штульпа
	 *
	 * Замещает текущую вставку штульповой группой и возвращает её
	 */
	public function insertStulp(bool $isLeft, float $position): Stulp {
		$stulp = new Stulp($this, $isLeft, $position);
		$this->inset = $stulp;
		return $stulp;
	}

	/**
	 * Удаление вставки
	 */
	public function removeInset(): self {
		$this->inset = null;
		return $this;
	}
}