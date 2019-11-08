<?php

namespace Leandreaci\Tests;


use Illuminate\Http\Request;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $t = new FilterExample(new Request());
        $this->assertTrue(true);
    }
}
