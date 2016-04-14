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
 * Class EditUnit
 *
 * @package Behat\AppBundle\Unit\Page
 */
class EditUnit extends Page
{
    /**
     * @var string $path
     */
    protected $path = '/unit/edit/{id}';

    protected $elements = [
        'Form' => 'form'
    ];

    /**
     * @param string $name
     * @param string $shortcut
     */
    public function updateUnit($name, $shortcut)
    {
        $addForm = $this->getElement('Form');
        $addForm->fillField('Name', $name);
        $addForm->fillField('Shortcut', $shortcut);
        $addForm->pressButton('Edit');
    }

}