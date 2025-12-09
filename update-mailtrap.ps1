# Script para actualizar configuración de Mailtrap en .env
# Ejecutar desde la raíz del proyecto: .\update-mailtrap.ps1

$envFile = ".env"

if (-not (Test-Path $envFile)) {
    Write-Host "❌ Error: No se encontró el archivo .env" -ForegroundColor Red
    exit 1
}

Write-Host "📧 Actualizando configuración de Mailtrap..." -ForegroundColor Cyan

# Leer el contenido del .env
$content = Get-Content $envFile

# Actualizar las líneas de MAIL
$content = $content -replace '^MAIL_MAILER=.*', 'MAIL_MAILER=smtp'
$content = $content -replace '^MAIL_HOST=.*', 'MAIL_HOST=sandbox.smtp.mailtrap.io'
$content = $content -replace '^MAIL_PORT=.*', 'MAIL_PORT=2525'
$content = $content -replace '^MAIL_USERNAME=.*', 'MAIL_USERNAME=c3b25fc7a0ccb1'
$content = $content -replace '^MAIL_PASSWORD=.*', 'MAIL_PASSWORD=c4d46f042159e5'
$content = $content -replace '^MAIL_ENCRYPTION=.*', 'MAIL_ENCRYPTION=null'
$content = $content -replace '^MAIL_FROM_ADDRESS=.*', 'MAIL_FROM_ADDRESS="noreply@webinizadev.com"'
$content = $content -replace '^MAIL_FROM_NAME=.*', 'MAIL_FROM_NAME="WebinizaDev Shop"'

# Guardar el archivo
$content | Set-Content $envFile

Write-Host "✅ Configuración actualizada correctamente" -ForegroundColor Green
Write-Host ""
Write-Host "🔄 Limpiando caché de configuración..." -ForegroundColor Cyan

# Limpiar caché de configuración
php artisan config:clear

Write-Host ""
Write-Host "✅ ¡Listo! Mailtrap está configurado." -ForegroundColor Green
Write-Host ""
Write-Host "🧪 Próximo paso:" -ForegroundColor Yellow
Write-Host "   1. Registrá un nuevo usuario en tu aplicación" -ForegroundColor White
Write-Host "   2. Andá a https://mailtrap.io/inboxes" -ForegroundColor White
Write-Host "   3. Revisá tu inbox 'My Sandbox'" -ForegroundColor White
Write-Host ""
