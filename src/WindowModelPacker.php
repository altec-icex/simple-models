<?php namespace SimpleModels;

// {
//   type: 'window',
//   version: 1,
//   model: {
//     width: 0.0,
//     height: 0.0,
//     window: {
//       itemTypeCode: '',
//       profileSystemCode: '',
//       profileBaseCode: '',
//       hardwareSystemCode: '',
//       innerCoatingCode: '',
//       outerCoatingCode: '',
//       foldCoatingCode: '',
//       useDoorSill: true|false,
//       aperture: {
//         inset: {
//           type: 'glass|sandwich|sash|impost|stulp',
//           glass: {
//             marking: '',
//             userParameters: {}
//           },
//           sandwich: {
//             marking: '',
//             autoCoatings: true|false,
//             innerCoatingCode: '',
//             outerCoatingCode: '',
//             userParameters: {}
//           },
//           sash: {
//             openType: 0,
//             useSocle: true|false,
//             aperture: {aperture},
// 	           userParameters: {},
//             mosquito: {
//               systemCode: '',
//               clothTypeCode: '',
//               autoFrameCoating: true|false,
//               frameCoatingCode: '',
//               userParameters: {}
//             }
//           },
//           impost: {
//             isHorizontal: true|false,
//             position: 0.0,
//             leftTopAperture: {aperture}
//             rightBottomAperture: {aperture}
//           },
//           stulp: {
//             position: 0.0,
//             isLeft: true|false,
//             isTiltSash: true|false,
//             leftSash: {sash},
//             rightSash: {sash},
//             mosquito: {
//               systemCode: '',
//               clothTypeCode: '',
//               autoFrameCoating: true|false,
//               frameCoatingCode: '',
//               userParameters: {}
//             },
//             isWorkSashMosquito: true|false
//           }
//         }
//       },
//       userParameters: {}
//     }
//   }
// }

/**
 * Класс упаковщика модели окна
 */
class WindowModelPacker {

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
	 * Упаковка сэндвича
	 */
	private function packSandwich(SandwichPanel $sandwich): array{
		return array(
			'marking' => $sandwich->getMarking(),
			'autoCoatings' => $sandwich->getAutoCoatings(),
			'innerCoatingCode' => $sandwich->getInnerCoatingCode(),
			'outerCoatingCode' => $sandwich->getOuterCoatingCode(),
			'userParameters' => $this->packUserParameters($sandwich->getUserParameters())
		);
	}

	/**
	 * Упаковка москитной сетки
	 */
	private function packMosquito(Mosquito $mosquito) {
		return array(
			'systemCode' => $mosquito->getSystemCode(),
			'clothTypeCode' => $mosquito->getClothTypeCode(),
			'autoFrameCoating' => $mosquito->getAutoFrameCoating(),
			'frameCoatingCode' => $mosquito->getFrameCoatingCode(),
			'userParameters' => $this->packUserParameters($mosquito->getUserParameters())
		);
	}

	/**
	 * Упаковка створки
	 */
	private function packSash(SashFrame $sash): array{
		$pack = array(
			'openType' => $sash->getOpenType(),
			'useSocle' => $sash->getUseSocle(),
			'aperture' => $this->packAperture($sash->getAperture()),
			'userParameters' => $this->packUserParameters($sash->getUserParameters())
		);

		$mosquito = $sash->getMosquito();
		if ($mosquito) {
			$pack['mosquito'] = $this->packMosquito($mosquito);
		}

		return $pack;
	}

	/**
	 * Упаковка импоста
	 */
	private function packImpost(Impost $impost): array{
		return array(
			'isHorizontal' => $impost->getIsHorizontal(),
			'position' => $impost->getPosition(),
			'leftTopAperture' => $this->packAperture($impost->getLeftTopAperture()),
			'rightBottomAperture' => $this->packAperture($impost->getRightBottomAperture())
		);
	}

	/**
	 * Упаковка створки
	 */
	private function packStulpSash(StulpSashFrame $sash): array{
		$pack = array(
			'openType' => $sash->getOpenType(),
			'useSocle' => $sash->getUseSocle(),
			'aperture' => $this->packAperture($sash->getAperture()),
			'userParameters' => $this->packUserParameters($sash->getUserParameters())
		);

		return $pack;
	}

	/**
	 * Упаковка штульпа
	 */
	private function packStulp(Stulp $stulp): array{
		$pack = array(
			'position' => $stulp->getPosition(),
			'isLeft' => $stulp->getIsLeft(),
			'isTiltSash' => $stulp->getIsTiltSash(),
			'leftSash' => $this->packStulpSash($stulp->getLeftSash()),
			'rightSash' => $this->packStulpSash($stulp->getRightSash())
		);

		$mosquito = $stulp->getMosquito();
		if ($mosquito) {
			$pack['mosquito'] = $this->packMosquito($mosquito);
			$pack['isWorkSashMosquito'] = $stulp->getIsWorkSashMosquito();
		}

		return $pack;
	}

	/**
	 * Упаковка вставки
	 */
	private function packInset(Inset $inset): array{
		switch (true) {
		case $inset instanceof GlassUnit:
			$pack = array(
				'type' => 'glass',
				'glass' => $this->packGlass($inset)
			);
			break;
		case $inset instanceof SandwichPanel:
			$pack = array(
				'type' => 'sandwich',
				'sandwich' => $this->packSandwich($inset)
			);
			break;
		case $inset instanceof SashFrame:
			$pack = array(
				'type' => 'sash',
				'sash' => $this->packSash($inset)
			);
			break;
		case $inset instanceof Impost:
			$pack = array(
				'type' => 'impost',
				'impost' => $this->packImpost($inset)
			);
			break;
		case $inset instanceof Stulp:
			$pack = array(
				'type' => 'stulp',
				'stulp' => $this->packStulp($inset)
			);
			break;
		default:
			$pack = array();
		}

		return $pack;
	}

	/**
	 * Упаковка проёма
	 */
	private function packAperture(Aperture $aperture): array{
		$pack = array();

		$inset = $aperture->getInset();
		if ($inset !== null) {
			$pack['inset'] = $this->packInset($inset);
		}

		return $pack;
	}

	/**
	 * Упаковка рамы
	 */
	private function packFrame(WindowFrame $frame): array{
		return array(
			'itemTypeCode' => $frame->getItemTypeCode(),
			'profileSystemCode' => $frame->getProfileSystemCode(),
			'profileBaseCode' => $frame->getProfileBaseCode(),
			'hardwareSystemCode' => $frame->getHardwareSystemCode(),
			'innerCoatingCode' => $frame->getInnerCoatingCode(),
			'outerCoatingCode' => $frame->getOuterCoatingCode(),
			'foldCoatingCode' => $frame->getFoldCoatingCode(),
			'useDoorSill' => $frame->getUseDoorSill(),
			'aperture' => $this->packAperture($frame->getAperture()),
			'userParameters' => $this->packUserParameters($frame->getUserParameters())
		);
	}

	/**
	 * Возвращает сериализованное представление модели
	 */
	public function pack(WindowModel $model): string {
		if ($model === null) {
			return '';
		}

		$pack = array(
			'type' => 'window',
			'version' => 1,
			'model' => array(
				'width' => $model->getWidth(),
				'height' => $model->getHeight(),
				'window' => $this->packFrame($model->getFrame())
			)
		);

		return json_encode($pack, JSON_UNESCAPED_SLASHES);
	}
}