<?php

use PHPUnit\Framework\TestCase;

class PreviousAssignmentRepositoryTest extends TestCase {
    public function testLoadFromCSV() {
        $repo = new PreviousAssignmentRepository();
        $assignments = $repo->loadFromCSV(__DIR__ . '/fixtures/PreviousAssignmentsFixture.csv');

        $this->assertCount(3, $assignments);
        $this->assertEquals('bob@example.com', $assignments['alice@example.com']);
    }
}
