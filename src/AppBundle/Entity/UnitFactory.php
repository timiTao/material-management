<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Entity;

use Domain\Unit\Enitity\UnitInterface;
use Domain\Unit\UnitFactoryInterface;

/**
 * Class UnitFactory
 *
 * @package AppBundle\Entity
 */
class UnitFactory implements UnitFactoryInterface
{
    /**
     * @param string $name
     * @param string $shortcut
     * @return UnitInterface
     */
    public function create($name, $shortcut)
    {
        return new Unit($name, $shortcut);
    }
}
