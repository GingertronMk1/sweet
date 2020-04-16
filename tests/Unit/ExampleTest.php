<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $testAge = 24;
        $u = new User;
        $u->setAge($testAge + 0.6);
        $this->assertTrue($u->getAge() === $testAge);
    }
}
