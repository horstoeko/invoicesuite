<!-- omit in toc -->
# horstoeko/invoicesuite

![InvoiceSuite Logo](assets/logo.png)

[![Latest Stable Version](https://img.shields.io/packagist/v/horstoeko/invoicesuite.svg?style=plastic)](https://packagist.org/packages/horstoeko/invoicesuite)
[![PHP version](https://img.shields.io/packagist/php-v/horstoeko/invoicesuite.svg?style=plastic)](https://packagist.org/packages/horstoeko/invoicesuite)
[![License](https://img.shields.io/packagist/l/horstoeko/invoicesuite.svg?style=plastic)](https://packagist.org/packages/horstoeko/invoicesuite)

[![Build Status](https://github.com/horstoeko/invoicesuite/actions/workflows/build.ci.yml/badge.svg)](https://github.com/horstoeko/invoicesuite/actions/workflows/build.ci.yml)
[![Release Status](https://github.com/horstoeko/invoicesuite/actions/workflows/build.release.yml/badge.svg)](https://github.com/horstoeko/invoicesuite/actions/workflows/build.release.yml)
[![Nightly Build Status](https://github.com/horstoeko/invoicesuite/actions/workflows/build.nightly.yml/badge.svg)](https://github.com/horstoeko/invoicesuite/actions/workflows/build.nightly.yml)

<!-- omit in toc -->
## Table of Contents

- [License](#license)
- [Overview](#overview)
- [Dependencies](#dependencies)
- [Installation](#installation)
- [Documentation](#documentation)

<!-- omit in toc -->
## AI

InvoiceSuite deals with electronic invoicing and implements specifications, business rules, validation rules, and data structures that may have **legal, regulatory, accounting, and tax-related implications**.

A change that looks technically correct can still be wrong from a business, specification, legal, or tax perspective. Plausible-looking code is therefore not enough.

Contributors are expected to:

* understand the code they submit and its business context;
* verify requirements against the relevant standards and documentation;
* consider compatibility, edge cases, and existing behavior;
* write meaningful tests based on actual requirements;
* review their implementation critically;
* be able to explain **why** their implementation is correct.

AI-assisted development is welcome as a tool, but its output must be reviewed with particular care. If AI-generated or AI-assisted code is included in a pull request, the contributor must fully understand it, verify its assumptions, check it against the relevant specifications and requirements, and ensure that the tests actually cover the intended behavior.

Responsibility always remains with the person submitting the change. This is especially important for electronic invoices, validation, monetary values, taxes, document semantics, and regulatory requirements, where incorrect assumptions can have consequences beyond an ordinary software defect.

This policy is not about accepting or rejecting AI. It is about **accountability, expertise, and informed engineering decisions**.

**Use the tools you find helpful. Understand the result. Review it critically. Take responsibility for the code you submit.**

## License

The code in this project is provided under the [MIT](https://opensource.org/licenses/MIT) license.

## Overview

InvoiceSuite is a multi-format library for electronic invoices with the goal of supporting as many formats and real-world variants as possible — from international standards to country-specific profiles. This includes German formats such as ZUGFeRD (and Factur-X, which is closely aligned with it) as well as XRechnung, with XRechnung explicitly supported in UBL syntax. The library also aims to cover interoperability ecosystems such as Peppol.

InvoiceSuite is designed to be extensible: if you follow the defined conventions and interfaces, you can add your own formats, profiles, or converters independently, without having to bend or modify the core.

## Dependencies

This package makes use of...

- [jms/serializer](http://jmsyst.com/libs/serializer)
- [setasign/fpdf](https://github.com/Setasign/FPDF)
- [setasign/fpdi](https://github.com/Setasign/FPDI).
- [prinsfrank/pdfparser](https://github.com/PrinsFrank/pdfparser)

... and Optionally of...

- [smalot/pdfparser](https://github.com/smalot/pdfparser)

## Installation

There is one recommended way to install `horstoeko/invoicesuite`

```bash
composer require "horstoeko/invoicesuite"
```

## Documentation

See our [wiki](https://github.com/horstoeko/invoicesuite/wiki)...

- [Installation](https://github.com/horstoeko/invoicesuite/wiki/Installation)
- [Architecture](https://github.com/horstoeko/invoicesuite/wiki/Architecture)
- [Configuration](https://github.com/horstoeko/invoicesuite/wiki/Configuration)
- [Creating an electronic invoice document](https://github.com/horstoeko/invoicesuite/wiki/Creating-an-electronic-invoice-document)
- [Creating an electronic invoice PDF document](https://github.com/horstoeko/invoicesuite/wiki/Creating-an-electronic-invoice-pdf-document)
- [Reading an electronic invoice document](https://github.com/horstoeko/invoicesuite/wiki/Reading-an-electronic-invoice-document)
- [Reading an electronic invoice PDF document](https://github.com/horstoeko/invoicesuite/wiki/Reading-an-electronic-invoice-pdf-document)
- [Legacy Support for horstoeko/zugferd](https://github.com/horstoeko/invoicesuite/wiki/Legacy-support)
- [Validation](https://github.com/horstoeko/invoicesuite/wiki/Validation)
- [Visualization](https://github.com/horstoeko/invoicesuite/wiki/Visualization)
- [BT-Rules for ZUGFeRD/Factur-X/XRechnung](https://github.com/horstoeko/invoicesuite/wiki/BT-rule-overview)
- [Available providers](https://github.com/horstoeko/invoicesuite/wiki/Available-providers)
- [Class and method overview](https://github.com/horstoeko/invoicesuite/wiki/Class-and-method-overview)
