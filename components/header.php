<header class="bg-stone-800">
   
    <nav class="mx-auto max-w-screen-lg flex justify-between p-4">
        <div class="font-bold text-xl"><a href="/">Book Wiser</a></div>
        <ul class="flex space-x-5 font-bold">
            <li><a href="/" class=<?php echo (parse_url($_SERVER['REQUEST_URI'])['path'] === "/") ? "text-lime-500" : "hover:underline"?>>Exlporar</a></li>
            <li><a href="/my-book" class=<?php echo (parse_url($_SERVER['REQUEST_URI'])['path'] === "/my-book") ? "text-lime-500" : "hover:underline"?>>Meus Livros</a></li>
        </ul>
        <ul>
            
            <?php if(flash()->getSession('auth')): ?>
                 <li><?="Olá, ".flash()->getSession('auth')['name']?> - <a href="/logout" class="hover:underline">[ logout ]</a></li>
             <?php else : ?>
            <li><a href="/login" class="hover:underline">Login</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>