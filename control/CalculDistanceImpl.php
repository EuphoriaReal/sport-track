<?php

require_once 'CalculDistance.php';

class CalculDistanceImpl implements CalculDistance {
    /**
     * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
     * @param float $lat1 Latitude du premier point GPS
     * @param float $long1 Longitude du premier point GPS
     * @param float $lat2 Latitude du second point GPS
     * @param float $long2 Longitude du second point GPS
     * @return float La distance entre les deux points GPS
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2) : float{
        $earthRadius = 6371000; // Rayon de la Terre en mètres
    
        // Conversion des degrés en radians
        $lat1 = deg2rad($lat1);
        $long1 = deg2rad($long1);
        $lat2 = deg2rad($lat2);
        $long2 = deg2rad($long2);
    
        // Calcul des écarts de latitude et de longitude
        $latDelta = $lat2 - $lat1;
        $longDelta = $long2 - $long1;
    
        // Calcul de la distance en utilisant la formule de la distance haversine
        $distance = 2 * $earthRadius * asin(sqrt(
            sin($latDelta / 2) * sin($latDelta / 2) +
            cos($lat1) * cos($lat2) *
            sin($longDelta / 2) * sin($longDelta / 2)
        ));
    
        return $distance;
    }
    

    /**
     * Retourne la distance en mètres du parcours passé en paramètres. Le parcours est
     * défini par un tableau ordonné de points GPS.
     * @param Array $parcours Le tableau contenant les points GPS
     * @return float La distance du parcours
     */
    public function calculDistanceTrajet(Array $parcours) : float{
        $totalDistance = 0.0;
        
        // Parcours les points GPS dans le tableau
        for ($i = 0; $i < count($parcours) - 1; $i++) {
            $lat1 = $parcours[$i][0];
            $long1 = $parcours[$i][1];
            $lat2 = $parcours[$i + 1][0];
            $long2 = $parcours[$i + 1][1];
    
            // Utilise la fonction calculDistance2PointsGPS pour calculer la distance entre les points consécutifs
            $segmentDistance = $this->calculDistance2PointsGPS($lat1, $long1, $lat2, $long2);
    
            // Ajoute la distance du segment au total
            $totalDistance += $segmentDistance;
        }
    
        return $totalDistance;
    }
    
}
?>