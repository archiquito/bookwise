<?php
$arrRating = [];
$totalStars = 5;
foreach ($reviews as $item) {
    if ($book->id === $item->book_id) {
        array_push($arrRating, $item->rating);
    }
}

$ratingAverage = count($arrRating) > 0 ? array_sum($arrRating) / count($arrRating) : 0;
$fullStars = floor($ratingAverage);
$halfStars = ($ratingAverage - $fullStars >= 0.25 && $ratingAverage - $fullStars < 0.75);
$emptyStars = $totalStars - $fullStars - ($halfStars ? 1 : 0);

?>
<div class="w-full border-1 border-stone-700 p-2 rounded-md">
    <div class="flex space-x-4">
        <div>
            <img src="<?= $book->img ?>" alt="<?= $book->title ?>" />
        </div>
        <div>
            <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
            <p class="text-xs"><?= $book->author ?></p>
            <div class="mt-6 ">
                <div class="text-lg"><?= createStars($fullStars, $halfStars, $emptyStars) ?></div>
                <p class="text-xs">(<?= count($arrRating) ?> avaliações)</p>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <p><?= $book->description ?></p>
    </div>
</div>