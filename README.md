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

- [No AI](#no-ai)
  - [License](#license)
  - [Overview](#overview)
  - [Dependencies](#dependencies)
  - [Installation](#installation)
  - [Documentation](#documentation)

# No AI

![No AI](assets/noai.png)

> **Human contributions only. AI-generated contributions are not wanted in this project.**

InvoiceSuite deals with electronic invoicing and implements specifications, business rules, validation rules, and data structures that may have **legal, regulatory, accounting, and tax-related implications**.

A change that looks technically correct can still be wrong from a business, specification, legal, or tax perspective. In this kind of project, plausible-looking code is not enough.

For this reason, I want contributions from **experienced people who understand what they are doing and are able to assess the consequences of their changes themselves**.

Contributors are expected to:

* understand the code they submit;
* understand the affected specification and business context;
* verify requirements against the relevant standards and documentation;
* consider existing behavior, compatibility, and edge cases;
* write meaningful tests based on actual requirements;
* review their own implementation critically;
* be able to explain **why** their implementation is correct.

Please do **not** submit AI-generated code, pull requests, issue analyses, reviews, or documentation as a substitute for your own knowledge and judgement.

Especially in areas involving electronic invoices, validation, monetary values, taxes, document semantics, and regulatory requirements, incorrect assumptions may have consequences that go far beyond a normal software defect.

This policy is not about following or rejecting a technological trend. It is about **accountability**.

The person contributing a change should understand it, be able to defend the technical decision behind it, and be capable of recognizing when something is outside their own area of expertise.

**Real experience. Real understanding. Real judgement. Accountable code.**

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
