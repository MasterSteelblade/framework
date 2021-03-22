<?php 

declare(strict_types=1);

namespace Steelblade\tests;

use Steelblade\Tools\Validator;

final class ValidatorTest extends \PHPUnit\Framework\TestCase {
    public function testColourWhite() {
        $this->assertTrue(Validator::colour('000000'));
    }

    public function testColourMixed() {
        $this->assertTrue(Validator::colour('ff87Fa'));
    }

    public function testColourAmericanWhite() {
        $this->assertTrue(Validator::color('000000'));
    }

    public function testColourAmericanMixed() {
        $this->assertTrue(Validator::color('ff87Fa'));
    }

    public function testColourTypo() {
        $this->assertFalse(Validator::colour('ff87FG'));
    }

    public function testColourHash() {
        $this->assertFalse(Validator::colour('#ff87Fa'));
    }

    public function testEmail() {
        $this->assertTrue(Validator::email('test@gmail.com'));
    }

    public function testPeriodEmail() {
        $this->assertTrue(Validator::email('tes.t@gmail.com'));
    }

    public function testPlusEmail() {
        $this->assertTrue(Validator::email('test+spam@gmail.com'));
    }

    public function testMixedEmail() {
        $this->assertTrue(Validator::email('te.st+spam@gmail.com'));
    }

    public function testBadEmail() {
        $this->assertFalse(Validator::email('test@gmail'));
    }

    public function testBadSymbolEmail() {
        $this->assertFalse(Validator::email('test@spam@gmail@com'));
    }
    
}