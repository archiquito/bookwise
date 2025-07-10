<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../../assets/images/book-open-text.png">
    <title>Book Wise</title>
</head>

<body class="bg-stone-950 text-stone-200">
    <?php include 'components/header.php'; ?>
    <main class="mx-auto max-w-screen-lg space-y-4">
        <div>
            <?php
            if ($validations = flash()->get('msg')): ?>

                <div class="bg-yellow-500 text-red-800 p-2 rounded font-bold">
                    <ul>
                        <?php foreach ($validations as $item): ?>
                            <li>• <?= $item ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
        </div>
        <?php require "views/{$view}.view.php" ?>
    </main>
</body>

</html>