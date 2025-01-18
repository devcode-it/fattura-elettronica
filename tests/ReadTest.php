<?php

declare(strict_types=1);
use DevCode\FatturaElettronica\FatturaElettronica;
use DevCode\FatturaElettronica\FatturaOrdinaria;
use DevCode\FatturaElettronica\FatturaSemplificata;
use PHPUnit\Framework\TestCase;

/*
* @source https://jevon.org/wiki/Comparing_Two_SimpleXML_Documents
*/
function xml_is_equal(SimpleXMLElement $xml1, SimpleXMLElement $xml2, $text_strict = false)
{
    // compare text content
    if ($text_strict) {
        if ("$xml1" != "$xml2") {
            return "mismatched text content (strict, '{$xml1}' vs '{$xml2}')";
        }
    } else {
        if (trim("$xml1") != trim("$xml2")) {
            return "mismatched text content ('{$xml1}' vs '{$xml2}')";
        }
    }

    // check all attributes
    $search1 = [];
    $search2 = [];
    foreach ($xml1->attributes() as $a => $b) {
        $search1[$a] = "$b";		// force string conversion
    }
    foreach ($xml2->attributes() as $a => $b) {
        $search2[$a] = "$b";
    }
    if ($search1 != $search2) {
        return 'mismatched attributes';
    }

    // check all namespaces
    $ns1 = [];
    $ns2 = [];
    foreach ($xml1->getNamespaces() as $a => $b) {
        $ns1[$a] = "$b";
    }
    foreach ($xml2->getNamespaces() as $a => $b) {
        $ns2[$a] = "$b";
    }
    // Disable namespace check
    // if ($ns1 != $ns2) return "mismatched namespaces";

    // get all namespace attributes
    foreach ($ns1 as $ns) {			// don't need to cycle over ns2, since its identical to ns1
        $search1 = [];
        $search2 = [];
        foreach ($xml1->attributes($ns) as $a => $b) {
            $search1[$a] = "$b";
        }
        foreach ($xml2->attributes($ns) as $a => $b) {
            $search2[$a] = "$b";
        }
        if ($search1 != $search2) {
            return "mismatched ns:$ns attributes";
        }
    }

    // get all children
    $search1 = [];
    $search2 = [];
    foreach ($xml1->children() as $b) {
        if (!isset($search1[$b->getName()])) {
            $search1[$b->getName()] = [];
        }
        $search1[$b->getName()][] = $b;
    }
    foreach ($xml2->children() as $b) {
        if (!isset($search2[$b->getName()])) {
            $search2[$b->getName()] = [];
        }
        $search2[$b->getName()][] = $b;
    }
    // cycle over children
    $diff = json_encode(array_merge(
        array_diff(array_keys($search1), array_keys($search2)),
        array_diff(array_keys($search2), array_keys($search1))
    ));
    if ($diff != '[]') {
        return "mismatched children count ($diff)";
    }		// xml2 has less or more children names (we don't have to search through xml2's children too)
    foreach ($search1 as $child_name => $children) {
        if (!isset($search2[$child_name])) {
            return "xml2 does not have child $child_name";
        }		// xml2 has none of this child
        if (count($search1[$child_name]) != count($search2[$child_name])) {
            return "mismatched $child_name children count";
        }		// xml2 has less or more children
        foreach ($children as $child) {
            // do any of search2 children match?
            $found_match = false;
            $reasons = [];
            foreach ($search2[$child_name] as $id => $second_child) {
                if (($r = xml_is_equal($child, $second_child)) === true) {
                    // found a match: delete second
                    $found_match = true;
                    unset($search2[$child_name][$id]);
                } else {
                    $reasons[] = $r;
                }
            }
            if (!$found_match) {
                return "xml2 does not have specific $child_name child: ".implode('; ', $reasons);
            }
        }
    }

    // finally, cycle over namespaced children
    foreach ($ns1 as $ns) {			// don't need to cycle over ns2, since its identical to ns1
        // get all children
        $search1 = [];
        $search2 = [];
        foreach ($xml1->children() as $b) {
            if (!isset($search1[$b->getName()])) {
                $search1[$b->getName()] = [];
            }
            $search1[$b->getName()][] = $b;
        }
        foreach ($xml2->children() as $b) {
            if (!isset($search2[$b->getName()])) {
                $search2[$b->getName()] = [];
            }
            $search2[$b->getName()][] = $b;
        }
        // cycle over children
        if (count($search1) != count($search2)) {
            return "mismatched ns:$ns children count";
        }		// xml2 has less or more children names (we don't have to search through xml2's children too)
        foreach ($search1 as $child_name => $children) {
            if (!isset($search2[$child_name])) {
                return "xml2 does not have ns:$ns child $child_name";
            }		// xml2 has none of this child
            if (count($search1[$child_name]) != count($search2[$child_name])) {
                return "mismatched ns:$ns $child_name children count";
            }		// xml2 has less or more children
            foreach ($children as $child) {
                // do any of search2 children match?
                $found_match = false;
                foreach ($search2[$child_name] as $id => $second_child) {
                    if (xml_is_equal($child, $second_child) === true) {
                        // found a match: delete second
                        $found_match = true;
                        unset($search2[$child_name][$id]);
                    }
                }
                if (!$found_match) {
                    return "xml2 does not have specific ns:$ns $child_name child";
                }
            }
        }
    }

    // if we've got through all of THIS, then we can say that xml1 has the same attributes and children as xml2.
    return true;
}

