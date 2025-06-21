<?php

use PHPUnit\Framework\TestCase;

class EmployeeRepositoryTest extends TestCase {
    public function testLoadFromCSV() {
        $repo = new EmployeeRepository();
        $employees = $repo->loadFromCSV(__DIR__ . '/fixtures/EmployeeListFixture.csv');

        $this->assertCount(3, $employees);
        $this->assertEquals('Alice', $employees[0]->name);
        $this->assertEquals('alice@example.com', $employees[0]->email);
    }
}
