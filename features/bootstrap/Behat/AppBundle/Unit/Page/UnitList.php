<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Behat\AppBundle\Unit\Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Class UnitList
 *
 * @package Behat\AppBundle\Unit\Page
 */
class UnitList extends Page
{
    /**
     * @var string $path
     */
    protected $path = '/unit/';

    protected $elements = [
        'Unit List' => 'table'
    ];

    /**
     * @param $name
     * @return bool
     */
    public function hasItem($name)
    {
        $list = $this->getElement('Unit List');

        $xpath = sprintf('(//td[normalize-space() ="%s"])', $name);
        $item =  $list->find('xpath', $xpath);
        return (bool)$item;
    }

    /**
     * @param $name
     * @return EditUnit
     */
    public function getEditPageForItemWithName($name)
    {
        $list = $this->getElement('Unit List');
        $xpath = sprintf('(//td[normalize-space() ="%s"])[1]/following-sibling::td/ul/li/a', $name);
        $editLink = $list->find('xpath', $xpath)->getAttribute('href');

        $editUnit = $this->getPage('EditUnit');
        $editUnit->getDriver()->visit($editLink);
        return $editUnit;
    }

}