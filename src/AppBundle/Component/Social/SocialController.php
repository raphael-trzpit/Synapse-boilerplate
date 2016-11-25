<?php

namespace AppBundle\Component\Social;

use Symfony\Component\HttpFoundation\Response;
use Synapse\Cmf\Framework\Theme\Component\Model\ComponentInterface;
use Synapse\Cmf\Framework\Theme\Content\Model\ContentInterface;
use Synapse\Cmf\Framework\Engine\Engine as Synapse;

class SocialController
{
    /**
     * @var Synapse
     */
    protected $synapse;

    /**
     * @param Synapse $synapse
     */
    public function __construct(Synapse $synapse)
    {
        $this->synapse = $synapse;
    }
    /**
     * Component rendering action.
     *
     * @param ComponentInterface $component
     * @param ContentInterface   $content
     *
     * @return Response
     */
    public function render(ComponentInterface $component, ContentInterface $content)
    {
        return $this->synapse
            ->createDecorator($component)
            ->decorate([
                'content' => $content,
                'links' => $component->getData(),
            ])
        ;
    }
}
