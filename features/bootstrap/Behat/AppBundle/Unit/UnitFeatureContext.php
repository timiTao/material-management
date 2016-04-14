<?php
/**
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Behat\AppBundle\Unit;

use Behat\AppBundle\Unit\Page\EditUnit;
use Behat\AppBundle\Unit\Page\NewUnit;
use Behat\AppBundle\Unit\Page\UnitList;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Hook\Call\BeforeScenario;

/**
 * Class UnitFeatureContext
 */
class UnitFeatureContext extends RawMinkContext implements SnippetAcceptingContext
{
    /** @var  UnitList */
    private $unitList;

    /** @var  NewUnit */
    private $newUnit;

    /** @var EditUnit  */
    private $editUnit;

    /**
     * UnitFeatureContext constructor.
     *
     * @param UnitList $unitList
     * @param NewUnit $newUnit
     * @param EditUnit $editUnit
     */
    public function __construct(UnitList $unitList, NewUnit $newUnit, EditUnit $editUnit)
    {
        $this->unitList = $unitList;
        $this->newUnit = $newUnit;
        $this->editUnit = $editUnit;
    }

    /**
     * @Given I create unit :arg1 with shortcut :arg2
     */
    public function iCreateUnitWithShortcut($arg1, $arg2)
    {
        $this->newUnit->addUnit($arg1, $arg2);
    }

    /**
     * @Then I listening units
     */
    public function iListeningUnits()
    {
        $this->unitList->open();
    }

    /**
     * @Then I should see unit :arg1 on list
     */
    public function iShouldSeeUnitOnList($arg1)
    {
        if (!$this->unitList->hasItem($arg1)){
            throw new \Exception(sprintf("Item '%s' don't exist on list", $arg1));
        }
    }

    /**
     * @When I edit unit :arg1 with new name :arg2 and :arg3 shortcut
     */
    public function iEditUnitWithNewNameAndShortcut($arg1, $arg2, $arg3)
    {
        $editPage = $this->unitList->getEditPageForItemWithName($arg1);
        $editPage->updateUnit($arg2, $arg3);
    }

    /**
     * @Given there are such units:
     */
    public function thereAreSuchUnits(TableNode $table)
    {
        foreach ($table as $row) {
            $this->iCreateUnitWithShortcut($row['name'], $row['shortcut']);
        }
    }

    /**
     * @Then I should see given units:
     */
    public function iShouldSeeGivenUnits(TableNode $table)
    {
        foreach ($table as $row) {
            if (!$this->unitList->hasItem($row['name'])){
                throw new \Exception(sprintf('Unit %s is not found', $row['name']));
            }
        }

    }

    /**
     * @BeforeScenario
     */
    public function beforeScenario()
    {
        exec("php app/console doctrine:database:drop --force");
        exec("php app/console doctrine:database:create");
        exec("php app/console doctrine:schema:update --force");
    }
}