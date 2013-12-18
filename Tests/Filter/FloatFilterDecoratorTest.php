<?php

namespace Markup\NeedleBundle\Tests\Filter;

use Markup\NeedleBundle\Filter\FloatFilterDecorator;

/**
* A test for a decorator for a filter that declares a float type (clocking any underlying type).
*/
class FloatFilterDecoratorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->filter = $this->getMock('Markup\NeedleBundle\Filter\FilterInterface');
        $this->decorator = new FloatFilterDecorator($this->filter);
    }

    public function testIsFloatFilter()
    {
        $this->assertTrue($this->decorator instanceof \Markup\NeedleBundle\Filter\FloatFilterInterface);
    }

    public function testOneToOneDecoration()
    {
        $name = 'filter';
        $displayName = 'Filter';
        $searchKey = 'fil_ter';
        $this->filter
            ->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($name));
        $this->filter
            ->expects($this->any())
            ->method('getDisplayName')
            ->will($this->returnValue($displayName));
        $this->filter
            ->expects($this->any())
            ->method('getSearchKey')
            ->will($this->returnValue($searchKey));
        $this->assertEquals($name, $this->decorator->getName());
        $this->assertEquals($displayName, $this->decorator->getDisplayName());
        $this->assertEquals($searchKey, $this->decorator->getSearchKey());
    }
}
