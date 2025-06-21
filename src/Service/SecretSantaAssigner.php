<?php
class SecretSantaAssigner {
    /** @var Employee[] */
    private array $employees;
    /** @var array<string, string> */
    private array $previousAssignments;
    /** @var array<int, array{giver: Employee, receiver: Employee}> */
    private array $assignments = [];

    public function __construct(array $employees, array $previousAssignments) {
        $this->employees = $employees;
        $this->previousAssignments = $previousAssignments;
    }

    /** @return array<int, array{giver: Employee, receiver: Employee}> */
    public function assign(): array {
        $maxRetries = 20;  // Number of retry attempts
        $attempt = 0;
    
        do {
            $this->assignments = [];
            $receivers = $this->employees;
            shuffle($receivers);
            $success = true;
    
            foreach ($this->employees as $giver) {
                $assigned = false;
    
                foreach ($receivers as $key => $receiver) {
                    if ($giver->email !== $receiver->email &&
                        (!isset($this->previousAssignments[$giver->email]) || $this->previousAssignments[$giver->email] !== $receiver->email)) {
                        
                        $this->assignments[] = [
                            'giver' => $giver,
                            'receiver' => $receiver
                        ];
                        unset($receivers[$key]);
                        $assigned = true;
                        break;
                    }
                }
    
                if (!$assigned) {
                    $success = false;
                    break;  // break to retry with a new shuffle
                }
            }
    
            $attempt++;
        } while (!$success && $attempt < $maxRetries);
    
        if (!$success) {
            throw new Exception("Assignment failed after {$maxRetries} retries.");
        }
    
        return $this->assignments;
    }
    
}
