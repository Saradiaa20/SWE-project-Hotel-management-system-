<?php
session_start();
require_once('../config/config.php');
require_once('../models/StaffTaskModel.php');

class StaffTaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new StaffTask($pdo);
    }

    public function updateTaskStatus() {
        try {
            if (!isset($_POST['selected_tasks']) || empty($_POST['selected_tasks'])) {
                $_SESSION['error'] = 'Please select at least one task.';
                return false;
            }

            $allSuccess = true;
            foreach ($_POST['selected_tasks'] as $taskId) {
                if (!$this->taskModel->markTaskAsCompleted($taskId)) {
                    $allSuccess = false;
                    break;
                }
            }

            if ($allSuccess) {
                $_SESSION['success'] = 'Thank you for your effort! Tasks have been marked as completed.';
                return true;
            } else {
                $_SESSION['error'] = 'Some tasks could not be updated. Please try again.';
                return false;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'An error occurred. Please try again.';
            return false;
        }
    }
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new StaffTaskController($pdo);
    $controller->updateTaskStatus();
    header('Location: ../views/StaffTask.php');
    exit();
}
?>