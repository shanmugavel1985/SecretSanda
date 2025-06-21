<?php
class PreviousAssignmentRepository {
    /** @return array<string, string> email => secret_child_email */
    public function loadFromCSV(string $filename): array {
        $assignments = [];
        if (!file_exists($filename)) return $assignments;

        if (($handle = fopen($filename, "r")) !== false) {
            fgetcsv($handle); // Skip header
            while (($data = fgetcsv($handle)) !== false) {
                $assignments[$data[1]] = $data[3]; // Employee_EmailID => Secret_Child_EmailID
            }
            fclose($handle);
        }
        return $assignments;
    }
}
