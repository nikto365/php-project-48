<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;
use function Differ\Differ\genDiff;

class DifferTest extends TestCase {
    public function testIdenticalJsonFiles()
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file3.json';
        $expected = <<<EOL
  follow: 
  host: hexlet.io
  proxy: 123.234.53.22
  timeout: 50

EOL;

        $diff = genDiff($file1, $file2);

        $this->assertEquals($expected, $diff);
    }

    public function testDifferentKeys()
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file4.json';

        $expected = <<<EOL
  follow: 
- host: hexlet.io
+ name: alice
  proxy: 123.234.53.22
  timeout: 50

EOL;

        $diff = genDiff($file1, $file2);

        $this->assertEquals($expected, $diff);
    }

    public function testDifferentValues()
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file5.json';

        $expected = <<<EOL
  follow: 
  host: hexlet.io
  proxy: 123.234.53.22
- timeout: 50
+ timeout: 10

EOL;

        $diff = genDiff($file1, $file2);

        $this->assertEquals($expected, $diff);
    }
}