<?php

namespace Markup\NeedleBundle\Tests\Context;

use Markup\NeedleBundle\Tests\AbstractInterfaceTestCase;

/**
* A test for an interface for display contexts for search engines.
*/
class SearchContextInterfaceTest extends AbstractInterfaceTestCase
{
    protected function getExpectedPublicMethods()
    {
        return array(
            'getItemsPerPage',
            'getFacets',
            'getDefaultFilterQueries',
            'getDefaultSortCollectionForQuery',
            'getSetDecoratorForFacet',
            'getWhetherFacetIgnoresCurrentFilters',
            'shouldUseFacetValuesForRecordedQuery',
            'getAvailableFilterNames',
            'getBoostQueryFields',
            'getFacetCollatorProvider',
            'getFacetSortOrderProvider',
            'getInterceptor',
            );
    }

    protected function getInterfaceUnderTest()
    {
        return 'Markup\NeedleBundle\Context\SearchContextInterface';
    }
}