# Email Templates Inventory

This directory contains all email templates organized by domain/context.

## 📧 Available Templates

### Auth (`auth/`)
- **welcome.blade.php**: Welcome email sent to new customers upon registration
- **password-changed.blade.php**: Security notification when password is changed

### Orders (`orders/`)
- **order-created.blade.php**: Confirmation email when an order is created
- **order-paid.blade.php**: Notification when payment is confirmed
- **order-shipped.blade.php**: Notification when order is shipped

### Marketing (`marketing/`)
- **promo-general.blade.php**: General promotional emails

### Users (`users/`)
- **profile-updated.blade.php**: Notification when user profile is updated

## 🎨 Template Structure

All templates use Laravel's Markdown mail components for consistent styling.

## 📝 Naming Convention

- **Mailables**: `{Action}{Context}Mail.php` (e.g., `WelcomeCustomerMail`, `OrderCreatedMail`)
- **Views**: `emails.{domain}.{action}` (e.g., `emails.auth.welcome`, `emails.orders.created`)
