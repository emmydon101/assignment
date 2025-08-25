<?php

// Node class for BST
class Node {
    public $data;
    public $left;
    public $right;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

// BST class with insert and traversal methods
class BST {
    public $root = null;

    // Insert a node into BST
    public function insert($data) {
        $this->root = $this->insertRec($this->root, $data);
    }

    private function insertRec($node, $data) {
        if ($node === null) {
            return new Node($data);
        }

        if ($data < $node->data) {
            $node->left = $this->insertRec($node->left, $data);
        } else {
            $node->right = $this->insertRec($node->right, $data);
        }

        return $node;
    }

    // Inorder Traversal
    public function inorder($node) {
        if ($node !== null) {
            $this->inorder($node->left);
            echo $node->data . " ";
            $this->inorder($node->right);
        }
    }

    // Preorder Traversal
    public function preorder($node) {
        if ($node !== null) {
            echo $node->data . " ";
            $this->preorder($node->left);
            $this->preorder($node->right);
        }
    }

    // Postorder Traversal
    public function postorder($node) {
        if ($node !== null) {
            $this->postorder($node->left);
            $this->postorder($node->right);
            echo $node->data . " ";
        }
    }

    // Level-order Traversal
    public function levelOrder($root) {
        if ($root === null) return;

        $queue = [];
        array_push($queue, $root);

        while (!empty($queue)) {
            $current = array_shift($queue);
            echo $current->data . " ";

            if ($current->left !== null) {
                array_push($queue, $current->left);
            }

            if ($current->right !== null) {
                array_push($queue, $current->right);
            }
        }
    }
}

// --- MAIN EXECUTION ---

// Create BST and insert values from the given level-order traversal
$values = [40, 30, 50, 25, 35, 45, 60, 15, 28, 55, 70];

$bst = new BST();
foreach ($values as $value) {
    $bst->insert($value);
}

// Output Traversals
echo "In-order Traversal: ";
$bst->inorder($bst->root);
echo "\n";

echo "Pre-order Traversal: ";
$bst->preorder($bst->root);
echo "\n";

echo "Post-order Traversal: ";
$bst->postorder($bst->root);
echo "\n";

echo "Level-order Traversal: ";
$bst->levelOrder($bst->root);
echo "\n";

?>