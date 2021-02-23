<?php


class Beer implements \JsonSerializable {

    private int $id; 
    private string $title;
    private float $rating;

    public function getTitle(): string {
	return $this->title;
    }

    public function getRating(): float {
	return $this->rating;
    }

    public function jsonSerialize()
    {
    	return get_object_vars($this);
    }

}

?>
