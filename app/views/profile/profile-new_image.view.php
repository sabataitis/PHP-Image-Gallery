<?php
include dirname(__DIR__, 1) . '/shared/head.php';
include dirname(__DIR__, 1) . '/shared/navigation.php';
?>
    <section class="container mx-auto">
        <div>
            <a href="/profile" class="capitalize text-gray-600">Go back</a>
        </div>
        <form class="flex flex-col" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
              enctype="multipart/form-data">
            <div>
                <label class="text-md label">Category: </label>
                <select name="categories">
                    <?php foreach ($categories as $category) : ?>
                        <?php if ($category->deleted != 1) : ?>
                            <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="py-4">
                <label class="cursor-pointer hover:bg-gray-100 bg-gray-200 text-center py-2 px-4 my-2 mr-2 rounded"
                       for="picture">Select a picture to upload</label>
                <input type="file" name="picture" class="hidden" id="picture">
            </div>
            <div>
                <input
                        type="submit"
                        class="cursor-pointer hover:bg-blue-200 bg-blue-300 text-center py-2 px-4 my-2 mr-2 rounded"
                        value="Add new"
                />
            </div>
        </form>
        <div class="bg-gray-200 w-72">
            <?php if (count($errors) > 0): ?>
                <p class="font-bold">
                    Fix the following issues:
                </p>
                <?php foreach ($errors as $key => $error): ?>
                <p class="text-sm">
                    <?= $error ?>
                </p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php
include dirname(__DIR__, 1) . '/shared/footer.php';
?>