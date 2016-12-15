<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\VideoType;
use AppBundle\Entity\Video;

class VideoAdminController extends Controller
{
    public function listAction()
    {
        return $this->render('AppBundle:Admin/Video:list.html.twig', array(
            'videos' => $this->container->get('app.video.repository')->findAll(),
        ));
    }

    public function createAction(Request $request)
    {
        $form = $this->createForm(VideoType::class);

        if ($request->request->has('video')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $video = $form->getData();
                $em = $this->getDoctrine()->getManager('app');
                $em->persist($video);
                $em->flush();

                return $this->redirect(
                    $this->container->get('router')->generate('synapse_admin_video_edition', array(
                        'id' => $video->getId(),
                    ))
                );
            }
        }

        return $this->render('AppBundle:Admin/Video:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction(Video $video, Request $request)
    {
        $form = $this->createForm(VideoType::class, $video, [
            'synapse_theme' => $request->get('synapse_theme'),
        ]);

        if ($request->request->has('video')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $video = $form->getData();
                $em = $this->getDoctrine()->getManager('app');
                $em->persist($video);
                $em->flush();

                return $this->redirect(// refresh to rebuild dynamic form
                    $this->container->get('router')->generate(
                        $request->attributes->get('_route'),
                        $request->attributes->get('_route_params')
                    )
                );
            }
        }

        return $this->render('AppBundle:Admin/Video:edit.html.twig', array(
            'form' => $form->createView(),
            'video' => $video,
        ));
    }
}
