<?php
include dirname(__DIR__, 1) . '/shared/head.php';
include dirname(__DIR__, 1) . '/shared/navigation.php';
?>
    <section class="container mx-auto">
        <h2 class="text-lg text-black">Welcome back, <span class="text-blue-700">
                <?= $username ?>
            </span></h2>
        <div class="flex sm:flex-row flex-col sm:my-2 my-6">
            <p class="sm:my-0 mb-4">
                <a
                        href="/profile/img"
                        class="hover:bg-gray-100 text-md py-2 px-4 mr-2 rounded bg-gray-200"
                >
                    Upload new image
                </a>
            </p>
            <p>
                <a
                        href="/profile/desc"
                        class=" hover:bg-gray-100 text-md py-2 px-4 mr-2 rounded bg-gray-200"
                >
                    Change your description
                </a>
            </p>
        </div>
        <h2 class="text-lg text-black">
          Your uploads:
        </h2>
        <div class="flex sm:flex-row flex-col">
            <?php foreach ($photos as $photo): ?>
                <div class="flex flex-col shadow-lg mr-6 mt-6">
                    <a href="/image?id=<?php echo $photo->id ?>">
                        <img class="max-w-xs h-72 max-h-72" src="images/<?php echo $photo->file_name ?>" alt="image">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php
include dirname(__DIR__, 1) . '/shared/footer.php';
?>