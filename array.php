<?php 
$num = [1,3,4,5,3];
$fruit = array('mango', 'pear', 'banana');
echo $num[2];
echo $fruit[0];
var_dump($num[3]);
var_dump($fruit[2]);

    // Associative array
    $cars = [
        'benz' => 'G300',
        'toyota' => 'camry',
        'nissan' => 'eletra',
        'BMW' => 'G7',
    ];
    
    echo $cars['BMW'];
    var_dump($cars['toyota']);

    $people = [
        [ 
           'first_name' => 'Godwin',
           'first_name' => 'Godwin',
        ],
        
        [ 
           'first_name' => 'Godwin',
           'first_name' => 'Godwin',
        ],

        [ 
           'first_name' => 'Godwin',
           'first_name' => 'Godwin',
        ]
        
    ];

    echo count($people);

    $d = date('l F j ');
    echo "$d";
?>