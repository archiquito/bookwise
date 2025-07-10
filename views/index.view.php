<h1 class="text-2xl font-bold mt-6">Explorar</h1>
<form class="w-full flex space-x-2">
    <input type="text" name="search" placeholder="pesquisar..." class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" />
    <button type="submit" class="border-stone-800  border-2 rounded-md bg-stone-700 px-2 py-1 cursor-pointer flex items-center justify-center
            ">Pesquisar</button>
</form>
<section class="space-4 grid lg:grid-cols-3 gap-4 md:grid-cols-2">
    <?php foreach ($books as $book): ?>
        <?php include 'components/card-book.php'; ?>
    <?php endforeach ?>
</section>