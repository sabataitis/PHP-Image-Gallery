<?php
include 'shared/head.php';
include 'shared/navigation.php';
?>
    <section class="container mx-auto">
        <div class="container flex flex-col sm:justify-start pt-5 flex-col">
            <h2 class="text-sm">Sort by category:</h2>
            <div class="my-2">
                <?php foreach ($categories as $category) : ?>
                    <a href="?cid=<?php echo $category->id ?>"
                       class="<?php if (array_key_exists('cid', $_GET)) echo $_GET['cid'] == $category->id ? 'font-bold ' : '' ?>capitalize text-md py-2 px-4 rounded bg-gray-200"><?= $category->category_name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex">
            <?php foreach ($pictures as $picture): ?>
                <div class="flex flex-col shadow-lg mr-6 mt-6">
                    <a href="/image?id=<?php  echo $picture->id?>">
                        <img class="max-w-xs h-72 max-h-72" src="images/<?php echo $picture->file_name ?>" alt="image">
                    </a>
                    <p class="text-black flex justify-between py-2 mx-4">
                        <span class="text-gray-400">
                           author:
                        </span>
                        <a href="user?id=<?php echo $picture->user_id ?>">
                            <span class="text-blue-700">
                                <?= $picture->username ?>
                            </span>
                        </a>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php
include 'shared/footer.php';
?>