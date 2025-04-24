<?php

namespace horstoeko\invoicesuite\tests\testcases;

use horstoeko\invoicesuite\models\zugferd\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\tests\TestCase;

class BasicTest extends TestCase
{
    public function testSoundCheck(): void
    {
        $this->assertTrue(class_exists(CrossIndustryInvoice::class));
    }
}
