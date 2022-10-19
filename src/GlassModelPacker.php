<?php namespace SimpleModels;

// {
//   type: 'glass',
//   version: 1,
//   model: {
//     width: 0.0,
//     height: 0.0,
//     glass: {
//       marking: '',
//       userParameters: {}
//     }
//   }
// }

/**
 * Класс упаковщика модели стеклопакета
 */
class GlassModelPacker {

	/**
	 * Упаковка пользовательских параметров
	 */
	private function packUserParameters(array $userParameters): object {
		return (object) $userParameters;
	}

	/**
	 * Упаковка стекла
	 */
	private function packGlass(GlassUnit $glass): array{
		return array(
			'marking' => $glass->getMarking(),
			'userParameters' => $this->packUserParameters($glass->getUserParameters())
		);
	}

	/**
	 * Возвращает сериализованное представление модели
	 */
	public function pack(GlassModel $model): string {
		if ($model === null) {
			return '';
		}

		$pack = array(
			'type' => 'glass',
			'version' => 1,
			'model' => array(
				'width' => $model->getWidth(),
				'height' => $model->getHeight(),
				'glass' => $this->packGlass($model->getGlass())
			)
		);

		return json_encode($pack, JSON_UNESCAPED_SLASHES);
	}
}