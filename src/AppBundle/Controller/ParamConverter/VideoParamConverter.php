<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Video;
use AppBundle\Repository\VideoRepository;

class VideoParamConverter implements Symfony\Component\Serializer\NameConverter\NameConverterInterface
{
    /**
     * @param VideoRepository $videoRepository
     */
    public function __construct(VideoRepository $videoLoader)
    {
        $this->videoLoader = $videoLoader;
    }

    /**
     * @see ParamConverterInterface::supports()
     */
    public function supports(ParamConverter $configuration)
    {
        return $configuration->getClass() == Video::class;
    }

    /**
     * @see ParamConverterInterface::apply()
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        if (!$video = $this->videoLoader->find($videoId = $request->attributes->get('id'))
        ) {
            throw new NotFoundHttpException(sprintf('Video#%d not found.', $videoId));
        }

        $request->attributes->set(
            $configuration->getName(),
            $video
        );

        return true;
    }
}
