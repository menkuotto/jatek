<?php

    $kepnevek=array('s_1','s_2','s_3','s_4','s_5','s_6','s_7','s_8','s_9','s_10','s_11','s_1','s_2','s_3','s_4','s_5','s_6','s_7','s_8','s_9','s_10','s_11','j_1','j_2','j_3','j_4','j_5','j_6','j_7','j_8','j_9','j_10','j_11','f_1','f_2','f_3','f_4','f_5','f_6','f_7','f_8','f_9','f_10','f_11');
    $nevtomb = array(
        '1' => 'Dr. Kis Tibor',
        '2' => 'Ménkűné Válik Zsuzsanna',
        '3' => 'Nagy István',
        '4' => 'Dr. Fodor Ezsébet',
        '5' => 'Harnyos Ferenc',
        '6' => 'Sápi István',
        '7' => 'Ménkű Ottó',
        '8' => 'Csík István',
        '9' => 'Ráczné Kerepes Beatrix',
        '10' => 'Pélyi András',
        '11' => 'Dr. Gedei József'
    );
    $kepszam = count($kepnevek) - 1;
 
    for ($i = 1; $i < 4; $i ++) {
        $x = mt_rand(0, $kepszam);
        $kepnev = $kepnevek[$x];
        $kepnev_szam = substr($kepnev, 2);
        
        $elsobetu = $kepnev{0};
        if ($elsobetu == 's') {
            
            $nev = $nevtomb[$kepnev_szam];
            if ($kepnev_szam > '10') {
                $kepnev_szam = 'Polgármester jelölt';
            }
        } else 
            if ($elsobetu == 'f') {
                $nev = 'FIDESZ ';
                $kepnev = 'fidesz';
            } else 
                if ($elsobetu == 'j') {
                    $nev = 'Jobbik ';
                    $kepnev = 'jobbik';
                }
        $kepnev_tomb[$i] = $kepnev;
        $nev_tomb[$i] = $nev;
        $vk_tomb[$i] = $kepnev_szam;
        $csoport_tomb[$i] = $elsobetu;
    }
    $uzenet = "Maradt minden a régiben! :(";
    
    $counts = array_count_values($csoport_tomb);
    $counts['Ben'];
    $pont = '0';
    switch ($counts['s']) {
        case 1:
            $sorszam = array_search('s', $csoport_tomb);
            $jelolt = $nev_tomb[$sorszam];
            if ($jelolt == 'Dr. Gedei József') {
                $pont = 500;
                $uzenet = 'Csapás a mogorva nagyúrra!';
            } else {
                $pont = 200;
                $uzenet = '1 szövetséges  győzelem: Hajrá ' . $jelolt . '!';
            }
            
            break;
        case 2:
            $pont = 500;
            $uzenet = '2 szövetséges  győzelem: Alakul a dolog!';
            break;
        case 3:
            $pont = 1000;
            $uzenet = '3 szövetséges  győzelem: Jó hír a demokráciának';
            if ($vk_tomb[1] == $vk_tomb[2] && $vk_tomb[2] == $vk_tomb[3]) {
                $pont = 2000;
                $uzenet = $vk_tomb[1] . '. választási körzetet a  szövetség megnyerte! Nagy csapás a mogorva nagyúrra!';
            }
            break;
    }
    
    if ($counts['f'] == 3) {
        $uzenet = '3 Fideszes: 300 pont levonás';
        $pont = '-300';
    }
    if ($counts['j'] == 3) {
        $uzenet = '3 jobbikos: 200 pont levonás';
        $pont = '-200';
    }
    
    echo '{"kep1":"img/' . $kepnev_tomb[1] . '.jpg","kep2":"img/' . $kepnev_tomb[2] . '.jpg","kep3":"img/' . $kepnev_tomb[3] . '.jpg","uzenet":"' . $uzenet . '","nev1":"' . $nev_tomb[1] . '","nev2":"' . $nev_tomb[2] . '","nev3":"' . $nev_tomb[3] . '","vk1":"' . $vk_tomb[1] . '","vk2":"' . $vk_tomb[2] . '","vk3":"' . $vk_tomb[3] . '","csoport1":"' . $csoport_tomb[1] . '","csoport2":"' . $csoport_tomb[2] . '","csoport3":"' . $csoport_tomb[3] . '","pont":"' . $pont . '"}';

?>