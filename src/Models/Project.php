<?php
namespace App\Models;

class Project extends BaseEntity {
    private string $title;
    private string $description;

    public function __construct(string $title, string $description) {
        parent::__construct();
        $this->title = $title;
        $this->description = $description;
    }

    // Getters
    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    // Setters
    public function setTitle(string $title): self {
        $this->title = trim($title);
        return $this;
    }

    public function setDescription(string $description): self {
        $this->description = trim($description);
        return $this;
    }

}