<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MercadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MercadosTable Test Case
 */
class MercadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MercadosTable
     */
    protected $Mercados;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Mercados',
        'app.Precos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Mercados') ? [] : ['className' => MercadosTable::class];
        $this->Mercados = $this->getTableLocator()->get('Mercados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Mercados);

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
