<?php

use horstoeko\invoicesuite\InvoiceDocumentBuilder;

require __DIR__ . "/../vendor/autoload.php";

$builder = InvoiceDocumentBuilder::createByProviderUniqueId('zffxminimum');
echo $builder->getContentAsXml();
