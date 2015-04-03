<?php
require "hamming.php";

class HammingComparatorTest extends PHPUnit_Framework_TestCase
{

    protected $hamming;

    public function setUp()
    {
        $this->hamming = new Hamming();
    }

    public function testNoDifferenceBetweenIdenticalStrings()
    {
        $this->assertEquals(0, $this->hamming->distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForTwoDifferentStrings()
    {
        $this->assertEquals(1, $this->hamming->distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrings()
    {
        $this->assertEquals(2, $this->hamming->distance('AG', 'CT'));
    }

    public function testSmallHammingDistance()
    {
        $this->assertEquals(1, $this->hamming->distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrings()
    {
        $this->assertEquals(1, $this->hamming->distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance()
    {
        $this->assertEquals(4, $this->hamming->distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongString()
    {
        $this->assertEquals(9, $this->hamming->distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testExceptionThrownWhenStringsAreDifferentLength()
    {
        $this->setExpectedException('InvalidArgumentException', 'Expecting two strings/numbers of equal length');
        $this->hamming->distance('GGACG', 'AGGACGTGG');
    }

    public function testNoDifferenceBetweenIdenticalNumbers()
    {
        $this->assertEquals(0, $this->hamming->distance('1', '1'));
    }

    public function testCompleteHammingDistanceOfForTwoDifferentNumbers()
    {
        $this->assertEquals(1, $this->hamming->distance('1', '0'));
    }

    public function testCompleteHammingDistanceForSmallNumbers()
    {
        $this->assertEquals(2, $this->hamming->distance('10', '22'));
    }

    public function testSmallHammingDistanceWithNumbers()
    {
        $this->assertEquals(1, $this->hamming->distance('10', '20'));
    }

    public function testSmallHammingDistanceInLongerNumbers()
    {
        $this->assertEquals(1, $this->hamming->distance('101010', '101011'));
    }

    public function testLargeHammingDistanceWithNumbers()
    {
        $this->assertEquals(4, $this->hamming->distance('1111', '0000'));
    }

    public function testHammingDistanceInVeryLongNumber()
    {
        $this->assertEquals(9, $this->hamming->distance('111111111', '000000000'));
    }

    public function testExceptionThrownWhenNumbersAreDifferentLength()
    {
        $this->setExpectedException('InvalidArgumentException', 'Expecting two strings/numbers of equal length');
        $this->hamming->distance('11221122', '0011');
    }
}
