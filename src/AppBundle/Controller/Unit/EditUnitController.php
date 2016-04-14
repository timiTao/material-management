<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Controller\Unit;

use AppBundle\Entity\Unit;
use Domain\Unit\UseCase\EditUnit\EditUnitRequest;
use Symfony\Component\HttpFoundation\Request;
use Domain\Unit\UseCase\EditUnit\EditUnitUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class EditUnitController
 *
 * @package AppBundle\Controller\Unit
 * @Route(service="unit.controller.edit_unit")
 */
class EditUnitController extends Controller
{
    /** @var  EditUnitUseCase */
    private $editUnitUseCase;

    /**
     * EditUnitController constructor.
     *
     * @param EditUnitUseCase $editUnitUseCase
     */
    public function __construct(EditUnitUseCase $editUnitUseCase)
    {
        $this->editUnitUseCase = $editUnitUseCase;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="unit_edit")
     * @Method({"GET", "POST"})
     * @ParamConverter("post", class="AppBundle:Unit")
     *
     * @param Request $request
     * @param Unit $unit
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Unit $unit)
    {
        $form = $this->createForm('AppBundle\Form\Type\UnitType', $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Unit $unit */
            $unit = $form->getData();
            $editRequest = new EditUnitRequest($unit->getId(), $unit->getName(), $unit->getShortcut());
            $this->editUnitUseCase->execute($editRequest);

            return $this->redirectToRoute('unit_list', array('id' => $unit->getId()));
        }

        return $this->render(
            'AppBundle:Unit:edit.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}
