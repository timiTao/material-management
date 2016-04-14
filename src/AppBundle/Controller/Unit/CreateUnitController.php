<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Controller\Unit;

use Symfony\Component\HttpFoundation\Request;
use Domain\Unit\UseCase\CreateUnit\CreateUnitRequest;
use Domain\Unit\UseCase\CreateUnit\CreateUnitResponderInterface;
use Domain\Unit\UseCase\CreateUnit\CreateUnitResponse;
use Domain\Unit\UseCase\CreateUnit\CreateUnitUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class CreateUnitController
 *
 * @package AppBundle\Controller
 * @Route(service="unit.controller.create_unit")
 */
class CreateUnitController extends Controller implements CreateUnitResponderInterface
{
    /** @var  CreateUnitUseCase */
    private $createUniteUseCase;

    /**
     * CreateUnitController constructor.
     *
     * @param CreateUnitUseCase $createUniteUseCase
     */
    public function __construct(CreateUnitUseCase $createUniteUseCase)
    {
        $this->createUniteUseCase = $createUniteUseCase;
        $this->createUniteUseCase->addResponder($this);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/new", name="unit_new")
     * @Method({"GET", "POST"})
     *
     * @param $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\UnitType');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $createRequest = new CreateUnitRequest($data['name'], $data['shortcut']);
            $this->createUniteUseCase->execute($createRequest);

            return $this->redirectToRoute('unit_list');
        }

        return $this->render(
            'AppBundle:Unit:new.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @param CreateUnitResponse $response
     * @return void
     */
    public function unitCreated(CreateUnitResponse $response)
    {

    }
}
