<?php
class StaffTask {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        try {
            // Only get tasks that are not completed
            $stmt = $this->pdo->query("SELECT TaskID, TaskDescription FROM tasks WHERE status = 'not_completed'");
            return ['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function markTaskAsCompleted($taskId) {
        try {
            $stmt = $this->pdo->prepare("UPDATE tasks SET status = 'completed' WHERE TaskID = ?");
            return $stmt->execute([$taskId]);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}
?>