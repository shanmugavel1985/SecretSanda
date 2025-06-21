<?php
class AssignmentExporter {
    /** @param array<int, array{giver: Employee, receiver: Employee}> $assignments */
    public function exportToCSV(array $assignments, string $outputFile): void {
        $file = fopen($outputFile, 'w');
        fputcsv($file, ['Employee_Name', 'Employee_EmailID', 'Secret_Child_Name', 'Secret_Child_EmailID']);

        foreach ($assignments as $pair) {
            $giver = $pair['giver'];
            $receiver = $pair['receiver'];

            fputcsv($file, [
                $giver->name,
                $giver->email,
                $receiver->name,
                $receiver->email
            ]);
        }

        fclose($file);
    }
}
