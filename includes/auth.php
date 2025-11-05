<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

/**
 * Create a new user account.
 */
function register_user(string $name, string $email, string $password): bool
{
    $pdo = db();

    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        return false;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, ?)');

    return $stmt->execute([$name, $email, $hash, 'customer']);
}

/**
 * Attempt to authenticate a user.
 */
function login_user(string $email, string $password): bool
{
    $pdo = db();
    $stmt = $pdo->prepare('SELECT id, name, password_hash, role FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        return false;
    }

    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'role' => $user['role'],
        'email' => $email,
    ];

    return true;
}

/**
 * Destroy session state for the active user.
 */
function logout_user(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
}

/**
 * Return the current user array or null.
 */
function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

/**
 * Ensure a user is logged in and optionally enforce role.
 */
function require_auth(?string $role = null): void
{
    $user = current_user();
    if (!$user) {
        redirect('/login.php');
    }

    if ($role !== null && $user['role'] !== $role) {
        redirect('/');
    }
}

/**
 * Convenience helper to check admin.
 */
function is_admin(): bool
{
    $user = current_user();
    return $user && $user['role'] === 'admin';
}
