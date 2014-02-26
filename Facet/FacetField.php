<?php

namespace Markup\NeedleBundle\Facet;

use Markup\NeedleBundle\Attribute\AttributeInterface;

/**
* A facet field implementation that uses a filter.
*/
class FacetField implements AttributeInterface
{
    /**
     * @var AttributeInterface
     **/
    private $filter;

    /**
     * @param AttributeInterface $filter
     **/
    public function __construct(AttributeInterface $filter)
    {
        $this->filter = $filter;
    }

    public function getName()
    {
        return $this->getFilter()->getName();
    }

    public function getDisplayName()
    {
        return $this->getFilter()->getDisplayName();
    }

    public function getSearchKey()
    {
        return $this->getFilter()->getSearchKey();
    }

    public function __toString()
    {
        return $this->getDisplayName();
    }

    /**
     * @return AttributeInterface
     **/
    private function getFilter()
    {
        return $this->filter;
    }
}
