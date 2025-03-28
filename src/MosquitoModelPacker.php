<?php namespace SimpleModels;

// {
//   type: 'mosquito',
//   version: 1,
//   model: {
//     width: 0.0,
//     height: 0.0,
//     mosquito: {
//       systemCode: '',
//       clothTypeCode: '',
//       frameCoatingCode: '',
//       userParameters: {}
//     }
//   }
// }

// {
//   type: 'mosquito',
//   version: 2,
//   model: {
//     width: 0.0,
//     height: 0.0,
//     mosquito: {
//       systemCode: '',
//       baseColorCode: '',
//       clothTypeCode: '',
//       frameCoatingCode: '',
//       hingeSide: '',
//       userParameters: {}
//     }
//   }
// }

/**
 * Класс упаковщика модели москитной сетки
 */
class MosquitoModelPacker {

	/**
	 * Упаковка пользовательских параметров
	 */
	private function packUserParameters(array $userParameters): object {
		return (object) $userParameters;
	}

	/**
	 * Упаковка москитной сетки
	 */
	private function packMosquito(Mosquito $mosquito) {
		return array(
			'systemCode' => $mosquito->getSystemCode(),
			'baseColorCode' => $mosquito->getBaseColorCode(),
			'clothTypeCode' => $mosquito->getClothTypeCode(),
			'frameCoatingCode' => $mosquito->getFrameCoatingCode(),
			'hingeSide' => $mosquito->getHingeSide(),
			'userParameters' => $this->packUserParameters($mosquito->getUserParameters())
		);
	}

	/**
	 * Возвращает сериализованное представление модели
	 */
	public function pack(MosquitoModel $model): string {
		if ($model === null) {
			return '';
		}

		$pack = array(
			'type' => 'mosquito',
			'version' => 2,
			'model' => array(
				'width' => $model->getWidth(),
				'height' => $model->getHeight(),
				'mosquito' => $this->packMosquito($model->getMosquito())
			)
		);

		return json_encode($pack, JSON_UNESCAPED_SLASHES);
	}
}