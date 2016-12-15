<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Synapse\Cmf\Framework\Theme\Content\Provider\ContentProviderInterface;

class VideoRepository extends EntityRepository implements ContentProviderInterface
{
    /**
     * @see ContentProviderInterface::retrieveContent()
     */
    public function retrieveContent($contentId)
    {
        return $this->find($contentId);
    }
}
