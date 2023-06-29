<?php

    if(isset($_POST['formSubmit']) )
    {
        $varPrice = $_POST['price-select'];
        $varKM = $_POST['km-select'];
        $varYear = $_POST['year-select'];
    }

  // A charger depuis la base de données
  function getCarDeals()
  {
    $carDeals = file_get_contents(__DIR__."/car-deals.json");
    $carDeals = json_decode($carDeals, true);

//    echo "<p>$varPrice.' '.$varKM.' '.$varYear</p>";

    foreach($carDeals as $carDeal) {
        echo "<div class='car-deal show'>";
        echo "<div class='photo'>";
        echo "<a href='#modal-contact' class='deal-contact'>Contact</a>";
        echo "<img src='https://picsum.photos/id/40/1000/800' alt='' width='100%' height='100%'>";
        echo "</div>";
        echo "<div class='twoline'>";
        echo "<p class='model'>".$carDeal['model']."</p>";
        echo "</div>";
        echo "<p class='km'>".$carDeal['kilometers']." km</p>";
        echo "<p class='year'>".$carDeal['year']."</p>";
        echo "<p class='price'>".$carDeal['price']." €</p>";
        echo "</div>";
    }
  }
?>