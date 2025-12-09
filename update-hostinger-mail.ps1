# Script para configurar email empresarial de Hostinger en .env
# Ejecutar desde la raíz del proyecto: .\update-hostinger-mail.ps1

$envFile = ".env"

if (-not (Test-Path $envFile)) {
    Write-Host "❌ Error: No se encontró el archivo .env" -ForegroundColor Red
    exit 1
}

Write-Host "📧 Configurando email empresarial de Hostinger..." -ForegroundColor Cyan

# Leer el contenido del .env
$content = Get-Content $envFile

# Actualizar las líneas de MAIL con configuración de Hostinger
$content = $content -replace '^MAIL_MAILER=.*', 'MAIL_MAILER=smtp'
$content = $content -replace '^MAIL_HOST=.*', 'MAIL_HOST=smtp.hostinger.com'
$content = $content -replace '^MAIL_PORT=.*', 'MAIL_PORT=465'
$content = $content -replace '^MAIL_USERNAME=.*', 'MAIL_USERNAME=info@webinizadev.com'
$content = $content -replace '^MAIL_PASSWORD=.*', 'MAIL_PASSWORD=Vnh36h7y!'
$content = $content -replace '^MAIL_ENCRYPTION=.*', 'MAIL_ENCRYPTION=ssl'
$content = $content -replace '^MAIL_FROM_ADDRESS=.*', 'MAIL_FROM_ADDRESS="info@webinizadev.com"'
$content = $content -replace '^MAIL_FROM_NAME=.*', 'MAIL_FROM_NAME="WebinizaDev Shop"'

# Guardar el archivo
$content | Set-Content $envFile

Write-Host "✅ Configuración actualizada correctamente" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Configuración aplicada:" -ForegroundColor Cyan
Write-Host "   Host: smtp.hostinger.com" -ForegroundColor White
Write-Host "   Puerto: 465 (SSL)" -ForegroundColor White
Write-Host "   Email: info@webinizadev.com" -ForegroundColor White
Write-Host ""
Write-Host "🔄 Limpiando caché de configuración..." -ForegroundColor Cyan

# Limpiar caché de configuración
php artisan config:clear

Write-Host ""
Write-Host "✅ ¡Listo! Email empresarial configurado." -ForegroundColor Green
Write-Host ""
Write-Host "🧪 Próximo paso:" -ForegroundColor Yellow
Write-Host "   1. Registrá un nuevo usuario en tu aplicación" -ForegroundColor White
Write-Host "   2. El correo llegará a la bandeja real del usuario" -ForegroundColor White
Write-Host "   3. Revisá también tu bandeja de 'Enviados' en info@webinizadev.com" -ForegroundColor White
Write-Host ""
