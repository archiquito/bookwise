<div class="mt-6 grid grid-cols-2 gap-4 ">
    <div class="flex flex-col space-y-2 border border-stone-700 rounded p-4">
        <h1 class="text-2xl font-bold">Login</h1>
        <form action="/login" method="POST" class="space-y-4">
            <?php
            if ($validations = flash()->get('loginValidation')): ?>

                <div class="bg-red-500 text-red-800 p-2 rounded font-bold">
                    <ul>
                        <?php foreach ($validations as $item): ?>
                            <li>• <?= $item ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <label class="text-stone-400 mb-3">Seu e-email:</label>
            <input type="email" name="email" require placeholder="email" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <label class="text-stone-400 mb-3">Sua senha:</label>
            <input type="password" require name="password" placeholder="senha" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <button type="submit" class="border-stone-800  border-2 rounded-md bg-stone-700 px-2 py-1 cursor-pointer flex items-center justify-center
                ">Login</button>
        </form>
    </div>
    <div class="flex flex-col space-y-2 border border-stone-700 rounded p-4">
        <h1 class="text-2xl font-bold">Cadastrar</h1>
        <form action="/register" method="POST">
            <?php
            if ($registerOk = flash()->get('registerOk')): ?>
                <div class="bg-emerald-500 text-emerald-800 p-2 rounded font-bold">
                    <?= $registerOk ?>
                </div>
            <?php endif ?>
            <?php
            if ($validations = flash()->get('registerValidation')): ?>

                <div class="bg-red-500 text-red-800 p-2 rounded font-bold">
                    <ul>
                        <?php foreach ($validations as $item): ?>
                            <li>• <?= $item ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <label class="text-stone-400 mb-3">Seu nome:</label>
            <input type="text" name="name" require placeholder="nome" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <label class="text-stone-400 mb-3">Seu e-email:</label>
            <input type="text" name="email" require placeholder="email" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <label class="text-stone-400 mb-3">Confirme seu e-email:</label>
            <input type="text" name="confirm_email" require placeholder="email" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <label class="text-stone-400 mb-3">Sua senha:</label>
            <input type="password" name="password" require placeholder="senha" class="w-full border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 mb-3" />
            <button type="submit" class="border-stone-800  border-2 rounded-md bg-stone-700 px-2 py-1 cursor-pointer flex items-center justify-center
                ">Registrar</button>
        </form>
    </div>
</div>
</div>