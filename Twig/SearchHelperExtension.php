<?php

namespace Markup\NeedleBundle\Twig;

use Markup\NeedleBundle\Facet;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
* A Twig extension that provides some helper functions/filters for search.
*/
class SearchHelperExtension extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     **/
    private $container;

    /**
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     **/
    public function getFilters()
    {
        return array(
            'needle_canonicalize_value_for_facet'      => new \Twig_Filter_Method($this, 'canonicalizeForFacet'),
        );
    }

    /**
     * Canonicalize a value for the provided facet.
     *
     * @param  string               $value
     * @param  Facet\FacetInterface $facet
     * @return string
     **/
    public function canonicalizeForFacet($value, $facet)
    {
        if (!$facet instanceof Facet\FacetInterface) {
            return $value;
        }

        return $this->getFacetValueCanonicalizer()->canonicalizeForFacet($value, $facet);
    }

    public function getName()
    {
        return 'markup_needle.helper';
    }

    /**
     * Gets the facet value canonicalizer service.
     *
     * @return Facet\FacetValueCanonicalizerInterface
     **/
    private function getFacetValueCanonicalizer()
    {
        return $this->container->get('markup_needle.facet.value_canonicalizer');
    }
}