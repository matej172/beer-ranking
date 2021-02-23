<?php


class Beer {

    private int $id; 
    private string $title;
    private float $rating;

    public function getTitle(): string {
	return $this->title;
    }

    public function getRating(): float {
	return $this->rating;
    }

}

?>
