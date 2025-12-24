<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalInputFilter
{
    public function handle(Request $request, Closure $next): Response
    {
        $skipKeys = ['_token', '_method'];

        foreach ($request->all() as $key => $value) {

            // skip non-string
            if (!is_string($value)) {
                continue;
            }

            // skip laravel internal field
            if (in_array($key, $skipKeys)) {
                continue;
            }

            // skip pure numeric (id, page, dll)
            if (ctype_digit($value)) {
                continue;
            }

            /* =========================
             | 1️⃣ XSS PROTECTION
             ========================= */
            if (preg_match('/<script|onerror=|onload=|javascript:/i', $value)) {
                abort(403, 'Blocked: XSS detected');
            }

            /* =========================
             | 2️⃣ BASIC SANITIZE
             ========================= */
            $clean = strip_tags($value);
            $clean = htmlspecialchars($clean, ENT_QUOTES, 'UTF-8');

            $request->merge([
                $key => $clean
            ]);

            /* =========================
             | 3️⃣ SSRF PROTECTION
             ========================= */
            if (filter_var($value, FILTER_VALIDATE_URL)) {

                $host = parse_url($value, PHP_URL_HOST);

                if (
                    in_array($host, ['localhost', '127.0.0.1']) ||
                    str_starts_with($value, 'file://') ||
                    str_starts_with($value, 'ftp://') ||
                    preg_match('/^169\.254\./', $host)
                ) {
                    abort(403, 'Blocked: SSRF attempt');
                }
            }

            /* =========================
             | 4️⃣ PAYLOAD SIZE LIMIT
             ========================= */
            if (strlen($value) > 5000) {
                abort(413, 'Payload too large');
            }
        }

        return $next($request);
    }
}
