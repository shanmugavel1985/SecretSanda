<?php
require_once __DIR__ . '/../Entity/Employee.php';

class EmployeeRepository {
    /** @return Employee[] */
    public function loadFromCSV(string $filename): array {
        $employees = [];
        if (!file_exists($filename)) throw new Exception("File not found: $filename");

        if (($handle = fopen($filename, "r")) !== false) {
            fgetcsv($handle); // Skip header
            while (($data = fgetcsv($handle)) !== false) {
                $employees[] = new Employee($data[0], $data[1]);
            }
            fclose($handle);
        }
        return $employees;
    }
}
