<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Video;

class VideoFrontController extends Controller
{
    public function showTemplateVideoAction(Video $video, Request $request)
    {
        return $this->get('synapse')
            ->createDecorator($video, 'video')
            ->decorate(array(
                'video' => $video,
                'request' => $request,
            ))
        ;
    }

    public function showTemplateSmallVideoAction(Video $video, Request $request)
    {
        return $this->get('synapse')
            ->createDecorator($video, 'small_video')
            ->decorate(array(
                'video' => $video,
                'request' => $request,
            ))
        ;
    }
}
