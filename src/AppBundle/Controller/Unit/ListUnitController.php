<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Controller\Unit;

use Domain\Unit\UseCase\ListUnit\UnitListItem;
use Domain\Unit\UseCase\ListUnit\UnitListResponderInterface;
use Domain\Unit\UseCase\ListUnit\UnitListResponse;
use Domain\Unit\UseCase\ListUnit\UnitListUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ListUnitController
 *
 * @package AppBundle\Controller
 * @Route(service="unit.controller.list_unit")
 */
class ListUnitController extends Controller implements UnitListResponderInterface
{
    /** @var  UnitListUseCase */
    private $unitListUseCase;

    /** @var  UnitListItem[] */
    private $listItems;

    /**
     * ListUnitController constructor.
     *
     * @param UnitListUseCase $unitListUseCase
     */
    public function __construct(UnitListUseCase $unitListUseCase)
    {
        $this->unitListUseCase = $unitListUseCase;
        $this->unitListUseCase->addResponder($this);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="unit_list")
     */
    public function listAction()
    {
        $this->unitListUseCase->execute();

        return $this->render('AppBundle:Unit:list.html.twig', array(
            'items' => $this->listItems
        ));
    }

    /**
     * @param UnitListResponse $response
     */
    public function unitListFetched(UnitListResponse $response)
    {
        $this->listItems = $response->getList();
    }
}
