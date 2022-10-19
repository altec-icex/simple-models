<?php namespace SimpleModels;

// {
//   type: 'sandwich',
//   version: 1,
//   model: {
//     width: 0.0,
//     height: 0.0,
//     sandwich: {
//       marking: '',
//       innerCoatingCode: '',
//       outerCoatingCode: '',
//       userParameters: {}
//     }
//   }
// }

/**
 * Класс упаковщика модели сэндвича
 */
class SandwichModelPacker {

	/**
	 * Упаковка пользовательских параметров
	 */
	private function packUserParameters(array $userParameters): object {
		return (object) $userParameters;
	}

	/**
	 * Упаковка сэндвича
	 */
	private function packSandwich(SandwichPanel $sandwich): array{
		return array(
			'marking' => $sandwich->getMarking(),
			'innerCoatingCode' => $sandwich->getInnerCoatingCode(),
			'outerCoatingCode' => $sandwich->getOuterCoatingCode(),
			'userParameters' => $this->packUserParameters($sandwich->getUserParameters())
		);
	}

	/**
	 * Возвращает сериализованное представление модели
	 */
	public function pack(SandwichModel $model): string {
		if ($model === null) {
			return '';
		}

		$pack = array(
			'type' => 'sandwich',
			'version' => 1,
			'model' => array(
				'width' => $model->getWidth(),
				'height' => $model->getHeight(),
				'sandwich' => $this->packSandwich($model->getSandwich())
			)
		);

		return json_encode($pack, JSON_UNESCAPED_SLASHES);
	}
}