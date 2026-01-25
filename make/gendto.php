<?php

use horstoeko\stringmanagement\PathUtils;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;

require __DIR__ . "/../vendor/autoload.php";

function gendto(array $definitions): void
{
    foreach ($definitions as $definition) {

        if (($definition["disabled"] ?? false) === true) {
            continue;
        }

        $toFile = PathUtils::combinePathWithFile($definition["todir"], sprintf("%s.php", $definition["class"]));

        $phpFile = new PhpFile();
        $phpFile->setStrictTypes(true);
        $phpFile->addComment('This file is a part of horstoeko/invoicesuite.');
        $phpFile->addComment('');
        $phpFile->addComment('For the full copyright and license information, please view the LICENSE');
        $phpFile->addComment('file that was distributed with this source code.');

        $namespace = $phpFile->addNamespace($definition["ns"]);

        $class = $namespace->addClass($definition["class"]);
        $class->addComment(sprintf('Class representing a DTO for %s', $definition['purpose'] ?? "..."));
        $class->addComment('');
        $class->addComment('@category InvoiceSuite');
        $class->addComment('@author   horstoeko <horstoeko@erling.com.de>');
        $class->addComment('@license  https://opensource.org/licenses/MIT MIT');
        $class->addComment('@see      https://github.com/horstoeko/invoicesuite');

        if (isset($definition["extends"])) {
            $namespace->addUse($definition["extends"]);
            $class->setExtends($definition["extends"]);
        }

        /**
         * -------------------
         * -- Constructor
         * -------------------
         */

        $constructor = $class->addMethod('__construct')->setVisibility('public');
        $constructor->addComment('Constructor');
        $constructor->addComment('');

        if (isset($definition["extends"])) {
            $baseDefinition = array_filter($definitions, function ($def) use ($definition) {
                return strcasecmp(basename($definition["extends"]), $def["class"]) === 0;
            });

            $baseDefinition = reset($baseDefinition);

            $parentParameterString = "";

            foreach ($baseDefinition["properties"] as $basePropertyDefinitionName => $basePropertyDefinition) {
                $propertyType = $basePropertyDefinition["type"];
                $propertyCaption = $basePropertyDefinition["caption"];
                $propertyIsArray = $basePropertyDefinition["isarray"] ?? false;
                $propertyTypeHint = $propertyType;
                $propertyIsObject = $basePropertyDefinition["isobject"] ?? strpos($propertyType, '\\') !== false;

                if ($propertyIsObject) {
                    $namespace->addUse($propertyType);
                    $objectBaseName = explode('\\', $propertyTypeHint);
                    $propertyTypeHint = end($objectBaseName);
                }

                if ($propertyIsArray === true) {
                    $propertyTypeHint = sprintf("array<%s>", $propertyTypeHint);
                } elseif ($propertyIsObject === true) {
                    $propertyTypeHint .= "|null";
                } else {
                    $propertyTypeHint .= "|null";
                }

                if ($propertyIsArray === true) {
                    $constructor->addParameter($basePropertyDefinitionName)->setType("array")->setDefaultValue([]);
                } elseif ($propertyIsObject === true) {
                    $constructor->addParameter($basePropertyDefinitionName)->setType($propertyType)->setNullable(true)->setDefaultValue(null);
                } else {
                    $constructor->addParameter($basePropertyDefinitionName)->setType($propertyType)->setNullable(true)->setDefaultValue(null);
                }

                if ($parentParameterString !== "") {
                    $parentParameterString = $parentParameterString . ", ";
                }

                $parentParameterString .= ('$' . $basePropertyDefinitionName);

                $constructor->addComment(sprintf("@param %1\$s \$%2\$s %3\$s", basename($propertyTypeHint), $basePropertyDefinitionName, $propertyCaption));
            }

            $constructor->addBody(sprintf("parent::__construct(%s);", $parentParameterString));
            $constructor->addBody("");
        }

        /**
         * -------------------
         * -- Properties
         * -------------------
         */

        foreach ($definition["properties"] as $propertyName => $propertyDefinition) {
            $propertyType = $propertyDefinition["type"];
            $propertyCaption = $propertyDefinition["caption"];
            $propertyIsArray = $propertyDefinition["isarray"] ?? false;
            $propertyIsNullable = $propertyDefinition["isnullable"] ?? true;
            $propertyTypeHint = $propertyType;
            $propertyIsObject = $propertyDefinition["isobject"] ?? strpos($propertyType, '\\') !== false;
            $propertyGetterName = $propertyDefinition["gettername"] ?? $propertyName;
            $propertySetterName = $propertyDefinition["settername"] ?? $propertyName;
            $propertyAdderName = $propertyDefinition["addername"] ?? $propertyName;
            $propertyFirsterName = $propertyDefinition["firstername"] ?? $propertyName;
            $propertyNexterName = $propertyDefinition["nextername"] ?? $propertyName;
            $propertyPreverName = $propertyDefinition["prevername"] ?? $propertyName;
            $propertyLasterName = $propertyDefinition["lastername"] ?? $propertyName;
            $propertyLooperName = $propertyDefinition["loopername"] ?? $propertyName;
            $propertyAutoPlural = $propertyDefinition["autoplural"] ?? false;
            $propertyAutoPluralAppendix = $propertyDefinition["autopluralappendix"] ?? "s";
            $propertyClassPropertyName = $propertyName;

            if ($propertyIsArray === true && $propertyAutoPlural === true) {
                $appendix = $propertyAutoPluralAppendix;

                if ($appendix === "s" && str_ends_with(strtolower($propertyGetterName), "s")) {
                    $appendix = "es";
                }

                $pluralize = static function (string $name) use ($appendix): string {
                    if ($appendix === "s") {
                        return rtrim($name, "s") . "s";
                    }

                    return str_ends_with(strtolower($name), strtolower($appendix)) ? $name : ($name . $appendix);
                };

                $propertyGetterName        = $pluralize($propertyGetterName);
                $propertySetterName        = $pluralize($propertySetterName);
                $propertyClassPropertyName = $pluralize($propertyClassPropertyName);

                if ($appendix === "s") {
                    $propertyAdderName   = rtrim($propertyAdderName, "s");
                    $propertyFirsterName = rtrim($propertyFirsterName, "s");
                    $propertyNexterName  = rtrim($propertyNexterName, "s");
                    $propertyLasterName  = rtrim($propertyLasterName, "s");
                    $propertyLooperName  = rtrim($propertyLooperName, "s");
                }
            }

            if ($propertyIsObject) {
                $namespace->addUse($propertyType);
                $objectBaseName = explode('\\', $propertyTypeHint);
                $propertyTypeHint = end($objectBaseName);
            }

            if ($propertyIsArray === true) {
                $propertyTypeHint = sprintf("array<%s>", basename($propertyTypeHint));
            } elseif ($propertyIsObject === true) {
                $propertyTypeHint .= "|null";
            } else {
                $propertyTypeHint .= "|null";
            }

            $property = $class->addProperty(lcfirst($propertyClassPropertyName))->setVisibility('protected')->setType($propertyIsArray === true ? "array" : $propertyType);
            $property->addComment(sprintf("%s\n\n@var %s", $propertyCaption, $propertyTypeHint));

            if ($propertyIsArray === true) {
                $property->setValue([]);
            } elseif ($propertyIsObject === true) {
                $property->setValue(null)->setNullable(true);
            } else {
                $property->setValue(null)->setNullable(true);
            }

            /**
             * -------------------
             * -- Constructor
             * -------------------
             */

            if ($propertyIsArray === true) {
                $constructor->addParameter($propertyClassPropertyName)->setType("array")->setDefaultValue([]);
            } elseif ($propertyIsObject === true) {
                $constructor->addParameter($propertyClassPropertyName)->setType($propertyType)->setNullable(true)->setDefaultValue(null);
            } else {
                $constructor->addParameter($propertyClassPropertyName)->setType($propertyType)->setNullable(true)->setDefaultValue(null);
            }

            $constructor->addComment(sprintf("@param %1\$s \$%2\$s %3\$s", basename($propertyTypeHint), $propertyClassPropertyName, $propertyCaption));
            $constructor->addBody(sprintf("\$this->set%1\$s(\$%2\$s);", ucfirst($propertySetterName), $propertyClassPropertyName));

            /**
             * -------------------
             * -- Getter
             * -------------------
             */

            $getter = $class->addMethod(sprintf("get%s", ucfirst($propertyGetterName)));

            if ($propertyIsArray === true) {
                $getter->setReturnType("array");
            } elseif ($propertyIsObject === true) {
                $getter->setReturnType($propertyType)->setReturnNullable(true);
            } else {
                $getter->setReturnType($propertyType)->setReturnNullable(true);
            }

            $getter->setBody(sprintf("return \$this->%s;", $propertyClassPropertyName));
            $getter->addComment(sprintf("Returns %s\n\n@return %s", lcfirst($propertyCaption), $propertyTypeHint));

            /**
             * -------------------
             * -- Setter
             * -------------------
             */

            $setter = $class->addMethod(sprintf("set%s", ucfirst($propertySetterName)));
            $setter->setReturnType("static");

            if ($propertyIsArray === true) {
                $setter->addParameter($propertyClassPropertyName)->setType("array");
            } elseif ($propertyIsObject === true) {
                $setter->addParameter($propertyClassPropertyName)->setType($propertyType)->setNullable(true);
            } else {
                $setter->addParameter($propertyClassPropertyName)->setType($propertyType)->setNullable(true);
            }

            if ($propertyIsArray !== true && $propertyIsObject !== true && $propertyType === "string") {
                $namespace->addUse('horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils');
                $setter->setBody(sprintf("\$this->%1\$s = InvoiceSuiteStringUtils::asNullWhenEmpty(\$%1\$s);\n\nreturn \$this;", $propertyClassPropertyName));
            } else {
                $setter->setBody(sprintf("\$this->%1\$s = \$%1\$s;\n\nreturn \$this;", $propertyClassPropertyName));
            }

            $setter->addComment(sprintf("Sets %4\$s\n\n@param %3\$s \$%2\$s %1\$s\n@return static", $propertyCaption, $propertyClassPropertyName, $propertyTypeHint, lcfirst($propertyCaption)));

            /**
             * --------------------------------
             * -- Additional methods for arrays
             * --------------------------------
             */

            if ($propertyIsArray === true) {

                /**
                 * -------------------
                 * -- Adder
                 * -------------------
                 */

                $adder = $class->addMethod(sprintf("add%s", ucfirst($propertyAdderName)));
                $adder->setReturnType("static");
                $adder->addParameter($propertyName)->setType($propertyType)->setNullable($propertyIsNullable);
                if ($propertyIsNullable === true) {
                    $adder->addBody(sprintf("if (is_null(\$%1\$s)) {", $propertyName));
                    $adder->addBody("    return \$this;");
                    $adder->addBody("}");
                    $adder->addBody("");
                }
                $adder->addBody(sprintf("\$this->%1\$s[] = \$%2\$s;", $propertyClassPropertyName, $propertyName));
                $adder->addBody("");
                $adder->addBody("return \$this;");
                $adder->addComment(sprintf("Add single %1\$s\n\n@param %2\$s \$%3\$s %1\$s\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * -------------------
                 * -- First
                 * -------------------
                 */

                $firster = $class->addMethod(sprintf("first%s", ucFirst($propertyFirsterName)));
                $firster->setReturnType("static");
                $firster->addParameter("callback")->setType("callable");
                $firster->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $firster->addBody(sprintf("if ((\$%2\$s = reset(\$this->%1\$s)) !== false) {", $propertyClassPropertyName, $propertyName));
                $firster->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $firster->addBody("} elseif (!is_null(\$callbackElse)) {");
                $firster->addBody("    \$callbackElse();");
                $firster->addBody("}");
                $firster->addBody("\nreturn \$this;");
                $firster->addComment(sprintf("Get first %1\$s\n\n@param callable \$callback Callback to execute if an item was found\n@param callable|null \$callbackElse Callback to execute if no item was found\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * -------------------
                 * -- Next
                 * -------------------
                 */

                $nexter = $class->addMethod(sprintf("next%s", ucfirst($propertyNexterName)));
                $nexter->setReturnType("static");
                $nexter->addParameter("callback")->setType("callable");
                $nexter->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $nexter->addBody(sprintf("if ((\$%2\$s = next(\$this->%1\$s)) !== false) {", $propertyClassPropertyName, $propertyName));
                $nexter->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $nexter->addBody("} elseif (!is_null(\$callbackElse)) {");
                $nexter->addBody("    \$callbackElse();");
                $nexter->addBody("}");
                $nexter->addBody("\nreturn \$this;");
                $nexter->addComment(sprintf("Get next %1\$s\n\n@param callable \$callback Callback to execute if an item was found\n@param callable|null \$callbackElse Callback to execute if no item was found\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * -------------------
                 * -- Previous
                 * -------------------
                 */

                $prever = $class->addMethod(sprintf("previous%s", ucfirst($propertyPreverName)));
                $prever->setReturnType("static");
                $prever->addParameter("callback")->setType("callable");
                $prever->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $prever->addBody(sprintf("if ((\$%2\$s = prev(\$this->%1\$s)) !== false) {", $propertyClassPropertyName, $propertyName));
                $prever->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $prever->addBody("} elseif (!is_null(\$callbackElse)) {");
                $prever->addBody("    \$callbackElse();");
                $prever->addBody("}");
                $prever->addBody("\nreturn \$this;");
                $prever->addComment(sprintf("Get previous %1\$s\n\n@param callable \$callback Callback to execute if an item was found\n@param callable|null \$callbackElse Callback to execute if no item was found\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * -------------------
                 * -- Last
                 * -------------------
                 */

                $laster = $class->addMethod(sprintf("last%s", ucfirst($propertyLasterName)));
                $laster->setReturnType("static");
                $laster->addParameter("callback")->setType("callable");
                $laster->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $laster->addBody(sprintf("if ((\$%2\$s = end(\$this->%1\$s)) !== false) {", $propertyClassPropertyName, $propertyName));
                $laster->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $laster->addBody("} elseif (!is_null(\$callbackElse)) {");
                $laster->addBody("    \$callbackElse();");
                $laster->addBody("}");
                $laster->addBody("\nreturn \$this;");
                $laster->addComment(sprintf("Get last %1\$s\n\n@param callable \$callback Callback to execute if an item was found\n@param callable|null \$callbackElse Callback to execute if no item was found\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * -------------------
                 * -- Looper
                 * -------------------
                 */

                $looper = $class->addMethod(sprintf("forEach%s", ucfirst($propertyLooperName)));
                $looper->setReturnType("static");
                $looper->addParameter("callback")->setType("callable");
                $looper->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $looper->addParameter("limit")->setType("int")->setNullable(true)->setDefaultValue(null);
                $looper->addBody("\$count = 0;");
                $looper->addBody("");
                $looper->addBody(sprintf("foreach (\$this->%1\$s as \$%2\$s) {", $propertyClassPropertyName, $propertyName));
                $looper->addBody("    if (\$limit !== null && \$count >= \$limit) {");
                $looper->addBody("        break;");
                $looper->addBody("    }");
                $looper->addBody("");
                $looper->addBody("    \$count++;");
                $looper->addBody("");
                $looper->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $looper->addBody("}");
                $looper->addBody("");
                $looper->addBody("if (\$count === 0 && !is_null(\$callbackElse)) {");
                $looper->addBody("    \$callbackElse();");
                $looper->addBody("}");
                $looper->addBody("");
                $looper->addBody("return \$this;");
                $looper->addComment(sprintf("Loop over %1\$s and execute callback\n\n@param callable \$callback Callback to execute for each item\n@param callable|null \$callbackElse Callback to execute if no item was found\n@param int|null \$limit Maximum number of loops\n@return static", $propertyCaption, basename($propertyType), $propertyName));

                /**
                 * --------------------------------
                 * -- Looper With fallback to first
                 * --------------------------------
                 */

                $looper = $class->addMethod(sprintf("forEachOrFirst%s", ucfirst($propertyLooperName)));
                $looper->setReturnType("static");
                $looper->addParameter("foreachCondition")->setType("bool");
                $looper->addParameter("callback")->setType("callable");
                $looper->addParameter("callbackElse")->setType("callable")->setNullable(true)->setDefaultValue(null);
                $looper->addParameter("limit")->setType("int")->setNullable(true)->setDefaultValue(null);
                $looper->addBody('if (!$foreachCondition) {');
                $looper->addBody(sprintf('    return $this->first%s($callback, $callbackElse);', ucFirst($propertyFirsterName)));
                $looper->addBody("}");
                $looper->addBody("");
                $looper->addBody("\$count = 0;");
                $looper->addBody("");
                $looper->addBody(sprintf("foreach (\$this->%1\$s as \$%2\$s) {", $propertyClassPropertyName, $propertyName));
                $looper->addBody("    if (\$limit !== null && \$count >= \$limit) {");
                $looper->addBody("        break;");
                $looper->addBody("    }");
                $looper->addBody("");
                $looper->addBody("    \$count++;");
                $looper->addBody("");
                $looper->addBody(sprintf("    \$callback(\$%1\$s);", $propertyName));
                $looper->addBody("}");
                $looper->addBody("");
                $looper->addBody("if (\$count === 0 && !is_null(\$callbackElse)) {");
                $looper->addBody("    \$callbackElse();");
                $looper->addBody("}");
                $looper->addBody("");
                $looper->addBody("return \$this;");
                $looper->addComment(sprintf("Loop over %1\$s and execute callback\n\n@param bool \$foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved\n@param callable \$callback Callback to execute for each item\n@param callable|null \$callbackElse Callback to execute if no item was found\n@param int|null \$limit Maximum number of loops\n@return static", $propertyCaption, basename($propertyType), $propertyName));
            }
        }

        /**
         * ----------------------------
         * -- Additional static methods
         * ----------------------------
         */

        foreach ($definition["staticmethods"] ?? [] as $staticMethodName => $staticMethodDefinition) {
            $method = $class->addMethod($staticMethodName)->setVisibility('public')->setStatic(true)->setReturnType($staticMethodDefinition['return'] ?? 'static');
            $method->setComment(implode("\n", $staticMethodDefinition['comment'] ?? []));
            $method->addBody(implode("\n", $staticMethodDefinition['body'] ?? []));
            foreach ($staticMethodDefinition['params'] ?? [] as $paramName => $paramDefinition) {
                $methodParam = $method
                    ->addParameter($paramName)
                    ->setType($paramDefinition['type'])
                    ->setNullable($paramDefinition['nullable'] ?? false);

                if (array_key_exists('default', $paramDefinition)) {
                    $methodParam->setDefaultValue($paramDefinition['default']);
                }
            }
            foreach ($staticMethodDefinition['use'] ?? [] as $staticMethodUse) {
                $namespace->addUse($staticMethodUse);
            }
        }

        /**
         * ---------------------
         * -- Additional methods
         * ---------------------
         */

        foreach ($definition["methods"] ?? [] as $methodName => $methodDefinition) {
        }

        /**
         * ----------------------------
         * -- Finish and write PHP file
         * ----------------------------
         */

        $printer = new PsrPrinter();
        file_put_contents($toFile, $printer->printFile($phpFile));
    }
}

$definitions = [
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteNoteDTO",
        "properties" => [
            "content" => [
                "type" => "string",
                "caption" => "Free text containing unstructured information that is relevant to the invoice as a whole",
                "isarray" => false,
                "isobject" => false,
            ],
            "contentCode" => [
                "type" => "string",
                "caption" => "Code to classify the content of the free text of the invoice",
                "isarray" => false,
                "isobject" => false,
            ],
            "subjectCode" => [
                "type" => "string",
                "caption" => "Qualification of the free text for the invoice",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteDateRangeDTO",
        "properties" => [
            "startDate" => [
                "type" => "DateTimeInterface",
                "caption" => "Start of the period",
                "isarray" => false,
                "isobject" => true,
            ],
            "endDate" => [
                "type" => "DateTimeInterface",
                "caption" => "End of the period",
                "isarray" => false,
                "isobject" => true,
            ],
            "description" => [
                "type" => "string",
                "caption" => "Further information of the period",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteReferenceDocumentDTO",
        "properties" => [
            "referenceNumber" => [
                "type" => "string",
                "caption" => "Reference number",
                "isarray" => false,
                "isobject" => false,
            ],
            "referenceDate" => [
                "type" => "DateTimeInterface",
                "caption" => "Issue date of the reference",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteReferenceDocumentLineDTO",
        "properties" => [
            "referenceNumber" => [
                "type" => "string",
                "caption" => "Reference number",
                "isarray" => false,
                "isobject" => false,
            ],
            "referenceLineNumber" => [
                "type" => "string",
                "caption" => "Reference line number",
                "isarray" => false,
                "isobject" => false,
            ],
            "referenceDate" => [
                "type" => "DateTimeInterface",
                "caption" => "Issue date of the reference",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteReferenceDocumentExtDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
        "properties" => [
            "typeCode" => [
                "type" => "string",
                "caption" => "The additional document type code",
                "isarray" => false,
                "isobject" => false,
            ],
            "referenceTypeCode" => [
                "type" => "string",
                "caption" => "The additional document reference-type code",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The additional document description",
                "isarray" => false,
                "isobject" => false,
            ],
            "attachment" => [
                "type" => "horstoeko\invoicesuite\utils\InvoiceSuiteAttachment",
                "caption" => "The additional document description",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteReferenceDocumentLineExtDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
        "properties" => [
            "typeCode" => [
                "type" => "string",
                "caption" => "The additional document type code",
                "isarray" => false,
                "isobject" => false,
            ],
            "referenceTypeCode" => [
                "type" => "string",
                "caption" => "The additional document reference-type code",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The additional document description",
                "isarray" => false,
                "isobject" => false,
            ],
            "attachment" => [
                "type" => "horstoeko\invoicesuite\utils\InvoiceSuiteAttachment",
                "caption" => "The additional document description",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteProjectDTO",
        "properties" => [
            "projectNumber" => [
                "type" => "string",
                "caption" => "The project number",
                "isarray" => false,
                "isobject" => false,
            ],
            "projectName" => [
                "type" => "string",
                "caption" => "The project name",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePartyDTO",
        "properties" => [
            "name" => [
                "type" => "string",
                "caption" => "Party names",
                "isarray" => true,
                "isobject" => false,
                "autoplural" => true,
            ],
            "id" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "Party IDs",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "globalId" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "Party global IDs",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "taxRegistration" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "Party tax registrations",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "address" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO",
                "caption" => "Party addresses",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "legalOrganisation" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO",
                "caption" => "Party legal organisations",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "contact" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO",
                "caption" => "Party contacts",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "communication" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO",
                "caption" => "Party electronic communications",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePaymentMeanDTO",
        "properties" => [
            "typeCode" => [
                "type" => "string",
                "caption" => "The expected or used means of payment expressed as a code",
                "isarray" => false,
                "isobject" => false,
            ],
            "name" => [
                "type" => "string",
                "caption" => "The expected or used means of payment expressed in text form",
                "isarray" => false,
                "isobject" => false,
            ],
            "financialCardId" => [
                "type" => "string",
                "caption" => "The primary account number (PAN) of the payment card",
                "isarray" => false,
                "isobject" => false,
            ],
            "financialCardHolder" => [
                "type" => "string",
                "caption" => "The name of the payment card holder",
                "isarray" => false,
                "isobject" => false,
            ],
            "buyerIban" => [
                "type" => "string",
                "caption" => "The identifier of the account to be debited",
                "isarray" => false,
                "isobject" => false,
            ],
            "payeeIban" => [
                "type" => "string",
                "caption" => "The payment account identifier",
                "isarray" => false,
                "isobject" => false,
            ],
            "payeeAccountName" => [
                "type" => "string",
                "caption" => "The name of the payment account",
                "isarray" => false,
                "isobject" => false,
            ],
            "payeeProprietaryId" => [
                "type" => "string",
                "caption" => "The national account number (not for SEPA)",
                "isarray" => false,
                "isobject" => false,
            ],
            "payeeBic" => [
                "type" => "string",
                "caption" => "The identifier of the payment service provider",
                "isarray" => false,
                "isobject" => false,
            ],
            "paymentReference" => [
                "type" => "string",
                "caption" => "The Text value used to link the payment to the invoice issued by the seller",
                "isarray" => false,
                "isobject" => false,
            ],
            "mandate" => [
                "type" => "string",
                "caption" => "The identification of the mandate reference",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
        "staticmethods" => [
            'createAsCreditTransferSepa' => [
                'return' => 'self',
                'comment' => [
                    "Create a payment mean for SEPA credit transfer, German: Überweisung",
                    "",
                    "@param string|null \$payeeIban Payment account identifier",
                    "@param string|null \$payeeAccountName Name of the payment account",
                    "@param string|null \$payeeProprietaryId National account number (not for SEPA)",
                    "@param string|null \$payeeBic Identifier of the payment service provider",
                    "@param string|null \$paymentReference Text value used to link the payment to the invoice issued by the seller",
                    "@return self",
                ],
                'params' => [
                    'payeeIban' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeAccountName' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeProprietaryId' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeBic' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'paymentReference' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                ],
                'body' => [
                    'return new self(',
                    '    typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,',
                    '    payeeIban: $payeeIban,',
                    '    payeeAccountName: $payeeAccountName,',
                    '    payeeProprietaryId: $payeeProprietaryId,',
                    '    payeeBic: $payeeBic,',
                    '    paymentReference: $paymentReference',
                    ');'
                ],
                'use' => [
                    'horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans',
                ],
            ],
            'createAsCreditTransferNoSepa' => [
                'return' => 'self',
                'comment' => [
                    "Create a payment mean for non-SEPA credit transfer, German: Überweisung",
                    "",
                    "@param string|null \$payeeIban Payment account identifier",
                    "@param string|null \$payeeAccountName Name of the payment account",
                    "@param string|null \$payeeProprietaryId National account number (not for SEPA)",
                    "@param string|null \$payeeBic Identifier of the payment service provider",
                    "@param string|null \$paymentReference Text value used to link the payment to the invoice issued by the seller",
                    "@return self",
                ],
                'params' => [
                    'payeeIban' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeAccountName' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeProprietaryId' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'payeeBic' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'paymentReference' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                ],
                'body' => [
                    'return new self(',
                    '    typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,',
                    '    payeeIban: $payeeIban,',
                    '    payeeAccountName: $payeeAccountName,',
                    '    payeeProprietaryId: $payeeProprietaryId,',
                    '    payeeBic: $payeeBic,',
                    '    paymentReference: $paymentReference',
                    ');'
                ],
                'use' => [
                    'horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans',
                ],
            ],
            'createAsDirectDebitSepa' => [
                'return' => 'self',
                'comment' => [
                    "Create a payment mean for SEPA direct debit, German: Lastschrift",
                    "",
                    "@param string|null \$buyerIban Identifier of the account to be debited",
                    "@param string|null \$mandate Identification of the mandate reference",
                    "@return self",
                ],
                'params' => [
                    'buyerIban' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'mandate' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                ],
                'body' => [
                    'return new self(',
                    '    typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,',
                    '    buyerIban: $buyerIban,',
                    '    mandate: $mandate,',
                    ');'
                ],
                'use' => [
                    'horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans',
                ],
            ],
            'createAsDirectDebitNoSepa' => [
                'return' => 'self',
                'comment' => [
                    "Create a payment mean for SEPA direct debit, German: Lastschrift",
                    "",
                    "@param string|null \$buyerIban Identifier of the account to be debited",
                    "@param string|null \$mandate Identification of the mandate reference",
                    "@return self",
                ],
                'params' => [
                    'buyerIban' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'mandate' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                ],
                'body' => [
                    'return new self(',
                    '    typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,',
                    '    buyerIban: $buyerIban,',
                    '    mandate: $mandate,',
                    ');'
                ],
                'use' => [
                    'horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans',
                ],
            ],
            'createAsPaymentCardPayment' => [
                'return' => 'self',
                'comment' => [
                    "Create a payment mean for payment-card payment",
                    "",
                    "@param string|null \$financialCardId Primary account number (PAN) of the payment card",
                    "@param string|null \$financialCardHolder Name of the payment card holder",
                    "@return self",
                ],
                'params' => [
                    'financialCardId' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                    'financialCardHolder' => [
                        'type' => 'string',
                        'nullable' => true,
                        'default' => null
                    ],
                ],
                'body' => [
                    'return new self(',
                    '    typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,',
                    '    financialCardId: $financialCardId,',
                    '    financialCardHolder: $financialCardHolder,',
                    ');'
                ],
                'use' => [
                    'horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans',
                ],
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteDocumentPositionDTO",
        "properties" => [
            "lineId" => [
                "type" => "string",
                "caption" => "The identification of the position",
                "isarray" => false,
                "isobject" => false,
            ],
            "parentLineId" => [
                "type" => "string",
                "caption" => "The identification of the parent position",
                "isarray" => false,
                "isobject" => false,
            ],
            "lineStatus" => [
                "type" => "string",
                "caption" => "The indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included",
                "isarray" => false,
                "isobject" => false,
            ],
            "lineStatusReason" => [
                "type" => "string",
                "caption" => "The type to specify whether the invoice line is",
                "isarray" => false,
                "isobject" => false,
            ],
            "note" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO",
                "caption" => "The notes for this position",
                "isarray" => true,
                "isobject" => true,
            ],
            "product" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO",
                "caption" => "The product for this position",
                "isarray" => false,
                "isobject" => true,
            ],
            "sellerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The associated seller's order confirmation (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "buyerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The associated buyer's order (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "quotationReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The associated quotation (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "contractReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The associated contract (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "additionalReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO",
                "caption" => "The additional associated document (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "ultimateCustomerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The ultimate customer order reference (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "despatchAdviceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The despatch advice reference (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "receivingAdviceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The receiving advice reference (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "deliveryNoteReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO",
                "caption" => "The delivery note reference (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "invoiceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO",
                "caption" => "The additional invoice document (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "additionalObjectReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO",
                "caption" => "The additional object references (line reference)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "grossPrice" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO",
                "caption" => "The gross price",
                "isarray" => false,
                "isobject" => true,
            ],
            "netPrice" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO",
                "caption" => "The net price",
                "isarray" => false,
                "isobject" => true,
            ],
            "quantityBilled" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The billed quantity",
                "isarray" => false,
                "isobject" => true,
            ],
            "quantityChargeFree" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The charge-free quantity",
                "isarray" => false,
                "isobject" => true,
            ],
            "quantityPackage" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The package quantity",
                "isarray" => false,
                "isobject" => true,
            ],
            "quantityPerPackage" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The per-package quantity",
                "isarray" => false,
                "isobject" => true,
            ],
            "shipToParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Ship-To Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "ultimateShipToParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Ultimate Ship-To Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "supplyChainEvent" => [
                "type" => "DateTimeInterface",
                "caption" => "The date of the delivery",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
                "isnullable" => true,
            ],
            "billingPeriod" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO",
                "caption" => "The start and/or end date of the billing period",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "postingReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The posting reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "tax" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO",
                "caption" => "The VAT breakdown",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
                "autopluralappendix" => "es",
            ],
            'allowanceCharge' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO",
                "caption" => "The allowances/charges",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            'summation' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO",
                "caption" => "The summation",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteDocumentHeaderDTO",
        "properties" => [
            "number" => [
                "type" => "string",
                "caption" => "The document number issued by the seller",
                "isarray" => false,
                "isobject" => false,
            ],
            "type" => [
                "type" => "string",
                "caption" => "The type of the document expressed as a code",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The document type as free text",
                "isarray" => false,
                "isobject" => false,
            ],
            "language" => [
                "type" => "string",
                "caption" => "The language code in which the document was written",
                "isarray" => false,
                "isobject" => false,
            ],
            "date" => [
                "type" => "DateTimeInterface",
                "caption" => "Date of the document. The date when the document was issued by the seller",
                "isarray" => false,
                "isobject" => true,
            ],
            "completeDate" => [
                "type" => "DateTimeInterface",
                "caption" => "The contractual due date of the document",
                "isarray" => false,
                "isobject" => true,
            ],
            "supplyChainEvent" => [
                "type" => "DateTimeInterface",
                "caption" => "The date of the delivery",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
                "isnullable" => true,
            ],
            "currency" => [
                "type" => "string",
                "caption" => "The code for the invoice currency",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxCurrency" => [
                "type" => "string",
                "caption" => "The code for the tax currency",
                "isarray" => false,
                "isobject" => false,
            ],
            "isCopy" => [
                "type" => "bool",
                "caption" => "The flag that indicated that this document is a copy",
                "isarray" => false,
                "isobject" => false,
            ],
            "isTest" => [
                "type" => "bool",
                "caption" => "The flag that indicated that this document is a test",
                "isarray" => false,
                "isobject" => false,
            ],
            "note" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO",
                "caption" => "The notes for this document",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "billingPeriod" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO",
                "caption" => "The start and/or end date of the billing period",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "postingReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The posting reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "sellerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The associated seller's order confirmation",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "buyerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The associated buyer's order",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "quotationReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The associated quotation",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "contractReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The associated contract",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "additionalReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO",
                "caption" => "The additional associated document",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "invoiceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO",
                "caption" => "The additional invoice document",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "projectReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO",
                "caption" => "The project reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "ultimateCustomerOrderReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The ultimate customer order reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "despatchAdviceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The despatch advice reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "receivingAdviceReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The receiving advice reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "deliveryNoteReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO",
                "caption" => "The delivery note reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "sellerParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Seller/Supplier Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "buyerParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Buyer/Customer Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "taxRepresentativeParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Tax Representativ Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "productEndUserParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Product Enduser Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "shipToParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Ship-To Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "ultimateShipToParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Ultimate Ship-To Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "shipFromParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Ship-From Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "invoicerParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Invoicer Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "invoiceeParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Invoicee Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "payeeParty" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO",
                "caption" => "The Payee Party",
                "isarray" => false,
                "isobject" => true,
            ],
            "paymentMean" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO",
                "caption" => "The payment means",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "paymentTerm" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO",
                "caption" => "The payment terms",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "creditorReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The creditor identifier",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "paymentReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The payment reference",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "buyerReference" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The ID for internal routing (Leitweg ID)",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "position" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO",
                "caption" => "The Document positions",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "deliveryTerm" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "delivery term",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "tax" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO",
                "caption" => "The VAT breakdown",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
                "autopluralappendix" => "es",
            ],
            'allowanceCharge' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO",
                "caption" => "The allowances/charges",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            'serviceCharge' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO",
                "caption" => "The allowances/charges",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            'summation' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO",
                "caption" => "The summation",
                "isarray" => true,
                "isobject" => false,
                "autoplural" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePaymentTermDTO",
        "properties" => [
            "description" => [
                "type" => "string",
                "caption" => "The text description of the payment terms",
                "isarray" => false,
                "isobject" => false,
            ],
            "dueDate" => [
                "type" => "DateTimeInterface",
                "caption" => "The date by which payment is due",
                "isarray" => false,
                "isobject" => true,
            ],
            "discountTerm" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO",
                "caption" => "The payment discounts",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "penaltyTerm" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO",
                "caption" => "The payment penalties",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "mandate" => [
                "type" => "string",
                "caption" => "The mandate reference",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePaymentTermDiscountDTO",
        "properties" => [
            "baseAmount" => [
                "type" => "float",
                "caption" => "The base amount of the payment discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "discountAmount" => [
                "type" => "float",
                "caption" => "The amount of the payment discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "discountPercent" => [
                "type" => "float",
                "caption" => "The percentage of the payment discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "baseDate" => [
                "type" => "DateTimeInterface",
                "caption" => "The due date reference date",
                "isarray" => false,
                "isobject" => true,
            ],
            "period" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO",
                "caption" => "The maturity period (basis)",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePaymentTermPenaltyDTO",
        "properties" => [
            "baseAmount" => [
                "type" => "float",
                "caption" => "The base amount of the payment penalty",
                "isarray" => false,
                "isobject" => false,
            ],
            "penaltyAmount" => [
                "type" => "float",
                "caption" => "The amount of the payment penalty",
                "isarray" => false,
                "isobject" => false,
            ],
            "penaltyPercent" => [
                "type" => "float",
                "caption" => "The percentage of the payment penalty",
                "isarray" => false,
                "isobject" => false,
            ],
            "baseDate" => [
                "type" => "DateTimeInterface",
                "caption" => "The due date reference date",
                "isarray" => false,
                "isobject" => true,
            ],
            "period" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO",
                "caption" => "The maturity period (basis)",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteTaxDTO",
        "properties" => [
            "category" => [
                "type" => "string",
                "caption" => "The coded description of the tax category",
                "isarray" => false,
                "isobject" => false,
            ],
            "type" => [
                "type" => "string",
                "caption" => "The coded description of the tax type",
                "isarray" => false,
                "isobject" => false,
            ],
            "basisAmount" => [
                "type" => "float",
                "caption" => "The tax base amount",
                "isarray" => false,
                "isobject" => false,
            ],
            "amount" => [
                "type" => "float",
                "caption" => "The tax total amount",
                "isarray" => false,
                "isobject" => false,
            ],
            "percent" => [
                "type" => "float",
                "caption" => "The tax Rate (Percentage)",
                "isarray" => false,
                "isobject" => false,
            ],
            "exemptionReason" => [
                "type" => "string",
                "caption" => "The reason for tax exemption (free text)",
                "isarray" => false,
                "isobject" => false,
            ],
            "exemptionReasonCode" => [
                "type" => "string",
                "caption" => "The reason for tax exemption (Code)",
                "isarray" => false,
                "isobject" => false,
            ],
            "dueDate" => [
                "type" => "DateTimeInterface",
                "caption" => "The date on which tax is due",
                "isarray" => false,
                "isobject" => true,
            ],
            "dueCode" => [
                "type" => "string",
                "caption" => "The code for the date on which tax is due",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteAllowanceChargeDTO",
        "properties" => [
            "chargeIndicator" => [
                "type" => "bool",
                "caption" => "The switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge",
                "isarray" => false,
                "isobject" => false,
            ],
            "amount" => [
                "type" => "float",
                "caption" => "The amount of the surcharge or discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "baseAmount" => [
                "type" => "float",
                "caption" => "The base amount that may be used in conjunction with the percentage of the surcharge or discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "percent" => [
                "type" => "float",
                "caption" => "The Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxCategory" => [
                "type" => "string",
                "caption" => "The coded description of the tax category",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxType" => [
                "type" => "string",
                "caption" => "The coded description of the tax type",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxPercent" => [
                "type" => "float",
                "caption" => "The tax Rate (Percentage)",
                "isarray" => false,
                "isobject" => false,
            ],
            "reason" => [
                "type" => "string",
                "caption" => "The reason given in text form for the surcharge or discount",
                "isarray" => false,
                "isobject" => false,
            ],
            "reasonCode" => [
                "type" => "string",
                "caption" => "The Reason given as a code for the surcharge or discount",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteServiceChargeDTO",
        "properties" => [
            "amount" => [
                "type" => "float",
                "caption" => "The amount of the service fee",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The identification of the service fee",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxCategory" => [
                "type" => "string",
                "caption" => "The coded description of the tax category",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxType" => [
                "type" => "string",
                "caption" => "The coded description of the tax type",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxPercent" => [
                "type" => "float",
                "caption" => "The tax Rate (Percentage)",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteSummationDTO",
        "properties" => [
            "netAmount" => [
                "type" => "float",
                "caption" => "The sum of the net amounts of all invoice lines",
                "isarray" => false,
                "isobject" => false,
            ],
            "chargeTotalAmount" => [
                "type" => "float",
                "caption" => "The sum of the charges",
                "isarray" => false,
                "isobject" => false,
            ],
            "discountTotalAmount" => [
                "type" => "float",
                "caption" => "The sum of the discounts",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxBasisAmount" => [
                "type" => "float",
                "caption" => "The total invoice amount excluding sales tax",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxTotalAmount" => [
                "type" => "float",
                "caption" => "The total amount of the invoice sales tax (in the invoice currency)",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxTotalAmount2" => [
                "type" => "float",
                "caption" => "The total amount of the invoice sales tax (in the tax currency)",
                "isarray" => false,
                "isobject" => false,
            ],
            "grossAmount" => [
                "type" => "float",
                "caption" => "The total invoice amount including sales tax",
                "isarray" => false,
                "isobject" => false,
            ],
            "dueAmount" => [
                "type" => "float",
                "caption" => "The payment amount due",
                "isarray" => false,
                "isobject" => false,
            ],
            "prepaidAmount" => [
                "type" => "float",
                "caption" => "The prepayment amount",
                "isarray" => false,
                "isobject" => false,
            ],
            "roungingAmount" => [
                "type" => "float",
                "caption" => "The rounding amount",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitesummationLineDTO",
        "properties" => [
            "netAmount" => [
                "type" => "float",
                "caption" => "The sum of the net amounts of all invoice lines",
                "isarray" => false,
                "isobject" => false,
            ],
            "chargeTotalAmount" => [
                "type" => "float",
                "caption" => "The sum of the charges",
                "isarray" => false,
                "isobject" => false,
            ],
            "discountTotalAmount" => [
                "type" => "float",
                "caption" => "The sum of the discounts",
                "isarray" => false,
                "isobject" => false,
            ],
            "taxTotalAmount" => [
                "type" => "float",
                "caption" => "The total amount of the invoice sales tax (in the invoice currency)",
                "isarray" => false,
                "isobject" => false,
            ],
            "grossAmount" => [
                "type" => "float",
                "caption" => "The total invoice amount including sales tax",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteProductDTO",
        "properties" => [
            "id" => [
                "type" => "string",
                "caption" => "The ID of the product (product id, Order-X interoperable)",
                "isarray" => false,
                "isobject" => false,
            ],
            "name" => [
                "type" => "string",
                "caption" => "The name of the product (product name)",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The product description of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "sellerId" => [
                "type" => "string",
                "caption" => "The identifier assigned to the product by the seller",
                "isarray" => false,
                "isobject" => false,
            ],
            "buyerId" => [
                "type" => "string",
                "caption" => "The identifier assigned to the product by the buyer",
                "isarray" => false,
                "isobject" => false,
            ],
            "globalId" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The product global id",
                "isarray" => false,
                "isobject" => true,
            ],
            "industryId" => [
                "type" => "string",
                "caption" => "The id assigned by the industry",
                "isarray" => false,
                "isobject" => false,
            ],
            "modelId" => [
                "type" => "string",
                "caption" => "The unique model identifier of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "batchId" => [
                "type" => "string",
                "caption" => "The batch (lot) identifier of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "brandName" => [
                "type" => "string",
                "caption" => "The brand name of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "modelName" => [
                "type" => "string",
                "caption" => "The model name of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "originTradeCountry" => [
                "type" => "string",
                "caption" => "The code indicating the country the goods came from",
                "isarray" => false,
                "isobject" => false,
            ],
            "characteristic" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO",
                "caption" => "The product characteristics",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "classification" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO",
                "caption" => "The product classification",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
            "referenceProduct" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO",
                "caption" => "The reference product",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteProductCharacteristicDTO",
        "properties" => [
            "description" => [
                "type" => "string",
                "caption" => "The name of the attribute or characteristic (\"Colour\")",
                "isarray" => false,
                "isobject" => false,
            ],
            "value" => [
                "type" => "string",
                "caption" => "The value of the attribute or characteristic (\"Red\")",
                "isarray" => false,
                "isobject" => false,
            ],
            "type" => [
                "type" => "string",
                "caption" => "The type (Code) of product characteristic",
                "isarray" => false,
                "isobject" => false,
            ],
            'valueMeasure' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO",
                "caption" => "The value of the product property (numerical measured variable)",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteProductClassificationDTO",
        "properties" => [
            "code" => [
                "type" => "string",
                "caption" => "The classification identifier",
                "isarray" => false,
                "isobject" => false,
            ],
            "name" => [
                "type" => "string",
                "caption" => "The name with which an article can be classified according to type or quality",
                "isarray" => false,
                "isobject" => false,
            ],
            "listId" => [
                "type" => "string",
                "caption" => "The identifier for the identification scheme of the item classification",
                "isarray" => false,
                "isobject" => false,
            ],
            "listVersionId" => [
                "type" => "string",
                "caption" => "The version of the identification scheme",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteReferenceProductDTO",
        "properties" => [
            "id" => [
                "type" => "string",
                "caption" => "The ID of the product (product id, Order-X interoperable)",
                "isarray" => false,
                "isobject" => false,
            ],
            "name" => [
                "type" => "string",
                "caption" => "The name of the product (product name)",
                "isarray" => false,
                "isobject" => false,
            ],
            "description" => [
                "type" => "string",
                "caption" => "The product description of the product",
                "isarray" => false,
                "isobject" => false,
            ],
            "sellerId" => [
                "type" => "string",
                "caption" => "The identifier assigned to the product by the seller",
                "isarray" => false,
                "isobject" => false,
            ],
            "buyerId" => [
                "type" => "string",
                "caption" => "The identifier assigned to the product by the buyer",
                "isarray" => false,
                "isobject" => false,
            ],
            "globalId" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
                "caption" => "The product global id",
                "isarray" => false,
                "isobject" => true,
            ],
            "industryId" => [
                "type" => "string",
                "caption" => "The id assigned by the industry",
                "isarray" => false,
                "isobject" => false,
            ],
            "unitQuantity" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The quantity of the referenced product contained product",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteMeasureDTO",
        "properties" => [
            "value" => [
                "type" => "float",
                "caption" => "The value",
                "isarray" => false,
                "isobject" => false,
            ],
            "unit" => [
                "type" => "string",
                "caption" => "The value's unit",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteQuantityDTO",
        "properties" => [
            "quantity" => [
                "type" => "float",
                "caption" => "The value",
                "isarray" => false,
                "isobject" => false,
            ],
            "quantityUnit" => [
                "type" => "string",
                "caption" => "The value's unit",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePeriodDTO",
        "properties" => [
            "period" => [
                "type" => "float",
                "caption" => "The period value",
                "isarray" => false,
                "isobject" => false,
            ],
            "periodUnit" => [
                "type" => "string",
                "caption" => "The periods's unit",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePriceDTO",
        "properties" => [
            "amount" => [
                "type" => "float",
                "caption" => "The price value",
                "isarray" => false,
                "isobject" => false,
            ],
            "priceQuantity" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO",
                "caption" => "The number of item units for which the price applies",
                "isarray" => false,
                "isobject" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePriceGrossDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceDTO",
        "properties" => [
            'allowanceCharge' => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO",
                "caption" => "The discounts or charges to the gross price",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuitePriceNetDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceDTO",
        "properties" => [
            "tax" => [
                "type" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO",
                "caption" => "The net price included tax",
                "isarray" => true,
                "isobject" => true,
                "autoplural" => true,
                "autopluralappendix" => "es",
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteIdDTO",
        "properties" => [
            "id" => [
                "type" => "string",
                "caption" => "ID",
                "isarray" => false,
                "isobject" => false,
            ],
            "idType" => [
                "type" => "string",
                "caption" => "Type of the ID",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteOrganisationDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
        "properties" => [
            "name" => [
                "type" => "string",
                "caption" => "Organisation Name",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteCommunicationDTO",
        "extends" => "horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO",
        "properties" => [
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteAddressDTO",
        "properties" => [
            "addressLine1" => [
                "type" => "string",
                "caption" => "Address line 1",
                "isarray" => false,
                "isobject" => false,
            ],
            "addressLine2" => [
                "type" => "string",
                "caption" => "Address line 2",
                "isarray" => false,
                "isobject" => false,
            ],
            "addressLine3" => [
                "type" => "string",
                "caption" => "Address line 3",
                "isarray" => false,
                "isobject" => false,
            ],
            "postcode" => [
                "type" => "string",
                "caption" => "Post Code / ZIP Code",
                "isarray" => false,
                "isobject" => false,
            ],
            "city" => [
                "type" => "string",
                "caption" => "City",
                "isarray" => false,
                "isobject" => false,
            ],
            "country" => [
                "type" => "string",
                "caption" => "Country",
                "isarray" => false,
                "isobject" => false,
            ],
            "subDivision" => [
                "type" => "string",
                "caption" => "Subdivision",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
    [
        "todir" => __DIR__ . "/../src/documents/dto",
        "ns" => "horstoeko\invoicesuite\documents\dto",
        "class" => "InvoiceSuiteContactDTO",
        "properties" => [
            "personName" => [
                "type" => "string",
                "caption" => "Contact name",
                "isarray" => false,
                "isobject" => false,
            ],
            "departmentName" => [
                "type" => "string",
                "caption" => "Contact department name",
                "isarray" => false,
                "isobject" => false,
            ],
            "phoneNumber" => [
                "type" => "string",
                "caption" => "Contact phone number",
                "isarray" => false,
                "isobject" => false,
            ],
            "faxNumber" => [
                "type" => "string",
                "caption" => "Contact fax number",
                "isarray" => false,
                "isobject" => false,
            ],
            "emailAddress" => [
                "type" => "string",
                "caption" => "Contact e-mail address",
                "isarray" => false,
                "isobject" => false,
            ],
        ],
    ],
];

gendto($definitions);
