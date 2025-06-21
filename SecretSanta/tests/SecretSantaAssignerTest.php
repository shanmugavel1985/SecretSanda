<?php

use PHPUnit\Framework\TestCase;

class SecretSantaAssignerTest extends TestCase {
    public function testSuccessfulAssignment() {
        $employeeRepo = new EmployeeRepository();
        $prevAssignmentRepo = new PreviousAssignmentRepository();

        $employees = $employeeRepo->loadFromCSV(__DIR__ . '/fixtures/EmployeeListFixture.csv');
        $prevAssignments = []; // no previous assignments for simplicity

        $assigner = new SecretSantaAssigner($employees, $prevAssignments);
        $assignments = $assigner->assign();

        $this->assertCount(count($employees), $assignments);
    }
}
