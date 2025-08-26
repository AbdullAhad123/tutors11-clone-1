<?php

namespace App\Repositories;

class ColorsRepository
{
    // These colors use in charts
    private $positive_color = "rgb(9,56,36)"; # this color for show negativity like correct answers
    private $negative_color = "rgb(214,40,40)"; # this color for show positivity like wrong answers
    private $neutral_color = "rgb(150,154,151)"; # this color for show center of negativity and positivity like unanswered
    private $yellow_color = "#FFBE0B"; # this color for show center of negativity and positivity like unanswered
    // private $neutral_color = "#F1D302"; # this color for show center of negativity and positivity like unanswered
    private $negative_color_transparent = "rgba(214,40,40,.8)";
    private $positive_color_transparent = "rgba(9,56,36,.8)";
    private $neutral_color_transparent = "rgba(150,154,151,.8)";
    // private $neutral_color_transparent = "#F1D302";
	/**
	 * @return string
	 */
	public function getNegativeColor() {
		return $this->negative_color;
	}

	/**
	 * @return string
	 */
	public function getPositiveColor() {
		return $this->positive_color;
	}

	/**
	 * @return string
	 */
	public function getNeutralColor() {
		return $this->neutral_color;
	}
	public function getYellowColor() {
		return $this->yellow_color;
	}


	/**
	 * @return array
	 */
	public function transparent() {
		return [
            "negative_color"=>$this->negative_color_transparent,
            "positive_color"=>$this->positive_color_transparent,
            "neutral_color"=>$this->neutral_color_transparent,
        ];
	}
}
?>
