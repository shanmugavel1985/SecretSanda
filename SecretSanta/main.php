<?php
require_once 'src/Entity/Employee.php';
require_once 'src/Repository/EmployeeRepository.php';
require_once 'src/Repository/PreviousAssignmentRepository.php';
require_once 'src/Service/SecretSantaAssigner.php';
require_once 'src/Exporter/AssignmentExporter.php';

try {
    $employeeRepo = new EmployeeRepository();
    $prevAssignmentRepo = new PreviousAssignmentRepository();

    $employees = $employeeRepo->loadFromCSV('data/Employee-List.csv');
    $prevAssignments = $prevAssignmentRepo->loadFromCSV('data/Secret-Santa-Game-Result-2023.csv');

    $assigner = new SecretSantaAssigner($employees, $prevAssignments);
    $assignments = $assigner->assign();

    $exporter = new AssignmentExporter();
    $exporter->exportToCSV($assignments, 'output/Secret-Santa-Assignments-2024.csv');

    echo "Secret Santa assignments generated successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
