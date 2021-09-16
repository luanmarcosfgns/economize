<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListasTable Test Case
 */
class ListasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListasTable
     */
    protected $Listas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Listas',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Listas') ? [] : ['className' => ListasTable::class];
        $this->Listas = $this->getTableLocator()->get('Listas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Listas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
