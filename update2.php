<?php
$policies = [
    'MenuCategoryPolicy' => ['restaurant', 'Restaurant'],
    'MenuItemPolicy' => ['restaurant', 'Restaurant'],
    'TableReservationPolicy' => ['restaurant', 'Restaurant'],
    'ReservationPolicy' => ['reception', 'Reception'],
    'RoomPolicy' => ['reception', 'Reception'],
    'RoomTypePolicy' => ['reception', 'Reception'],
];
foreach($policies as $p => $roles) {
    $path = __DIR__ . '/app/Policies/' . $p . '.php';
    if (!file_exists($path)) {
        continue;
    }
    $c = file_get_contents($path);
    // Previously we replaced "return false;" with "return $user->hasRole('...');"
    // So now we might need to replace "return $user->hasRole('...');" with "return $user->hasAnyRole(['...', '...']);"
    $r1 = $roles[0];
    $r2 = $roles[1];
    $c = str_replace("return \$user->hasRole('$r1');", "return \$user->hasAnyRole(['$r1', '$r2']);", $c);
    file_put_contents($path, $c);
}
