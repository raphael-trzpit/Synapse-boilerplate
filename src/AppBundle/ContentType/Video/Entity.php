<?php

namespace AppBundle\ContentType\Video;

use Synapse\Cmf\Framework\Theme\Content\Model\ContentInterface;

class Entity implements ContentInterface
{
    protected $id;

    protected $link;

    public function getContentId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }
}
