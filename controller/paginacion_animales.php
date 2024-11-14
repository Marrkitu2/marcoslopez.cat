<?php
function obtenerPaginacion($total_animales, $animales_por_pagina) {
    return ceil($total_animales / $animales_por_pagina);
}

function obtenerOffset($pagina_actual, $animales_por_pagina) {
    return ($pagina_actual - 1) * $animales_por_pagina;
}
?>
