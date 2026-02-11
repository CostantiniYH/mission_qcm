<?php
namespace App\Views\Components;
class Carousel {
  private function Image($array, $text) {

    $html = '';
   
      foreach ($array as $key => $a) {
        if ($key == 0) {
          $html .= '
              <div class="carousel-item active">
                <h2 class="text-carousel">'.$text[$key].'</h2>
                <img src="'.$a.'" class="d-flex w-100" alt="..." class="img-carousel" style="max-height: 200px;"> 
              </div>
          ';
        } else {
          $html .= '
            <div class="carousel-item">
              <h2 class="text-carousel">'.$text[$key].'</h2>
              <img src="'.$a.'" class="d-block w-100" alt="..." class="img-carousel" style="max-height: 200px;">
            </div>   
          ';
        }
      }

      return $html;
  }

  
  public function Read($array, $text) {
    echo '    <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>                    
                <div class="carousel-inner">
                  '.$this->Image($array, $text).'
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>';
  }
}

?>