final class ReadTest extends TestCase
{
    public function testFatturaOrdinariaPA(): void
    {
        $prefix = __DIR__.'/../specification/esempi/';
        $files = [
            'IT01234567890_FPA01.xml',
            'IT01234567890_FPA02.xml',
            'IT01234567890_FPA03.xml',
        ];
        foreach ($files as $name) {
            try {
                $fattura = FatturaElettronica::parse($prefix.$name);
            } catch (Exception $e) {
                throw new Exception("Error in reading {$name}", $e->getCode(), $e);
            }

            $this->assertInstanceOf(FatturaOrdinaria::class, $fattura);
            // file_put_contents(__DIR__.'/risorse/'.$name, $fattura->__toString());

            $this->matchXML(
                file_get_contents($prefix.$name),
                $fattura->__toString(),
                $name
            );

            $this->assertTrue($fattura->validator()->isValid());
        }
    }

    public function testFatturaOrdinaria(): void
    {
        $prefix = __DIR__.'/../specification/esempi/';
        $files = [
            'IT01234567890_FPR01.xml',
            'IT01234567890_FPR02.xml',
            'IT01234567890_FPR03.xml',
            'ST Fatturazione elettronica - ITHVQWPH73P42H501Y_00023_ITHVQWPH73P42H501Y_00023.xml',
            'ST Fatturazione elettronica - ITHVQWPH73P42H501Y_X0024_ITHVQWPH73P42H501Y_X0024.xml',
        ];
        foreach ($files as $name) {
            try {
                $fattura = FatturaElettronica::parse($prefix.$name);
            } catch (Exception $e) {
                throw new Exception("Error in reading {$name}", $e->getCode(), $e);
            }

            $this->assertInstanceOf(FatturaOrdinaria::class, $fattura);
            // file_put_contents(__DIR__.'/risorse/'.$name, $fattura->__toString());

            $this->matchXML(
                file_get_contents($prefix.$name),
                $fattura->__toString(),
                $name
            );

            $this->assertTrue($fattura->validator()->isValid());
        }
    }

    public function testFatturaSemplificata(): void
    {
        $name = 'fattura_semplificata.xml';
        $prefix = __DIR__.'/../specification/esempi/';
        try {
            $fattura = FatturaElettronica::parse($prefix.$name);
        } catch (Exception $e) {
            throw new Exception("Error in reading {$name}", $e->getCode(), $e);
        }

        $this->assertInstanceOf(FatturaSemplificata::class, $fattura);
        // file_put_contents(__DIR__.'/risorse/'.$name, $fattura->__toString());

        $this->matchXML(
            file_get_contents($prefix.$name),
            $fattura->__toString(),
            $name
        );

        // $this->assertTrue($fattura->validator()->isValid());
        $this->assertSame($fattura->validator()->getErrors(), []);
    }

    protected function matchXML($xml1, $xml2, $name)
    {
        $xml1 = new SimpleXMLElement($xml1);
        $xml2 = new SimpleXMLElement($xml2);
        $result = xml_is_equal($xml1, $xml2);

        $this->assertTrue($result, strval($result).' for '.$name);
    }
}
