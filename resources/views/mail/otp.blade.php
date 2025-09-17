<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 28rem;
            /* Tailwind max-w-md = 28rem */
            margin: 2rem auto;
            background: #ffffff;
            border-radius: 0.75rem;
            /* rounded-xl */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* shadow */
            padding: 1.5rem;
            /* p-6 */
            border: 1px solid #e5e7eb;
            /* border-gray-200 */
        }

        h1 {
            font-size: 1.25rem;
            /* text-xl */
            font-weight: bold;
            color: #1f2937;
            /* text-gray-800 */
            margin-bottom: 1rem;
            /* mb-4 */
        }

        p {
            color: #374151;
            /* default text-gray-700 */
            margin-bottom: 0.75rem;
            /* mb-3 */
        }

        .otp-box {
            background: #f3f4f6;
            /* bg-gray-100 */
            text-align: center;
            padding: 0.75rem 1rem;
            /* py-3 px-4 */
            border-radius: 0.5rem;
            /* rounded-lg */
            font-size: 1.5rem;
            /* text-2xl */
            font-family: monospace;
            /* font-mono */
            letter-spacing: 0.25em;
            /* tracking-widest */
            color: #111827;
            /* text-gray-900 */
            margin-bottom: 1rem;
            /* mb-4 */
        }

        .text-muted {
            color: #4b5563;
            /* text-gray-600 */
            margin-bottom: 0.5rem;
            /* mb-2 */
        }

        .text-small {
            color: #6b7280;
            /* text-gray-500 */
            font-size: 0.875rem;
            /* text-sm */
        }
    </style>
</head>

<body>
    <main>
        <h1>Hi {{ $name }},</h1>

        <p>Here’s your one-time password (OTP):</p>
        <div class="otp-box">
            {{ $otp }}
        </div>

        <p class="text-muted">
            Please don’t share this code with anyone. It'll be expired after {{ $minutes }} minutes.
        </p>
        <p class="text-small">
            If you didn’t try to log in, please ignore this message.
        </p>
    </main>
</body>

</html>
