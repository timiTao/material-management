<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render(
            'default/index.html.twig',
            array()
        );
    }
}