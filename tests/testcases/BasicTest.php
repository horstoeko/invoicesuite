<?php

namespace horstoeko\invoicesuite\tests\testcases;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoice;

class BasicTest extends TestCase
{
    public function testSoundCheck(): void
    {
        $this->assertTrue(class_exists(CrossIndustryInvoice::class));
    }
}
