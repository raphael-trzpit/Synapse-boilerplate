<?php

namespace AppBundle\Entity;

use Synapse\Cmf\Framework\Theme\Content\Model\ContentInterface;

class Video implements ContentInterface
{
    protected $id;

    protected $link;

    public function getId()
    {
        return $this->id;
    }

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
