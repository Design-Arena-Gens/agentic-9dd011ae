<?php
/**
 * Sanitize string output for HTML.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to a given path and terminate.
 */
function redirect(string $path): void
{
    header("Location: {$path}");
    exit;
}

/**
 * Require POST method for a route; otherwise redirect to fallback.
 */
function require_post(string $fallback = '/'): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        redirect($fallback);
    }
}

/**
 * Generate a CSRF token and stash it in the session for reuse.
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Validate supplied token matches the session token.
 */
function verify_csrf(string $token): bool
{
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}
