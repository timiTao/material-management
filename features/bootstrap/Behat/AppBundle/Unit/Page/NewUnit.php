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
 * Class NewUnit
 *
 * @package Behat\AppBundle\Unit\Page
 */
class NewUnit extends Page
{
    /**
     * @var string $path
     */
    protected $path = '/unit/new';

    protected $elements = [
        'Form' => 'form'
    ];

    /**
     * @param string $name
     * @param string $shortcut
     */
    public function addUnit($name, $shortcut)
    {
        $this->open();
        $addForm = $this->getElement('Form');
        $addForm->fillField('Name', $name);
        $addForm->fillField('Shortcut', $shortcut);
        $addForm->pressButton('Create');
    }

}