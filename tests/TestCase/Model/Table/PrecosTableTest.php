<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrecosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrecosTable Test Case
 */
class PrecosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrecosTable
     */
    protected $Precos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Precos',
        'app.Produtos',
        'app.Mercados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Precos') ? [] : ['className' => PrecosTable::class];
        $this->Precos = $this->getTableLocator()->get('Precos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Precos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
