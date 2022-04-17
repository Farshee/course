<?php
// Truck ক্লাস
 class Truck{

   public $fuelInTank;

	 public function fuel($gallon){
		 $this->fuelInTank += $gallon;
		 return $this;
	 }
	 public function totalRide($miles){
		 $gallons = $miles/60;
     $this->fuelInTank -= ($gallons);
		 return $this;
	 }

 }

$truck = new Truck();

$fuelInTank = $truck->fuel(10)->totalRide(50)->fuelInTank;

echo "Fuel left: ". $fuelInTank. " gallons.";
