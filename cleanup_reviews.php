<?php

/**
 * Script para limpiar reviews de ejemplo de la base de datos
 * Ejecuta este archivo con: php cleanup_reviews.php
 * O copia el código SQL y ejecútalo en tu cliente de base de datos
 */

echo "=== Limpieza de Reviews de Ejemplo ===\n\n";
echo "Ejecuta las siguientes consultas SQL en tu base de datos:\n\n";
echo "-- Ver las reviews actuales\n";
echo "SELECT id, user_id, product_id, rating, comment FROM reviews;\n\n";
echo "-- Eliminar TODAS las reviews (cuidado!)\n";
echo "DELETE FROM reviews;\n\n";
echo "-- O eliminar solo reviews específicas por IDs (recomendado)\n";
echo "DELETE FROM reviews WHERE id IN (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);\n\n";
echo "Después de ejecutar estas consultas, recarga la página del producto.\n";
echo "Deberías ver '0 Reseñas' y el mensaje 'Aún no hay reseñas para este producto'.\n";
