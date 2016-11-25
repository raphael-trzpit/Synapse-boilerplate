<?php

namespace AppBundle\ContentType\Video;

use Doctrine\ORM\EntityRepository;
use Synapse\Cmf\Framework\Theme\Content\Provider\ContentProviderInterface;

class Repository extends EntityRepository implements ContentProviderInterface
{
    /**
     * @see ContentProviderInterface::retrieveContent()
     */
    public function retrieveContent($contentId)
    {
        return $this->find($contentId);
    }
}
